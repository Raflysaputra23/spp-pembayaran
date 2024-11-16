<?php

class Siswa_model {
    private $db;

    public function __construct() { 
        $this->db = new Database();
    }

    public function searchData($data) {
        try {
            $search = htmlspecialchars(stripcslashes($data["search"]));
            $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.JurusanID WHERE NamaLengkap LIKE :nama OR Kelas LIKE :kelas OR Nisn LIKE :nisn OR jurusan.NamaJurusan LIKE :namaJurusan OR jurusan.SingkatanJurusan LIKE :singkatanJurusan OR Jenkel LIKE :jenkel");
            $this->db->bind("jenkel", "%$search%");
            $this->db->bind("namaJurusan", "%$search%");
            $this->db->bind("singkatanJurusan", "%$search%");
            $this->db->bind("nisn", "%$search%");
            $this->db->bind("nama", "%$search%");
            $this->db->bind("kelas", "%$search%");
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
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.JurusanID ORDER BY $column ASC");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.JurusanID ORDER BY $column DESC");
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
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.JurusanID");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $this->db->query("SELECT * FROM siswa join jurusan on jurusan.JurusanID = siswa.JurusanID limit 0, $data");
                $this->db->execute();
                return $this->db->resultSet();
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function hapusSiswa($SiswaID) {
        try {
            $this->db->query("DELETE FROM siswa WHERE Nisn = :Nisn");
            $this->db->bind("Nisn", $SiswaID);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}