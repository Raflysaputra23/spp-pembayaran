<?php 


class Siswa extends Controllers {
	public function index() {

		// $data['izinLogout'] = Permission::izinLogout();
		$data['judul'] = "Siswa";
		$this->view('templates/header',$data);
		$this->view('siswa/index');
		$this->view('templates/footer');

	}
}