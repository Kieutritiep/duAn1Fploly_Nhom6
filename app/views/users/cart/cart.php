<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<?php if (isset($_SESSION['id_khachHang'])) { ?>
    <?php foreach ($cartProducts as $cartProduct) { ?>
        <div class="card container p-3 mb-3" style="max-width: 800px;">
            <div class="d-flex gap-3">
                <img src="<?php echo $cartProduct['file_anh']; ?>" alt="<?php echo $cartProduct['ten_sanPham']; ?>" class="rounded" style="width: 100px; height: 100px;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="fw-bold"><?php echo $cartProduct['ten_sanPham']; echo $cartProduct['dungLuong'] ?></span>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-primary">
                                <?php echo number_format($cartProduct['gia']); ?><u>đ</u>
                            </span>
                            <a href="#" class="text-decoration-none">
                                <button class="btn-close" aria-label="Close"></button>
                            </a>
                        </div>
                    </div>
                    <span class="badge bg-secondary">Màu: <?php echo $cartProduct['mauSac']; ?></span>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="mb-0">Tạm tính: <span class="text-black"><?php echo $cartProduct['tongSoLuongSanPham']; ?></span> sản phẩm</p>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-light text-black square-button" onclick="updateQuantity('decrease', <?php echo $cartProduct['id_sanPham']; ?>)">-</button>
                            <div class="square-border d-flex align-items-center justify-content-center">
                                <span id="quantity-<?php echo $cartProduct['id_sanPham']; ?>">1</span>
                            </div>
                            <button class="btn btn-light text-black square-button" onclick="updateQuantity('increase', <?php echo $cartProduct['id_sanPham']; ?>)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="card container p-4 mb-3" style="max-width: 800px;">
        <div class="card-body">
            <form action="./?act=order" method="post">
                <h5><b>Thông tin khách hàng</b></h5>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Anh">
                    <label class="form-check-label" for="male">Anh</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="isDefault" id="isDefault" value="1" checked>
                    <label class="form-check-label" for="isDefault">Đặt làm địa chỉ mặc định</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Chị">
                    <label class="form-check-label" for="female">Chị</label>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <input class="form-control" type="text" name="nameUser" placeholder="Họ và Tên" required>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" required>
                    </div>
                </div>

                <h5 class="mt-4"><b>Địa chỉ người nhận</b></h5>
                <div class="row">
                    <div class="col">
                        <input class="form-control" name="city" type="text" placeholder="Thành phố" required>
                    </div>
                    <div class="col">
                        <input class="form-control" name="district" type="text" placeholder="Huyện" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input class="form-control" name="commune" type="text" placeholder="Xã/Phường" required>
                    </div>
                    <div class="col">
                        <input class="form-control" name="detailAddress" type="text" placeholder="Nhập địa chỉ chi tiết" required>
                    </div>
                </div>

                <div class="mt-2">
                    <span class="my-2">Chọn phương thức thanh toán</span><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pay" id="pay1" value="Thanh toán khi nhận hàng" required>
                        <label class="form-check-label" for="pay1">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pay" id="pay2" value="Thanh toán online">
                        <label class="form-check-label" for="pay2">Thanh toán online</label>
                    </div>
                </div>

                <div class="mt-2">
                    <input class="form-control" type="text" name="voucher" placeholder="Mã giảm giá (nếu có)">
                </div>

                <div class="mt-4">
                    <span>
                        <strong>Tổng tiền:</strong> <b class="text-danger">
                            <?php echo number_format($cartProduct['tongTienGioHang']); ?><u>đ</u>
                        </b>
                        <input type="hidden" name="totalPrice" value="<?php echo $cartProduct['tongTienGioHang']; ?>">
                    </span>
                    <hr>
                    <p class="mb-0 mb-2 text-red">Tổng : <span class="text-black"><?php echo $cartProduct['tongSoLuongGioHang']; ?></span> sản phẩm</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agree" required>
                        <label class="form-check-label" for="agree">
                            Tôi đồng ý với Chính sách xử lý dữ liệu cá nhân của iPhone Lux
                        </label>
                    </div>
                </div>

                <?php foreach ($cartProducts as $cartProduct) { ?>
                    <input type="hidden" name="idProduct[]" value="<?php echo $cartProduct['id_sanPham']; ?>">
                    <input type="hidden" name="price[]" value="<?php echo $cartProduct['gia']; ?>">
                    <input type="hidden" name="quantity[]" value="<?php echo $cartProduct['tongSoLuongSanPham']; ?>">
                <?php } ?>

                <input type="hidden" name="id_khachHang" value="<?php echo $_SESSION['id_khachHang']; ?>">

                <button class="btn btn-primary w-100 mt-4" style="border: 2px solid blueviolet;">Đặt hàng</button>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div>Cần đăng nhập để hiển thị giỏ hàng của bạn</div>
<?php } ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>

<script>
function updateQuantity(action, productId) {
    const quantityElement = document.getElementById(`quantity-${productId}`);
    let quantity = parseInt(quantityElement.innerText);

    if (action === 'increase') {
        quantity++;
    } else if (action === 'decrease' && quantity > 1) {
        quantity--;
    }

    quantityElement.innerText = quantity;
}
</script>