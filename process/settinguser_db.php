<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>

<?php require_once '../connect/server.php';
require_once '../class/user_db.php';

    $dbuser = new User_DB();

    if (isset($_POST['edituser'])) {
        $fname = mysqli_real_escape_string($dbuser->dbconn, $_POST['fname']);
        $username = mysqli_real_escape_string($dbuser->dbconn, $_POST['username']);
        $email = mysqli_real_escape_string($dbuser->dbconn, $_POST['email']);
        // Change Password
        $password = mysqli_real_escape_string($dbuser->dbconn, $_POST['password']);
        $newpassword = mysqli_real_escape_string($dbuser->dbconn, $_POST['newpassword']);
        // Hidden
        $oldemail = mysqli_real_escape_string($dbuser->dbconn, $_POST['oldemail']);
        $oldusername = mysqli_real_escape_string($dbuser->dbconn, $_POST['oldusername']);
        $userid = mysqli_real_escape_string($dbuser->dbconn, $_POST['userid']);

        // Check Email
        if ($email != $oldemail) {
            $checkemail = $dbuser->checkemail($email);
            if ($checkemail > 0) {
                $_SESSION['error'] = "อีเมลนี้มีผู้ใช้งานแล้ว";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'อีเมลนี้มีผู้ใช้งานแล้ว',
                            text: 'กรุณาใช้อีเมลอื่น',
                        }).then(function() {
                            history.go(-1);
                        });
                    })
                </script>";
                exit();
            }
        }

        // Check Username
        if ($username != $oldusername) {
            $checkusername = $dbuser->checkusername($username);
            if ($checkusername > 0) {
                $_SESSION['error'] = "มีผู้ใช้งานชื่อนี้แล้ว";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'มีผู้ใช้งานชื่อนี้แล้ว',
                            text: 'กรุณาเปลี่ยนชื่อผู้ใช้งาน',
                        }).then(function() {
                            history.go(-1);
                        });
                    })
                </script>";
                exit();
            }
        }

        // Change Password
        if (!empty($password) && !empty($newpassword)) {
            $checkpassword = $dbuser->loginfunc($oldusername);
            $rowpassword = mysqli_fetch_assoc($checkpassword);
            $hashpassword = $rowpassword['u_pass'];
            $checkpass = password_verify($password, $hashpassword);
            // Check Password
            if ($checkpass == false) {
                $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'รหัสผ่านปัจจุบันไม่ถูกต้อง',
                            text: 'กรุณากรอกรหัสผ่านให้ถูกต้อง',
                        }).then(function() {
                            history.go(-1);
                        });
                    })
                </script>";
                exit();
            } else {
                // Change Password
                $hashnewpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                $settinguser = $dbuser->publicsettinguser($fname, $username, $email, $hashnewpassword, $userid);
                
                $_SESSION['name'] = $username;
                $_SESSION['succeed'] = "เปลี่ยนรหัสผ่านสำเร็จ";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'เปลี่ยนรหัสผ่านสำเร็จ',
                            text: 'รหัสผ่านของคุณถูกเปลี่ยนแล้ว',
                        }).then(function() {
                            window.location.href = '../admin/settinguser.php';
                        });
                    })
                </script>";
                exit();
            }
        } else {
            // Not Change Password
            $readuser = $dbuser->readuserid($userid);
            $rowuser = mysqli_fetch_assoc($readuser);
            $hashpassword = $rowuser['u_pass'];
            $settinguser = $dbuser->publicsettinguser($fname, $username, $email, $hashpassword, $userid);

            $_SESSION['name'] = $username;
            $_SESSION['succeed'] = "แก้ไขข้อมูลสำเร็จ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'แก้ไขข้อมูลสำเร็จ',
                        text: 'ข้อมูลของคุณถูกแก้ไขแล้ว',
                    }).then(function() {
                        window.location.href = '../admin/settinguser.php';
                    });
                })
            </script>";
            exit();
        }
    }