<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<?php 
    require_once '../connect/server.php';
    require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;

    if (isset($_POST['addpro'])) {

        $readmenu = $dbmenu->readmenu();

        if (is_array($_POST['promotion'])) {
            $selectedMenuIds = $_POST['promotion'];

            // ดึงข้อมูลเมนูทั้งหมดจากฐานข้อมูล
            while ($row = mysqli_fetch_assoc($readmenu)) {
                $menuId = $row['m_id'];

                // เช็คว่าเมนูที่ดึงมาอยู่ใน selectedMenuIds หรือไม่
                if (in_array($menuId, $selectedMenuIds)) {
                    $dbmenu->updatepromotion($menuId, "1");
                } else {
                    // ถ้าไม่อยู่ใน selectedMenuIds ให้เป็น 0
                    $dbmenu->updatepromotion($menuId, "0");
                }
            }

            $_SESSION['succeed'] = "คุณได้ทำการเพิ่มโปรโมชั่นเรียบร้อยแล้ว";
            echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'เพิ่มโปรโมชั่นสำเร็จ!',
                            'คุณได้ทำการเพิ่มโปรโมชั่นเรียบร้อยแล้ว',
                            'success'
                        ).then(function() {
                            location.href = '../admin/menupromotion.php';
                        })
                    });
                </script>";
            header('refresh:2; ../admin/menupromotion.php');
        } else {
            // ถ้าไม่มีเมนูที่ถูกเลือกให้ทำการเปลี่ยนเป็น 0 ทั้งหมด
            while ($row = mysqli_fetch_assoc($readmenu)) {
                $menuId = $row['m_id'];
                $dbmenu->updatepromotion($menuId, "0");
            }

            $_SESSION['succeed'] = "จัดการโปรโมชั่นเรียบร้อยแล้ว";
            echo "<script>
                    $(document).ready(function() {
                        Swal.fire(
                            'จัดการโปรโมชั่นสำเร็จ!',
                            'คุณได้ทำการจัดการโปรโมชั่นเรียบร้อยแล้ว',
                            'success'
                        ).then(function() {
                            location.href = '../admin/menupromotion.php';
                        })
                    });
                </script>";
            header('refresh:2; ../admin/menupromotion.php');
        }
    }
?>
