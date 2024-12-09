<?php
    class cartUserController{
        public $cart;
        public function __construct(){
            $this->cart = new cartUserModel;
        }
        public function cartUser(){
            $userIDCart = $_GET['id'];
            $cartProducts = $this->cart->getProductByUserID($userIDCart);
            $addressUser = $this->cart->getAddressUser($userIDCart);
            // var_dump($cartProducts);die();
            require_once './views/users/cart/cart.php';
        }
        public function addCart() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_sanPham = $_POST['id_sanPham'];
                $capacity = $_POST['capacity'];
                $color = $_POST['color'];
                $price = $_POST['price'];
                $userID = $_POST['userID'];
                $buyNow = isset($_POST['buyNow']) ? true : false;
                $addToCart = isset($_POST['addToCart']) ? true : false;
                // var_dump($_POST);die();
                $addCart = $this->cart->addCartModel($id_sanPham, $capacity, $color, $price, $userID);
        
                if ($addCart) {
                    if ($buyNow) {
                        header('Location: ./?act=cart&id=' . $userID);
                        exit();
                    } elseif ($addToCart) {
                        header('Location: ./?act=detailProduct&id=' . $id_sanPham);
                    }
                } else {
                    echo "Thêm vào giỏ hàng thất bại.";
                }
            }
        }
        public function deteteCart(){
            $userID = $_GET['idUser'];
            $idProductCart = $_GET['id'];
            // var_dump($userID);die();
            $deleteCart = $this->cart->deteteCartMode($idProductCart);
            if($deleteCart){
                header('Location: ./?act=cart&id=' . $userID);
            }else{
                echo "Xóa sản phẩm kh��i gi�� hàng thất bại.";
            }
        }
        
    }