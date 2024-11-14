<?php
class listCustomerAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}