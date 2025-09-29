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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Amount Of Cuttings Drilled Per Foot Of Hole Drilled</title>
</head>
<body>
    
<!--Navigation Bar-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container">
          <a class="navbar-brand" href="index1.php">MyDrillingWorld.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="about1.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact1.php">Contact</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="welcome.php">Home</a>
                    </li> 
                </ul>
            </div>
           <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
</nav>

<div class="container p-2 my-2">
        <a href="calculator.php" class="btn btn-primary">Back</a>
    </div>

<!--calculator-->
<link rel="stylesheet" href="https://embed.calculoid.com/styles/main.css" />
<script src="https://embed.calculoid.com/scripts/combined.min.js"></script>
<div ng-app="calculoid" ng-controller="CalculoidMainCtrl" ng-init="init({calcId:91579,apiKey:'883ccb68619b2c78af4e8'})" ng-include="load()"></div>







</body>
</html>


