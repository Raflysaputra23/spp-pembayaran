<?php

class Spp_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getHargaSpp($SiswaID) {
        $this->db->query("SELECT HargaJurusan FROM siswa as S join jurusan as J ON S.JurusanID = J.JurusanID WHERE Nisn = :Nisn");
        $this->db->bind("Nisn", $SiswaID);
        $this->db->execute();
        return $this->db->single();
    }

    public function getBulan($SiswaID) {
        $this->db->query("SELECT B.BulanID as BulanID, P.BulanID as PBulanID, SiswaID, NamaBulan, Nisn, Harga, NamaLengkap, Email, NoTelp FROM bulan as B LEFT JOIN payment as P ON B.BulanID = P.BulanID AND P.SiswaID = :SiswaID JOIN siswa as S ON S.Nisn = :SiswaID");
        $this->db->bind("SiswaID", $SiswaID);
        $this->db->execute();
        return $this->db->resultSet();
    }   

    public function getTotalHargaSpp($SiswaID) {
        $this->db->query("SELECT SiswaID FROM payment WHERE SiswaID = :SiswaID");
        $this->db->bind("SiswaID", $SiswaID);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function setTranksaksi($data) {
        $TranksaksiID = $data["TranksaksiID"];
        $MetodePay = $data["MetodePay"];
        $TotalHarga = $data["TotalHarga"];
        $CreateAt = $data["CreateAt"];

        try {
            $this->db->query("INSERT INTO tranksaksi(TranksaksiID, MetodePay, TotalHarga, CreateAt) VALUES (:TranksaksiID, :MetodePay, :TotalHarga, :CreateAt)");
            $this->db->bind("TranksaksiID", $TranksaksiID);
            $this->db->bind("MetodePay", $MetodePay);
            $this->db->bind("TotalHarga", $TotalHarga);
            $this->db->bind("CreateAt", $CreateAt);
            $this->db->execute();

            $this->setPayment($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setPayment($data) {
        foreach($data["Bulan"] as $bulan) {
            $TranksaksiID = $data["TranksaksiID"];
            $SiswaID = $data["SiswaID"];
            $BulanID = $bulan["id"];
            $Harga = $bulan["price"];

            try {
                $this->db->query("INSERT INTO payment(TranksaksiID, BulanID, SiswaID, Harga) VALUES (:TranksaksiID, :BulanID, :SiswaID, :Harga)");
                $this->db->bind("TranksaksiID", $TranksaksiID);
                $this->db->bind("BulanID", $BulanID);
                $this->db->bind("SiswaID", $SiswaID);
                $this->db->bind("Harga", $Harga);
                $this->db->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $this->db->rowCount();
    }

    public function getRekapSiswa($data = []) {
        try {
            if(empty($data["search"])) {
                $this->db->query("SELECT S.Nisn, S.Foto, S.NamaLengkap, S.Kelas, J.SingkatanJurusan as Jurusan, J.HargaJurusan FROM siswa as S JOIN jurusan as J ON S.JurusanID = J.JurusanID");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $data = htmlspecialchars(stripcslashes($data["search"]));
                $this->db->query("SELECT S.Nisn, S.Foto, S.NamaLengkap, S.Kelas, J.SingkatanJurusan as Jurusan, J.HargaJurusan FROM siswa as S JOIN jurusan as J ON S.JurusanID = J.JurusanID WHERE S.Nisn LIKE :Nisn OR S.NamaLengkap LIKE :NamaLengkap OR S.Kelas LIKE :Kelas OR J.SingkatanJurusan LIKE :Jurusan OR J.NamaJurusan LIKE :Jurusan OR J.HargaJurusan LIKE :Jurusan");
                $this->db->bind("Nisn", "%$data%");
                $this->db->bind("NamaLengkap", "%$data%");
                $this->db->bind("Kelas", "%$data%");
                $this->db->bind("Jurusan", "%$data%");
                $this->db->execute();
                return $this->db->resultSet();
            }
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

    public function getDetailSiswa($SiswaID) {
        $this->db->query("SELECT B.BulanID as BulanID, P.BulanID as PBulanID, SiswaID, NamaBulan, NamaLengkap FROM bulan as B LEFT JOIN payment as P ON B.BulanID = P.BulanID AND P.SiswaID = :SiswaID JOIN siswa as S ON S.Nisn = :SiswaID");
        $this->db->bind("SiswaID", $SiswaID);
        $this->db->execute();
        return $this->db->resultSet();
    }

}