<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader d-flex justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/navbar.php'; ?>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/sidebar.php'; ?>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h1 class="m-0">Danh Sách Khách Hàng</h1>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh Sách Khách Hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh Sách Khách Hàng</h3>
                        </div>
                        <!-- Table Start -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Phân Quyền</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($khachHangs as $khachHang): ?>
                                        <tr>
                                            <td><?= $khachHang['id_khachHang'] ?></td>
                                            <td><?= $khachHang['ten_khachHang'] ?></td>
                                            <td><?= $khachHang['email'] ?></td>
                                            <td><?= $khachHang['soDienThoai'] ?></td>
                                            <td><?= $khachHang['phanQuyen'] ?></td>
                                            <td>
                                                <a href="./?act=admin/editcustomers&id=<?= $khachHang['id_khachHang'] ?>" class="btn btn-warning">Sửa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table End -->
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php'; ?>
    </div>
</body>
