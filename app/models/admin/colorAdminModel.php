<?php
class colorAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}