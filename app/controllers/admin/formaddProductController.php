<?php
   class addProductAdminController {
    public $addProduct;

    public function __construct() {
        $this->addProduct = new addProductModel;
    }

    public function formAddProduct() {
        $categorys = $this->addProduct->getAllCategory();
        $colors = $this->addProduct->getAllColor();
        $capacitys = $this->addProduct->getAllCapacity();
        $rams = $this->addProduct->getAllram();
        require_once './views/admin/products/addProducts.php';
    }

    public function addProduct() {
        // Lấy dữ liệu từ form
        $nameProduct = $_POST['nameProduct'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $capacitys =  isset($_POST['capacity']) ? $_POST['capacity'] : [];
        // $capacitys = isset($_POST['capacity']) ? $_POST['capacity'] : [];
        $colors = isset($_POST['color']) ? $_POST['color'] : [];
        $rams = isset($_POST['ram']) ? $_POST['ram'] : [];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status']; 
        $display = $_POST['display'];
        // var_dump($colors);die();
        
        // Xử lý ảnh chính
        $mainImage = $_FILES['mainImage'];
        $folder = './uploads/';
        $file_save = $this->uploadFile($mainImage, $folder);
    
        $subImage = $_FILES['subImage'];
$folder_subImage = './upload_subImage/';
$file_subImage = [];

if (isset($subImage['name']) && is_array($subImage['name'])) {
    // Trường hợp tải lên nhiều ảnh
    foreach ($subImage['name'] as $key => $name) {
        $tmp_name = $subImage['tmp_name'][$key];
        
        // Tạo tên tệp duy nhất
        $uniqueName = time() . '_' . uniqid() . '_' . basename($name); 
        $file_name = $folder_subImage . $uniqueName;

        if (move_uploaded_file($tmp_name, $file_name)) {
            $file_subImage[] = $file_name; // Lưu đường dẫn ảnh vào mảng
        }
    }
} elseif (!empty($subImage['name'])) {
    // Trường hợp chỉ có một ảnh duy nhất được tải lên
    $tmp_name = $subImage['tmp_name'];
    
    // Tạo tên tệp duy nhất
    $uniqueName = time() . '_' . uniqid() . '_' . basename($subImage['name']); 
    $file_name = $folder_subImage . $uniqueName;

    if (move_uploaded_file($tmp_name, $file_name)) {
        $file_subImage[] = $file_name; // Lưu đường dẫn ảnh vào mảng
    }
}

        $validStatus = ['trang chủ', 'sản phẩm mới ra mắt', 'sản phẩm cũ'];  // Các giá trị hợp lệ của ENUM
        if (!in_array($status, $validStatus)) {
            echo "Trạng thái sản phẩm không hợp lệ!";
            return;
        }
        $result = $this->addProduct->addProductModels($nameProduct, $category, $price, $colors, $rams, $description, $quantity,$capacitys, $status, $display, $file_save, $file_subImage);
    
        if ($file_save) {
            if ($result) {
                echo "Thêm sản phẩm thành công";
            } else {
                echo "Có lỗi xảy ra khi thêm sản phẩm.";
            }
        } else {
            echo "Có lỗi xảy ra khi tải ảnh chính.";
        }
    }
    public function uploadFile($file, $folder) {
        if ($file['error'] == 0) {
            $fileName = basename($file['name']);
            $filePath = $folder . $fileName;
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $filePath; 
            } else {
                return false;  
            }
        }
        return false;  
    }
}
 
    

