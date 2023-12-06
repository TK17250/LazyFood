<?php require_once '../connect/server.php'; 
require_once '../class/user_db.php';

    $dbuser = new User_DB();

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
                <div >
                    <h3 class="">เพิ่มเมนู</h3>
                </div>
                <!-- link -->
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./adminpage.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./addmenu.php">เพิ่มเมนู</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Preview -->
                    <div class="row col-12">
                        <div class="col-8 col-md-6 col-lg-3 m-auto d-block">
                            <img id="preview-image" class="img-fluid rounded-4">
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="col-12">
                    
                        <form action="../process/addmenu_db.php" method="post" class="was-validated" enctype="multipart/form-data">

                            <!-- Menuname -->
                            <div class="mb-3">
                                <label for="menuname" class="form-label">ชื่อเมนู</label>
                                <input type="text" class="form-control" name="menuname" id="menuname" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    กรอกชื่อเมนู
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">ราคาเมนู ( บาท )</label>
                                <input type="number" class="form-control" name="price" id="price" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    กรอกราคาเมนู
                                </div>
                            </div>

                            <!-- Type -->
                            <div class="mb-3">
                                <label for="menutype">เลือกประเภท</label>
                                <select class="form-select" name="menutype" id="menutype" required>
                                    <option value="อาหาร">อาหาร</option>
                                    <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                                    <option value="ของหวาน">ของหวาน</option>
                                </select>
                            </div>

                            <!-- image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">รูปภาพ</label>
                                <input type="file" class="form-control" accept="image/jpeg, image/png, image/jpg" onchange="showPreview(event);" name="image" id="image" autocomplete="off" required>
                                <div class="invalid-feedback">
                                    ใส่รูปภาพ
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="mb-2">
                                <button type="submit" class="btn-color m-auto d-block" name="addmenu">ยืนยันการเพิ่ม</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include_once './component/footer.php'; ?>

</body>
<script src="../dist/js/preview_imageAD.js"></script>
<script src="../dist/js/alertAD.js"></script>
<script src="../framework/sweetalert2.all.min.js"></script>
<script src="../framework/js/jquery.min.js"></script>
<script src="../framework/js/adminlte.min.js"></script>
<script src="../framework/js/bootstrap.bundle.min.js"></script>
</html>