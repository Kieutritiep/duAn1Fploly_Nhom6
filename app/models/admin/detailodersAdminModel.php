<?php
class detailOlderAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}