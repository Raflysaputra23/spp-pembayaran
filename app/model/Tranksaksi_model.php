<?php

class Tranksaksi_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getHistory($data =[]) {

        try {
            if(empty($data["search"])) {
                $this->db->query("SELECT P.SiswaID, T.TranksaksiID, MetodePay, TotalHarga, CreateAt, GROUP_CONCAT(NamaBulan) as Bulan, GROUP_CONCAT(Harga) as Harga FROM tranksaksi as T join payment as P on T.TranksaksiID = P.TranksaksiID join bulan as B on P.BulanID = B.BulanID GROUP BY P.SiswaID, T.TranksaksiID, MetodePay, TotalHarga, CreateAt");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $search = $data["search"];
                $this->db->query("SELECT P.SiswaID, T.TranksaksiID, MetodePay, TotalHarga, CreateAt, GROUP_CONCAT(NamaBulan) as Bulan, GROUP_CONCAT(Harga) as Harga FROM tranksaksi as T join payment as P on T.TranksaksiID = P.TranksaksiID join bulan as B on P.BulanID = B.BulanID WHERE T.TranksaksiID LIKE :search OR P.SiswaID LIKE :search GROUP BY P.SiswaID, T.TranksaksiID, MetodePay, TotalHarga, CreateAt");
                $this->db->bind("search", "%$search%");
                $this->db->execute();
                return $this->db->resultSet();
            }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}