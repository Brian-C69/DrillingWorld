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
        <h2>Add All Answer</h2>
        <h3>Result: <span id="resultAll">0</span></h3>
        
        <h3>Result Add: <span id="resultAdd">0</span></h3>
        <h3>Result Sub: <span id="resultSub">0</span></h3>
        <h3>Result Mul: <span id="resultMul">0</span></h3>
        <h3>Result Div: <span id="resultDiv">0</span></h3>

        <a href="page1.php">Add</a>
        <a href="page2.php">Sub</a>
        <a href="page3.php">Mul</a>
        <a href="page4.php">Div</a>
        <a href="result.php">Result</a>
        
        <script>
        // Restore form field values from sessionStorage
        var resultValue = parseFloat(sessionStorage.getItem('resultAllValue')) || 0;
        document.getElementById('resultAll').value = resultAllValue;
        </script>
    </body>
</html>

