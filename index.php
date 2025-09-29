<?php
// Initialize the session
session_start();
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
    <title>Home</title>
    <?php include 'includes/headers.php';?>
</head>

<body>     
    
    <?php include 'includes/nav.php';?>

    <?php 
    if (isset($_SESSION['id'])){
        echo '<div class="container p-5 my-5 bg-dark text-white">
        <h1>Welcome to <i class="bi bi-chevron-double-down"></i> MyDrillingWorld.com</h1>
        <p>You are Logged In. Please go to Home to continue.</p>
    </div>';
    } else {
        echo '<div class="container p-5 my-5 bg-dark text-white">
        <h1>Welcome to <i class="bi bi-chevron-double-down"></i> MyDrillingWorld.com</h1>
        <p>To get started, click the login button.</p>
    </div>';
    }
    ?>
    
    <?php include 'includes/footer.php';?>
</body>

</html>
