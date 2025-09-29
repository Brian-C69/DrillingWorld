<?php
// Include database configuration
require_once "../config.php";

// Fetch details based on chid and return JSON response
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['chid'])) {
    $chid = $_POST['chid'];

    // Prepare and execute query to fetch details based on $chid
    $sql = "SELECT * FROM Chemical_Prices WHERE chid = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $chid);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $fetchedDetails = mysqli_fetch_assoc($result);
            // Return JSON response
            echo json_encode($fetchedDetails);
        } else {
            // Error handling if query execution fails
            echo json_encode(array('error' => 'Failed to execute query'));
        }
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Error handling if query preparation fails
        echo json_encode(array('error' => 'Failed to prepare query'));
    }
} else {
    // Error handling for invalid request
    echo json_encode(array('error' => 'Invalid request'));
}

// Close connection
mysqli_close($link);
?>
