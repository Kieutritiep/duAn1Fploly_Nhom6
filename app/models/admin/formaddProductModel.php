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
    public function getAllram(){
        try{
            $sql = "SELECT * FROM tb_ram";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
    public function getAllCapacity(){
        try{
            $sql = "SELECT * FROM tb_dungLuong";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }

    }
    public function getAllColor(){
        try{
            $sql = "SELECT * FROM tb_mauSac";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
    public function addProductModels($nameProduct, $category, $priceProducts, $colors, $rams, $description, $quantity, $capacities, $status, $display, $file_save, $file_subImage) {
        try {
            $this->conn->beginTransaction();
    
            // Bước 1: Thêm thông tin sản phẩm chính vào bảng tb_sanPham
            $sql = "INSERT INTO tb_sanPham 
                    (ten_sanPham, id_danhMuc, moTa, soLuong, trangThaiSanPham, hienThi) 
                    VALUES 
                    (:ten_sanPham, :id_danhMuc, :moTa, :soLuong, :trangThaiSanPham, :hienThi)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sanPham' => $nameProduct,
                ':id_danhMuc' => $category,
                // ':gia' => $price,
                ':moTa' => $description,
                ':soLuong' => $quantity,
                ':trangThaiSanPham' => $status,
                ':hienThi' => $display,
            ]);
    
            // Lấy ID của sản phẩm vừa thêm
            $productID = $this->conn->lastInsertId();
    
            if (is_array($colors)) {
                foreach ($colors as $colorID) {
                    foreach ($rams as $ramID) {
                        foreach ($capacities as $capacityID){
                            foreach($priceProducts as $priceProduct){
                                // Insert vào bảng tb_sanPhamBiếnThe
                                $sql = "INSERT INTO tb_bienthesanpham (id_sanPham, id_mauSac, id_dungLuong, id_ram,giaBienThe) 
                                VALUES (:id_sanPham, :id_mauSac, :id_dungLuong, :id_ram,:giaBienThe)";
                                $stmt = $this->conn->prepare($sql);
                                $stmt->execute([
                                    ':id_sanPham' => $productID, 
                                    ':id_mauSac' => $colorID,
                                    ':id_dungLuong' => $capacityID,
                                    ':id_ram' => $ramID,
                                    ':giaBienThe' => $priceProduct,
                                ]);
                            }
                        }
                    }
                }
            }
            $sql = "INSERT INTO tb_anh (id_sanPham, file_anh, loaiAnh) VALUES (:id_sanPham, :file_anh, :loaiAnh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_sanPham' => $productID,
                ':file_anh' => $file_save,
                ':loaiAnh' => 'chinh',
            ]);
            if (is_array($file_subImage)) {
                foreach ($file_subImage as $image) {
                    $sql = "INSERT INTO tb_anh (id_sanPham, file_anh, loaiAnh) VALUES (:id_sanPham, :file_anh, :loaiAnh)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        ':id_sanPham' => $productID,
                        ':file_anh' => $image,
                        ':loaiAnh' => 'phu',
                    ]);
                }
            }
            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}