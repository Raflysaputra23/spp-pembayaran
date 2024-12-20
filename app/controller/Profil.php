<?php

class Profil extends Controllers {
    public function index() {
        
		$data['izinLogout'] = Permission::izinLogout();
		$data['dataUser'] = $this->model("Profil_model")->getDataUserSingle($_SESSION["UserID"], $_SESSION["Role"]);
        $data["judul"] = "Profil";
        $this->view("templates/header", $data);
        $this->view("profil/index", $data);
        $this->view("templates/footer");
        
    }

    public function setProfil($role) {
        if ($this->model("Profil_model")->setProfil($_POST, $role) > 0) {
            Flasher::setFlash('<p class="poppins text-sm">Data berhasil diubah!</p>', "success");
			header("location:".Constant::DIRNAME.'profil');
			exit();
        } else {
            Flasher::setFlash('<p class="poppins text-sm">Data gagal diubah!</p>', "error");
			header("location:".Constant::DIRNAME.'profil');
			exit();
        }
    }

    public function getPassword() {
        echo json_encode($this->model("Profil_model")->getPassword($_POST));
    }
}