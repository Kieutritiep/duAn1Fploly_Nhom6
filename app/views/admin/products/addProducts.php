<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/navbar.php';
        ?>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <?php 
                require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/sidebar.php';
            ?>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <h4 class="text-center mt-4">FORM THÊM SẢN PHẨM</h4>
                <div class="container mt-5">
                    <form action="./?act=admin/addProduct" method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><label for="nameProduct">Tên sản phẩm</label></td>
                                    <td><input type="text" class="form-control" name="nameProduct" placeholder="Nhập tên sản phẩm"></td>
                                </tr>
                                <tr>
                                    <td><label for="category">Danh mục</label></td>
                                    <td>
                                        <select class="form-select" name="category" id="category" required >
                                            <option value="">Chọn danh mục</option>
                                            <?php foreach ($categorys as $category) { ?>
                                                <option value="<?php echo $category['id_danhMuc'];?>">
                                                    <?php echo $category['ten_danhMuc'];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="mainImage">Ảnh chính</label></td>
                                    <td><input type="file" class="form-control" name="mainImage" id="mainImage"></td>
                                </tr>
                                <tr>
                                    <td><label for="subImage">Ảnh phụ</label></td>
                                    <td><input type="file" class="form-control" name="subImage[]" id="subImage" multiple></td>
                                </tr>
                                <tr>
                                    <td><label for="color">Màu sắc</label></td>
                                    <td>
                                        <select class="form-select" name="color[]" id="color" multiple required>
                                            <option value="" hidden>Chọn màu</option>
                                            <?php foreach ($colors as $color) { ?>
                                                <option value="<?php echo $color['id_mauSac']; ?>">
                                                    <?php echo $color['ten_mauSac']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="ram">Ram</label></td>
                                    <td>
                                        <select class="form-select" name="ram[]" id="ram" multiple required>
                                            <option value="" hidden>Chọn Ram</option>
                                            <?php foreach ($rams as $ram) { ?>
                                                <option value="<?php echo $ram['id_ram']; ?>">
                                                    <?php echo $ram['ram']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="storage">Dung lượng</label></td>
                                    <td>
                                        <select class="form-select" name="capacity[]" id="capacity" required multiple>
                                            <option value="" disabled selected>Chọn dung lượng</option> Hướng dẫn người dùng chọn
                                            <?php foreach ($capacitys as $capacity) { ?>
                                                <option value="<?php echo $capacity['id_dungLuong'];?>">
                                                    <?php echo $capacity['dungLuong'];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="description">Mô tả</label></td>
                                    <td><textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả sản phẩm"></textarea></td>
                                </tr>
                                <tr>
                            <td><label for="quantity">Số lượng</label></td>
                            <td><input type="number" class="form-control" name="quantity" id="quantity" min="1" placeholder="Nhập số lượng"></td>
                        </tr>
                        <tr>
                            <td><label for="status">Trạng thái sản phẩm</label></td>
                            <td>
                                <select class="form-select" name="status" id="status" required>
                                    <option value="" hidden>Chọn trạng thái sản phẩm</option>
                                    <option value="trang chủ">Trang Chủ</option>
                                    <option value="sản phẩm mới ra mắt">Sản phẩm mới ra mắt</option>
                                    <option value="sản phẩm cũ">Sản phẩm cũ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="display">Hiển thị</label></td>
                            <td>
                                <select class="form-select" name="display" id="display">
                                    <option value="" hidden>Chọn</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </td>
                        </tr>
                            </tbody>
                        </table>

                        <!-- Bảng hiển thị dung lượng và giá -->
                        <table class="table table-bordered mt-4" id="capacity-table">
                            <thead>
                                <tr>
                                    <th>Dung lượng</th>
                                    <th>Giá</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Các hàng sẽ được thêm tự động -->
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- /.content -->
        </div>

        <!-- Footer -->
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php';
        ?>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const capacityDropdown = document.getElementById('capacity');
            const tableBody = document.querySelector('#capacity-table tbody');

            // Thêm hàng mới khi chọn dung lượng
            capacityDropdown.addEventListener('change', function () {
                const selectedOptions = Array.from(this.selectedOptions); // Các dung lượng được chọn

                selectedOptions.forEach(option => {
                    const capacityID = option.value;
                    const capacityText = option.text;

                    // Kiểm tra nếu dung lượng đã tồn tại
                    if (tableBody.querySelector(`tr[data-id="${capacityID}"]`)) {
                        alert(`Dung lượng "${capacityText}" đã được thêm!`);
                        return;
                    }

                    // Tạo hàng mới
                    const newRow = document.createElement('tr');
                    newRow.dataset.id = capacityID; // Gán ID để kiểm tra trùng lặp
                    newRow.innerHTML = `
                        <td>${capacityText}</td>
                        <td>
                            <input type="number" name="priceProduct[]" class="form-control" placeholder="Nhập giá cho ${capacityText}" required>
                            <input type="hidden" name="capacity[]" value="${capacityID}">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger delete-row">Xóa</button>
                        </td>
                    `;
                    tableBody.appendChild(newRow);
                });

                // Reset dropdown sau khi xử lý
                this.value = '';
            });

            // Xóa hàng khi nhấn nút "Xóa"
            document.addEventListener('click', function (event) {
                if (event.target.classList.contains('delete-row')) {
                    event.target.closest('tr').remove();
                }
            });
        });
    </script>
</body>
