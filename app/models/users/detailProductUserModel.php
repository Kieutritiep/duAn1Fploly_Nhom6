<?php
    class detailProductUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAlldetailProduct($id) {
            try{
                $sql = "SELECT 
            tb_sanPham.id_sanPham,
            tb_sanPham.ten_sanPham,
            MAX(tb_sanPham.gia) AS gia,
            MAX(tb_sanPham.moTa) AS moTa,
            MAX(tb_anh.file_anh) AS file_anh,
            GROUP_CONCAT(DISTINCT tb_ram.ram) AS ram,
            GROUP_CONCAT(DISTINCT tb_dungLuong.dungLuong) AS dungLuong,
            GROUP_CONCAT(DISTINCT tb_mausac.ten_mauSac) AS mauSac
            FROM tb_sanPham
            INNER JOIN tb_bienthesanpham ON tb_sanPham.id_sanPham = tb_bienthesanpham.id_sanPham
            INNER JOIN tb_anh ON tb_sanPham.id_sanPham = tb_anh.id_sanPham AND tb_anh.loaiAnh = 'phu'
            INNER JOIN tb_ram ON tb_bienthesanpham.id_ram = tb_ram.id_ram
            INNER JOIN tb_dungluong ON tb_bienthesanpham.id_dungLuong = tb_dungluong.id_dungLuong
            INNER JOIN tb_mausac ON tb_bienthesanpham.id_mauSac = tb_mausac.id_mauSac
             WHERE tb_sanPham.id_sanPham = :id_sanPham
            GROUP BY tb_sanPham.id_sanPham";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id_sanPham' => $id]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                return "Error: ". $e->getMessage();
            }
        }
    }
