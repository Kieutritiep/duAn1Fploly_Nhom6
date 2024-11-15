<?php
    class addProductAdminController{
        public $addProduct;
        public function __construct(){
            $this->addProduct = new addProductModel;
        }
        public function formAddProduct(){
            $categorys = $this->addProduct->getAllCategory();
            require_once './views/admin/products/addProducts.php';
        }
        public function addProduct(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nameProduct = $_POST['nameProduct'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $color = $_POST['color'];
                $ram = $_POST['ram'];
                $description = $_POST['description'];
                // $mainImage = $_POST['mainImage'];
                // $subImage = $_POST['subImage'];
                $quantity = $_POST['quantity'];
                $status = $_POST['status'];
                $display = $_POST['display'];
                $this->addProduct->addProductModel($nameProduct, $category, $price, $color, $ram, $description,$quantity,$status,$display);
                // header("location: ./?act=admin/listProducts");
            }
        }
    }