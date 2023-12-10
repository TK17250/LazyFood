<?php require_once './connect/server.php';
require_once './class/client_db.php';

    $dbclinet = new Client_DB();

    $readmenupromotion = $dbclinet->readmenupromotion();
    $nums_promotion = mysqli_num_rows($readmenupromotion);

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
    <div class="container mt-3">

        <!-- Alert -->
        <?php include_once './component/succeed.php' ?>
        <?php include_once './component/error.php' ?>

        <!-- Menu -->
        <h1 class="text-center mb-4">หมวดหมู่ เมนู</h1>
        <div class="row gap-lg-3 mb-3">

            <!-- Food -->
            <div class="col-10 col-md-4 col-lg-3 m-auto">
                <div class="card p-0 mb-3">
                    <img src="./data/oldimage/foodmenu.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">หมวดหมู่ <r class="color">อาหาร</r></h5>
                        <p class="card-text">มีเมนูอยู่ <?php echo $dbclinet->readmenutypecount("อาหาร") ?> อย่าง</p>
                        <a href="./menu.php?menutype=อาหาร" class="btn btn-color">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>

            <!-- Drink -->
            <div class="col-10 col-md-4 col-lg-3 m-auto">
                <div class="card p-0 mb-3">
                    <img src="./data/oldimage/drinkmenu.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">หมวดหมู่ <r class="color">เครื่องดื่ม</r></h5>
                        <p class="card-text">มีเมนูอยู่ <?php echo $dbclinet->readmenutypecount("เครื่องดื่ม") ?> อย่าง</p>
                        <a href="./menu.php?menutype=เครื่องดื่ม" class="btn btn-color">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>

            <!-- Dessert -->
            <div class="col-10 col-md-4 col-lg-3 m-auto">
                <div class="card p-0 mb-3">
                    <img src="./data/oldimage/dessertmenu.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">หมวดหมู่ <r class="color">ของหวาน</r></h5>
                        <p class="card-text">มีเมนูอยู่ <?php echo $dbclinet->readmenutypecount("ของหวาน") ?> อย่าง</p>
                        <a href="./menu.php?menutype=ของหวาน" class="btn btn-color">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Promotion -->
    <?php if ($nums_promotion > 0) { ?>
        <div class="promotion p-3">
            <div class="container mb-3">
                <h1 class="text-light text-center"><i class="fa-solid fa-gift"></i> โปรโมชั่น <i class="fa-solid fa-gift"></i></h1>

                <!-- Menu -->
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($readmenupromotion)) { ?>
                        <?php include './component/card.php' ?>
                    <?php } ?>
                </div>

            </div>
        </div>
    <?php } ?>

    <!-- Footer -->
    <?php include_once './component/footer.php' ?>

</body>
<script src="./framework/js/bootstrap.bundle.min.js"></script>
</html>