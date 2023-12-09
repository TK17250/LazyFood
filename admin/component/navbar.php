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

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Setting -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./settinguser.php" class="nav-link">ตั้งค่า <i class="fa-solid fa-gear ms-1"></i></a>
        </li>
        
        <!-- Logout -->
        <li class="nav-item">
            <a href="./adminpage.php?logout='1'" class="btn btn-danger">Logout</a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->