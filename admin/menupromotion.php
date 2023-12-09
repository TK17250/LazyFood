<?php require_once '../connect/server.php'; 
require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;

    $readmenu = $dbmenu->readmenupromotion();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LazyFood</title>
    <link rel="shortcut icon" href="../data/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../framework/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../framework/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../dist/css/main.css">
    <style>
        /* Custom styling for checkboxes */
        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #555;
            border-radius: 4px;
            outline: none;
            transition: 0.3s;
            cursor: pointer;
        }

        input[type="checkbox"]:checked {
            background-color: red;
            border: 2px solid red;
        }

        input[type="checkbox"] + label {
            display: inline-block;
            vertical-align: middle;
            cursor: pointer;
            margin-left: 8px;
        }
    </style>
</head>
<body class="wrapper">

    <!-- Header -->
    <?php include_once './component/navbar.php'; ?>

    <!-- Sidebar -->
    <?php include_once './component/sidebar.php'; ?>

    <!-- Content -->
    <div class="content-wrapper">
        
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <!-- Alert -->
                <div>
                    <!-- Error -->
                    <?php include_once './component/error.php' ?>
                    <!-- Succeed -->
                    <?php include_once './component/succeed.php' ?>
                </div>
                <!-- Title -->
                <div >
                    <h3 class="">โปรโมชั่น</h3>
                </div>
                <!-- link -->
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./adminpage.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./menupromotion.php">โปรโมชั่น</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Table -->
                    <div class="col-12 w-100">
                        <form action="../process/addpromotion_db.php" method="post" class="mb-3">
                            <div class="table-responsive mb-3">
                                <table class="table table-hover table-bordered" id="promotiontable">

                                    <!-- Head Table -->
                                    <thead>
                                        <tr>
                                            <th scope="col" class="col-3">รูปภาพ</th>
                                            <th scope="col">ชื่อเมนู</th>
                                            <th scope="col">หมวดหมู่</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col" class="text-center">จัดการ</th>
                                        </tr>
                                    </thead>

                                    <!-- Body Table -->
                                    <tbody class="table-group-divider">
                                        <?php while ($row = mysqli_fetch_assoc($readmenu)) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col col-md-6 col-lg-4 m-auto d-block">
                                                            <img src="../uploads/<?php echo $row['m_image']; ?>" alt="menu" class="img-fluid rounded-4">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $row['m_name'] ?></td>
                                                <td style="color: #eb8219;"><?php echo $row['m_type'] ?></td>
                                                <td><?php echo $row['m_price'] ?></td>
                                                <td class="text-center fs-4">
                                                    <input type="checkbox" name="promotion[]" id="promotion_<?php echo $row['m_id']; ?>" value="<?php echo $row['m_id']; ?>" <?php echo ($row['m_promotion'] == "1") ? "checked" : ""; ?>>
                                                    <label for="promotion_<?php echo $row['m_id']; ?>">โปรโมชั่น</label>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" name="addpro" class="btn btn-color m-auto d-block fs-5">บันทึก</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include_once './component/footer.php'; ?>

</body>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/DataTables/datatables.min.js"></script>
<script src="../dist/js/alertAD.js"></script>
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
<script>
    // DataTable
    $(document).ready(function() {
        $('#promotiontable').DataTable(
            {
                scrollY: 550,

                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เรคคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่พบข้อมูล",
                    "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ เรคคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 เรคคอร์ด",
                    "sInfoFiltered": "(กรองข้อมูล _MAX_ เรคคอร์ด)",
                    "sSearch": "ค้นหา :",
                    "aaSorting": [
                        [0, 'desc']
                    ],
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "หน้าสุดท้าย"
                    },
                },
            }
        );
    });

    // Read menu promotion
</script>
</html>
