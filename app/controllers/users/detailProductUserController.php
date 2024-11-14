<?php
    class detailProductController{
        public $detailProductUser;
        public function __construct(){
            $this->detailProductUser = new detailProductUserModel;
        }
        public function detailProductUser(){
            require_once './views/users/products/detailController.php';
        }
    }