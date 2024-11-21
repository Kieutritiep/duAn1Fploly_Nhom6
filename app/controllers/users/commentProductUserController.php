<?php
    class commentProductController{
        public $detailCart;
        public function __construct(){
            $this->detailCart = new detailCartUserModel;
        }
        public function commentProductUser(){
            require_once './views/users/products/commentProduct.php';
        }
    }