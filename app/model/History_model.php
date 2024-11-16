<?php

class History_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getHistory($SiswaID) {
        try {
            $this->db->query("SELECT T.TranksaksiID, MetodePay, TotalHarga, CreateAt, GROUP_CONCAT(NamaBulan) as Bulan, GROUP_CONCAT(Harga) as Harga FROM tranksaksi as T join payment as P on T.TranksaksiID = P.TranksaksiID join bulan as B on P.BulanID = B.BulanID WHERE SiswaID = :SiswaID GROUP BY T.TranksaksiID, MetodePay, TotalHarga, CreateAt");
            $this->db->bind("SiswaID", $SiswaID);
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getDataOrder($data) {
        $Order = $data->Order;
        $SiswaID = $data->SiswaID;
        try {
            if($Order == "ASC") {
                $this->db->query("SELECT T.TranksaksiID, MetodePay, TotalHarga, CreateAt, GROUP_CONCAT(NamaBulan) as Bulan, GROUP_CONCAT(Harga) as Harga FROM tranksaksi as T join payment as P on T.TranksaksiID = P.TranksaksiID join bulan as B on P.BulanID = B.BulanID WHERE SiswaID = :SiswaID GROUP BY T.TranksaksiID, MetodePay, TotalHarga, CreateAt ORDER BY CreateAt ASC");
                $this->db->bind("SiswaID", $SiswaID);
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $this->db->query("SELECT T.TranksaksiID, MetodePay, TotalHarga, CreateAt, GROUP_CONCAT(NamaBulan) as Bulan, GROUP_CONCAT(Harga) as Harga FROM tranksaksi as T join payment as P on T.TranksaksiID = P.TranksaksiID join bulan as B on P.BulanID = B.BulanID WHERE SiswaID = :SiswaID GROUP BY T.TranksaksiID, MetodePay, TotalHarga, CreateAt ORDER BY CreateAt DESC");
                $this->db->bind("SiswaID", $SiswaID);
                $this->db->execute();
                return $this->db->resultSet();
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}