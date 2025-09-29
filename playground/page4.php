<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>divide</title>
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
        <h2>Divide Calculator</h2>
        <form>
            <input type="number" id="num7" placeholder="First number" oninput="calculateDiv()">
            /
            <input type="number" id="num8" placeholder="Second number" oninput="calculateDiv()">
        </form>
        <h3>Result: <span id="resultDiv">0</span></h3>

        <a href="page1.php">Add</a>
        <a href="page2.php">Sub</a>
        <a href="page3.php">Mul</a>
        <a href="page4.php">Div</a>
        <a href="result.php">result</a>
        
        <script>
        // Restore form field values from sessionStorage
        var num7Value = parseFloat(sessionStorage.getItem('num7Value')) || 0;
        var num8Value = parseFloat(sessionStorage.getItem('num8Value')) || 0;
        document.getElementById('num7').value = num7Value;
        document.getElementById('num8').value = num8Value;
        </script>
    </body>
</html>

