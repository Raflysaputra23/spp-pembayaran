<?php 


class Register extends Controllers {
	public function index() {

		$data['izinLogin'] = Permission::izinLogin();
		$data['jurusan'] = $this->model("Register_model")->getJurusan('all');
		$data["judul"] = "Register";
		$this->view('templates/header', $data);
		$this->view('register/index', $data);
		$this->view('templates/footer');

	}

	public function registerSingleUser() {
		if ($this->model("Register_model")->registerSingleUser($_POST) > 0) {
			Flasher::setFlash('<p class="poppins text-sm">User berhasil didaftarkan</p>',"success");
			header('location: '.Constant::DIRNAME.'login');
			exit();
		} else {
			Flasher::setFlash('<p class="poppins text-sm">User gagal didaftarkan</p>',"error");
			header('location: '.Constant::DIRNAME.'register');
			exit();
		}
	}

	public function registerSingleAdmin() {
		if ($this->model("Register_model")->registerSingleAdmin($_POST) > 0) {
			Flasher::setFlash('<p class="poppins text-sm">Admin berhasil didaftarkan</p>',"success");
			header('location: '.Constant::DIRNAME.'login');
			exit();
		} else {
			Flasher::setFlash('<p class="poppins text-sm">Admin gagal didaftarkan</p>',"error");
			header('location: '.Constant::DIRNAME.'register');
			exit();
		}
	}

	public function registerAllUser() {
		if ($this->model("Register_model")->registerAllUser($_FILES) > 0) {
			Flasher::setFlash('<p class="poppins text-sm">User berhasil didaftarkan</p>',"success");
			header('location: '.Constant::DIRNAME.'login');
			exit();
		} else {
			Flasher::setFlash('<p class="poppins text-sm">User gagal didaftarkan</p>',"error");
			header('location: '.Constant::DIRNAME.'register');
			exit();
		}
	}

}