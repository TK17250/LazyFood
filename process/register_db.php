<?php require_once '../connect/server.php';
    require_once './user_db.php';

    $dbconn = new DB_conn();
    $userconn = new User_DB();
    
    if (isset($_POST['reg'])) {
        $fname = mysqli_escape_string($dbconn->dbconn, $_POST['fname']);
        $username = mysqli_escape_string($dbconn->dbconn, $_POST['username']);
        $email = mysqli_escape_string($dbconn->dbconn, $_POST['email']);
        $password = mysqli_escape_string($dbconn->dbconn, $_POST['password']);
        $confirmpassword = mysqli_escape_string($dbconn->dbconn, $_POST['confirmpassword']);
        $rank = "สมาชิก";

        // Confirm Password
        if ($password != $confirmpassword) {
            $_SESSION['error'] = "ยืนยันรหัสผ่านไม่ถูกต้อง";
            header("location: ../register.php");
        }

        // Check Email
        $checkemail = $userconn->checkemail($email);
        if ($checkemail > 0) {
            $_SESSION['error'] = "อีเมลนี้ถูกใช้แล้ว";
            header("location: ../register.php");
        }

        // Check User
        $checkuser = $userconn->checkusername($username);
        if ($checkuser > 0) {
            $_SESSION['error'] = "มีชื่อผู้ใช้นี้แล้ว";
            header("location: ../register.php");
        }
        
        // Register
        if (empty($_SESSION['error'])) {
            $passwordhash = password_hash($password, PASSWORD_BCRYPT);
            $reg = $userconn->registerfunc($fname, $username, $email, $passwordhash, $rank);

            $_SESSION['succeed'] = "สมัครสมาชิกสำเร็จ";
            $_SESSION['name'] = $username;
            $_SESSION['rank'] = $rank;
            header("location: ../index.php");
        }
    }