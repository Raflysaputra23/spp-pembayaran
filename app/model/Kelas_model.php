<?php 

class Kelas_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function tambahJurusan($data) {
        $namaJurusan = htmlspecialchars(strtolower($data["namaJurusan"]));
        $singkatanJurusan = htmlspecialchars(strtoupper($data["singkatanJurusan"]));
        $hargaJurusan = htmlspecialchars(strtolower($data["hargaSpp"]));
        $JurusanID = $this->genereateToken($namaJurusan);
        $dataJuruan = $this->getNamaJurusan();
        foreach($dataJuruan as $data) {
            if($namaJurusan == $data["NamaJurusan"]) {
                Flasher::setFlash('<p class="poppins text-sm">Jurusan sudah ada!</p>', "error");
                header("location:".Constant::DIRNAME.'kelas');
                exit();
            }
        }
        try {
            $this->db->query('INSERT INTO jurusan (JurusanID, NamaJurusan, singkatanJurusan, HargaJurusan) VALUES(:JurusanID, :namaJurusan, :singkatanJurusan, :hargaJurusan)');
            $this->db->bind('JurusanID', $JurusanID);
            $this->db->bind('namaJurusan', $namaJurusan);
            $this->db->bind('singkatanJurusan', $singkatanJurusan);
            $this->db->bind('hargaJurusan', $hargaJurusan);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function genereateToken($data) {
        $namaJurusan = explode(" ", $data);
        foreach($namaJurusan as $key => $value) {
            $namaJurusan[$key] = strtoupper($value[0]);
        }
        $namaJurusan = implode("", $namaJurusan);
        return rand(1, 1000).$namaJurusan;
    }

    public function getTotalJurusan($NamaJurusan) {
        try {
            $this->db->query("SELECT jurusan.NamaJurusan, COUNT(siswa.Nisn) AS TotalSiswa FROM jurusan LEFT JOIN siswa ON jurusan.JurusanID = siswa.JurusanID GROUP BY jurusan.NamaJurusan;");
            $this->db->execute();
            $totalSiswa = $this->db->resultSet();
            foreach($NamaJurusan as $key => $data) {
                $NamaJurusan[$key]["TotalSiswa"] = $totalSiswa[$key]["TotalSiswa"];
            }
            return $NamaJurusan;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getNamaJurusan() {
        try {
            $this->db->query("SELECT SingkatanJurusan FROM jurusan");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}