<?php 	

class Login extends Controllers {
	public function index() {
		
		$data["izinLogin"] = Permission::izinLogin();
		$data["judul"] = "Login";
		$this->view("templates/header", $data);
		$this->view("login/index");
		$this->view("templates/footer");

	}

	public function loginUser() {
		if($this->model("Login_model")->loginUser($_POST) > 0) {
			Flasher::setFlash('<p class="poppins text-sm">Login berhasil!</p>', "success");
			header("location:".Constant::DIRNAME.'dashboard');
			exit();
		} else {
			Flasher::setFlash('<p class="poppins text-sm">Username / Password salah!</p>', "error");
			header("location:".Constant::DIRNAME.'login');
			exit();
		}
	}

	public function loginAdmin() {
		if($this->model("Login_model")->loginAdmin($_POST) > 0) {
			Flasher::setFlash('<p class="poppins text-sm">Login berhasil!</p>', "success");
			header("location:".Constant::DIRNAME.'dashboard');
			exit();
		} else {
			Flasher::setFlash('<p class="poppins text-sm">Username / Password salah!</p>', "error");
			header("location:".Constant::DIRNAME.'login');
			exit();
		}
	}
}