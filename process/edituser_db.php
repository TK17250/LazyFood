<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<?php require_once '../connect/server.php';
    require_once '../class/user_db.php';

    $userdb = new User_DB();

    if (isset($_POST['edituser'])) {
        $userid = mysqli_escape_string($userdb->dbconn, $_POST['userid']);
        $fname = mysqli_escape_string($userdb->dbconn, $_POST['fname']);
        $username = mysqli_escape_string($userdb->dbconn, $_POST['username']);
        $email = mysqli_escape_string($userdb->dbconn, $_POST['email']);
        $rank = mysqli_escape_string($userdb->dbconn, $_POST['rank']);
        // old Data
        $oldusername = mysqli_escape_string($userdb->dbconn, $_POST['oldusername']);
        $oldemail = mysqli_escape_string($userdb->dbconn, $_POST['oldemail']);

        // ถ้าเปลี่ยนชื่อ
        if ($oldusername != $username) {
            $checkusername = $userdb->checkusername($username);

            // ถ้าเปลี่ยนอีเมล
            if ($oldemail != $email) {
                $checkemail = $userdb->checkemail($email);
    
                if ($checkemail > 0) {
                    $_SESSION['error'] = "อีเมลนี้ถูกใช้ไปแล้ว";
                    header("location: ../admin/editclient.php?userid={$userid}");
                } else {
                    if ($checkusername > 0) {
                        $_SESSION['error'] = "ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว";
                        header("location: ../admin/editclient.php?userid={$userid}");
                    } else {
                        $_SESSION['succeed'] = "เปลี่ยนแปลงผู้ใช้ {$username} สำเร็จ";
                        $edituser = $userdb->edituser($fname, $username, $email, $rank, $userid);
                        echo "<script>
                            $(document).ready(function() {
                                Swal.fire(
                                    'แก้ไขแล้ว!',
                                    'ข้อมูลของคุณถูกแก้ไขแล้ว.',
                                    'success'
                                ).then(function() {
                                    location.href = '../admin/listclient.php';
                                })
                            });
                        </script>";
                        header("refresh:2; ../admin/listclient.php");
                    }
                }
            } else {
                if ($checkusername > 0) {
                    $_SESSION['error'] = "ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว";
                    header("location: ../admin/editclient.php?userid={$userid}");
                } else {
                    $_SESSION['succeed'] = "เปลี่ยนแปลงผู้ใช้ {$username} สำเร็จ";
                    $edituser = $userdb->edituser($fname, $username, $email, $rank, $userid);
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire(
                                'แก้ไขแล้ว!',
                                'ข้อมูลของคุณถูกแก้ไขแล้ว.',
                                'success'
                            ).then(function() {
                                location.href = '../admin/listclient.php';
                            })
                        });
                    </script>";
                    header("refresh:2; ../admin/listclient.php");
                }
            }

        } else if ($oldemail != $email) { // ถ้าเปลี่ยนอีเมล
            $checkemail = $userdb->checkemail($email);

            if ($checkemail > 0) {
                $_SESSION['error'] = "อีเมลนี้ถูกใช้ไปแล้ว";
                header("location: ../admin/editclient.php?userid={$userid}");
            } else {
                $_SESSION['succeed'] = "เปลี่ยนแปลงผู้ใช้ {$username} สำเร็จ";
                $edituser = $userdb->edituser($fname, $username, $email, $rank, $userid);
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'แก้ไขแล้ว!',
                            'ข้อมูลของคุณถูกแก้ไขแล้ว.',
                            'success'
                        ).then(function() {
                            location.href = '../admin/listclient.php';
                        })
                    });
                </script>";
                header("refresh:2; ../admin/listclient.php");
            }
        } else {
            $_SESSION['succeed'] = "เปลี่ยนแปลงผู้ใช้ {$username} สำเร็จ";
            $edituser = $userdb->edituser($fname, $username, $email, $rank, $userid);
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'แก้ไขแล้ว!',
                        'ข้อมูลของคุณถูกแก้ไขแล้ว.',
                        'success'
                    ).then(function() {
                        location.href = '../admin/listclient.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/listclient.php");
        }
    }