<?php 


class Siswa extends Controllers {
	public function index($jenkel = false) {
		$data['izinLogout'] = Permission::izinLogout();
		$data["dataUser"] = ["siswa" => $this->model("Dashboard_model")->getDataUserByKategori(($jenkel != "laki-laki" && $jenkel != "perempuan") ? "semua" : $jenkel), "no" => 1];
		$data['judul'] = "Siswa";
		$this->view('templates/header',$data);
		$this->view('siswa/index', $data);
		$this->view('templates/footer');
	}	

	public function searchData() {
		echo json_encode($this->model("Siswa_model")->searchData($_POST));
	}

	public function getDataOrder() {
		echo json_encode($this->model("Siswa_model")->getDataOrder(json_decode(file_get_contents('php://input'))));
	}
	
	public function getDataSort() {
		echo json_encode($this->model("Siswa_model")->getDataSort(json_decode(file_get_contents('php://input'))->data));
	}

	public function hapusSiswa() {
        echo json_encode($this->model("Siswa_model")->hapusSiswa(json_decode(file_get_contents('php://input'))->SiswaID));
    }
}