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

// Define variables and initialize with empty values
$name = $category = $file_path = "";
$name_err = $category_err = $file_path_err = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate Category
    if (empty(trim($_POST["category"]))) {
        $category_err = "Please enter category.";
    } else {
        $category = trim($_POST["category"]);
    }

    // Validate File Path
    if (empty(trim($_POST["file_path"]))) {
        $file_path_err = "Please enter file path.";
    } else {
        $file_path = trim($_POST["file_path"]);
    }    


    // Check input errors before inserting into the database
    if (empty($name_err) && empty($category_err) && empty($file_path_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO calculators (name, category, file_path) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_category, $param_file_path);

            // Set parameters
            $param_name = $name;
            $param_category = $category;
            $param_file_path = $file_path;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Set session variables for success message
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Registration successful! Please login to continue.';

                // Redirect to the login page
                header("location: AdminCalculatorPanel.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Add Calculator</title>
        <?php include 'includes/headerLogin.php'; ?>
    </head>

    <body>
        <?php include 'includes/nav.php'; ?>
        <div class="container pt-5"></div>
        <div class="container pt-5"></div>
        <div class="container pt-5"></div>
        <div class="container">
            <div class="wrapper">
                <h1>Add Calculator</h1>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group ">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group pt-2">
                        <label>Category</label>
                        <input type="text" name="category" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                        <span class="invalid-feedback"><?php echo $category_err; ?></span>
                    </div>
                    <div class="form-group pt-2">
                        <label>File Path</label>
                        <input type="text" name="file_path" class="form-control <?php echo (!empty($file_path_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $file_path; ?>">
                        <span class="invalid-feedback"><?php echo $file_path_err; ?></span>
                    </div>

                    <div class="form-group">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Add">
                        <a href="AdminCalculatorPanel.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>