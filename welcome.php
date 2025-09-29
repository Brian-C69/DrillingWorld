<?php
// Initialize the session
session_start();

// Check if the user is logged in and has the "user" role, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "user") {
    $_SESSION['error_message'] = "You must log in to continue.";
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
        $_SESSION['error_message'] = "Session timeout. Please log in again.";
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
            <h1>Welcome to MyDrillingWorld.com, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
            <p>Click the Calculator to Navigate.</p>
        </div>
        <div class="container">
            <p>
                <a href="calculator.php" class="btn btn-primary ml-3">Go to Calculator</a>
                <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                <a href="profile.php" class="btn btn-success">My Profile</a>
                <a href="#" class="btn btn-danger ml-3" onclick="logout()">Sign Out of Your Account</a>
            </p>
        </div>

        <script>
            function logout() {
                var confirmLogout = confirm("Are you sure you want to log out?");
                if (confirmLogout) {
                    window.location.href = "logout.php";
                }
            }
        </script>
    </body>

</html>
