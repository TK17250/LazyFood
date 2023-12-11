<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>

<?php require_once '../connect/server.php';
require_once '../class/client_db.php';

    $dbclinet = new Client_DB();

    // Buy
    if (isset($_POST['buy'])) {
        $menuid = mysqli_escape_string($connDB->dbconn, $_POST['menuid']);
        $menuname = mysqli_escape_string($connDB->dbconn, $_POST['menuname']);
        $menuquan = mysqli_escape_string($connDB->dbconn, $_POST['menuquan']);
        $username = $_SESSION['name'];

        // Read Cart
        $readcart = $dbclinet->readcart();
        $rowcart = mysqli_fetch_assoc($readcart);

        // Read Menu ID
        $readmenu = $dbclinet->readmenuid($menuid);
        $rowmenu = mysqli_fetch_assoc($readmenu);

        // Check Login
        if (!isset($_SESSION['name'])) {
            $_SESSION['error'] = "กรุณาเข้าสู่ระบบก่อน";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณาเข้าสู่ระบบก่อน',
                    }).then(() => {
                        window.location.href = '../login.php';
                    })
                });
            </script>";
            header("refresh:2; ../index.php");
        } else {
            $price = $rowmenu['m_price'] * $menuquan;
            // Buy
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'question',
                        title: 'กรุณากรอกจำนวนเงิน',
                        text: 'ราคา " . $price . " บาท',
                        input: 'number',
                        inputAttributes: {
                            autocapitalize: 'off',
                            autocomplete: 'off',
                        },
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก',
                        showLoaderOnConfirm: true,
                        preConfirm: (money) => {
                            if (money < $price) {
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'กรุณากรอกจำนวนเงินให้ครบถ้วน',
                                }).then(() => {
                                    history.back();
                                })
                            } else {
                                return Swal.fire({
                                    icon: 'success',
                                    title: 'สั่งซื้อสินค้าสำเร็จ',
                                    text: 'เงินทอน ' + (money - $price) + ' บาท',
                                }).then(() => {
                                    window.location.href = '../index.php';
                                })
                            }
                        },
                    }).then(() => {
                        window.location.href = '../index.php';
                    })
                });
            </script>";
        }
    }

    // Add to Cart
    if (isset($_POST['addtocart'])) {
        $menuid = mysqli_escape_string($connDB->dbconn, $_POST['menuid']);
        $menuname = mysqli_escape_string($connDB->dbconn, $_POST['menuname']);
        $menuquan = mysqli_escape_string($connDB->dbconn, $_POST['menuquan']);

        // Check Login
        if (!isset($_SESSION['name'])) {
            $_SESSION['error'] = "กรุณาเข้าสู่ระบบก่อน";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณาเข้าสู่ระบบก่อน',
                    }).then(() => {
                        window.location.href = '../login.php';
                    })
                });
            </script>";
            header("refresh:2; ../index.php");
        } else {
            // Add to Cart
            $addtocart = $dbclinet->addtocart($menuid, $menuname, $menuquan);
            $_SESSION['succeed'] = "เพิ่มสินค้าลงในตะกร้าสำเร็จ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'เพิ่มสินค้าลงในตะกร้าสำเร็จ',
                    }).then(() => {
                        window.location.href = '../index.php';
                    })
                });
            </script>";
            header("refresh:2; ../index.php");
        }
    }