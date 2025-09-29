<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true && $_SESSION["role"] === "user") {
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
    <title>Calculator</title>
    <?php include 'includes/headers.php'; ?>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>
<body>   
    <?php include 'includes/nav.php'; ?>
    <div class="container p-5 my-5 bg-dark text-white">
        <h1>Calculator</h1>
        <p>Select the calculators you want to use, happy drilling!</p>
    </div>

    <div class="container">
        <a href="welcome.php" class="btn btn-primary">Back</a>
    </div>

    <div class="container mt-3">
        <input type="text" id="searchInput" placeholder="Search for a calculator">
        <div id="searchResults" class="list-group list-group-item-action"></div>
    </div>

    <!-- Add your category containers here -->
    <div class="container p-5 my-5 bg-dark text-white category-container" id="appliedDrillingFormulas">
        <h1>Applied Drilling Formulas</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="basicDrillingFormulas">
        <h1>Basic Drilling Formulas</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="directionalDrilling">
        <h1>Directional Drilling Calculation</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="drillingFluidFormulas">
        <h1>Drilling Fluid Formulas</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="engineeringFormulas">
        <h1>Engineering Formulas</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="hydraulicFormulas">
        <h1>Hydraulic Formulas</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="wellControlFormulas">
        <h1>Well Control Formulas</h1>
    </div> 
    <div class="container p-5 my-5 bg-dark text-white category-container" id="drillString">
        <h1>Drill String</h1>
    </div>
    <div class="container p-5 my-5 bg-dark text-white category-container" id="cementing">
        <h1>Cementing</h1>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

