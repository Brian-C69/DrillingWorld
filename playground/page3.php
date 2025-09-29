<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>multiplication</title>
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
        <h2>Multiplication Calculator</h2>
        <form>
            <input type="number" id="num5" placeholder="First number" oninput="calculateMul()">
            X
            <input type="number" id="num6" placeholder="Second number" oninput="calculateMul()">
        </form>
        <h3>Result: <span id="resultMul">0</span></h3>

        <a href="page1.php">Add</a>
        <a href="page2.php">Sub</a>
        <a href="page3.php">Mul</a>
        <a href="page4.php">Div</a>
        <a href="result.php">result</a>
        
        <script>
        // Restore form field values from sessionStorage
        var num5Value = parseFloat(sessionStorage.getItem('num5Value')) || 0;
        var num6Value = parseFloat(sessionStorage.getItem('num6Value')) || 0;
        document.getElementById('num5').value = num5Value;
        document.getElementById('num6').value = num6Value;
        </script>
    </body>
</html>

