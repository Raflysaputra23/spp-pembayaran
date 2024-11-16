<?php

class Login_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function loginUser($data) {
        $nisn = htmlspecialchars(trim(stripslashes($data["nisn"])));
        $password = htmlspecialchars(trim(stripslashes($data["password"])));
        $remember = (isset($data["remember"])) ? true : false;
        $dataUser = $this->getDataUserSingle($nisn, "siswa");

        // CEK APAKAH USER TERDAFTAR    
        if($dataUser == false) {
            FLasher::setFlash('<p class="poppins text-sm">Username / Password salah</p>', "error");
            header('location:'.Constant::DIRNAME.'login');
            exit();
        }

        // CEK PASSWORD
        if(!password_verify($password, $dataUser["Password"])) {
            FLasher::setFlash('<p class="poppins text-sm">Username / Password salah</p>', "error");
            header('location:'.Constant::DIRNAME.'login');
            exit();
        } else {
            $_SESSION["UserID"] = $dataUser["Nisn"];
            $_SESSION["Username"] = $dataUser["NamaLengkap"];
            $_SESSION["Foto"] = $dataUser["Foto"];
            $_SESSION["Role"] = $dataUser["Role"];
            $data = ["UserID" => $dataUser["Nisn"], "Username" => $dataUser["NamaLengkap"], "Role" => $dataUser["Role"], "Foto" => $dataUser["Foto"]];
            if($remember) {
                setcookie("cookie",password_hash(json_encode($data), PASSWORD_DEFAULT), time() + 60 * 24 * 30, "/");
                setcookie("token",json_encode($data), time() + 60 * 24 * 30, "/");
            }
            return true;        
        }

    }

    public function loginAdmin($data) {
        $username = htmlspecialchars(trim(stripslashes($data["username"])));
        $password = htmlspecialchars(trim(stripslashes($data["password"])));
        $dataUser = $this->getDataUserSingle($username, "users");
      
        // CEK APAKAH USER TERDAFTAR    
        if($dataUser == false) {
            FLasher::setFlash('<p class="poppins text-sm">Username / Password salah</p>', "error");
            header('location:'.Constant::DIRNAME.'login');
            exit();
        }

        // CEK PASSWORD
        if(!password_verify($password, $dataUser["Password"])) {
            FLasher::setFlash('<p class="poppins text-sm">Username / Password salah!!</p>', "error");
            header('location:'.Constant::DIRNAME.'login');
            exit();
        } else {
            $_SESSION["UserID"] = $dataUser["UserID"];
            $_SESSION["Username"] = $dataUser["NamaLengkap"];
            $_SESSION["Foto"] = $dataUser["Foto"];
            $_SESSION["Role"] = $dataUser["Role"];
            $data = ["UserID" => $dataUser["UserID"], "Username" => $dataUser["NamaLengkap"], "Role" => $dataUser["Role"], "Foto" => $dataUser["Foto"]];
            if($remember) {
                setcookie("cookie",password_hash(json_encode($data), PASSWORD_DEFAULT), time() + 60 * 24 * 30, "/");
                setcookie("token",json_encode($data), time() + 60 * 24 * 30, "/");
            }
            return true;
        }
           
    }

    public function getDataUserSingle($data, $table) {
        try{
            if($table == "siswa") {
                $this->db->query("SELECT * FROM siswa WHERE Nisn = :nisn");
                $this->db->bind("nisn", $data);
                $this->db->execute();
                return $this->db->single();
            } else if($table == "users"){

                $this->db->query("SELECT * FROM users WHERE Username = :username");
                $this->db->bind("username", $data);
                $this->db->execute();
                return $this->db->single();
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}