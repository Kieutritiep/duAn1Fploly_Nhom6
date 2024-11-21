<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?><!-- start Banner -->

<div class="container my-5 p-4" style="max-width: 820px; background-color: #fff; border-radius: 10px; border: 2px solid #F5F5F7;">
    <div class="lock bg-light py-3 text-center rounded-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-lock2-fill mr-2" viewBox="0 0 16 16">
            <path d="M7 6a1 1 0 0 1 2 0v1H7z" />
            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0" />
        </svg> 
        <strong>Đặt hàng thành công</strong>
    </div>

    <p class="fw-semibold mt-3 ml-3">Cảm ơn anh Nguyễn Văn A đã cho iPhone Lux cơ hội phục vụ</p>

    <div class="p-3 mb-3 bg-light rounded">
        <p><strong>Đơn hàng:</strong> #4569</p>
        <p><strong>Người nhận:</strong> Nguyễn Văn A</p>
        <p><strong>Giao đến:</strong> Hà Nội</p>
        <p><strong>Tổng tiền:</strong> 15.900.000đ</p>
        <p><strong>Phương thức thanh toán:</strong> thanh toán khi nhận hàng</p>
        <button class="btn btn-outline-danger btn-sm " style="color: black;">Hủy</button>
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