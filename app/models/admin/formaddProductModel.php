<?php
class addProductModel {
    public $conn;
    
    public function __construct() {
        $this->conn = connectDB();
    }
    public function getAllCategory(){
        try{
            $sql = "SELECT * FROM tb_danhMuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
    public function addProductModel($nameProduct,$category, $price, $color, $ram, $description,$quantity,$status,$display){
        try{
            $sql = "INSERT INTO 
            tb_sanpham (ten_sanPham, id_danhMuc, gia, id_mauSac, id_dungLuong, id_ram, moTa, trangThaiTonKho, trangThaiSanPham, hienThi) 
            VALUES (:ten_sanPham, :id_danhMuc, :gia, :id_mauSac,:id_dungLuong, :id_ram, :moTa, :trangThaiTonKho,:trangThaiSanPham,:hienThi )
            
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sanPham' => $nameProduct,
                ':id_danhMuc' => $category, 
                ':gia' => $price,
                ':id_mauSac' => $color, 
                ':id_dungLuong' => $ram,
                ':id_ram' => $ram,
                ':moTa' => $description,
                ':trangThaiTonKho' => $quantity,
                ':trangThaiSanPham' => $status,
                ':hienThi' => $display,
            ]);
            return true;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}