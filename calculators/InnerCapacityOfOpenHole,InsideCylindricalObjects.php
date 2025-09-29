<?php include '../includes/checkCal.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../includes/headersCal.php';?>
    <title>Inner Capacity Of Open Hole, Inside Cylindrical Objects</title>
</head>
<body>
    <?php include '../includes/navCal.php';?>
    <div class="container p-2 my-2">
        <a href="../calculator.php" class="btn btn-primary">Back</a>
    </div>
    <!--calculator-->
    <link rel="stylesheet" href="https://embed.calculoid.com/styles/main.css" />
    <script src="https://embed.calculoid.com/scripts/combined.min.js"></script>
    <div ng-app="calculoid" ng-controller="CalculoidMainCtrl" ng-init="init({calcId:91645,apiKey:'883ccb68619b2c78af4e8'})" ng-include="load()"></div>
    <?php include '../includes/footer.php';?>
</body>
</html>