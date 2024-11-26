<?php
    class cartUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function addCartModel($id_sanPham, $capacity, $color, $price, $userID){
            try {
                $soLuong = 1;
                $tongTien = $soLuong * $price;
                $sql = "INSERT INTO tb_gioHang (id_sanPham, soLuong, tongTien, dungLuong, mauSac, gia, id_khachHang) 
                        VALUES (:id_sanPham, :soLuong, :tongTien, :dungLuong, :mauSac, :gia, :id_khachHang)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_sanPham', $id_sanPham);
                $stmt->bindParam(':soLuong', $soLuong, PDO::PARAM_INT);
                $stmt->bindParam(':tongTien', $tongTien, PDO::PARAM_INT);
                $stmt->bindParam(':dungLuong', $capacity);
                $stmt->bindParam(':mauSac', $color);
                $stmt->bindParam(':gia', $price);
                $stmt->bindParam(':id_khachHang', $userID);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
                return false;
            }
        }
        // public function getAddressUser($userID){

        // }
        public function getProductByUserID($userIDCart) {
            try {
                $sql = "SELECT 
                            tb_sanPham.id_sanPham,
                            tb_sanPham.ten_sanPham,
                            MAX(tb_anh.file_anh) AS file_anh,
                            tb_gioHang.dungLuong,
                            tb_gioHang.mauSac,
                            SUM(tb_gioHang.soLuong) AS tongSoLuongSanPham, -- Tổng số lượng của từng sản phẩm
                            MAX(tb_gioHang.gia) AS gia, -- Giá đại diện của sản phẩm
                            (SELECT SUM(soLuong) 
                             FROM tb_gioHang 
                             WHERE id_khachHang = :id_khachHang) AS tongSoLuongGioHang, -- Tổng số lượng toàn giỏ hàng
                            (SELECT SUM(soLuong * gia) 
                             FROM tb_gioHang 
                             WHERE id_khachHang = :id_khachHang) AS tongTienGioHang -- Tổng tiền toàn giỏ hàng
                        FROM tb_gioHang
                        INNER JOIN tb_sanPham ON tb_sanPham.id_sanPham = tb_gioHang.id_sanPham
                        INNER JOIN tb_anh ON tb_anh.id_sanPham = tb_sanPham.id_sanPham AND tb_anh.loaiAnh = 'chinh'
                        WHERE tb_gioHang.id_khachHang = :id_khachHang
                        GROUP BY tb_sanPham.id_sanPham, tb_gioHang.dungLuong, tb_gioHang.mauSac";
                
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang' => $userIDCart]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        
        
    }
