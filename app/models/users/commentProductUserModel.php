<?php
class commentUserModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}