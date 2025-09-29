<?php
session_start();

// Check if the admin is logged in and has the "admin" role
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

    // Prepare and execute the SQL statement to delete the user
    $delete_sql = "DELETE FROM users WHERE id = ?";
    if ($delete_stmt = mysqli_prepare($link, $delete_sql)) {
        mysqli_stmt_bind_param($delete_stmt, "i", $user_id);
        if (mysqli_stmt_execute($delete_stmt)) {
            $_SESSION['success_message'] = "User deleted successfully.";
        } else {
            $_SESSION['error_message'] = "Error deleting user.";
        }
        mysqli_stmt_close($delete_stmt);
    } else {
        $_SESSION['error_message'] = "Error preparing the delete statement.";
    }

    // Redirect back to AdminUserPanel.php after deletion
    header("location: AdminUserPanel.php");
    exit;
} else {
    // If user ID is not provided in the URL, redirect to AdminUserPanel.php
    header("location: AdminUserPanel.php");
    exit;
}
?>
