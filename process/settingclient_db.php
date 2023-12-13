<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>

<?php require_once '../connect/server.php';
require_once '../class/client_db.php';

    $dbclient = new Client_DB();

    if (isset($_POST['settinguser'])) {
        $readusername = $_SESSION['name'];
        $readuser = $dbclient->readusername($readusername);
        $rowuser = mysqli_fetch_assoc($readuser);
        // Input
        $fname = mysqli_escape_string($connDB->dbconn, $_POST['fname']);
        $username = mysqli_escape_string($connDB->dbconn, $_POST['username']);
        $useremail = mysqli_escape_string($connDB->dbconn, $_POST['useremail']);
        // Change Password
        $currrentpassword = mysqli_escape_string($connDB->dbconn, $_POST['currrentpassword']);
        $newpassword = mysqli_escape_string($connDB->dbconn, $_POST['newpassword']);
        $oldpassword = $rowuser['u_pass'];

        // Check Username
        if ($username != $rowuser['u_username']) {
            $checkusername = $dbclient->checkusername($username);

            if ($checkusername > 0) {
                $_SESSION['error'] = "มีชื่อผู้ใช้งานนี้แล้ว";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'มีชื่อผู้ใช้งานนี้แล้ว',
                            text: 'กรุณาเปลี่ยนชื่อผู้ใช้งานใหม่',
                            confirmButtonText: 'ตกลง'
                        }).then(function() {
                            history.back();
                        });
                    });
                </script>";
                exit();
            }
        }

        // Check Email
        if ($useremail != $rowuser['u_email']) {
            $checkemail = $dbclient->checkemail($useremail);

            if ($checkemail > 0) {
                $_SESSION['error'] = "อีเมลนี้มีผู้ใช้งานแล้ว";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'อีเมลนี้มีผู้ใช้งานแล้ว',
                            text: 'กรุณาเปลี่ยนอีเมลใหม่',
                            confirmButtonText: 'ตกลง'
                        }).then(function() {
                            history.back();
                        });
                    });
                </script>";
                exit();
            }
        }

        // Change Password
        if (!empty($currrentpassword) && !empty($newpassword)) {
            if (password_verify($currrentpassword, $oldpassword)) {
                $hash_password = password_hash($newpassword, PASSWORD_BCRYPT);
                $settinguser = $dbclient->settinguser($rowuser['u_id'], $fname, $username, $useremail, $hash_password);

                $_SESSION['name'] = $username;
                $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: 'กลับสู่หน้าหลัก',
                            confirmButtonText: 'ตกลง'
                        }).then(function() {
                            window.location.href = '../index.php';
                        });
                    });
                </script>";
                exit();
            } else {
                $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'รหัสผ่านปัจจุบันไม่ถูกต้อง',
                            text: 'กรุณากรอกรหัสผ่านให้ถูกต้อง',
                            confirmButtonText: 'ตกลง'
                        }).then(function() {
                            history.back();
                        });
                    });
                </script>";
                exit();
            }
        } else {
            $settinguser = $dbclient->settinguser($rowuser['u_id'], $fname, $username, $useremail, $oldpassword);

            $_SESSION['name'] = $username;
            $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'แก้ไขข้อมูลสำเร็จ',
                        text: 'กลับสู่หน้าหลัก',
                        confirmButtonText: 'ตกลง'
                    }).then(function() {
                        window.location.href = '../index.php';
                    });
                });
            </script>";
            exit();
        }
    }