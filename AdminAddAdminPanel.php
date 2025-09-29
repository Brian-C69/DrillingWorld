<?php
session_start();

// Check if the admin is logged in and has the "admin" role, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin") {
    $_SESSION['error_message'] = "You must be Admin for this action";
    header("location: Admin.php");
    exit;
}

// Include database configuration
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $name = $position = $gender = $birthday = $email = $phone_number = "";
$username_err = $password_err = $name_err = $position_err = $gender_err = $birthday_err = $email_err = $phone_number_err = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        $lowercase_username = strtolower(trim($_POST["username"]));

        // Prepare a select statement
        $sql = "SELECT aid FROM admins WHERE LOWER(username) = LOWER(?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $lowercase_username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = $lowercase_username;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate Gender
    if (isset($_POST["gender"]) && !empty(trim($_POST["gender"]))) {
        $gender = trim($_POST["gender"]);
    } else {
        $gender_err = "Please select your gender.";
    }
    
    // Validate Position
    if (empty(trim($_POST["position"]))) {
        $position_err = "Please enter your position.";
    } else {
        $position = trim($_POST["position"]);
    }

    // Validate birthday
    if (empty(trim($_POST["birthday"]))) {
        $birthday_err = "Please enter your birthday.";
    } else {
        $input_birthday = strtotime(trim($_POST["birthday"]));
        $current_date = strtotime(date('Y-m-d'));

        if ($input_birthday > $current_date) {
            $birthday_err = "Please select a valid birthday (not a future date).";
        } else {
            $birthday = date('Y-m-d', $input_birthday);
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', trim($_POST["email"]))) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate phone number
    if (empty(trim($_POST["phone_number"]))) {
        $phone_number_err = "Please enter your phone number.";
    } else {
        $phone_number = trim($_POST["phone_number"]);
    }

    // Check input errors before inserting into the database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err) && empty($gender_err) && empty($birthday_err) && empty($email_err) && empty($phone_number_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO admins (username, password, name, gender, position, birthday, email, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_username, $param_password, $param_name, $param_gender, $param_position, $param_birthday, $param_email, $param_phone_number);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_name = $name;
            $param_gender = $gender;
            $param_position = $position;
            $param_birthday = $birthday;
            $param_email = $email;
            $param_phone_number = $phone_number;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Set session variables for success message
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Admin registration successful!';

                // Redirect to the admin panel or any other desired page
                header("location: AdminPanel.php");
                exit();
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
    <title>Add Admin</title>
    <?php include 'includes/headerLogin.php'; ?>
</head>

<body>
    <?php include 'includes/nav.php'; ?>
    <div class="container pt-5"></div>
    <div class="container pt-5"></div>
    <div class="container pt-5"></div>
    <div class="container">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group pt-2">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Gender</label>
                    <select name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>">
                        <option value="" selected disabled>Select your gender</option>
                        <option value="Male" <?php echo (isset($gender) && $gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo (isset($gender) && $gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo (isset($gender) && $gender == 'Other') ? 'selected' : ''; ?>>Other</option>
                    </select>
                    <span class="invalid-feedback"><?php echo $gender_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Position</label>
                    <input type="text" name="position" class="form-control <?php echo (!empty($position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $position; ?>">
                    <span class="invalid-feedback"><?php echo $position_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Birthday</label>
                    <input type="date" name="birthday" class="form-control <?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday; ?>">
                    <span class="invalid-feedback"><?php echo $birthday_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group pt-2">
                    <label>Phone Number</label>
                    <input type="tel" name="phone_number" class="form-control <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_number; ?>">
                    <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>
                </div>
                <div class="form-group">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Add">
                    <a href="AdminPanel.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


