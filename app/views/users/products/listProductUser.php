<!-- header -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/header.php';?>
<!-- header -->
    <div class="container2" style="padding:0 80px;">
        <!-- start Banner -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/banner.php';?>
        <!-- end Banner -->
        <div class="d-flex align-items-center justify-content-center mt-5">
            <img src="./public/images/logoApplemain.png" alt="" class="img-fluid" style="width: 20px; height: 22px;">
            <p class="text-white mb-0 ms-2 fw-bold">iPhone</p>
        </div>
        <!-- start main -->
        <div class="d-flex">
            <!-- start aside -->
            <aside class="mt-5 col-12 col-md-3 p-4" style="background-color: #323232; border-radius: 10px; max-height: 500px; overflow-y: auto;">
                <div>
                    <h5 class="text-white">Danh mục sản phẩm</h5>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 14</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 13</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 12</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 12</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 12</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 12</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="product">
                        <p class="text-white mb-0 ms-2">iPhone 12</p>
                    </a>
                </div>
                <div>
                    <h5 class="text-white">Xắp xếp theo</h5>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="loc">
                        <p class="text-white mb-0 ms-2">Bán chạy</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="loc">
                        <p class="text-white mb-0 ms-2">Gía thấp đến cao</p>
                    </a>
                    <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
                        <input type="radio" name="loc">
                        <p class="text-white mb-0 ms-2">Gía cao đến thấp</p>
                    </a>
                </div>
            </aside>
            <!-- end aside -->
            <!-- start main -->
        <main class="p-4 mt-4" style="flex: 0 0 76%;">
            <div class="row g-4">
                <?php 
                if (!empty($products)) {
                    foreach ($products as $product) { ?>
                        <div class="col-12 col-md-4">
                            <a href="./?act=detailProduct&id=<?php echo $product['id_sanPham']; ?>" class="text-decoration-none">
                                <div class="product-card text-white rounded-3 p-3 h-100 d-flex flex-column justify-content-between shadow-sm">
                                    <img src="<?php echo $product['file_anh']; ?>" alt="<?php echo $product['ten_sanPham']; ?>" class="img-fluid product-image">
                                    <div class="text-center mt-4">
                                        <?php 
                                        $dungLuongList = explode(',', $product['dungLuong']);
                                        foreach ($dungLuongList as $dungLuong) { ?>
                                            <span style="background-color: #1C1C1D; border-radius: 5px; padding: 5px; width: 70px; display: inline-block;">
                                            <?php echo $dungLuong; ?>
                                        </span>
                                        <?php } ?>
                                    </div>
                                    <p class="text-center product-text mt-4 fw-bold"><?php echo $product['ten_sanPham']; ?></p>
                                    <p class="text-center product-text"><?php echo number_format($product['gia'], 0, ',', '.'); ?> <sup>đ</sup></p>
                                </div>
                            </a>
                        </div>
                    <?php }
                } else { ?>
                    <p class="text-center text-white">Không có sản phẩm nào để hiển thị.</p>
                <?php } ?>
            </div>
        </main>
    </div>
    </div>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/footter.php';
?>
