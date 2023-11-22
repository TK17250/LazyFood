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

    <div class="box flex flex-col justify-center lg:w-1/4">
        <h3 class="top-text text-2xl">สมัครสมาชิก</h3>

        <div class="p-3">

            <!-- Back -->
            <div class="mb-2">
                <a href="./index.php">< กลับหน้าหลัก</a>
            </div>

            <!-- Error -->
            <?php include_once './component/error.php' ?>

            <form action="./process/register_db.php" method="post" class="was-validated">

                <!-- Fullname -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control" name="fname" id="fullname" autocomplete="off" required>
                    <div class="invalid-feedback">
                        กรอกชื่อ - นามสกุลของคุณ
                    </div>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                    <div class="invalid-feedback">
                        กรอกชื่อผู้ใช้ของคุณ
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
                    <div class="invalid-feedback">
                        กรอกอีเมลของคุณ
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

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="confirmpassword" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control password" name="confirmpassword" id="confirmpassword" autocomplete="off" required>
                    <div class="invalid-feedback">
                        กรอกยืนยันรหัสผ่านของคุณ
                    </div>
                </div>

                <!-- Show Password -->
                <div class="mb-3">
                    <input type="checkbox" onclick="showpassword()" class="me-2" id="showpass">
                    <label for="showpass" class="">แสดงรหัสผ่าน</label>
                </div>

                <!-- Submit -->
                <div class="">
                    <button type="submit" class="btn-color m-auto d-block" name="reg">สมัครสมาชิก</button>
                </div>

            </form>
        </div>

    </div>

</body>
<script src="./framework/js/bootstrap.bundle.min.js"></script>
<script src="./dist/js/showpass.js"></script>
</html>