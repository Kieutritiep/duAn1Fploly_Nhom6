<?php
    class infomationUser {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
    }
