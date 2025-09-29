document.addEventListener('DOMContentLoaded', function() {
    // Check if the current page is page1.php
    if (window.location.pathname.includes("page1.php")) {
        calculateAdd();
    }
    // Check if the current page is page2.php
    else if (window.location.pathname.includes("page2.php")) {
        calculateSub();
    }
    // Check if the current page is page3.php
    else if (window.location.pathname.includes("page3.php")) {
        calculateMul();
    }
    // Check if the current page is page4.php
    else if (window.location.pathname.includes("page4.php")) {
        calculateDiv();
    }
    // Check if the current page is result.php
    else if (window.location.pathname.includes("result.php")) {
        calculateAddAllAnswer();
    }
});

function calculateAdd() {
    // Get the select elements
    var num1 = parseFloat(document.getElementById('num1').value) || 0;
    var num2 = parseFloat(document.getElementById('num2').value) || 0;
    // Perform the calculation
    var resultAdd = num1 + num2;

    // Display the result
    document.getElementById('resultAdd').textContent = resultAdd;
    // Store form field values in sessionStorage
    sessionStorage.setItem('num1Value', num1);
    sessionStorage.setItem('num2Value', num2);
    sessionStorage.setItem('resultAdd', resultAdd);
}

function calculateSub() {
    // Get the select elements
    var num3 = parseFloat(document.getElementById('num3').value) || 0;
    var num4 = parseFloat(document.getElementById('num4').value) || 0;
    // Perform the calculation
    var resultSub = num3 - num4;

    // Display the result
    document.getElementById('resultSub').textContent = resultSub;
    // Store form field values in sessionStorage
    sessionStorage.setItem('num3Value', num3);
    sessionStorage.setItem('num4Value', num4);
    sessionStorage.setItem('resultSub', resultSub);
}

function calculateMul() {
    // Get the select elements
    var num5 = parseFloat(document.getElementById('num5').value) || 0;
    var num6 = parseFloat(document.getElementById('num6').value) || 0;
    // Perform the calculation
    var resultMul = num5 * num6;

    // Display the result
    document.getElementById('resultMul').textContent = resultMul;
    // Store form field values in sessionStorage
    sessionStorage.setItem('num5Value', num5);
    sessionStorage.setItem('num6Value', num6);
    sessionStorage.setItem('resultMul', resultMul);
}

function calculateDiv() {
    // Get the select elements
    var num7 = parseFloat(document.getElementById('num7').value) || 0;
    var num8 = parseFloat(document.getElementById('num8').value) || 0;
    // Perform the calculation
    var resultDiv = num7 / num8;

    // Display the result
    document.getElementById('resultDiv').textContent = resultDiv;
    // Store form field values in sessionStorage
    sessionStorage.setItem('num7Value', num7);
    sessionStorage.setItem('num8Value', num8);
    sessionStorage.setItem('resultDiv', resultDiv);
    
}


function calculateAddAllAnswer() {
    // Retrieve results from sessionStorage
    var resultAdd = parseFloat(sessionStorage.getItem('resultAdd')) || 0;
    var resultSub = parseFloat(sessionStorage.getItem('resultSub')) || 0;
    var resultMul = parseFloat(sessionStorage.getItem('resultMul')) || 0;
    var resultDiv = parseFloat(sessionStorage.getItem('resultDiv')) || 0;

    // Calculate the total sum
    var resultAll = resultAdd + resultSub + resultMul + resultDiv;

    // Display the total sum
    document.getElementById('resultAll').textContent = resultAll.toFixed(2);
    
    sessionStorage.setItem('resultAll', resultAll);
    
    // Display individual results
    document.getElementById('resultAdd').textContent = resultAdd.toFixed(2);
    document.getElementById('resultSub').textContent = resultSub.toFixed(2);
    document.getElementById('resultMul').textContent = resultMul.toFixed(2);
    document.getElementById('resultDiv').textContent = resultDiv.toFixed(2);
}