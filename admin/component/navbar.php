<?php require_once '../connect/server.php'; 

    if (!isset($_SESSION['name'])) {
        header("location: ../index.php");
    }

    if ($_SESSION['rank'] == "สมาชิก") {
        header("location: ../index.php");
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header("location: ../index.php");
    }

?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <!-- Menu Bar -->
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" type="button"><i class="fas fa-bars"></i></a>
        </li>

        <!-- Home -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="adminpage.php" class="nav-link">Home</a>
        </li>

        <!-- Drop Down -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
                Help
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">FAQ</a>
                <a class="dropdown-item" href="#">Support</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Contact</a>
            </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
        <!-- Logout -->
        <li class="nav-item">
            <a href="./adminpage.php?logout='1'" class="btn btn-danger">Logout</a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->