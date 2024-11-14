<?php
    class detailcartUserController{
        public $detailCart;
        public function __construct(){
            $this->detailCart = new detailCartUserModel;
        }
        public function detailCartUser(){
            require_once './views/users/cart/detailcart.php';
        }
    }