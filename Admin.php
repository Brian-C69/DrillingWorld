<?php
session_start();

// Check if the admin is already logged in and has the "admin" role, if yes then redirect him to the admin page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["role"] === "admin") {
    header("location: Panel.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

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
        // Prepare a select statement for admins table
        $sql_admin = "SELECT aid, name, position, email, gender, birthday, username, password, created_at, last_loggedin FROM admins WHERE username = ?";

        if ($stmt_admin = mysqli_prepare($link, $sql_admin)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_admin, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt_admin)) {
                mysqli_stmt_store_result($stmt_admin);
                if (mysqli_stmt_num_rows($stmt_admin) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt_admin, $aid, $name, $position, $email, $gender, $birthday, $username, $hashed_password, $created_at, $last_loggedin);
                    if (mysqli_stmt_fetch($stmt_admin)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store admin data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["role"] = "admin";
                            $_SESSION["aid"] = $aid;
                            $_SESSION["name"] = $name;
                            $_SESSION["position"] = $position;
                            $_SESSION["email"] = $email;
                            $_SESSION["gender"] = $gender;
                            $_SESSION["birthday"] = $birthday;
                            $_SESSION["username"] = $username;
                            $_SESSION["created_at"] = $created_at;
                            $_SESSION["last_loggedin"] = $last_loggedin;
                            $_SESSION['start_time'] = time();

                            // Update last_loggedin field
                            $update_last_loggedin_sql = "UPDATE admins SET last_loggedin = NOW() WHERE aid = ?";
                            if ($update_stmt = mysqli_prepare($link, $update_last_loggedin_sql)) {
                                mysqli_stmt_bind_param($update_stmt, "i", $aid);
                                mysqli_stmt_execute($update_stmt);
                                mysqli_stmt_close($update_stmt);
                            }

                            // Redirect admin to welcome page
                            header("location: Panel.php");
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
            mysqli_stmt_close($stmt_admin);
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
            <h1>Admin Login</h1>
            <p>Please fill in your credentials to login.</p>
        </div>

        <div class="container">
            <div class="wrapper">
                <?php
                if (!empty($login_err)) {
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
                </form>
            </div>
        </div>
    </body>

</html>
