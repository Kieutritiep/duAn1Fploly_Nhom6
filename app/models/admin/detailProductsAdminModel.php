<?php
class detailProductAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}