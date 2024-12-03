<?php
    class detailCartUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllOlderUsers($idUser){
            try{    
                $sql = "SELECT
                            tb_donhang.id_donHang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            tb_donhang.id_khachHang,
                            tb_donhang.id_giamGia,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don,
                            diachi.soDienThoai,
                            diachi.gioiTinh,
                            diachi.hoVaTen,
                            diachi.diaChiChiTiet
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        INNER JOIN diachi ON tb_donhang.diachi_id = diachi.id_diaChi
                        WHERE tb_donhang.id_khachHang = :id_khachHang
                    ";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_khachHang', $idUser);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PD0Exception $e){
                echo "Error: ". $e->getMessage();
            }
        }
    }
