<?php require_once '../connect/server.php';
    require_once '../class/user_db.php';

    $dbuser = new User_DB();

    if (isset($_POST['deluser'])) {
        $userid = $_POST['deluser'];
        
        $deluser = $dbuser->deleteuser($userid);
        $_SESSION['succeed'] = "ลบผู้ใช้สำเร็จ";
        header("location: ../admin/listclient.php");
    }