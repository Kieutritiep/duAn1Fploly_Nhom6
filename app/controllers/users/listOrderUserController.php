<?php
    class listOrderProductController{
        public $listOrderUser;
        public function __construct(){
            $this->listOrderUser = new listModelUser;
        }
        public function listorderUser(){
            $idUser = $_GET['id'];
            $listOrders = $this->listOrderUser->getAllOrderUser($idUser);
            var_dump($listOrders);die();
            require_once './views/users/cart/listOlderUser.php';
            // require_once './views/users/layout/header.php';
        }
        public function historyOrderUser(){
            $idUser = $_GET['id'];
            $historyOrderUsers = $this->listOrderUser->getAllHistoryOrderUser($idUser);
            // var_dump($historyOrderUsers);die(); 
            require_once './views/users/cart/histstory.php';
        }
        
    }