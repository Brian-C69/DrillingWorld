<?php
session_start();

// Check if the user is already logged in and has the "user" role, if yes then redirect him to the welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["role"] === "user") {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Check for successful registration message
$registration_success = false;

// Check for message
$success_message = $error_message = "";

if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
    $message_status = $_SESSION['status'];
    if ($message_status === 'success') {
        $registration_success = true;
        $success_message = $_SESSION['message'];
    } elseif ($message_status === 'error') {
        $error_message = $_SESSION['message'];
    }
    unset($_SESSION['status']);
    unset($_SESSION['message']);
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = strtolower(trim($_POST["username"])); // Convert username to lowercase
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password, first_name, last_name, gender, birthday, email, phone_number, created_at, last_loggedin FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $first_name, $last_name, $gender, $birthday, $email, $phone_number, $created_at, $last_loggedin);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store all data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["role"] = "user";
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            $_SESSION["gender"] = $gender;
                            $_SESSION["birthday"] = $birthday;
                            $_SESSION["email"] = $email;
                            $_SESSION["phone_number"] = $phone_number;
                            $_SESSION["created_at"] = $created_at;
                            $_SESSION["last_loggedin"] = $last_loggedin;
                            $_SESSION['start_time'] = time();

                            // Update last_loggedin field
                            $update_last_loggedin_sql = "UPDATE users SET last_loggedin = NOW() WHERE id = ?";
                            if ($update_stmt = mysqli_prepare($link, $update_last_loggedin_sql)) {
                                mysqli_stmt_bind_param($update_stmt, "i", $id);
                                mysqli_stmt_execute($update_stmt);
                                mysqli_stmt_close($update_stmt);
                            }
                            // Redirect user to welcome page
                            header("location: welcome.php");
                            exit;
                        } else {
                            // Password is not valid, set error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, set error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php include 'includes/headerLogin.php'; ?>
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="container p-5 my-5 bg-dark text-white">
        <h1>Login</h1>
        <p>Please fill in your credentials to login.</p>
    </div>

    <div class="container">
        <div class="wrapper">

            <?php
            if ($registration_success) {
                echo '<div class="alert alert-success"> Registration successful. Login to Continue</div>';
            } elseif (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            } elseif (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>
