<?php

class Siswa_model {
    private $db;

    public function __construct() { 
        $this->db = new Database();
    }

    public function searchData($data) {
        try {
            $search = htmlspecialchars(stripcslashes($data["search"]));
            $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.Jurusan WHERE NamaLengkap LIKE :nama");
            $this->db->bind("nama", "%$search%");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataOrder($data) {
        $order = $data->order;
        $column = $data->column;
        try {
            if($order == "ASC") {
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.Jurusan ORDER BY $column ASC");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.Jurusan ORDER BY $column DESC");
                $this->db->execute();
                return $this->db->resultSet();
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataSort($data) {
        try {
            if($data == "all") {
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.Jurusan");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.Jurusan limit 0, $data");
                $this->db->execute();
                return $this->db->resultSet();
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}