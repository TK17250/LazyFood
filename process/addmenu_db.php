<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>

<?php require_once '../connect/server.php';
require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;

    if (isset($_POST['addmenu'])) {
        $name = $_POST['menuname'];
        $price = $_POST['price'];
        $type = $_POST['menutype'];
        $image = $_FILES['image']['name'];
        $promotion = "0";

        // Check Menu Name
        $checkname = $dbmenu->checkmenuname($name);
        if ($checkname > 0) {
            $_SESSION['error'] = "มีชื่อเมนูนี้แล้ว";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'มีชื่อเมนูนี้แล้ว!',
                        'กรุณาเปลี่ยนชื่อเมนูใหม่',
                        'error'
                    ).then(function() {
                        location.href = '../admin/addmenu.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/addmenu.php");
        }

        // Check Extension Image
        $ext = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
        if ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
            $_SESSION['error'] = "กรุณาอัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'อัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น!',
                        'กรุณาอัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น',
                        'error'
                    ).then(function() {
                        location.href = '../admin/addmenu.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/addmenu.php");
        }

        // Add Menu
        if (empty($_SESSION['error'])) {
            // Rename Image
            $new_image = date('YmdHis') . "_" . rand(1000, 9999) . "." . $ext;
            $image_path = "../uploads/";
            $upload_file = $image_path . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_file);
            rename($upload_file, $image_path . $new_image);

            // Add Menu
            $addmenu = $dbmenu->addmenu($name, $price, $type, $new_image, $promotion);
            $_SESSION['success'] = "เพิ่มเมนูสำเร็จ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'เพิ่มเมนูสำเร็จ!',
                        'เพิ่มเมนูสำเร็จ',
                        'success'
                    ).then(function() {
                        location.href = '../admin/adminpage.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/adminpage.php");
        }

    }