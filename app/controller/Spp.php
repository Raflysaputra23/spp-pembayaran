<?php 

class Spp extends Controllers {
    public function index() {

        $data["judul"] = "Spp";
        $this->view("templates/header", $data);
        $this->view("spp/index");
        $this->view("templates/footer");
        
    }

}