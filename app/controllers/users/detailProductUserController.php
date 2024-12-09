<?php
    class detailProductController{
        public $detailProductUser;
        public function __construct(){
            $this->detailProductUser = new detailProductUserModel;
        }
        public function detailProduct(){
            $id = $_GET["id"];

            $detailProducts = $this->detailProductUser->getAlldetailProduct($id);
            // var_dump($detailProducts);die();    
            $vouchers = $this->detailProductUser->voucher();
            require_once './views/users/products/detailProductUser.php';

        }
    }   