<?php 

class Kelas_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function tambahJurusan($data) {
        $namaJurusan = $data["namaJurusan"];
        $hargaJurusan = $data["hargaSpp"];
        $id = $this->genereateToken($namaJurusan);
        $dataJuruan = $this->getJurusan();
        foreach($dataJuruan as $data) {
            if($namaJurusan == $data["NamaJurusan"]) {
                Flasher::setFlash('<p class="poppins text-sm">Jurusan sudah ada!</p>', "error");
                header("location:".Constant::DIRNAME.'kelas');
                exit();
            }
        }
        try {
            $this->db->beginTransaction();

            $this->db->query('INSERT INTO jurusan (JurusanID, NamaJurusan) VALUES(:idJurusan, :namaJurusan)');
            $this->db->bind('idJurusan', $id);
            $this->db->bind('namaJurusan', $namaJurusan);
            $this->db->execute();
    
            $this->db->query('INSERT INTO spp (JurusanID, Harga) VALUES(:idJurusan, :hargaJurusan)');
            $this->db->bind('idJurusan', $id);
            $this->db->bind('hargaJurusan', $hargaJurusan);
            $this->db->execute();

            $this->db->commit();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack();
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

    public function getJurusan() {
        try {
            $this->db->query("SELECT jurusan.NamaJurusan, COUNT(siswa.SiswaID) AS TotalSiswa FROM jurusan LEFT JOIN siswa ON jurusan.JurusanID = siswa.Jurusan GROUP BY jurusan.NamaJurusan;");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}