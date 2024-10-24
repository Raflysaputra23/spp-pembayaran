<?php 

class Spp extends Controllers {
    public function index() {

        $data["bulan"] = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		// $data['izinLogout'] = Permission::izinLogout();
        $data["judul"] = "Spp";
        $this->view("templates/header", $data);
        $this->view("spp/index", $data);
        $this->view("templates/footer");
        
    }

}