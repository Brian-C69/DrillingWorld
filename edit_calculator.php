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

// Check if the Calculator ID is provided in the URL
if (isset($_GET['cid']) && is_numeric($_GET['cid'])) {
    $user_id = $_GET['cid'];

    // Fetch user data from the database based on the provided ID
    $sql = "SELECT * FROM calculators WHERE cid = ?";
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
        $_SESSION['error_message'] = "Calculator not found.";
        header("location: AdminCalculatorPanel.php");
        exit;
    }
} else {
    // If user ID is not provided in the URL, redirect to AdminCalculatorPanel.php
    header("location: AdminCalculatorPanel.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data and update the user information in the database
    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $file_path = trim($_POST["file_path"]);

    // Update the user information in the database
    $update_sql = "UPDATE calculators SET name = ?, category = ?, file_path = ? WHERE cid = ?";
    if ($update_stmt = mysqli_prepare($link, $update_sql)) {
        mysqli_stmt_bind_param($update_stmt, "sssi", $name, $category, $file_path, $user_id);
        if (mysqli_stmt_execute($update_stmt)) {
            $_SESSION['success_message'] = "Calculator information updated successfully.";
        } else {
            $_SESSION['error_message'] = "Error updating Calculator information.";
        }
        mysqli_stmt_close($update_stmt);
    } else {
        $_SESSION['error_message'] = "Error preparing the update statement.";
    }

    // Redirect back to AdminCalculatorPanel.php after editing
    header("location: AdminCalculatorPanel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Edit Calculator</title>
        <?php include 'includes/headerLogin.php'; ?>
    </head>

    <body>
        <?php include 'includes/nav.php'; ?>
        <div class="container pt-5"></div>
        <div class="container pt-5"></div>
        <div class="container pt-5"></div>
        <div class="container">
            <div class="wrapper">
                <h1>Edit Calculator</h1>
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <form action="edit_calculator.php?cid=<?php echo $user_id; ?>" method="post">
                    <div class="form-group pt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control" value="<?php echo $user['category']; ?>">
                    </div>
                    <div class="form-group pt-2">
                        <label>File Path</label>
                        <input type="text" name="file_path" class="form-control" value="<?php echo $user['file_path']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Edit">
                        <a href="AdminCalculatorPanel.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>
