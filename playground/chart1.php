<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="chartConfig.js"></script> <!-- Include the chart configuration -->
</head>
<body>
    <div class="container">
        <canvas id="myChart" style="width:100%;max-width:600px;height:300px;"></canvas>
    </div>

    <script>
        // Initialize the Chart.js chart with the provided configuration
        new Chart("myChart", config);
    </script>
</body>
</html>
