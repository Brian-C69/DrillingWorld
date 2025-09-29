<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>subtract</title>
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
        <h2>Subtract Calculator</h2>
        <form>
            <input type="number" id="num3" placeholder="First number" oninput="calculateSub()">
            -
            <input type="number" id="num4" placeholder="Seconf number" oninput="calculateSub()">
        </form>
        <h3>Result: <span id="resultSub">0</span></h3>

        <a href="page1.php">Add</a>
        <a href="page2.php">Sub</a>
        <a href="page3.php">Mul</a>
        <a href="page4.php">Div</a>
        <a href="result.php">result</a>
        
        <script>
        // Restore form field values from sessionStorage
        var num3Value = parseFloat(sessionStorage.getItem('num3Value')) || 0;
        var num4Value = parseFloat(sessionStorage.getItem('num4Value')) || 0;
        document.getElementById('num3').value = num3Value;
        document.getElementById('num4').value = num4Value;
        </script>
    </body>
</html>

