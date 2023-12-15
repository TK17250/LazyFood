<?php require_once './connect/server.php';
require_once './class/client_db.php';

    if (!isset($_GET['menutype'])) {
        header("location: ./index.php");
    }

    $menutype = $_GET['menutype'];
    $dbclinet = new Client_DB();

    $readmenutype = $dbclinet->readmenutype($menutype);
    $rowmenutype = mysqli_fetch_assoc($readmenutype);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyFood</title>
    <link rel="shortcut icon" href="./data/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./dist/css/main.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include_once './component/navbar.php' ?>

    <!-- Banner -->
    <div class="mt-5">
        <img src="./data/newBanner.png" class="w-100" alt="">
        <marquee behavior="" direction="" class="marq">
            ยินดีต้อนรับเข้าสู่ Lazy Food โดยเว็ปไซต์นี้จัดทำขึ้นเพื่อเป็นสื่อการสอน
        </marquee>
    </div>

    <!-- Content -->
    <div class="container mt-3 position-relative">

        <!-- Alert -->
        <?php include_once './component/succeed.php' ?>
        <?php include_once './component/error.php' ?>

        <!-- Menu -->
        <h3 class="text-center mb-3">รายการหมวดหมู่ <b class="color"><?php echo $rowmenutype['m_type'] ?></b></h3>

        <a href="./index.php">< กลับหน้าหลัก</a>

        <!-- Dropdown Select Menu type -->
        <div class="btn-group position-absolute top-0 end-0 d-none d-md-block">
            <button type="button" class="form-control dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                เลือกหมวดหมู่
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./menu.php?menutype=อาหาร">อาหาร</a></li>
                <li><a class="dropdown-item" href="./menu.php?menutype=เครื่องดื่ม">เครื่องดื่ม</a></li>
                <li><a class="dropdown-item" href="./menu.php?menutype=ของหวาน">ของหวาน</a></li>
            </ul>
        </div>
        <!-- Mobile View -->
        <div class="btn-group d-block d-md-none mb-4 mt-2">
            <button type="button" class="form-control dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                เลือกหมวดหมู่
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./menu.php?menutype=อาหาร">อาหาร</a></li>
                <li><a class="dropdown-item" href="./menu.php?menutype=เครื่องดื่ม">เครื่องดื่ม</a></li>
                <li><a class="dropdown-item" href="./menu.php?menutype=ของหวาน">ของหวาน</a></li>
            </ul>
        </div>

        <div class="row gap-3 mt-3">
            <?php $readmenutype = $dbclinet->readmenutype($menutype);
                while ($row = mysqli_fetch_assoc($readmenutype)) { ?>
                <?php include './component/card.php' ?>
            <?php } ?>
        </div>

    </div>

    <!-- Footer -->
    <div class="w-100 mt-auto">
        <?php include_once './component/footer.php' ?>
    </div>

</body>
<script src="./dist/js/showpass.js"></script>
<script src="./framework/js/bootstrap.bundle.min.js"></script>
</html>