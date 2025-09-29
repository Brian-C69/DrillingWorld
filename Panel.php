<?php
session_start();

// Check if the admin is logged in and has the "admin" role, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin") {
    $_SESSION['error_message'] = "You must be Admin for this action";
    header("location: Admin.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin</title>
        <?php include 'includes/headers.php'; ?>
    </head>

    <body>
        <?php include 'includes/nav.php'; ?>

        <div class="container p-5 my-5 text-center text-black">
            <h1>Dashboard</h1>
        </div>

        <div class="container text-center">
            <p>
                <a href="AdminUserPanel.php"><button type="button" class="btn btn-primary">User Panel</button></a>
                <a href="AdminPanel.php"><button type="button" class="btn btn-primary">Admin Panel</button></a>
                <a href="AdminCalculatorPanel.php"><button type="button" class="btn btn-primary">Calculator Panel</button></a>
            </p>
        </div>


    </body>
</html>