<?php

class Profil extends Controllers {
    public function index() {
        
        $data["judul"] = "Profil";
        $this->view("templates/header", $data);
        $this->view("profil/index");
        $this->view("templates/footer");
        
    }
}