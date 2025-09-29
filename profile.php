<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
// Check if the session has expired
if (isset($_SESSION['start_time'])) {
    $expiryTime = $_SESSION['start_time'] + 180; // Session duration in seconds (adjust as needed)
    $currentTime = time();
    $remainingTime = max(0, $expiryTime - $currentTime);

    if ($remainingTime <= 0) {
        // Session expired, log the user out and redirect to the login page
        session_unset();
        session_destroy();
        header("location: login.php");
        exit;
    }
}

// Update the session start time on each page load to reset the timeout
$_SESSION['start_time'] = time();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Welcome</title>
        <?php include 'includes/headers.php'; ?>
    </head>

    <body>
        <?php include 'includes/nav.php'; ?>

        <div class="container p-5 my-5 bg-dark text-white">
            <h1>My Profile</h1>
            <p>Account details</p>
        </div>

        <div class="container">
            <a href="welcome.php" class="btn btn-primary">Back</a>
        </div>

        <div class="container mt-3">
            <p>Name: <?php echo $_SESSION["first_name"]; ?> <?php echo $_SESSION["last_name"]; ?></p>
            <p>Email: <?php echo $_SESSION["email"]; ?></p>
            <p>Phone Number: <?php echo $_SESSION["phone_number"]; ?></p>
        </div>
    </body>
</html>

