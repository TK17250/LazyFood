<?php require_once '../connect/server.php'; 
require_once '../class/user_db.php';

    $dbuser = new User_DB();
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $paginationData = $dbuser->readuserrank("สมาชิก", $page);

    $readuser = $paginationData['result'];
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
<body>

    <!-- Header -->
    <?php include_once './component/navbar.php'; ?>

    <!-- Sidebar -->
    <?php include_once './component/sidebar.php'; ?>

    <!-- Content -->
    <div class="content-wrapper p-3">
        <p class="fs-3">รายการผู้ใช้</p>

        <!-- Table -->
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">ชื่อ - นามสกุล</th>
                    <th scope="col">ชื่อผู้ใช้</th>
                    <th scope="col">อีเมล</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php while ($row = mysqli_fetch_assoc($readuser)) { ?>
                    <tr>
                        <td><?php echo $row['u_fname'] ?></td>
                        <td><?php echo $row['u_username'] ?></td>
                        <td><?php echo $row['u_email'] ?></td>
                        <td class="text-center"><i class="bi bi-pencil-square"></i></td>
                        <td class="text-center"><i class="bi bi-trash-fill"></i></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php

                    // Previous Page
                    echo "<li class='page-item " . ($page == 1 ? 'disabled' : '') . "'>";
                    echo "<a class='page-link' href='?page=" . ($page - 1) . "' aria-label='Previous'>";
                    echo "<span aria-hidden='true'>&laquo;</span></a></li>";

                    // Page numbers
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'>";
                        echo "<a class='page-link' href='?page=$i'>$i</a></li>";
                    }

                    // Next Page
                    echo "<li class='page-item " . ($page == $totalPages ? 'disabled' : '') . "'>";
                    echo "<a class='page-link' href='?page=" . ($page + 1) . "' aria-label='Next'>";
                    echo "<span aria-hidden='true'>&raquo;</span></a></li>";
                    ?>
                </ul>
            </nav>
        </div>


    </div>

</body>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
</html>