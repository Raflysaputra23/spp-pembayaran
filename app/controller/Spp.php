<?php 

class Spp extends Controllers {
    public function index() {
		$data['izinLogout'] = Permission::izinLogout();
        $data["bulan"] = $this->model("Spp_model")->getBulan($_SESSION["UserID"]);
        $data["harga"] = $this->model("Spp_model")->getHargaSpp($_SESSION["UserID"]);
        $data["bulanNow"] = $this->model("Dashboard_model")->generateBulan();
        $data["totalHarga"] = $this->model("Spp_model")->getTotalHargaSpp($_SESSION["UserID"]);
        $data["getRekapSiswa"] = $this->model("Spp_model")->getRekapSiswa();
        $data["judul"] = "Spp";
        $this->view("templates/header", $data);
        $this->view("spp/index", $data);
        $this->view("templates/footer");
        
    }

    public function detail($SiswaID) {
        $data['izinLogout'] = Permission::izinLogout();
        $data["detail"] = $this->model("Spp_model")->getDetailSiswa($SiswaID);
        $data["judul"] = "Detail";
        $this->view("templates/header", $data);
        $this->view("spp/detail", $data);
        $this->view("templates/footer");
    }

    public function setTranksaksi() {
        echo json_encode($this->model("Spp_model")->setTranksaksi(json_decode(file_get_contents('php://input'), true)));
    }

    public function getRekapSiswa() {
        echo json_encode($this->model("Spp_model")->getRekapSiswa($_POST));
    }




}