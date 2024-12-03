<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php 
      require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/navbar.php';
    ?>
    <!-- /.navbar -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <?php 
        require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/sidebar.php';
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
      <div class="d-flex">
      <!-- Customer Information Section -->
      <div class="ms-5">
        <h4>Thông tin khách hàng</h4>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td><label for="Name">Tên khách hàng:</label></td>
              <td><?php echo $detailOrders['address']['hoVaTen']; ?></td>
            </tr>
            <tr>
              <td><label for="Name">Giới tính:</label></td>
              <td><?php echo $detailOrders['address']['gioiTinh']; ?></td>
            </tr>
            <tr>
              <td><label for="Name">Số điện thoại:</label></td>
              <td><?php echo $detailOrders['address']['soDienThoai']; ?></td>
            </tr>
            <tr>
              <td><label for="Name">Thành phố:</label></td>
              <td><?php echo $detailOrders['address']['thanhPho']; ?></td>
            </tr>
            <tr>
              <td><label for="Name">Quận huyện:</label></td>
              <td><?php echo $detailOrders['address']['quanHuyen']; ?></td>
            </tr>
            <tr>
              <td><label for="Name">Xã phường:</label></td>
              <td><?php echo $detailOrders['address']['xaPhuong']; ?></td>
            </tr>
            <tr>
              <td><label for="Name">Địa chỉ chi tiết:</label></td>
              <td><?php echo $detailOrders['address']['diaChiChiTiet']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
        <!-- Order Status Section -->
        <div class="ms-3">
          <h4>Trạng thái đơn hàng</h4>
          <form action="./?act=admin/updateStatus" method="POST" class="p-4 border rounded shadow-sm bg-light">
            <h3 class="text-center mb-4 text-primary">Cập nhật trạng thái đơn hàng</h3>
            <input type="hidden" name="idDonHang" value="<?php echo $detailOrders['products'][0]['id_donHang']; ?>">
            <div class="mb-3">
              <label for="trangThai" class="form-label">Chọn trạng thái</label>
              <select name="trangThai" id="trangThai" class="form-select" required>
                <option value="0">Chọn trạng thái</option>
                <option value="Chờ vận chuyển">Chờ vận chuyển</option>
                <option value="Đang giao">Đang giao</option>
                <option value="Đã giao">Đã giao</option>
              </select>
            </div>
            <!-- Update Button -->
            <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
          </form>
        </div>

        </div>
          <h3 class="text-center mt-5 my-5">THÔNG TIN SẢN PHẨM</h3>

          <!-- Bảng thông tin sản phẩm -->
          <table class="table table-light text-center">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Dung lượng</th>
                    <th>Màu sắc</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (isset($detailOrders['products']) && !empty($detailOrders['products'])) {
                        foreach ($detailOrders['products'] as $product) {
                            echo "<tr>";
                            echo "<td>" . $product['ten_sanPham'] . "</td>";
                            echo "<td><img src='" . $product['file_anh'] . "' alt='Ảnh sản phẩm' style='width: 100px; height: auto;'></td>";
                            echo "<td>" . $product['soLuong'] . "</td>";
                            echo "<td>" . $product['dungLuong'] . "</td>";
                            echo "<td>" . $product['mauSac'] . "</td>";
                            echo "<td>" . number_format($product['gia'], 0, ',', '.') . " VND</td>";
                            echo "<td>" . number_format($product['tongTien'], 0, ',', '.') . " VND</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Không có sản phẩm trong đơn hàng.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        </div>
      </section>
      <!-- /.content nơi đổ dữ liệu-->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php 
      require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/footter.php';
    ?>
  </div>
</body>
