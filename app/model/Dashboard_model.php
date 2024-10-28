<?php

class Dashboard_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDataUserSingle($id, $role) {
        if($role == "user") {
            try {
                $this->db->query("SELECT * FROM siswa WHERE SiswaID = :SiswaID");
                $this->db->bind("SiswaID", $id);
                $this->db->execute();
                return $this->db->single();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            try {
                $this->db->query("SELECT * FROM users WHERE UserID = :UserID");
                $this->db->bind("UserID", $id);
                $this->db->execute();
                return $this->db->single();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function getDataUserByKategori($jenkel) {
        switch($jenkel) {
            case "semua":
                return $this->getDataUserAll();
            break;
            case "laki-laki":
                return $this->getDataUserLaki();
            break;
            case "perempuan":
                return $this->getDataUserPerempuan();
            break;
        }
    }

    public function getDataUserAll() {
        try {
            $this->db->query("SELECT * FROM siswa");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $th) {
            echo $e->getMessage();
        }
    }

    public function getDataUserLaki() {
        try {
            $this->db->query("SELECT * FROM siswa WHERE Jenkel = :jenkel");
            $this->db->bind("jenkel", "laki-laki");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $th) {
            echo $e->getMessage();
        }
    }

    public function getDataUserPerempuan() {
        try {
            $this->db->query("SELECT * FROM siswa WHERE Jenkel = :jenkel");
            $this->db->bind("jenkel", "perempuan");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $th) {
            echo $e->getMessage();
        }
    }
}