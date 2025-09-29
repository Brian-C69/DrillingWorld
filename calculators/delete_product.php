<?php
// Include database configuration
require_once "../config.php";

// Check if the product ID parameter is set in the URL
if (isset($_GET['cid']) && !empty($_GET['cid'])) {
    // Prepare a DELETE statement
    $sql = "DELETE FROM Chemical_Prices WHERE chid = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind the product ID parameter
        mysqli_stmt_bind_param($stmt, "i", $_GET['cid']);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Product deleted successfully
            mysqli_stmt_close($stmt);
            mysqli_close($link);
            // Redirect back to the original page
            header("location: {$_SERVER["HTTP_REFERER"]}");
            exit;
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
?>
