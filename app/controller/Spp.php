<?php 

class Spp extends Controllers {
    public function index() {
		$data['izinLogout'] = Permission::izinLogout();
        $data["bulan"] = $this->model("Spp_model")->getBulan($_SESSION["UserID"]);
        $data["hargaSpp"] = $this->model("Spp_model")->getHargaSpp($_SESSION["UserID"]);
        $data["judul"] = "Spp";
        $this->view("templates/header", $data);
        $this->view("spp/index", $data);
        $this->view("templates/footer");
        
    }

    public function buySpp() {
        echo json_encode($this->model("Spp_model")->buySpp($_POST));
    }

}