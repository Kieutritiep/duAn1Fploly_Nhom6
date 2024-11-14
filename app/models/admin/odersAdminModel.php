<?php
class olderAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}