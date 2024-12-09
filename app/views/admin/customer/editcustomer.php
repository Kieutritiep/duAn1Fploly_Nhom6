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
                            <h1 class="m-0">Sửa Khách Hàng</h1>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa Khách Hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Sửa Khách Hàng</h3>
                        </div>
                        <!-- Form Start -->
                        <form method="POST" action="./?act=admin/listcustomers&id=<?= $khachHang['id_khachHang'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_khachHang" class="form-label">Tên Khách Hàng:</label>
                                    <input type="text" class="form-control" name="ten_khachHang" value="<?= $khachHang['ten_khachHang'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?= $khachHang['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="matKhau" class="form-label">Mật Khẩu:</label>
                                    <input type="password" class="form-control" name="matKhau" required>
                                </div>
                                <div class="form-group">
                                    <label for="soDienThoai" class="form-label">Số Điện Thoại:</label>
                                    <input type="text" class="form-control" name="soDienThoai" value="<?= $khachHang['soDienThoai'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phanQuyen" class="form-label">Phân Quyền:</label>
                                    <select class="form-control" name="phanQuyen">
                                        <option value="User" <?= $khachHang['phanQuyen'] == 'User' ? 'selected' : '' ?>>User</option>
                                        <option value="Admin" <?= $khachHang['phanQuyen'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                <a href="./?act=admin/listcustomers" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php'; ?>
    </div>
</body>
