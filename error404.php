<?php
// Initialize the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Error 404 Not Found</title>
    <?php include 'includes/headers.php';?>
</head>

<body>     
    
    <?php include 'includes/nav.php';?>

    <?php 
    if (isset($_SESSION['role'])){
        echo '<div class="container p-5 my-5 bg-dark text-white">
        <h1>Error 404: Page Not Found</h1>
        <p>You are Logged In. Please go to Home to continue.</p>
    </div>';
    } else {
        echo '<div class="container p-5 my-5 bg-dark text-white">
        <h1>Error 404: Page Not Found</h1>
        <p>To get started, click the login button. </p>
    </div>';
    }
    ?>
    
    <?php include 'includes/footer.php';?>
</body>

</html>