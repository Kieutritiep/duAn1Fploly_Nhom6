<?php
    class detailProductController{
        public $detailProductUser;
        public function __construct(){
            $this->detailProductUser = new detailProductUserModel;
        }
        public function detailProduct(){
            $id = $_GET["id"];
            // $idProduct = $_GET['product_id'];
            // var_dump($idProduct);die();    
            $detailProducts = $this->detailProductUser->getAlldetailProduct($id);
            $vouchers = $this->detailProductUser->voucher();
            require_once './views/users/products/detailController.php';
        }
    }   