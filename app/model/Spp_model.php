<?php

class Spp_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getHargaSpp($SiswaID) {
        $this->db->query("SELECT * FROM siswa join jurusan on siswa.Jurusan = jurusan.JurusanID join spp on spp.JurusanID = siswa.Jurusan WHERE siswa.SiswaID = :SiswaID");
        $this->db->bind("SiswaID", $SiswaID);
        $this->db->execute();
        return $this->db->single();
    }

    public function getBulan($SiswaID) {
        $this->db->query("SELECT * FROM bulan WHERE SiswaID = :SiswaID");
        $this->db->bind("SiswaID", $SiswaID);
        $this->db->execute();
        return $this->db->single();
    }

    public function buySpp($bulan) {
        foreach ($bulan["pilihan"] as $b) {
            $this->db->query("UPDATE bulan SET $b = :idSiswa WHERE SiswaID = :SiswaID");
            $this->db->bind("SiswaID", $_SESSION["UserID"]);
            $this->db->bind("idSiswa", $_SESSION["UserID"]);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }


    public function getTagihan($UserID) {
        switch (date('m')) {
            case '1':
                $bulan = "Januari";
                break;
            case '2':
                $bulan = "Februari";
                break;
            case '3':
                $bulan = "Maret";
                break;
            case '4':
                $bulan = "April";
                break;
            case '5':
                $bulan = "Mei";
                break;
            case '6':
                $bulan = "Juni";
                break;
            case '7':
                $bulan = "Juli";
                break;
            case '8':
                $bulan = "Agustus";
                break;
            case '9':
                $bulan = "September";
                break;
            case '10':
                $bulan = "Oktober";
                break;
            case '11':
                $bulan = "November";
                break;
            case '12':
                $bulan = "Desember";
                break;  
        }

        $this->db->query("SELECT * FROM siswa join bulan on siswa.SiswaID = bulan.SiswaID join spp on siswa.Jurusan = spp.JurusanID WHERE siswa.SiswaID = :UserID");
        $this->db->bind("UserID", $UserID);
        $this->db->execute();
        return [$this->db->single(), $bulan];
    }

    public function getLunas($UserID) {
        $this->db->query("SELECT * FROM bulan WHERE SiswaID = :SiswaID");
        $this->db->bind("SiswaID", $UserID);
        $this->db->execute();
        return $this->db->single();
    }

}