<?php
    class listProductAdminController{
        public $listProducts;
        public function __construct(){
            $this->listProducts = new listProductAdminModel;
        }
        public function listProducts(){
            $products = $this->listProducts->getProductAdmin();
            require_once './views/admin/products/listPrductAdmin.php';
        }
    }