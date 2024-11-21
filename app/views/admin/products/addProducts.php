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
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
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
            <!-- Main content nơi đổ dữ liệu -->
            <section class="content">
            <h4 class="text-center mt-4 ">FORM THÊM SẢN PHẨM</h4>
                <div class="container mt-5">
                    <form action="./?act=admin/addProduct" method="POST" enctype="multipart/form-data">
                <div class="container mt-5">
                <form action="./?act=admin/addProduct" method="POST" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tbody id="imageFields">
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
                                    <select class="form-select" name="category" id="category" required>
                                        <option value="">Chọn danh mục</option>
                                        <?php foreach ($categorys as $category) {?>
                                            <option value="<?php echo $category['id_danhMuc'];?>">
                                                <?php echo $category['ten_danhMuc'];?>
                                            </option>
                                        <?php }?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="price">Giá</label></td>
                                    <td><input type="number" class="form-control" name="price" placeholder="Nhập giá sản phẩm"></td>
                                </tr>
                                <tr>
                                    <td><label for="mainImage">Nhập ảnh chính</label></td>
                                    <td><input type="file" class="form-control" name="mainImage" id="mainImage"></td>
                                </tr>
                                <tr>
                                    <td><label for="subImage">Nhập ảnh phụ</label></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <input type="file" class="form-control" name="subImage[]" id="subImage" multiple>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="color">Màu sắc</label></td>
                                    <td>
                                        <select class="form-select" name="color[]" id="color" required multiple>
                                            <option value="">Chọn màu</option>
                                            <?php foreach ($colors as $color) { ?>
                                                <option value="<?php echo $color['id_mauSac'];?>">
                                                    <?php echo $color['ten_mauSac'];?>
                                                </option>
                                            <?php } ?>
                                    <td><label for="color">Màu sắc</label></td>
                                    <td>
                                        <select class="form-select" name="color" id="color">
                                            <option value="" hidden>Chọn màu</option>
                                            <option value="xanh">Xanh</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="storage">Dung lượng</label></td>
                                    <td>
                                        <select class="form-select" name="capacity[]" id="capacity" required multiple>
                                            <option value="">Dung lượng</option>
                                            <?php foreach ($capacitys as $capacity) { ?>
                                                <option value="<?php echo $capacity['id_dungLuong'];?>">
                                                    <?php echo $capacity['dungLuong'];?>
                                                </option>
                                            <?php } ?>
                                        <select class="form-select" name="storage" id="storage">
                                            <option value="" hidden>Chọn dung lượng</option>
                                            <option value="128GB">128GB</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="ram">Ram</label></td>
                                    <td>
                                        <select class="form-select" name="ram[]" id="ram" required multiple>
                                            <option value="">Ram</option>
                                            <?php foreach ($rams as $ram) { ?>
                                                <option value="<?php echo $ram['id_ram'];?>">
                                                    <?php echo $ram['ram'];?>
                                                </option>
                                            <?php } ?>
                                        <select class="form-select" name="ram" id="ram">
                                            <option value="" hidden>Chọn RAM</option>
                                            <option value="16GB">16GB</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="description">Mô tả</label></td>
                                    <td><textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả sản phẩm"></textarea></td>
                                </tr>
                            </tbody>
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
                                    <select class="form-select" name="status" id="status">
                                        <option value="" hidden>Chọn trạng thái</option>
                                        <option value="home">Trang Chủ</option>
                                        <option value="new">Sản phẩm mới ra mắt</option>
                                        <option value="old">Sản phẩm cũ</option>
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
                            <tr>
                                <td colspan="2" class="text-center">
                                    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </section>
            <!-- /.content nơi đổ dữ liệu -->
        </div>
        <!-- /.content-wrapper -->
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php';
        ?>
        <script>
            function addImageField() {
                const imageFields = document.getElementById('imageFields'); // Lấy <tbody> chứa các <tr>
                const newRow = document.createElement('tr'); // Tạo một dòng <tr> mới
                newRow.innerHTML = `
                    <td><label for="subImage">Nhập ảnh phụ</label></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <input type="file" class="form-control" name="subImage[]">
                            <button type="button" class="btn btn-danger ms-2" onclick="removeImageField(this)">-</button>
                        </div>
                    </td>
                `;
                imageFields.appendChild(newRow); // Thêm dòng mới vào <tbody>
            }

            function removeImageField(button) {
                button.closest('tr').remove(); // Xóa dòng hiện tại
            }
        </script>
    </div>
</body>
