<?php
    class cartEmptyUserController{
        public $cartEmpty;
        public function __construct(){
            $this->cartEmpty = new cartEmptyUserModel;
        }
        public function cartEmpty(){
            require_once './views/users/cart/cartEmpty.php';
        }
    }