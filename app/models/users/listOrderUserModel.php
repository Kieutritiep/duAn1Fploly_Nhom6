<?php 
    class listModelUser{
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllOrderUser($idUser){
                try{
                    $sql = "SELECT
                                tb_donhang.id_donhang,
                                tb_donhang.tongTien,
                                tb_donhang.hinhThucThanhToan,
                                tb_donhang.ngayDatHang,
                                tb_donhang.trangThai,
                                CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                            FROM tb_donhang
                            INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch(Exception $e){
                    echo "Error: ". $e->getMessage();
        
                }
            }
    //     public function getAllHistoryOrderUser($idUser) {
    //         try {
    //             // Truy vấn SQL lấy lịch sử đơn hàng
    //             $sql = "SELECT 
    //                     tb_chitietdonhang.soLuong,
    //                     tb_chitietdonhang.dungLuong,
    //                     tb_chitietdonhang.mauSac,
    //                     tb_chitietdonhang.gia,
    //                     tb_chitietdonhang.tongTien,
    //                     tb_sanPham.ten_sanPham,
    //                     tb_anh.file_anh,
    //                     tb_donhang.trangThai,
    //                     tb_donhang.id_donHang
    //                 FROM tb_chitietdonhang
    //                 INNER JOIN tb_sanPham 
    //                     ON tb_chitietdonhang.id_sanPham = tb_sanPham.id_sanPham
    //                 INNER JOIN tb_anh 
    //                     ON tb_sanPham.id_sanPham = tb_anh.id_sanPham AND tb_anh.loaiAnh = 'chinh'
    //                 INNER JOIN tb_donhang 
    //                     ON tb_chitietdonhang.id_donHang = tb_donHang.id_donHang 
    //                 WHERE tb_donhang.id_khachHang = :id_khachHang 
    //                 AND tb_donhang.trangThai IN ('Đã đặt hàng', 'Chờ vận chuyển', 'Đang giao', 'Đã giao')
    //             ";
    //             $stmt = $this->conn->prepare($sql);
        
    //             // Thực thi truy vấn với tham số
    //             $stmt->execute(['id_khachHang' => $idUser]);
        
    //             // Lấy tất cả kết quả
    //             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    //             return $result;
    //         } catch (PDOException $e) {
    //             // Bắt lỗi và hiển thị
    //             echo "Error: " . $e->getMessage();
    //             return [];
    //         }
    //     }
        
    }
?>