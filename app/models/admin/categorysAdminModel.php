<?php
class categorysAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllCategory(){
        try{
            $sql = "SELECT * FROM tb_danhMuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
}