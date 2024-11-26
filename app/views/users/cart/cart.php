<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<?php if (isset($_SESSION['id_khachHang'])) { ?>
    <?php foreach($cartProducts as $cartProduct) { ?>
        <div class="card container p-3 mb-3" style="max-width: 800px;">
    <div class="d-flex gap-3">
        <!-- Hình ảnh sản phẩm -->
        <img src="<?php echo $cartProduct['file_anh']?>" alt="iPhone 15" class="rounded" style="width: 100px; height: 100px;">
        
        <!-- Thông tin sản phẩm -->
        <div class="flex-grow-1">
            <!-- Tên sản phẩm và giá -->
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="fw-bold"><?php echo $cartProduct['ten_sanPham'] ?></span>
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold text-primary"><?php echo number_format($cartProduct['gia']) ?><u>đ</u></span>
                    <a href="#" class="text-decoration-none">
                        <button class="btn-close" aria-label="Close"></button>
                    </a>
                </div>
            </div>
            
            <!-- Màu sắc -->
            <span class="badge bg-secondary">Màu: <?php echo $cartProduct['mauSac'] ?></span>
            
            <!-- Số lượng -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <!-- Số lượng hiển thị -->
                <p class="mb-0">Tạm tính : <span class="text-black"><?php echo $cartProduct['soLuong'] ?></span> sản phẩm</p>
                
                <!-- Nút tăng/giảm số lượng -->
                <div class="d-flex align-items-center gap-2">
    <!-- Nút Giảm -->
    <button class="btn btn-light text-black square-button" onclick="decreaseQuantity()">-</button>

    <!-- Số lượng -->
    <div class="square-border d-flex align-items-center justify-content-center">
        <span id="quantity">1</span>
    </div>

    <!-- Nút Tăng -->
    <button class="btn btn-light text-black square-button" onclick="increaseQuantity()">+</button>
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
                <span><strong>Tổng tiền:</strong> <b class="text-danger"><?php echo number_format($cartProduct['tongTien'])?><u>đ</u></b></span>
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
    <?php } ?>
<?php } else { ?>
    <div>Cần đăng nhập để hiển thị giỏ hàng của bạn</div>
<?php } ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?><script>
let quantity = 1;

function increaseQuantity() {
    quantity++;
    document.getElementById("quantity").innerText = quantity;
}

function decreaseQuantity() {
    if (quantity > 1) {
        quantity--;
        document.getElementById("quantity").innerText = quantity;
    }
}
</script>
