<?php
    class detailCartUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
    }
