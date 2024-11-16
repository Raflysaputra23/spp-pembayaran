<?php

class Dashboard_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDataUserSingle($id, $role) {
        try {
            if($role == "user") {
                $this->db->query("SELECT * FROM siswa join jurusan WHERE siswa.JurusanID = jurusan.JurusanID AND Nisn = :Nisn");
                $this->db->bind("Nisn", $id);
                $this->db->execute();
                return $this->db->single();
            } else if($role == "admin") {
                $this->db->query("SELECT * FROM users WHERE UserID = :UserID");
                $this->db->bind("UserID", $id);
                $this->db->execute();
                return $this->db->single();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
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
            $this->db->query("SELECT * FROM siswa join jurusan WHERE siswa.JurusanID = jurusan.JurusanID");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataUserLaki() {
        try {
            $this->db->query("SELECT * FROM siswa join jurusan WHERE siswa.JurusanID = jurusan.JurusanID AND Jenkel = :jenkel");
            $this->db->bind("jenkel", "laki-laki");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataUserPerempuan() {
        try {
            $this->db->query("SELECT * FROM siswa join jurusan WHERE siswa.JurusanID = jurusan.JurusanID AND Jenkel = :jenkel");
            $this->db->bind("jenkel", "perempuan");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getTagihan($SiswaID) {
        try {
            $this->db->query("SELECT HargaJurusan, COUNT(CASE WHEN P.SiswaID = :SiswaID THEN P.SiswaID END) as Lunas FROM siswa as S JOIN jurusan as J ON S.JurusanID = J.JurusanID LEFT JOIN payment as P ON P.SiswaID = :SiswaID WHERE Nisn = :SiswaID");
            $this->db->bind("SiswaID", $SiswaID);
            $this->db->execute();
            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getLunas($SiswaID) {
        $bulan = $this->generateBulan();
        try {
            $this->db->query("SELECT P.BulanID FROM payment as P JOIN bulan as B ON P.BulanID = B.BulanID WHERE P.SiswaID = :SiswaID AND NamaBulan = :Bulan");
            $this->db->bind("SiswaID", $SiswaID);
            $this->db->bind("Bulan", $bulan);
            $this->db->execute();
            return $this->db->single();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function generateBulan() {
        switch (date('m')) {
            case '1':
                return "Januari";
                break;
            case '2':
                return "Februari";
                break;
            case '3':
                return "Maret";
                break;
            case '4':
                return "April";
                break;
            case '5':
                return "Mei";
                break;
            case '6':
                return "Juni";
                break;
            case '7':
                return "Juli";
                break;
            case '8':
                return "Agustus";
                break;
            case '9':
                return "September";
                break;
            case '10':
                return "Oktober";
                break;
            case '11':
                return "November";
                break;
            case '12':
                return "Desember";
                break;
        }
    }
}