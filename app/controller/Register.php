<?php 


class Register extends Controllers {
	public function index() {

		// $data['izinLogin'] = Permission::izinLogin();
		$data["judul"] = "Register";
		$this->view('templates/header', $data);
		$this->view('register/index');
		$this->view('templates/footer');

	}
}