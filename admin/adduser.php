<?php require_once '../connect/server.php'; 
require_once '../class/user_db.php';

    $dbuser = new User_DB();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyFood</title>
    <link rel="shortcut icon" href="../data/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../framework/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/main.css">
</head>
<body class="wrapper">

    <!-- Header -->
    <?php include_once './component/navbar.php'; ?>

    <!-- Sidebar -->
    <?php include_once './component/sidebar.php'; ?>

    <!-- Content -->
    <div class="content-wrapper">
        
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- Alert -->
                <div>
                    <!-- Error -->
                    <?php include_once './component/error.php' ?>
                    <!-- Succeed -->
                    <?php include_once './component/succeed.php' ?>
                </div>
                <!-- Title -->
                <div >
                    <h3 class="">เพิ่มผู้ใช้</h3>
                </div>
                <!-- link -->
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./adminpage.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./adduser.php">เพิ่มผู้ใช้</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Form -->
                    <div class="col-12">
                    
                        <form action="../process/adduser_db.php" method="post" class="was-validated">

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
                                <input type="text" class="form-control password" name="password" id="password" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    กรอกรหัสผ่านของคุณ
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="confirmpassword" class="form-label">ยืนยันรหัสผ่าน</label>
                                <input type="text" class="form-control password" name="confirmpassword" id="confirmpassword" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    กรอกยืนยันรหัสผ่านของคุณ
                                </div>
                            </div>

                            <!-- Rank -->
                            <div class="mb-3">
                                <label for="rank">เลือกสถานะ</label>
                                <select class="form-select" name="rank" id="rank" required>
                                    <option value="ผู้จัดการ">ผู้จัดการ</option>
                                    <option value="สมาชิก">สมาชิก</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="mb-2">
                                <button type="submit" class="btn-color m-auto d-block" name="adduser">ยืนยันการเพิ่ม</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include_once './component/footer.php'; ?>

</body>
<script src="../dist/js/alertAD.js"></script>
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
</html>