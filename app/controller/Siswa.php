<?php 


class Siswa extends Controllers {
	public function index($jenkel) {
		$data['izinLogout'] = Permission::izinLogout();
		$data["dataUser"] = ["siswa" => $this->model("Dashboard_model")->getDataUserByKategori(($jenkel == false) ? "semua" : $jenkel[0]), "no" => 1];
		$data['judul'] = "Siswa";
		$this->view('templates/header',$data);
		$this->view('siswa/index', $data);
		$this->view('templates/footer');
	}

	public function searchData() {
		echo json_encode($this->model("Siswa_model")->searchData($_POST));
	}
}