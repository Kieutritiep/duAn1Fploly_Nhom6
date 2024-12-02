<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<div class="card container p-3 mb-3" style="max-width: 800px;">
    <div class="d-flex gap-3">
        <img src="./public/images/iphone15.png" alt="iPhone 15" class="rounded" style="flex: 1;width: 130px; height: auto;">

        <div class="flex-grow-1">

            <div class="d-flex justify-content-between align-items-start mb-2" style="margin-top: 20px;">
                <span class="fw-bold">iPhone 15 128GB</span>
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold">19.790.000<u>đ</u></span>
                    <button class="btn-close fs-7" aria-label="close" data-bs-dismiss="alert"></button>
                </div>
            </div>


            <div class="d-flex align-items-center gap-3" style="margin-top: 140px;">
                <div>
                    <span class="badge bg-secondary">Titan sa mạc</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-outline-secondary btn-sm" style="    height: 35px;color: black;border: 2px solid black; font-size: 22px;align-items: center;justify-content: center;display: flex;">-</button>
                    <span>1</span>
                    <button class="btn btn-outline-secondary btn-sm" style="    height: 35px;
    color: black;
    border: 2px solid black;">+</button>
                </div>

                <div>
                    <button class="btn btn-primary by">Mua Ngay</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card container p-4 mb-3" style="max-width: 800px;">
    <div class="card-body">
        <h5><b>Thông tin khách hàng</b></h5>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male">
            <label class="form-check-label" for="male">Anh</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female">
            <label class="form-check-label" for="female">Chị</label>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input class="form-control" type="text" placeholder="Họ và Tên">
            </div>
            <div class="col">
                <input class="form-control" type="text" placeholder="Số điện thoại">
            </div>
        </div>

        <h5 class="mt-4"><b>Địa chỉ người nhận</b></h5>
        <div class="row">
            <div class="col">
                <input class="form-control" type="text" placeholder="Thành phố">
            </div>
            <div class="col">
                <input class="form-control" type="text" placeholder="Huyện">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <input class="form-control" type="text" placeholder="Xã/Phường">
            </div>
            <div class="col">
                <input class="form-control" type="text" placeholder="Số nhà, Tên đường">
            </div>
        </div>
        <div class="mt-3">
            <input class="form-control" type="text" placeholder="Nhập ghi chú (nếu có)">
        </div>
        <div class="mt-2">
            <input class="form-control" type="text" placeholder="Mã giảm giá">
        </div>

        <div class="mt-4">
            <span><strong>Tổng tiền:</strong> <b class="text-danger">999.999.999 <u>đ</u></b></span>
            <hr>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agree">
                <label class="form-check-label" for="agree">
                    Tôi đồng ý với Chính sách xử lý dữ liệu cá nhân của iPhone Lux
                </label>
            </div>
            
        </div>
        <button class="btn btn-primary w-100 mt-4" style="border: 2px solid blueviolet;">Đặt hàng</button>
    </div>
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>