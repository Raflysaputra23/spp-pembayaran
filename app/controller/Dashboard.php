<?php 


class Dashboard extends Controllers {
	public function index() {

		$data['izinLogout'] = Permission::izinLogout();
		$data["dataUser"] = [
			"all" => $this->model("Dashboard_model")->getDataUserByKategori("semua"), 
			"laki-laki" => $this->model("Dashboard_model")->getDataUserByKategori("laki-laki"),
			"perempuan" =>	$this->model("Dashboard_model")->getDataUserByKategori("perempuan"),
		];
		$data["tagihan"] = $this->model("Spp_model")->getTagihan($_SESSION["UserID"]);
		$data["lunas"] = $this->model("Spp_model")->getLunas($_SESSION["UserID"]);
		$data['judul'] = "Dashboard";
		$this->view('templates/header', $data);
		$this->view('dashboard/index', $data);
		$this->view('templates/footer');

	}

	public function logout() {
		session_destroy();
		session_unset();
		unset($_SESSION);
		setcookie("cookie"," ", time() - 3600000 * 2, "/");
		setcookie("token"," ", time() - 3600000 * 2, "/");
		header('location:'.Constant::DIRNAME.'login');
		exit();
	}


}