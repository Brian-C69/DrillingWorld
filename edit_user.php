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

// Check if the user ID is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user data from the database based on the provided ID
    $sql = "SELECT * FROM users WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
        }
        mysqli_stmt_close($stmt);
    }

    // Check if the user exists
    if (!isset($user) || empty($user)) {
        $_SESSION['error_message'] = "User not found.";
        header("location: AdminUserPanel.php");
        exit;
    }
} else {
    // If user ID is not provided in the URL, redirect to AdminUserPanel.php
    header("location: AdminUserPanel.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and update the user information in the database
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $gender = trim($_POST["gender"]);
    $birthday = trim($_POST["birthday"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $phone_number = trim($_POST["phone_number"]);

    // Update the user information in the database
    $update_sql = "UPDATE users SET first_name = ?, last_name = ?, gender = ?, birthday = ?, username = ?, email = ?, phone_number = ? WHERE id = ?";
    if ($update_stmt = mysqli_prepare($link, $update_sql)) {
        mysqli_stmt_bind_param($update_stmt, "sssssssi", $first_name, $last_name, $gender, $birthday, $username, $email, $phone_number, $user_id);
        if (mysqli_stmt_execute($update_stmt)) {
            $_SESSION['success_message'] = "User information updated successfully.";
        } else {
            $_SESSION['error_message'] = "Error updating user information.";
        }
        mysqli_stmt_close($update_stmt);
    } else {
        $_SESSION['error_message'] = "Error preparing the update statement.";
    }

    // Redirect back to AdminUserPanel.php after editing
    header("location: AdminUserPanel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edit User</title>
        <?php include 'includes/headerLogin.php'; ?>
    </head>

    <body>
        <?php include 'includes/nav.php'; ?>
        <div class="container pt-5"></div>
        <div class="container pt-5"></div>
        <div class="container pt-5"></div>
        <div class="container">
            <div class="wrapper">
                <h1>Edit User</h1>
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <form action="edit_user.php?id=<?php echo $user_id; ?>" method="post">
                    <div class="form-group pt-2">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male" <?php if ($user['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($user['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if ($user['gender'] === 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <label>Birthday</label>
                        <input type="date" name="birthday" class="form-control" value="<?php echo $user['birthday']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo $user['phone_number']; ?>">
                    </div>
                    <div class="form-group">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Edit">
                        <a href="AdminUserPanel.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>
