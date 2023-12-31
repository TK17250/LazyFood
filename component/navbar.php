<?php require_once './connect/server.php';

    if (isset($_GET['logout'])) {
        session_destroy();
        header("location: index.php");
    }

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">

        <!-- Left -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="./data/icon.png" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;LazyFood
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        เมนู
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="./menu.php?menutype=อาหาร">อาหาร</a></li>
                        <li><a class="dropdown-item" href="./menu.php?menutype=เครื่องดื่ม">เครื่องดื่ม</a></li>
                        <li><a class="dropdown-item" href="./menu.php?menutype=ของหวาน">ของหวาน</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right -->
            <div class="d-flex navbar-nav">

                <?php if (!empty($_SESSION['name'])) { ?>

                    <!-- Cart -->
                    <li class="nav-item">
                        <a href="./cart.php" class="nav-link"><i class="fa-solid fa-shopping-cart ms-1"></i> ตะกร้าสินค้า</a>
                    </li>

                    <!-- Setting -->
                    <li class="nav-item">
                        <a href="./settingclient.php" class="nav-link"><i class="fa-solid fa-gear ms-1"></i> ตั้งค่าบัญชี</a>
                    </li>

                    <!-- Username -->
                    <li class="nav-item">
                        <a class="nav-link navbar-brand"><?php echo $_SESSION['name'] ?></a>
                        <a href="./index.php?logout='1'" class="btn btn-danger d-lg-none">Logout</a>
                    </li>

                    <!-- Logout -->
                    <li class="nav-item d-none d-lg-block">
                        <a href="./index.php?logout='1'" class="btn btn-danger">Logout</a>
                    </li>

                <?php } else { ?>

                    <!-- Login -->
                    <li class="nav-item me-2">
                        <a class="nav-link" aria-current="page" href="login.php">เข้าสู่ระบบ</a>
                    </li>
                    
                    <!-- Register -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="register.php">สมัครสมาชิก</a>
                    </li>
                    
                <?php } ?>

            </div>
        </div>
    </div>
</nav>