<?php
    class orderProductController{
        public function __construct() {
            $this->orderProduct = new orderProductModel;
        }
        public function order(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_khachHang = $_POST['id_khachHang'];
                $gender = $_POST['gender'];
                $name = $_POST['nameUser'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $commune = $_POST['commune'];
                $detailAddress = $_POST['detailAddress'];
                $voucher = $_POST['voucher'];
                $pay = $_POST['pay'];
                $totalPrice = $_POST['totalPrice'];
                $idProduct = $_POST['idProduct'];
                $isDefault = $_POST['isDefault'] ?? 0;
                var_dump($_POST);die();
                $result = $this->orderProduct->olderProducts($id_khachHang,$gender, $name, $phone, $city, $district, $commune, $detailAddress, $isDefault,$voucher,$pay,$totalPrice,$idProduct);
                if($result){
                    echo "Đặt hàng thành công";
                }else{
                    echo "Đặt hàng thất bại";
                }
            }
        }
    }