<?php 	

class Login extends Controllers {
	public function index() {
		
		// $data["izinLogin"] = Permission::izinLogin();
		$data["judul"] = "Login";
		$this->view("templates/header", $data);
		$this->view("login/index");
		$this->view("templates/footer");

	}
}