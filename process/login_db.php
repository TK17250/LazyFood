<?php require_once '../connect/server.php';
    require_once './user_db.php';

    $dbname = new User_DB();

    if (isset($_POST['log'])) {
        $username = mysqli_real_escape_string($dbname->dbconn, $_POST['username']);
        $password = mysqli_real_escape_string($dbname->dbconn, $_POST['password']);

        // Check User
        $checkuser = $dbname->checkusername($username);
        if ($checkuser > 0) {
            $readuser  = $dbname->loginfunc($username);
            $rowuser = mysqli_fetch_assoc($readuser);
            $password_hash = $rowuser['u_pass'];

            // Check Password
            if (password_verify($password, $password_hash)) {

                $_SESSION['succeed'] = "เข้าสู่ระบบสำเร็จ";
                $_SESSION['name'] = $username;
                $_SESSION['rank'] = $rowuser['u_rank'];
                header("location: ../index.php");
            } else {
                $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                header("location: ../login.php");
            }
        } else {
            $_SESSION['error'] = "ไม่พบผู้ใช้รายนี้";
            header("location: ../login.php");
        }

    }