<?php require_once '../connect/server.php'; 
require_once '../class/user_db.php';

    $dbuser = new User_DB();

    $username = $_SESSION['name'];
    $readuser = $dbuser->readusername($username);
    $rowuser = mysqli_fetch_assoc($readuser);

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
                    <h3 class="">ตั้งค่าผู้ใช้ <a class="fw-bolder color"><?php echo $username ?></a></h3>
                </div>
                <!-- link -->
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./adminpage.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./settinguser.php">ตั้งค่าผู้ใช้</a></li>
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
                        <h3 class="mt-3 mb-3">ข้อมูลผู้ใช้</h3>
                        <form action="../process/settinguser_db.php" method="post">
                            <input type="hidden" name="oldemail" value="<?php echo $rowuser['u_email'] ?>">
                            <input type="hidden" name="oldusername" value="<?php echo $rowuser['u_username'] ?>">
                            <input type="hidden" name="userid" value="<?php echo $rowuser['u_id'] ?>">

                            <!-- Fullname -->
                            <div class="mb-3">
                                <label for="fullname" class="form-label">ชื่อ - นามสกุล</label>
                                <input type="text" class="form-control" name="fname" id="fullname" value="<?php echo $rowuser['u_fname'] ?>" autocomplete="off" required>
                            </div>

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label">ชื่อพนักงาน</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $rowuser['u_username'] ?>" autocomplete="off" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $rowuser['u_email'] ?>" autocomplete="off" required>
                            </div>

                            <!-- Change Password -->
                            <div class="">
                                <h3 class="mt-5 mb-3">เปลี่ยนรหัสผ่าน</h3>

                                <!-- Current Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">รหัสผ่าน <o>ปัจจุบัน</o></label>
                                    <input type="password" class="form-control password" name="password" id="password" autocomplete="off">
                                </div>

                                <!-- New Password -->
                                <div class="mb-3">
                                    <label for="newpassword" class="form-label">รหัสผ่าน <o>ใหม่</o></label>
                                    <input type="password" class="form-control password" name="newpassword" id="newpassword" autocomplete="off">
                                </div>

                                <!-- Show Password -->
                                <div class="mb-3">
                                    <input type="checkbox" onclick="showpassword()" id="showpass"> <label for="showpass">แสดงรหัสผ่าน</label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="mb-2">
                                <button type="submit" class="btn-color m-auto d-block" name="edituser">ยืนยันการแก้ไข</button>
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
<script src="../dist/js/showpass.js"></script>
<script src="../dist/js/alertAD.js"></script>
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
</html>