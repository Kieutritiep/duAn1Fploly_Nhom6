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
        public function getProductByUserID($userIDCart){
            try{
                $sql = "SELECT 
                    tb_sanPham.id_sanPham,
                    tb_sanPham.ten_sanPham,
                    MAX(tb_anh.file_anh) AS file_anh,
                    SUM(tb_gioHang.soLuong) AS soLuong,
                    MAX(tb_gioHang.dungLuong) AS dungLuong,
                    MAX(tb_gioHang.mauSac) AS mauSac,
                    MAX(tb_gioHang.gia) AS gia,
                    SUM(tb_gioHang.tongTien) AS tongTien
                    FROM tb_gioHang
                    INNER JOIN tb_sanPham ON tb_sanPham.id_sanPham = tb_gioHang.id_sanPham
                    INNER JOIN tb_anh ON tb_anh.id_sanPham = tb_sanPham.id_sanPham AND tb_anh.loaiAnh = 'chinh'
                    WHERE tb_gioHang.id_khachHang = :id_khachHang
                    GROUP BY tb_sanPham.id_sanPham";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang' => $userIDCart]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                echo "Error: ". $e->getMessage();
            }
        }
        
    }
