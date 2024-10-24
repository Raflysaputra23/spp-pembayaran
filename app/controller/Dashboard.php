<?php 


class Dashboard extends Controllers {
	public function index() {

		// $data['izinLogout'] = Permission::izinLogout();
		$data['judul'] = "Dashboard";
		$this->view('templates/header', $data);
		$this->view('dashboard/index');
		$this->view('templates/footer');

	}
}