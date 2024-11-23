<?php
session_start(); // Khởi động session

// Require các file cần thiết
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require tất cả file Controllers admin
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
require_once './controllers/admin/formaddProductController.php';
require_once './controllers/admin/listVoucherAdminController.php';

// Require tất cả file Models admin
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
require_once './models/admin/formaddProductModel.php';
require_once './models/admin/listVoucherAdminModel.php';

// Require tất cả file Models users
require_once './models/users/listProductUserModel.php';
require_once './models/users/loginModel.php';
require_once './models/users/cartUserModel.php';
require_once './models/users/detailCartModel.php';
require_once './models/users/cartEmptyModel.php';
require_once './models/users/informationUserModel.php';
require_once './models/users/detailProductUserModel.php';
require_once './models/users/registerModel.php';
require_once './models/users/commentProductUserModel.php';
// Require tất cả file Controllers users
require_once './controllers/users/listProductUserController.php';
require_once './controllers/users/loginController.php';
require_once './controllers/users/cartUserController.php';
require_once './controllers/users/detailCartController.php';
require_once './controllers/users/cartEmptyController.php';
require_once './controllers/users/informationUserController.php';
require_once './controllers/users/detailProductUserController.php';
require_once './controllers/users/registerController.php';
require_once './controllers/users/commentProductUserController.php';

// Lấy giá trị act từ URL
$act = $_GET['act'] ?? '/';

try {
    if (strpos($act, 'admin/') === 0) {
        // Điều hướng admin
        $adminAction = substr($act, 6); // Lấy phần sau 'admin/'
        match ($adminAction) {
            '' => (new homeAdminController())->homeAdmin(),
            'listProducts' => (new listProductAdminController())->listProducts(),
            'detailProducts' => (new detailProductAdminController())->detailProducts(),
            'formAddProduct' => (new addProductAdminController())->formAddProduct(),
            'addProduct' => (new addProductAdminController())->addProduct(),
            'getAllram' => (new addProductAdminController())->getAllram(),
            'getAllCapacity' => (new addProductAdminController())->getAllCapacity(),
            'getAllColor' => (new addProductAdminController())->getAllColor(),
            'fromAdd_categorys' => (new categorysAdminController())->fromAddcategorys(),
            'formAddProduct' => (new addProductAdminController())->formAddProduct(),
            'addProduct' => (new addProductAdminController())->addProduct(),
            'detailProducts' => (new listProductAdminController())->detailProducts(),
            'categorys' => (new categorysAdminController())->categorys(),
            'delete_categorys' => (new categorysAdminController())->deleteCagorys(),
            'add_Category' => (new categorysAdminController())->addCategory(),
            'listcustomers' => (new listcustomersAdminController())->listcustomers(),
            'listVoucher' => (new listVoucherAdminController())->listVoucher(),
            'formAddVoucher' => (new listVoucherAdminController())->formAddVoucher(),
            'addVoucher' => (new listVoucherAdminController())->addVoucher(),
            'deleteVoucher' => (new listVoucherAdminController())->deleteVoucher(),
            'updateVoucher' => (new listVoucherAdminController())->updateVoucher(),
            'formUpdateVoucher' => (new listVoucherAdminController())->formUpdateVoucher(),
            'updateVoucher' => (new listVoucherAdminController())->updateVoucher(),
            default => throw new Exception('404 Not Found', 404),
        };
            'detailcustomer' => (new detailcustomersAdminController())->detailcustomer(),
            'comments' => (new commentsAdminController())->comments(),
            'detailcomments' => (new detailcommentscommentsAdminController())->detailcomments(),
            'ram' => (new ramAdminController())->ram(),
            'capacity' => (new capacityAdminController())->capacity(),
            'color' => (new colorAdminController())->listColors(),
            'color/add' => (new colorAdminController())->addColor(),
            'color/edit' => (new colorAdminController())->editColor(),
            'color/delete' => (new colorAdminController())->deleteColor(),
            'oders' => (new odersAdminController())->oders(),
            'detailoders' => (new detailOdersAdminController())->detailOders(),
        }; 
    } else {
        match ($act) {
            '/' => (new listProductUsersController())->listProductUser(),
            'detailProduct' => (new detailProductController())->detailProduct(),
            'commentProduct' => (new commentProductController())->commentProductUser(),
            // 'detailProduct' => (new detailProductController())->voucherProduct(),
            'formLogin' => (new loginController())->formlogin(),
            'login' => (new loginController())->login(),
            'register' => (new registerController())->register(),
            'logout' => (new loginController())->logout(),
            'cart' => (new cartUserController())->cartUser(),
            'detailCart' => (new detailcartUserController())->detailCartUser(),
            'cartEmpty' => (new cartEmptyUserController())->cartEmpty(),
            'infomationUser' => (new infomationUserController())->infomationUser(),
            default => throw new Exception('404 Not Found', 404),
        };
    }
} catch (Exception $e) {
    http_response_code($e->getCode() ?: 500);
    $code = is_int($e-> getCode()) ? $e->getCode() : 500;
    http_response_code($code);
    echo $e->getMessage();
    exit();
}
