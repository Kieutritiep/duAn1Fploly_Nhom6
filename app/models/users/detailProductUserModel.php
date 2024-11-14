<?php
    class detailProductUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
    }
