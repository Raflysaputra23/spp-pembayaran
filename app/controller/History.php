<?php 

class History extends Controllers {
    public function index() {
		$data['izinLogout'] = Permission::izinLogout();
        $data['history'] = $this->model("History_model")->getHistory($_SESSION["UserID"]);
        $data["judul"] = "History";
        $this->view("templates/header", $data);
        $this->view("history/index", $data);
        $this->view("templates/footer");
    }

    public function getDataOrder() {
        echo json_encode($this->model("History_model")->getDataOrder(json_decode(file_get_contents('php://input'))));
    }
}