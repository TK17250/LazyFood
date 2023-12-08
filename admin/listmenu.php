<?php require_once '../connect/server.php';
require_once '../class/menu_db.php';

    $dbmenu = new Menu_DB;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $menutype = isset($_GET['type']) ? $_GET['type'] : "อาหาร";
    $paginationData = $dbmenu->readmenutype($menutype, $page);

    $readmenu = $paginationData['result'];
    $totalPages = $paginationData['totalPages'];

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
    <link rel="stylesheet" href="../dist/css/main.css">
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
                <div>
                    <h3 class="">เมนู</h3>
                    <h5>หมวดหมู่ <span class="color"><?php echo $menutype ?></span></h5>
                </div>
                <!-- link -->
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./adminpage.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./listmenu.php">รายการเมนู</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Table -->
                    <div class="col-12 w-100">

                        <!-- Select Menu -->
                        <div class="d-flex justify-content-end row">
                            <div class="col col-md-4 col-lg-3 mb-3">
                                <form action="./listmenu.php" method="GET" class="d-flex">
                                    <select class="form-select" name="type">
                                        <option selected disabled>เลือกหมวดหมู่</option>
                                        <option value="อาหาร">อาหาร</option>
                                        <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                                        <option value="ของหวาน">ของหวาน</option>
                                    </select>
                                    <button type="submit" class="btn btn-color ms-2">ค้นหา</button>
                                </form>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">

                                <!-- Head Table -->
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-3">รูปภาพ</th>
                                        <th scope="col">ชื่อเมนู</th>
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
                                            <td><?php echo $row['m_name']; ?></td>
                                            <td><?php echo $row['m_price']; ?></td>
                                            <td class="text-center">
                                                <div class="d-flex">
                                                    <!-- Edit -->
                                                    <a href="./editmenu.php?menuid=<?php echo $row['m_id']; ?>" class="bi bi-pencil-square m-auto p-2 btn-warning rounded" role="button">
                                                        แก้ไข
                                                    </a>

                                                    <!-- Delete -->
                                                    <button type="submit" class="bi bi-trash-fill m-auto btn btn-danger p-2 rounded" name="delmenu" onclick="return confirmdeletemenu()" value="<?php echo $row['m_id'] ?>">
                                                        ลบ
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php

                    // Previous Page
                    echo "<li class='page-item " . ($page == 1 ? 'disabled' : '') . "'>";
                    echo "<a class='page-link' href='?type={$menutype}&page=" . ($page - 1) . "' aria-label='Previous'>";
                    echo "<span aria-hidden='true'>&laquo;</span></a></li>";

                    // Page numbers
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'>";
                        echo "<a class='page-link' href='?type={$menutype}&page=$i'>$i</a></li>";
                    }

                    // Next Page
                    echo "<li class='page-item " . ($page >= $totalPages ? 'disabled' : '') . "'>";
                    echo "<a class='page-link' href='?type={$menutype}&page=" . ($page + 1) . "' aria-label='Next'>";
                    echo "<span aria-hidden='true'>&raquo;</span></a></li>";
                    ?>
                </ul>
            </nav>
        </div>

    </div>

    <!-- Footer -->
    <?php include_once './component/footer.php'; ?>

</body>
<script src="../dist/js/alertAD.js"></script>
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
</html>