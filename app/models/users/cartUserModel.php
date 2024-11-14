<?php
    class cartUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
    }
