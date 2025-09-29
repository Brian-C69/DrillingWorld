<?php

// Include the database configuration file
include_once "config.php";

// Retrieve search query
$query = $link->real_escape_string($_POST["query"]);

// Query the database
$sql = "SELECT * FROM calculators WHERE name LIKE '%$query%'";
$result = $link->query($sql);

// Display results
while ($row = $result->fetch_assoc()) {
    echo "<a href='" . $row["file_path"] . "' class='list-group-item list-group-item-action'>" . $row["name"] . " - " . $row["category"] . "</a>";
}

// Close the database connection
$link->close();
?>
