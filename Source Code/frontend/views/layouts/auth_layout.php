<!doctype html>
<html lang="en">

<head>
    <title>VTC Store &mdash; Quản lí</title>
    <link rel="shortcut icon" href="<?php echo IMG_URL . 'logo2.png' ?>" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="<?php echo CSS_URL . 'home.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/fonts/circular-std/style.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/libs/css/style.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/fonts/fontawesome/css/fontawesome-all.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/charts/chartist-bundle/chartist.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/charts/morris-bundle/morris.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/charts/c3charts/c3.css' ?>">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL . '/vendor/fonts/flag-icon-css/flag-icon.min.css' ?>">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="font-family:'Roboto',sans-serif;">
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?php echo base_url('user/index') ?>">VTC Store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
                            <?php if (!empty($_SESSION['name'])) : ?>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name text-center"><?php echo $_SESSION['name'] ?></h5>
                                    </div>
                                    <a class="dropdown-item" href="<?php echo base_url('user/profile') ?>"><i class="fas fa-user mr-2"></i>Thông tin cá nhân</a>
                                    <a class="dropdown-item" href="<?php echo base_url("user/password"); ?>"><i class="fas fa-cog mr-2"></i>Thay đổi mật khẩu</a>
                                    <a class="dropdown-item" href="<?php echo base_url('user/handle_logout') ?>"><i class="fas fa-power-off mr-2"></i>Đăng xuất</a>
                                </div>
                            <?php endif; ?>
                        </li> 
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url('dashboard/index') ?>"><i class="fa fa-tachometer" aria-hidden="true"></i></i>Dashboard</a>

                            <li class="nav-item ">
                                <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-product-hunt" aria-hidden="true"></i></i>Quản lý sản phẩm </span></a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url("product/index") ?>">Danh sách các sản phẩm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url("category/index") ?>">Danh sách các loại sản phẩm</a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url("brand/index") ?>">Danh sách các hãng sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url("order/index") ?>"><i class="fa fa-first-order" aria-hidden="true"></i></i>Quản lý đơn hàng</span>
                                <?php if ($_SESSION['countOrder'] == 0) : ?>
                                    <?php else : ?>
                                        <span class="d-inline-block bag border border-danger bg-light" style="font-size: 15px">
                                            <span class="number text-danger">
                                                <?php echo $_SESSION['countOrder']; ?>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url("comment/index") ?>"><i class="fa fa-bug" aria-hidden="true"></i></i>Quản lý bình luận</span>
                                <?php if ($_SESSION['activecomment'] == 0) : ?>
                                    <?php else : ?>
                                        <span class="d-inline-block bag border border-danger bg-light" style="font-size: 15px">
                                            <span class="number text-danger">
                                                <?php echo $_SESSION['activecomment']; ?>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo base_url("user/index") ?>"><i class="fa fa-fw fa-user-circle"></i>Quản lý người dùng</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo base_url("partner/index") ?>" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-handshake-o" aria-hidden="true"></i>Quản lý đối tác giao hàng<span class="badge badge-success">6</span></a>
                                <div id="submenu-6" class="collapse submenu"">
                                    <ul class=" nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url("order/delivery_status") ?>">Tình trạng giao hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url("order/checking") ?>">Kiểm tra giao hàng</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url("partner/index") ?>">Các đối tác</a>
                            </li>
                        </ul>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content " style="background: white;">
                <?php echo $content ?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Concept. All rights reserved. Dashboard by VTC.
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo TEMPLATE_URL . '/vendor/jquery/jquery-3.3.1.min.js' ?>"></script>
    <script src="<?php echo TEMPLATE_URL . '/vendor/bootstrap/js/bootstrap.bundle.js' ?>"></script>
    <script src="<?php echo TEMPLATE_URL . '/vendor/slimscroll/jquery.slimscroll.js' ?>"></script>
    <script src="<?php echo TEMPLATE_URL . '/vendor/multi-select/js/jquery.multi-select.js' ?>"></script>
    <script src="<?php echo TEMPLATE_URL . '/libs/js/main-js.js' ?>"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo TEMPLATE_URL . '/vendor/datatables/js/dataTables.bootstrap4.min.js' ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo TEMPLATE_URL . '/vendor/datatables/js/buttons.bootstrap4.min.js' ?>"></script>
    <script src="<?php echo TEMPLATE_URL . '/vendor/datatables/js/data-table.js' ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
</body>

</html>