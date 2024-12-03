<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?><!-- start Banner -->

  <div class="container my-5 p-4" style="max-width: 820px; background-color: #fff; border-radius: 10px; border: 2px solid #F5F5F7;">
  <div class="lock bg-light py-3 text-center rounded-top d-flex align-items-center justify-content-center" style="height: 50px;">
      <img src="./public/images/older.png" style="width:30px; height:auto;" alt="...">
      <strong class="ms-2">Đặt hàng thành công</strong>
  </div>
  <?php 
    // var_dump($_SESSION);die();
  ?>
    <p class="fw-semibold mt-3 ml-3">Cảm ơn <span class="fw-bold">
      <?php
        $gender = $detailCart['gioiTinh'] === 'Nam' ? 'Anh' : 'Chị'; 
        echo $gender .' '. $detailCart['hoVaTen']; 
      ?></span> đã cho iPhone Lux cơ hội phục vụ</p>
    <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center position-relative">
      <div class="position-absolute top-50 start-0 translate-middle-y w-100" style="height: 2px; background-color: #6c757d; z-index: 0;"></div>
      
      <!-- Trạng thái: Đã đặt hàng -->
       
      <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
        <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
          <i class="fa-solid fa-box-open"></i>
        </div>
        <div class="mt-2 small fw-bold">Đã đặt hàng</div>
      </div>
    <!-- start trạng thái -->
    <?php 
    $orderStartus = [
        'Chờ vận chuyển'=>1,
        'Đang giao' => 2,
        'Đã giao'=>3,
    ];
    function getStatusClass($currentOrder, $order) {
      return ($currentOrder >= $order) ? 'bg-warning' : 'bg-secondary';
    }
  
    $currentStatus = $detailCart['trangThai']; 
    $currentOrder = $orderStartus[$currentStatus] ?? 0; 
    ?>

      <!-- trạng thái chờ vận chuyển -->

      <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
        <div class="rounded-circle <?php echo getStatusClass($currentOrder, $orderStartus['Chờ vận chuyển']) ?> text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
          <i class="fa-solid fa-clock"></i>
        </div>
        <div class="mt-2 small fw-bold">
        <?php echo ($currentOrder >= $orderStartus['Chờ vận chuyển']) ? 'Chờ vận chuyển' : ''; ?>
        </div>
      </div>

      <!-- Trạng thái: Đang giao -->

      <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
        <div class="rounded-circle <?php  echo getStatusClass($currentOrder, $orderStartus['Đang giao']) ?> text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
          <i class="fa-solid fa-truck"></i>
        </div>
        <div class="mt-2 small fw-bold">
   
            <?php echo ($currentOrder >= $orderStartus['Đang giao']) ? 'Đang giao' : ''; ?>
       
        </div>
      </div>

      <!-- Trạng thái: Đã giao -->
       
      <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
        <div class="rounded-circle <?php  echo getStatusClass($currentOrder, $orderStartus['Đã giao']) ?> text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
          <i class="fa-solid fa-clipboard-check"></i>
        </div>
        <div class="mt-2 small fw-bold">
        <?php echo ($currentOrder >= $orderStartus['Đã giao']) ? 'Đã giao' : ''; ?>
        </div>
      </div>

      <!-- end trạng thái -->

    </div>
  </div>
    <div class="p-3 mb-3 bg-light rounded">
        <p><strong>Mã đơn hàng :</strong><span class="text-primary fw-bold"><?php echo ' '.$detailCart['ma_hoa_don'] ?></span></p>
        <p><strong>Người nhận :</strong> <?php echo ' '. $detailCart['hoVaTen'] ?></p>
        <p><strong>Giao đến :</strong><?php echo ' '.$detailCart['diaChiChiTiet'] ?></p>
        <p><strong>Tổng tiền :</strong> <?php echo ' '. number_format($detailCart['tongTien'], 0, ',', '.'); ?>VNĐ</p>
        <p><strong>Phương thức thanh toán :</strong> <?php echo ' '.$detailCart['hinhThucThanhToan'] ?></p>
        <?php 
        if ($currentOrder === $orderStartus['Chờ vận chuyển'] || $orderStartus['Đang giao'] || $orderStartus['Đã giao']) {
        ?>
          <button class="btn btn-outline-danger btn-sm " disabled>Hủy</button>
        <?php
        } else {
        ?>
          <button class="btn btn btn-secondary btn-sm">Hủy</button> 
        <?php
        }
        ?>

        
    </div>
    <div class="alert alert-warning text-center font-weight-bold" role="alert">
        Đơn hàng chưa được thanh toán
    </div>
    <p class="text-center">Khi cần hỗ trợ vui lòng gọi <strong class="text-danger">1900969642</strong> (8h00-21h30)</p>
    <hr>
    <h5>Thời gian nhận hàng</h5>
    <div class="product-info d-flex align-items-center p-3 mt-3 border rounded">
        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png" alt="Product Image" style="width: 80px; height: 80px; object-fit: cover;">
        <div class="ml-3">
            <p><strong>iphone 16 promax 128GB</strong></p>
            <p><strong>Màu:</strong> Titan Sa Mạc</p>
            <p><strong>Số lượng:</strong> 1</p>
            <p><strong>Thời gian nhận hàng:</strong> Từ 3-5 ngày kể từ ngày đặt hàng</p>
        </div>
    </div>
    <div class="text-center mt-4">
        <button class="btn btn-outline-primary " style="color: black;">Về trang chủ iPhone Lux</button>
    </div>
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>