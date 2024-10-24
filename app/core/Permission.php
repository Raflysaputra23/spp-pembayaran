<?php 

class Permission {
    public static function izinLogin() {
        if(isset($_SESSION["login"])) {
            header('location:'.Constant::DIRNAME.'dashboard');
        } 
    }

    public static function izinLogout() {
        if(empty($_SESSION["login"])) {
            header('location:'.Constant::DIRNAME.'login');
        }
    }
}