<?php
class categorysAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
}