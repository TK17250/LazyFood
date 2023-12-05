<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>

<?php require_once '../connect/server.php';
    require_once '../class/user_db.php';

    $dbuser = new User_DB();

    if (isset($_POST['adduser'])) {
        $fname = mysqli_escape_string($dbuser->dbconn, $_POST['fname']);
        $username = mysqli_escape_string($dbuser->dbconn, $_POST['username']);
        $email = mysqli_escape_string($dbuser->dbconn, $_POST['email']);
        $password = mysqli_escape_string($dbuser->dbconn, $_POST['password']);
        $confirmpassword = mysqli_escape_string($dbuser->dbconn, $_POST['confirmpassword']);
        $rank = mysqli_escape_string($dbuser->dbconn, $_POST['rank']);

        // Confirm Password
        if ($password != $confirmpassword) {
            $_SESSION['error'] = "ยืนยันรหัสผ่านไม่ถูกต้อง";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'ยืนยันรหัสผ่านไม่ถูกต้อง!',
                        'กรุณากรอกรหัสผ่านให้ตรงกัน',
                        'error'
                    ).then(function() {
                        location.href = '../admin/adduser.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/adduser.php");
        }

        // Check username
        $checkuser = $dbuser->checkusername($username);
        if ($checkuser > 0) {
            $_SESSION['error'] = "มีชื่อผู้ใช้นี้แล้ว!";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'มีชื่อผู้ใช้นี้แล้ว!',
                        'กรุณาใช้ชื่อผู้ใช้อื่น',
                        'error'
                    ).then(function() {
                        location.href = '../admin/adduser.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/adduser.php");
        }

        // Check email
        $checkemail = $dbuser->checkemail($email);
        if ($checkemail > 0) {
            $_SESSION['error'] = "อีเมลนี้ถูกใช้แล้ว!";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'อีเมลนี้ถูกใช้แล้ว!',
                        'กรุณาใช้อีเมลอื่น',
                        'error'
                    ).then(function() {
                        location.href = '../admin/adduser.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/adduser.php");
        }

        // Add user
        if (empty($_SESSION['error'])) {
            $passwordhash = password_hash($password, PASSWORD_BCRYPT);
            $adduser = $dbuser->registerfunc($fname, $username, $email, $passwordhash, $rank);

            // Check rank for redirect
            if ($rank == "ผู้จัดการ") {
                $_SESSION['succeed'] = "เพิ่มพนักงานสำเร็จ";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เพิ่มพนักงานสำเร็จ!',
                            'คุณได้เพิ่มพนักงานเรียบร้อยแล้ว',
                            'success'
                        ).then(function() {
                            location.href = '../admin/listpersonnel.php';
                        })
                    });
                </script>";
                header("refresh:2; ../admin/listpersonnel.php");
            } else {
                $_SESSION['succeed'] = "เพิ่มสมาชิกสำเร็จ";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เพิ่มสมาชิกสำเร็จ!',
                            'คุณได้เพิ่มสมาชิกเรียบร้อยแล้ว',
                            'success'
                        ).then(function() {
                            location.href = '../admin/listclient.php';
                        })
                    });
                </script>";
                header("refresh:2; ../admin/listclient.php");
            }
        }
    }