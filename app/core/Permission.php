<?php 

class Permission {
    public static function izinLogin() {
        if(isset($_SESSION["UserID"])) {
            header('location:'.Constant::DIRNAME.'dashboard');
        } else if(isset($_COOKIE["cookie"])) {
            if(password_verify($_COOKIE["token"], $_COOKIE["cookie"])) {
                $dataUser = json_decode($_COOKIE["token"], false);
                $_SESSION["UserID"] = $dataUser->UserID;
                $_SESSION["Username"] = $dataUser->Username;
                $_SESSION["Role"] = $dataUser->Role;
                header('location:'.Constant::DIRNAME.'dashboard');
                exit();
            }
        }
    }

    public static function izinLogout() {
        if(empty($_SESSION["UserID"])) {
            header('location:'.Constant::DIRNAME.'login');
        }
    }
}