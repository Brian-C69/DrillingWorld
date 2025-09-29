<?php 
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Admin navigation
    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="bi bi-chevron-double-down"></i>MyDrillingWorld.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
                <ul class="navbar-nav text-center text-sm-start"> 
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Panel.php">Admin Dashboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav nav">
                    <a href="AdminLogout.php" class="btn btn-danger">Logout</a>
                </ul>
            </div>
        </div>
    </nav>';
} elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
    // User navigation
    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="bi bi-chevron-double-down"></i>MyDrillingWorld.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
                <ul class="navbar-nav text-center text-sm-start"> 
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="welcome.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav nav">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </ul>
            </div>
        </div>
    </nav>';
} else {
    // Visitor without logging in navigation
    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="bi bi-chevron-double-down"></i></i>MyDrillingWorld.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
                <ul class="navbar-nav text-center text-sm-start"> 
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav nav">
                    <a href="login.php" class="btn btn-primary">Login</a>  
                </ul>
            </div>
        </div>
    </nav>';
}
?>
