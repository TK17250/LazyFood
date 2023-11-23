<?php require_once './connect/server.php'; 

    if (!empty($_SESSION['name'])) {
        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyFood</title>
    <link rel="shortcut icon" href="./data/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./framework/css/bootstrap.min.css">
    <script src="./framework/tailwind.css"></script>
    <link rel="stylesheet" href="./dist/css/main.css">
    <link rel="stylesheet" href="./dist/css/reg.css">
</head>
<body>

    <div class="box flex flex-col justify-center w-11/12 md:w-1/2 xl:w-1/4">
        <h3 class="top-text text-2xl">เข้าสู่ระบบ</h3>

        <div class="p-3">

            <!-- Back -->
            <div class="mb-2">
                <a href="./index.php">< กลับหน้าหลัก</a>
            </div>

            <!-- Error -->
            <?php include_once './component/error.php' ?>

            <form action="./process/login_db.php" method="post" class="was-validated">

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                    <div class="invalid-feedback">
                        กรอกชื่อผู้ใช้ของคุณ
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control password" name="password" id="password" autocomplete="off" required>
                    <div class="invalid-feedback">
                        กรอกรหัสผ่านของคุณ
                    </div>
                </div>

                <!-- Show Password -->
                <div class="mb-3">
                    <input type="checkbox" onclick="showpassword()" class="me-2" id="showpass">
                    <label for="showpass" class="">แสดงรหัสผ่าน</label>
                </div>

                <!-- Submit -->
                <div class="">
                    <button type="submit" class="btn-color m-auto d-block" name="log">สมัครสมาชิก</button>
                    <div class="mt-2">
                        <a href="./register.php" class="mt-2">ยังไม่มีบัญชี</a>
                    </div>
                </div>

            </form>
        </div>

    </div>

</body>
<script src="./framework/js/bootstrap.bundle.min.js"></script>
<script src="./dist/js/showpass.js"></script>
</html>