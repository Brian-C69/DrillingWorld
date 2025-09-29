<?php
session_start();

// Check if the admin is logged in and has the "admin" role, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin") {
    $_SESSION['error_message'] = "You must be Admin for this action";
    header("location: Admin.php");
    exit;
}

// Include database configuration
require_once "config.php";

// Fetch user data from the database
$sql = "SELECT cid, name, category, file_path FROM calculators";
$result = mysqli_query($link, $sql);

// Check if query was successful
if (!$result) {
    die("Error: " . mysqli_error($link));
}
?><!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin Panel</title>
        <?php include 'includes/headers.php'; ?>
        <style>
            .wrapper {
                width: 360px;
                padding: 20px;
            }
        </style>
    </head>

    <body>
        <?php include 'includes/nav.php'; ?>

        <div class="container p-5 my-5 text-center text-black">
            <h1>Calculator Panel</h1>
        </div>

        <div class="container text-center">
            <p>
                <a href="Panel.php"><button type="button" class="btn btn-primary">Back</button></a>
                <a href="AdminAddCalculatorPanel.php"><button type="button" class="btn btn-primary">Add Calculator</button></a>
            </p>
        </div>

        <div class="container">
            <div class="wrapper">
                <input type="text" id="searchInput" class="form-control" placeholder="Search..." onkeyup="searchTable()">
            </div>

            <div class="table-responsive">
                <table id="userTable" class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col" onclick="sortTable(0)">Index</th>
                            <th scope="col" onclick="sortTable(1)">CID</th>
                            <th scope="col" onclick="sortTable(2)">Name</th>
                            <th scope="col" onclick="sortTable(3)">Category</th>
                            <th scope="col" onclick="sortTable(4)">File Path</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$index}</td>";
                            echo "<td>{$row['cid']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['category']}</td>";
                            echo "<td>{$row['file_path']}</td>";
                            echo "<td>
                            <a href='edit_calculator.php?cid={$row['cid']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete_calculator.php?cid={$row['cid']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                        </td>";
                            echo "</tr>";
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>


            function sortTable(columnIndex) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("userTable");
                switching = true;
                dir = "asc";

                while (switching) {
                    switching = false;
                    rows = table.rows;

                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("td")[columnIndex];
                        y = rows[i + 1].getElementsByTagName("td")[columnIndex];

                        var xValue = x.innerText || x.textContent;
                        var yValue = y.innerText || y.textContent;

                        if (dir === "asc") {
                            if (xValue.toLowerCase() > yValue.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir === "desc") {
                            if (xValue.toLowerCase() < yValue.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }

                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        switchcount++;
                    } else {
                        if (switchcount === 0 && dir === "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }

            function searchTable() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toLowerCase();
                table = document.getElementById("userTable");
                tr = table.getElementsByTagName("tr");

                for (i = 1; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td");
                    var found = false;
                    for (var j = 0; j < td.length; j++) {
                        if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }
                    if (found) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        </script>
    </body>

</html>