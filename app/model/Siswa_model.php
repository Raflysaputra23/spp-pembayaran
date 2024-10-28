<?php

class Siswa_model {
    private $db;

    public function __construct() { 
        $this->db = new Database();
    }

    public function searchData($data) {
        $search = htmlspecialchars(stripcslashes($data["search"]));
        $this->db->query("SELECT * FROM siswa WHERE NamaLengkap LIKE :nama");
        $this->db->bind("nama", "%$search%");
        $this->db->execute();
        return $this->db->resultSet();
    }
}