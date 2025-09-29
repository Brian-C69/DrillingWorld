<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/headersCal.php'; ?>
        <title></title>
        <style>
            /* Hide all elements except the calculator div when printing */
            @media print {
                body * {
                    display: none;
                }
                .calculator-container, .calculator-container * {
                    display: block !important;
                }
                .signature-div {
                    display: none !important;
                }
                .btn {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body>
        <?php include '../includes/navCal.php'; ?> 
        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
        </div>
        <!--calculator-->
        <link rel="stylesheet" href="https://embed.calculoid.com/styles/main.css" />
        <script src="https://embed.calculoid.com/scripts/combined.min.js"></script>
        <div class="calculator-container">
            <div ng-app="calculoid" ng-controller="CalculoidMainCtrl" ng-init="init({calcId:91647,apiKey:'883ccb68619b2c78af4e8'})" ng-include="load()"></div>
        </div>

        <?php include '../includes/footer.php'; ?>
    </body>
</html>
