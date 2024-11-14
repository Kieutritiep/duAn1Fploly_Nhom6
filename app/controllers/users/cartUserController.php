<?php
    class cartUserController{
        public $cart;
        public function __construct(){
            $this->cart = new cartUserModel;
        }
        public function cartUser(){
            require_once './views/users/cart/cart.php';
        }
    }