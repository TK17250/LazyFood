<link rel="stylesheet" href="../dist/css/main.css">
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>

<?php require_once '../connect/server.php';
require_once '../class/client_db.php';

    $dbcart = new Client_DB();

    // Delete Cart
    if (isset($_POST['deletecart'])) {
        // Delete Cart
        if (is_array($_POST['cart'])) {
            $cart = $_POST['cart'];
            foreach ($cart as $value) {
                $dbcart->deletecart($value);
            }

            $_SESSION['succeed'] = "ลบรายการที่เลือกเรียบร้อยแล้ว";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'ลบรายการที่เลือกเรียบร้อยแล้ว',
                    }).then(function() {
                        location.href = '../cart.php';
                    });
                });
            </script>";
            header("refresh:2; ../cart.php");
        } else {
            // Alert if not select
            $_SESSION['error'] = "กรุณาเลือกรายการที่ต้องการลบ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณาเลือกรายการที่ต้องการลบ',
                    }).then(function() {
                        location.href = '../cart.php';
                    });
                });
            </script>";
            header("refresh:2; ../cart.php");
        }
    }

    // Buy Cart
    if (isset($_POST['buy'])) {
        // Buy Cart
        if (is_array($_POST['cart'])) {
            $cartall_id = $_POST['cart'];
            
            $cartprice = 0;
            foreach ($cartall_id as $cartid) {
                $readcartid = $dbcart->readcartid($cartid);

                while ($row = mysqli_fetch_assoc($readcartid)) {
                    $menuid = $row['c_menuid'];
                    $menuquan = $row['c_menuquan'];

                    // Read Menu ID
                    $readmenuid = $dbcart->readmenuid($menuid);
                    $rowmenuid = mysqli_fetch_assoc($readmenuid);
                    $menuprice = $rowmenuid['m_price'];

                    $cartprice += $menuprice * $menuquan;
                    
                }
            }

            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'question',
                        title: 'ยืนยันการสั่งซื้อ',
                        text: 'ยอดรวมทั้งหมด " . $cartprice . " บาท',
                        input: 'number',
                        inputAttributes: {
                            autocapitalize: 'off',
                            autocomplete: 'off',
                        },
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยันการชำระเงิน',
                        cancelButtonText: 'ยกเลิก',
                        showLoaderOnConfirm: true,
                        preConfirm: (money) => {
                            if (money < $cartprice) {
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'กรุณากรอกจำนวนเงินให้ครบถ้วน',
                                }).then(() => {
                                    location.href = '../cart.php';
                                })
                            } else {
                                return Swal.fire({
                                    icon: 'success',
                                    title: 'สั่งซื้อสินค้าสำเร็จ',
                                    text: 'เงินทอน ' + (money - $cartprice) + ' บาท',
                                }).then(() => {
                                    $.post('cart_db.php', {
                                        deletecartbuy: [" . implode(",", $cartall_id) . "]
                                    }, function() {
                                        location.href = '../cart.php';
                                    });
                                })
                            }
                        },
                    })
                });
            </script>";

        } else {
            // Alert if not select
            $_SESSION['error'] = "กรุณาเลือกรายการที่ต้องการซื้อ";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'กรุณาเลือกรายการที่ต้องการซื้อ',
                    }).then(function() {
                        location.href = '../cart.php';
                    });
                });
            </script>";
            header("refresh:2; ../cart.php");
        }
    }

    // Delete Cart Buy
    if (isset($_POST['deletecartbuy'])) {
        // Delete Cart Buy
        if (is_array($_POST['deletecartbuy'])) {
            $cart = $_POST['deletecartbuy'];
            foreach ($cart as $value) {
                $dbcart->deletecart($value);
            }

            $_SESSION['succeed'] = "สั่งซื้อสินค้าเรียบร้อยแล้ว";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'สั่งซื้อสินค้าเรียบร้อยแล้ว',
                    }).then(function() {
                        location.href = '../cart.php';
                    });
                });
            </script>";
            header("refresh:2; ../cart.php");
        } else {
            // Alert Error
            $_SESSION['error'] = "เกิดข้อผิดพลาด";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                    }).then(function() {
                        location.href = '../cart.php';
                    });
                });
            </script>";
            header("refresh:2; ../cart.php");
        }
    }
