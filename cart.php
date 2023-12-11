<?php require_once './connect/server.php';
require_once './class/client_db.php';

    if (!isset($_SESSION['name'])) {
        header("location: ./index.php");
    }
    $dbclinet = new Client_DB();

    $readcart = $dbclinet->readcart();

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
    <div class="container mt-3">

        <!-- Alert -->
        <?php include_once './component/succeed.php' ?>
        <?php include_once './component/error.php' ?>

        <h3 class="text-center mb-3">ตะกร้าของคุณ</h3>
        <a href="./index.php">< กลับหน้าหลัก</a>

        <!-- Tabel -->
        <form action="./process/cart_db.php" method="post" class="mb-3">
            <!-- Table -->
            <div class="table-responsive mt-3 mb-3">
                <table class="table table-hover table-bordered">

                    <!-- Table Head -->
                    <thead>
                        <tr>
                            <th class="text-center">รายการเมนู</th>
                            <th class="text-center">ราคาเมนู</th>
                            <th class="text-center">จำนวนเมนู</th>
                            <th class="text-center">เลือก</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <!-- Select All -->
                        <div class="float-end mb-3">
                            <input type="checkbox" id="select-all" class="mt-1 me-1 form-check-input" /> <label for="select-all">เลือกทั้งหมด</label>
                        </div>
                        <?php while ($rowcart = mysqli_fetch_assoc($readcart)) { ?>
                            <tr>
                                <td class="text-center"><?php echo $rowcart['c_menuname'] ?></td>
                                <td class="text-center">
                                    <?php 
                                
                                        $readmenuid = $dbclinet->readmenuid($rowcart['c_menuid']);
                                        $rowmenuid = mysqli_fetch_assoc($readmenuid);
                                        echo $rowmenuid['m_price'] * $rowcart['c_menuquan'];
                                
                                    ?> บาท
                                </td>
                                <td class="text-center"><?php echo $rowcart['c_menuquan'] ?></td>
                                <td class="text-center fs-5">
                                    <input type="checkbox" name="cart[]" class="form-check-input mt-1" value="<?php echo $rowcart['c_id'] ?>" id="cart<?php echo $rowcart['c_id'] ?>" autocomplete="off"> <label for="cart<?php echo $rowcart['c_id'] ?>">เลือก</label>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Button -->
            <div class="d-block d-md-flex">
                <button type="submit" name="buy" class="btn btn-success m-auto mb-3"><i class="fa-solid fa-basket-shopping"></i> สั่่งซื้อสินค้าที่เลือก</button>
                <button type="submit" name="deletecart" class="btn btn-danger m-auto mb-3"><i class="fa-solid fa-trash-can"></i> ลบสินค้าที่เลือก</button>
            </div>

        </form>
    </div>

    <!-- Footer -->
    <div class="w-100 mt-auto">
        <?php include_once './component/footer.php' ?>
    </div>

</body>
<script src="./framework/js/jquery.min.js"></script>
<script src="./framework/js/bootstrap.bundle.min.js"></script>
<script>
    $('#select-all').click(function(event) {   
        if(this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;                       
            });
        }
    }); 
</script>
</html>