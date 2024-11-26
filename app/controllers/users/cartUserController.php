<?php
    class cartUserController{
        public $cart;
        public function __construct(){
            $this->cart = new cartUserModel;
        }
        public function cartUser(){
            $userIDCart = $_GET['id'];
            $cartProducts = $this->cart->getProductByUserID($userIDCart);
            // var_dump($cartProducts);die();
            require_once './views/users/cart/cart.php';
        }
        public function addCart(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_sanPham = $_POST['id_sanPham'];
                $capacity = $_POST['capacity'];
                $color = $_POST['color'];
                $price = $_POST['price'];
                $userID = $_POST['userID'];
                // $quantity = $_POST['quantity'];
                // $action = $_POST['buyNow'];
                // $actionAdd = $_POST['addToCart'];
                var_dump($_POST);die();
                $addCart = $this->cart->addCartModel($id_sanPham,$capacity,$color,$price,$userID);
                if($addCart){
                    echo "thêm vào giỏ hàng thành công";
                }
                else{
                    echo "thêm vào giỏ hàng thất bại";
                }
            }
        }
    }