<?php
    class detailcartUserController{
        public $detailCart;
        public function __construct(){
            $this->detailCart = new detailCartUserModel;
        }
        public function detailCartUser(){
            $idUser = $_GET['id'];
            $detailCart = $this->detailCart->getAllOlderUsers($idUser);
            // print_r($detailCart);die();
            require_once './views/users/cart/detailcart.php';
        }
    }