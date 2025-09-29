<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.php");
    exit;
}

// Include database configuration
require_once "../config.php";

// Fetch data from the Chemical_Prices table for the logged-in user
$userID = $_SESSION['id']; // Get the user's ID from the session
$sql = "SELECT * FROM Chemical_Prices WHERE userId = ?";
$stmt = mysqli_prepare($link, $sql);

// Bind the user's ID parameter
mysqli_stmt_bind_param($stmt, "i", $userID);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if query was successful
if (!$result) {
    die("Error: " . mysqli_error($link));
}
// Initialize an empty array to store prices
$prices = array();

// Loop through each row of data
while ($row = mysqli_fetch_assoc($result)) {
    // Store the price in the array
    $prices[$row['productName']] = array(
        'cost' => $row['cost'],
        'unit' => $row['unit']
    );
}
// Save all the info into Session
$_SESSION['prices'] = $prices;


// Fetch data from the Chemical_Prices table again for the logged-in user
$userID = $_SESSION['id']; // Get the user's ID from the session
$sql = "SELECT * FROM Chemical_Prices WHERE userId = ?";
$stmt = mysqli_prepare($link, $sql);

// Bind the user's ID parameter
mysqli_stmt_bind_param($stmt, "i", $userID);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result again
$result = mysqli_stmt_get_result($stmt);

// Check if query was successful
if (!$result) {
    die("Error: " . mysqli_error($link));
}


// Define variables and initialize with empty values
$serviceNum = $productName = $unit = $cost = "";
$serviceNum_err = $productName_err = $unit_err = $cost_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $serviceNum = trim($_POST["serviceNum"]);

    // Validate Product Name
    if (isset($_POST["productName"])) {
        if (empty(trim($_POST["productName"]))) {
            $productName_err = "Please select a product.";
        } else {
            $productName = trim($_POST["productName"]);
        }
    } else {
        $productName_err = "Product name is required."; // Display an error message for missing field
        $productName = ""; // Set a default value or handle the case as needed
    }

    // Validate Unit Size
    if (isset($_POST["unit"])) {
        if (empty(trim($_POST["unit"]))) {
            $unit_err = "Please select a unit size.";
        } else {
            $unit = trim($_POST["unit"]);
        }
    } else {
        $unit_err = "Unit size is required."; // Display an error message for missing field
        $unit = ""; // Set a default value or handle the case as needed
    }

    // Validate Unit Cost
    if (isset($_POST["cost"])) {
        if (empty(trim($_POST["cost"]))) {
            $cost_err = "Please enter the unit cost.";
        } else {
            $cost = trim($_POST["cost"]);
        }
    } else {
        $cost_err = "Unit cost is required."; // Display an error message for missing field
        $cost = ""; // Set a default value or handle the case as needed
    }

    // Check input errors before inserting into database
    if (empty($serviceNum_err) && empty($productName_err) && empty($unit_err) && empty($cost_err)) {
        // Prepare an INSERT statement
        $sql = "INSERT INTO Chemical_Prices (userId, serviceNum, productName, unit, cost) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issss", $_SESSION['id'], $serviceNum, $productName, $unit, $cost);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Product inserted successfully. Close the statement.
                mysqli_stmt_close($stmt);
                // Redirect to current page to refresh the product list
                header("location: " . $_SERVER["PHP_SELF"]);
                exit;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

// Close statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../includes/headersCal.php'; ?>
        <title>WENCAT</title>
    </head>
    <body>
        <?php include '../includes/navCal.php'; ?> 

        <div class="container my-5 text-center text-black">
            <h1>WENCAT</h1>
        </div>
        <div class="container p-2 my-2">
            <a href="../calculator.php" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Items</button>
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>
            <a href="WenCat.php" class="btn btn-success">WenCat</a>
            <a href="WenCatWBM-SBM-DIF.php" class="btn btn-primary">WBM-SBM-DIF</a>
            <a href="VolCalWBM-SBM-DIF.php" class="btn btn-primary">Vol Cal WBM-SBM-DIF</a>
            <a href="WenCatWBM-DIF.php" class="btn btn-primary">WBM-DIF</a>
            <a href="VolCalWBM-DIF.php" class="btn btn-primary">Vol Cal WBM-DIF</a>            
            <a href="WenCatFormulations.php" class="btn btn-primary">Formulations</a>
        </div>
        <!--calculator-->
        <div class="container pt-2">
            <div>
                <table id="userTable" class="table table-responsive table-bordered table-sm table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">SAP service No</th>
                            <th scope="col">Product</th>
                            <th scope="col">Unit Size</th>
                            <th scope="col">Unit Cost</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$index}</td>";
                            echo "<td>{$row['serviceNum']}</td>";
                            echo "<td>{$row['productName']}</td>";
                            echo "<td>{$row['unit']}</td>";
                            echo "<td>" . number_format($row['cost'], 2) . "</td>";
                            echo "<td>";
                            echo "<a href='edit_chemical.php?chid={$row['chid']}' class='btn btn-primary btn-sm'>Edit</a>";
                            echo "<a href='delete_product.php?cid={$row['chid']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";

                            $index++;
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <?php include '../addModal.php'; ?> 

        <?php include '../includes/footer.php'; ?>
        <script>
            $(document).ready(function () {
                $('#userTable').DataTable({
                    //disable sorting on last column
                    "columnDefs": [
                        {"orderable": false, "targets": 5}
                    ],
                    language: {
                        //customize pagination prev and next buttons: use arrows instead of words
                        'paginate': {
                            'previous': '<span class="fa fa-chevron-left"></span>',
                            'next': '<span class="fa fa-chevron-right"></span>'
                        },
                        //customize number of elements to be displayed
                        "lengthMenu": 'Display <select class="form-control input-sm">' +
                                '<option value="10">10</option>' +
                                '<option value="20">20</option>' +
                                '<option value="30">30</option>' +
                                '<option value="40">40</option>' +
                                '<option value="50">50</option>' +
                                '<option value="-1">All</option>' +
                                '</select> results'
                    }
                })
            });
        </script>
    </body>
</html>

