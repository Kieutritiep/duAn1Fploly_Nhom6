<?php
    class categorysAdminController{
        public $category;
        public function __construct(){
            $this->category = new categorysAdminModel;
        }
        public function categorys(){
            $categorys = $this->category->getAllCategory();
            require_once './views/admin/category/category.php';
        }
    }