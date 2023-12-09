<?php require_once '../connect/server.php'; ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="adminpage.php" class="brand-link text-center">
        <span class="brand-text font-weight-light">LazyFood <b style="color:  #ff6e6e;">Admin</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block">ยินดีต้อนรับคุณ <b class="fs-5" style="color:  #fd7e14;"><?php echo $_SESSION['name'] ?></b></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- รายการผู้ใช้ -->
                <li class="nav-item menu-open">

                    <!-- Dropdown -->
                    <a class="nav-link" role="button">
                        <i class="nav-icon bi bi-person-badge-fill"></i>
                        <p>
                            รายการผู้ใช้
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <!-- Menu -->
                    <ul class="nav nav-treeview">
                        <!-- List Personnel -->
                        <li class="nav-item">
                            <a href="./listpersonnel.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการพนักงาน</p>
                            </a>
                        </li>

                        <!-- List Client -->
                        <li class="nav-item">
                            <a href="./listclient.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการสมาชิก</p>
                            </a>
                        </li>

                        <!-- Add User -->
                        <li class="nav-item">
                            <a href="./adduser.php" class="nav-link">
                                <i class="far bi-plus-circle-fill nav-icon text-warning"></i>
                                <p>เพิ่มผู้ใช้</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>

                <!-- รายการเมนู -->
                <li class="nav-item menu-open">

                    <!-- Dropdown -->
                    <a class="nav-link" role="button">
                        <i class="nav-icon bi bi-clipboard2-fill"></i>
                        <p>
                            เมนู
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <!-- Menu -->
                    <ul class="nav nav-treeview">

                        <!-- List Food -->
                        <li class="nav-item">
                            <a href="./listmenu.php" class="nav-link">
                                <i class="far bi-square nav-icon"></i>
                                <p>รายการเมนู</p>
                            </a>
                        </li>

                        <!-- Promotion -->
                        <li class="nav-item">
                            <a href="./menupromotion.php" class="nav-link">
                                <i class="fa-solid fa-heart nav-icon text-danger"></i>
                                <p>โปรโมชั่น</p>
                            </a>
                        </li>

                        <!-- Add Menu -->
                        <li class="nav-item">
                            <a href="./addmenu.php" class="nav-link">
                                <i class="far bi-plus-square-fill nav-icon text-warning"></i>
                                <p>เพิ่มเมนู</p>
                            </a>
                        </li>

                    </ul>
                    
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>