<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<?php require_once '../connect/server.php';
require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;
    
    if (isset($_POST['editmenu'])) {
        $name = mysqli_real_escape_string($dbmenu->dbconn, $_POST['menuname']);
        $price = mysqli_real_escape_string($dbmenu->dbconn, $_POST['price']);
        $type = mysqli_real_escape_string($dbmenu->dbconn, $_POST['menutype']);
        $image = $_FILES['image']['name'];
        $promotion = mysqli_real_escape_string($dbmenu->dbconn, $_POST['promotion']);
        // hidden
        $menuid = mysqli_real_escape_string($dbmenu->dbconn, $_POST['menuid']);
        $oldname = mysqli_real_escape_string($dbmenu->dbconn, $_POST['oldname']);
        $oldimage = mysqli_real_escape_string($dbmenu->dbconn, $_POST['oldimage']);

        // Check Menu Name
        if ($name != $oldname) {
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
                            location.href = '../admin/editmenu.php?menuid=$menuid';
                        })
                    });
                </script>";
                header("refresh:2; ../admin/editmenu.php?menuid=$menuid");
            } else {
                // Check Upload Image
                if (!empty($image)) {
                    $ext = pathinfo($image, PATHINFO_EXTENSION);
                    if ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
                        $_SESSION['error'] = "กรุณาอัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น";
                        echo "<script>
                            $(document).ready(function() {
                                Swal.fire(
                                    'อัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น!',
                                    'กรุณาอัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น',
                                    'error'
                                ).then(function() {
                                    location.href = '../admin/editmenu.php?menuid=$menuid';
                                })
                            });
                        </script>";
                        header("refresh:2; ../admin/editmenu.php?menuid=$menuid");
                    } else {
                        unlink("../uploads/" . $oldimage);
                        // Rename Image
                        $new_image = date('YmdHis') . "_" . rand(1000, 9999) . "." . $ext;
                        $image_path = "../uploads/";
                        $upload_file = $image_path . basename($image);
                        move_uploaded_file($_FILES['image']['tmp_name'], $upload_file);
                        rename($upload_file, $image_path . $new_image);
                        $newimage = $new_image;
                    }

                } else {
                    $newimage = $oldimage;
                }

                // Edit Menu
                $result = $dbmenu->editmenu($name, $price, $type, $newimage, $promotion, $menuid);
                $_SESSION['succeed'] = "แก้ไขเมนูสำเร็จ";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'แก้ไขเมนูสำเร็จ!',
                            'แก้ไขเมนูสำเร็จ',
                            'success'
                        ).then(function() {
                            location.href = '../admin/listmenu.php';
                        })
                    });
                </script>";
                header("refresh:2; ../admin/listmenu.php");
            }
        } else {
            // Check Upload Image
            if (!empty($image)) {
                $ext = pathinfo($image, PATHINFO_EXTENSION);
                if ($ext != "png" && $ext != "jpg" && $ext != "jpeg") {
                    $_SESSION['error'] = "กรุณาอัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น";
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire(
                                'อัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น!',
                                'กรุณาอัพโหลดไฟล์นามสกุล png, jpg, jpeg เท่านั้น',
                                'error'
                            ).then(function() {
                                location.href = '../admin/editmenu.php?menuid=$menuid';
                            })
                        });
                    </script>";
                    header("refresh:2; ../admin/editmenu.php?menuid=$menuid");
                } else {
                    unlink("../uploads/" . $oldimage);
                    // Rename Image
                    $new_image = date('YmdHis') . "_" . rand(1000, 9999) . "." . $ext;
                    $image_path = "../uploads/";
                    $upload_file = $image_path . basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'], $upload_file);
                    rename($upload_file, $image_path . $new_image);
                    $newimage = $new_image;
                }

            } else {
                $newimage = $oldimage;
            }

            // Edit Menu
            $result = $dbmenu->editmenu($name, $price, $type, $newimage, $promotion, $menuid);
            $_SESSION['succeed'] = "แก้ไขเมนูสำเร็จ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire(
                        'แก้ไขเมนูสำเร็จ!',
                        'แก้ไขเมนูสำเร็จ',
                        'success'
                    ).then(function() {
                        location.href = '../admin/listmenu.php';
                    })
                });
            </script>";
            header("refresh:2; ../admin/listmenu.php");
        }

    }