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
                <a class="d-block">ยินดีต้อนรับคุณ <b class="fs-5" style="color:  #ff6e6e;"><?php echo $_SESSION['name'] ?></b></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

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
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการพนักงาน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./listclient.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการผู้ใช้</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>