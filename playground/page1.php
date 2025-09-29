<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>add</title>
        <script src="calcualate.js"></script>
        <style>
            select {
                width: 80px;
                margin: 5px;
            }
            input {
                width: 80px;
                margin: 5px;
            }
        </style>
    </head>
    <body>
        <h2>Add Calculator</h2>
        <form>
            <input type="number" id="num1" placeholder="First number" oninput="calculateAdd()">
            +
            <input type="number" id="num2" placeholder="Seconf number" oninput="calculateAdd()">
        </form>
        <h3>Result: <span id="resultAdd">0</span></h3>
        
        <a href="page1.php">Add</a>
        <a href="page2.php">Sub</a>
        <a href="page3.php">Mul</a>
        <a href="page4.php">Div</a>
        <a href="result.php">result</a>
        
        <h2>Add All Answer</h2>
        <h3>Result: <span id="resultAll">0</span></h3>
        
        <script>
        // Restore form field values from sessionStorage
        var num1Value = parseFloat(sessionStorage.getItem('num1Value')) || 0;
        var num2Value = parseFloat(sessionStorage.getItem('num2Value')) || 0;
        document.getElementById('num1').value = num1Value;
        document.getElementById('num2').value = num2Value;
        
        var resultAll = parseFloat(sessionStorage.getItem('resultAll')) || 0;
        document.getElementById('resultAll').textContent = resultAll.toFixed(2);
        </script>
    </body>
</html>

