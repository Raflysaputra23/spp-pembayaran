<?php 

class History extends Controllers {
    public function index() {

		$data['izinLogout'] = Permission::izinLogout();
        $data["judul"] = "History";
        $this->view("templates/header", $data);
        $this->view("history/index");
        $this->view("templates/footer");
        
    }
}