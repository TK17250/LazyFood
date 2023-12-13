<?php require_once './connect/server.php';
require_once './class/client_db.php';

    if (!isset($_SESSION['name'])) {
        header("location: ./index.php");
    }

    $username = $_SESSION['name'];

    $dbclinet = new Client_DB();

    $result = $dbclinet->readusername($username);
    $rowuser = mysqli_fetch_assoc($result);

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

        <h3 class="text-center mb-3">ตั้งค่าบัญชี</h3>
        <a href="./index.php">< กลับหน้าหลัก</a>

        <form action="./process/settingclient_db.php" method="post" class="mt-3 row">

            <!-- Title User -->
            <h3 class="mb-3 col-12 col-lg-7 m-auto">ข้อมูลผู้ใช้</h3>

            <!-- Full name -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <label for="fname" class="form-label">ชื่อ - นามสกุล</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $rowuser['u_fname'] ?>" autocomplete="off" required>
            </div>

            <!-- Username -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <label for="username" class="form-label">ชื่อผู้ใช้งาน</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $rowuser['u_username'] ?>" autocomplete="off" required>
            </div>

            <!-- Email -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <label for="useremail" class="form-label">อีเมล</label>
                <input type="email" class="form-control" id="useremail" name="useremail" value="<?php echo $rowuser['u_email'] ?>" autocomplete="off" required>
            </div>

            <!-- Title Password -->
            <h3 class="mb-3 mt-4 col-12 col-lg-7 m-auto">เปลี่ยนรหัสผ่าน</h3>

            <!-- Current Password -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <label for="currrentpassword" class="form-label">ยืนยันรหัสผ่าน <span class="text-danger">ปัจจุบัน</span></label>
                <input type="password" class="form-control password" id="currrentpassword" name="currrentpassword" autocomplete="off">
            </div>

            <!-- New Password -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <label for="newpassword" class="form-label">รหัสผ่าน <span class="text-danger">ใหม่</span></label>
                <input type="password" class="form-control password" id="newpassword" name="newpassword" autocomplete="off">
            </div>

            <!-- Show Password -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <input type="checkbox" onclick="showpassword()" class="form-check-input mt-1" id="showpass">
                <label for="showpass" class="form-check-label">แสดงรหัสผ่าน</label>
            </div>

            <!-- Button -->
            <div class="mb-3 col-12 col-lg-7 m-auto">
                <button type="submit" name="settinguser" class="btn-color">ยืนยันการตั้งค่า</button>
            </div>

        </form>

    </div>

    <!-- Footer -->
    <div class="w-100 mt-auto">
        <?php include_once './component/footer.php' ?>
    </div>

</body>
<script src="./dist/js/showpass.js"></script>
<script src="./framework/js/bootstrap.bundle.min.js"></script>
</html>