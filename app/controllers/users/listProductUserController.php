<?php
    class listProductUsersController{
        public $listProductControllerUser;
        public function __construct(){
            $this->listProductControllerUser = new listProductUsersModel;
        }
        public function listProductUser(){
            $products = $this->listProductControllerUser->getAllProductUsers();
            // var_dump($products);die();
            // print_r($products);die();
            require_once './views/users/products/listProductUser.php';
            // require_once './views/users/layout/header.php';
        }
        
    }