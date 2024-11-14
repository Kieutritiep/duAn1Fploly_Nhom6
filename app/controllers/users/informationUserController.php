<?php
    class infomationUserController{
        public $infomationUser;
        public function __construct(){
            $this->infomationUser = new infomationUser;
        }
        public function infomationUser(){
            require_once './views/users/informationUser/informationUser.php';
        }
    }