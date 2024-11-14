<?php
class listProductAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}