<?php require_once '../connect/server.php';
require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;

    if (isset($_POST['delmenu'])) {
        $menuid = $_POST['delmenu'];
        
        $readmenu = $dbmenu->readmenubyid($menuid);
        $menu = mysqli_fetch_assoc($readmenu);
        $image = $menu['m_image'];
        unlink("../uploads/$image");

        $delmenu = $dbmenu->deletemenu($menuid);

        $_SESSION['succeed'] = "ลบเมนูสำเร็จ";
        header('location: ../admin/listmenu.php');
    }