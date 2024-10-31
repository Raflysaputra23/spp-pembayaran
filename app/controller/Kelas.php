<?php 


class Kelas extends Controllers {
	public function index() {
		$data['izinLogout'] = Permission::izinLogout();
		$data["dataJurusan"] = $this->model("Kelas_model")->getJurusan();
		$data['judul'] = "Kelas";
		$this->view('templates/header', $data);
		$this->view('kelas/index', $data);
		$this->view('templates/footer');

	}

	public function tambahJurusan() {
		if($this->model('Kelas_model')->tambahJurusan($_POST) > 0) {
			Flasher::setFlash('<p class="poppins text-sm">Data berhasil ditambahkan!</p>', "success");
			header("location:".Constant::DIRNAME.'kelas');
			exit;
		} else {
			Flasher::setFlash('<p class="poppins text-sm">Data gagal ditambahkan!</p>', "error");
			header("location:".Constant::DIRNAME.'kelas');
			exit;
		}
	}
}