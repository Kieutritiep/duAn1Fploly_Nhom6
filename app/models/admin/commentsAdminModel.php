<?php
class commentAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}