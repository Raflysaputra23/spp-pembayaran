<?php

class Login_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function loginUser($data) {
        $nisn = htmlspecialchars($data["nisn"]);
        $password = htmlspecialchars($data["password"]);
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
            if($this->getDataBulan($dataUser["SiswaID"], "read") == false) $this->getDataBulan($dataUser["SiswaID"], "insert");
            $_SESSION["UserID"] = $dataUser["SiswaID"];
            $_SESSION["Username"] = $dataUser["NamaLengkap"];
            $_SESSION["Role"] = $dataUser["Role"];
            $data = ["UserID" => $dataUser["SiswaID"], "Username" => $dataUser["NamaLengkap"], "Role" => $dataUser["Role"]];
            if($remember) {
                setcookie("cookie",password_hash(json_encode($data), PASSWORD_DEFAULT), time() + 60 * 24 * 30, "/");
                setcookie("token",json_encode($data), time() + 60 * 24 * 30, "/");
            }
            return true;        
        }

    }

    public function loginAdmin($data) {
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);
        $dataUser = $this->getDataUserSingle($username, "users");

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
            $_SESSION["UserID"] = $dataUser["UserID"];
            $_SESSION["Username"] = $dataUser["NamaLengkap"];
            $_SESSION["Role"] = $dataUser["Role"];
            $data = ["UserID" => $dataUser["UserID"], "Username" => $dataUser["NamaLengkap"], "Role" => $dataUser["Role"]];
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

    public function getDataBulan($SiswaID, $sql) {
        try {
            if($sql == "read") {
                $this->db->query("SELECT * FROM bulan WHERE SiswaID = :SiswaID");
                $this->db->bind("SiswaID", $SiswaID);
                $this->db->execute();
                return $this->db->single();
            } else if($sql == "insert"){
                $this->db->query("INSERT INTO bulan (SiswaID) VALUES (:SiswaID)");
                $this->db->bind("SiswaID", $SiswaID);
                $this->db->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}