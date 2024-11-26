<?php
class orderProductModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Kết nối đến cơ sở dữ liệu
    }

    public function olderProducts($id_khachHang, $gender, $name, $phone, $city, $district, $commune, $detailAddress, $isDefault, $voucher, $pay, $totalPrice, $idProduct, $price, $quantity) {
        try {
            if ($gender === 'Anh') {
                $gender = 'Nam';
            } elseif ($gender === 'Chị') {
                $gender = 'Nữ';
            }
            if ($isDefault === null) {
                $isDefault = 1;
            }
            $sql = "INSERT INTO diachi (id_khachHang, soDienTHoai, gioiTinh, thanhPho, quanHuyen, xaPhuong, diaChiChiTiet, hoVaTen, isDefault)
                    VALUES (:id_khachHang, :soDienTHoai, :gioiTinh, :thanhPho, :quanHuyen, :xaPhuong, :diaChiChiTiet, :hoVaTen, :isDefault)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_khachHang' => $id_khachHang,
                ':soDienTHoai' => $phone,
                ':gioiTinh' => $gender,
                ':thanhPho' => $city,
                ':quanHuyen' => $district,
                ':xaPhuong' => $commune,
                ':diaChiChiTiet' => $detailAddress,
                ':hoVaTen' => $name,
                ':isDefault' => $isDefault
            ]);

            $idAddress = $this->conn->lastInsertId(); // ID của địa chỉ vừa thêm

            $sqlCheckMDH = "SELECT hauTo FROM madonhang WHERE tienTo = 'DH' ORDER BY hauTo DESC LIMIT 1";
            $stmtCheckMDH = $this->conn->prepare($sqlCheckMDH);
            $stmtCheckMDH->execute();
            $maDonHang = $stmtCheckMDH->fetch();
            $hauTo = $maDonHang ? $maDonHang['hauTo'] + 1 : 1;
            $maDonHangCode = 'DH' . str_pad($hauTo, 4, '0', STR_PAD_LEFT); 
            $sqlMDH = "INSERT INTO madonhang (tienTo, hauTo) VALUES ('DH', :hauTo)";
            $stmtMDH = $this->conn->prepare($sqlMDH);
            $stmtMDH->execute([':hauTo' => $hauTo]);
            $maDonHangValue = $this->conn->lastInsertId(); 
            if (empty($voucher)) {
                $voucher = null; 
            }
            $sqlOrder = "INSERT INTO tb_donHang (diachi_id, tongTien, id_khachHang, hinhThucThanhToan, ngayDatHang ,trangThai, id_giamGia, id_madonhang)
                        VALUES (:diachi_id, :tongTien, :id_khachHang, :hinhThucThanhToan, NOW(), :trangThai, :id_giamGia, :id_madonhang)";
            $stmtOrder = $this->conn->prepare($sqlOrder);
            $stmtOrder->execute([
                ':diachi_id' => $idAddress, 
                ':tongTien' => $totalPrice,
                ':id_khachHang' => $id_khachHang,
                ':hinhThucThanhToan' => $pay,
                ':trangThai' => 'chờ xác nhận', 
                ':id_giamGia' => $voucher,
                ':id_madonhang' => $maDonHangValue,
            ]);
            $idOlder = $this->conn->lastInsertId(); 
            if (is_array($idProduct)) {
                foreach ($idProduct as $index => $productId) {

                    $stmtOderDetail = $this->conn->prepare("INSERT INTO tb_chitietdonhang(id_donhang, id_sanPham, soLuong, gia, tongTien)
                                                           VALUES (:id_donhang, :id_sanPham, :soLuong, :gia, :tongTien)");
                    $stmtOderDetail->execute([
                        ':id_donhang' => $idOlder,
                        ':id_sanPham' => (int)$productId,
                        ':soLuong' => (int)$quantity[$index],
                        ':gia' => $price[$index], 
                        ':tongTien' => $price[$index] * $quantity[$index] 
                    ]);
                }
            } else {
                $stmtOderDetail = $this->conn->prepare("INSERT INTO tb_chitietdonhang(id_donhang, id_sanPham, soLuong, gia, tongTien)
                                                       VALUES (:id_donhang, :id_sanPham, :soLuong, :gia, :tongTien)");
                $stmtOderDetail->execute([
                    ':id_donhang' => $idOlder,
                    ':id_sanPham' => (int)$idProduct,
                    ':soLuong' => (int)$quantity,
                    ':gia' => $price, 
                    ':tongTien' => $price * $quantity 
                ]);
            }
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
