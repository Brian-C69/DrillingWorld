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
$sql = "SELECT id, first_name, last_name, gender, birthday, username, email, phone_number FROM users";
$result = mysqli_query($link, $sql);

// Check if query was successful
if (!$result) {
    die("Error: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>User Panel</title>
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
            <h1>User Panel</h1>
        </div>

        <div class="container text-center">
            <p>
                <a href="Panel.php"><button type="button" class="btn btn-primary">Back</button></a>
                <a href="AdminAddUserPanel.php"><button type="button" class="btn btn-primary">Add User</button></a>
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
                            <th scope="col" onclick="sortTable(1)">First Name</th>
                            <th scope="col" onclick="sortTable(2)">Last Name</th>
                            <th scope="col" onclick="sortTable(3)">Gender</th>
                            <th scope="col" onclick="sortTable(4)">Birthday</th>
                            <th scope="col" onclick="sortTable(5)">Username</th>
                            <th scope="col" onclick="sortTable(6)">Email</th>
                            <th scope="col" onclick="sortTable(7)">Phone Number</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$index}</td>";
                            echo "<td>{$row['first_name']}</td>";
                            echo "<td>{$row['last_name']}</td>";
                            echo "<td>{$row['gender']}</td>";
                            echo "<td>{$row['birthday']}</td>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['phone_number']}</td>";
                            echo "<td>
                            <a href='edit_user.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete_user.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
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
