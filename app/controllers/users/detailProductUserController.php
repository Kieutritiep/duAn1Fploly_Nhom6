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
            require_once './views/users/products/detailController.php';
        }
    }