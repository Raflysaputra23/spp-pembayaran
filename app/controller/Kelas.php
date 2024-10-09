<?php 


class Kelas extends Controllers {
	public function index() {
		$data['judul'] = "Kelas";
		$this->view('templates/header', $data);
		$this->view('kelas/index');
		$this->view('templates/footer');

	}
}