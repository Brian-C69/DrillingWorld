<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/headersCal.php';?>
    <title>Annular Capacity Between Casing Or Hole And Drill Pipe, Tubing, Or Casing.</title>
</head>
<body>
<?php include '../includes/navCal.php';?> 
    <div class="container p-2 my-2">
        <a href="../calculator.php" class="btn btn-primary">Back</a>
    </div><!--calculator-->
<link rel="stylesheet" href="https://embed.calculoid.com/styles/main.css" />
<script src="https://embed.calculoid.com/scripts/combined.min.js"></script>
<div ng-app="calculoid" ng-controller="CalculoidMainCtrl" ng-init="init({calcId:91581,apiKey:'883ccb68619b2c78af4e8'})" ng-include="load()"></div>
</body>
</html>


