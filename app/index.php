<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ
 
// Require toàn bộ file Controllers admin
require_once './controllers/admin/homeAdmimController.php';
require_once './controllers/admin/capacityAdminController.php';
require_once './controllers/admin/categorysAdminController.php';
require_once './controllers/admin/colorAdminController.php';
require_once './controllers/admin/commentsAdminController.php';
require_once './controllers/admin/detailcommentsAdminController.php';
require_once './controllers/admin/detailcustomerAdminController.php';
require_once './controllers/admin/detailodersAdminController.php';
require_once './controllers/admin/detailProductsAdminController.php';
require_once './controllers/admin/listcustomersAdminController.php';
require_once './controllers/admin/listProductAdminController.php';
require_once './controllers/admin/odersAdminController.php';
require_once './controllers/admin/ramAdminController.php';

// Require toàn bộ file Models admin
require_once './models/admin/homeAdminModel.php';
require_once './models/admin/capacityAdminModel.php';
require_once './models/admin/categorysAdminModel.php';
require_once './models/admin/colorAdminModel.php';
require_once './models/admin/commentsAdminModel.php';
require_once './models/admin/detailcustomerAdminModel.php';
require_once './models/admin/detailodersAdminModel.php';
require_once './models/admin/detailProductsAdminModel.php';
require_once './models/admin/listcustomersAdminModel.php';
require_once './models/admin/listProductsAdminModel.php';
require_once './models/admin/odersAdminModel.php';
require_once './models/admin/ramAdminModel.php';

// Require toàn bộ file Models users
require_once './models/users/listProductUserModel.php';
require_once './models/users/loginModel.php';
require_once './models/users/cartUserModel.php';
require_once './models/users/detailCartModel.php';
require_once './models/users/cartEmptyModel.php';
require_once './models/users/informationUserModel.php';
require_once './models/users/detailProductUserModel.php';
// Require toàn bộ file Controllers users
require_once './controllers/users/listProductUserController.php';
require_once './controllers/users/loginController.php';
require_once './controllers/users/cartUserController.php';
require_once './controllers/users/detailCartController.php';
require_once './controllers/users/cartEmptyController.php';
require_once './controllers/users/informationUserController.php';
require_once './controllers/users/detailProductUserController.php';
// Route
$act = $_GET['act'] ?? '/';
// Điều hướng dựa trên giá trị $act
try {
    if (strpos($act, 'admin/') === 0) {
        // Điều hướng đến admin
        $adminAction = substr($act, 6); 
        match ($adminAction) {
            '' => (new homeAdminController())->homeAdmin(),
            'listProducts' => (new listProductAdminController())->listProducts(),
            'detailProducts' => (new listProductAdminController())->detailProducts(),
            'categorys' => (new categorysAdminController())->categorys(),
            'listcustomers' => (new listcustomersAdminController())->listcustomers(),
            'detailcustomer' => (new detailcustomersAdminController())->detailcustomer(),
            'comments' => (new commentsAdminController())->comments(),
            'detailcomments' => (new detailcommentscommentsAdminController())->detailcomments(),
            'ram' => (new ramAdminController())->ram(),
            'capacity' => (new capacityAdminController())->capacity(),
            'color' => (new ramAdminController())->color(),
            'oders' => (new odersAdminController())->oders(),
            'detailoders' => (new detailOdersAdminController())->detailOders(),
        }; 
    } else {
        // điều hướng đến user
        match ($act) {
            '/' => (new listProductUsersController())->listProductUser(),
            'detailProduct' => (new detailProductController())->detailProductUser(), //chi tiết sản phẩm
            'login' => (new loginController())->login(),
            'cart' => (new cartUserController())->cartUser(),  //giỏ hàng
            'detailCart' => (new detailcartUserController())->detailCartUser(), //chi tiết giỏ hàng
            'cartEmpty' => (new cartEmptyUserController())->cartEmpty(), //giỏ hàng trống
            'infomationUser' => (new infomationUserController())->infomationUser(), //Thông tin người dùng
            default => throw new Exception('404 Not Found', 404),
        };
    }
} catch (Exception $e) {
    http_response_code($e->getCode());
    echo $e->getMessage();
}
