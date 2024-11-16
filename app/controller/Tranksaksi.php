<?php

class Tranksaksi extends Controllers {
    public function index() {
        $data['izinLogout'] = Permission::izinLogout();
        $data['history'] = $this->model("Tranksaksi_model")->getHistory($_SESSION["UserID"]);
        $data["judul"] = "Tranksaksi";
        $this->view("templates/header", $data);
        $this->view("tranksaksi/index", $data);
        $this->view("templates/footer");
    }

    public function getHistory() {
        echo json_encode($this->model("Tranksaksi_model")->getHistory($_POST));
    }
}