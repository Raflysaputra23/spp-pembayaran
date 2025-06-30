<?php

class Register_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function registerSingleUser($data) {
        $nisn = htmlspecialchars(trim($data["nisn"]));
        $namaLengkap = htmlspecialchars(trim(stripcslashes($data["namaLengkap"])));
        $password = htmlspecialchars(trim(stripcslashes($data["nisn"])));
        $jenkel = htmlspecialchars(trim(stripcslashes($data["jenkel"])));
        $kelas = htmlspecialchars(trim(stripcslashes($data["kelas"])));
        $jurusan = htmlspecialchars(trim(stripcslashes($data["jurusan"])));
        $tanggalLahir = htmlspecialchars(trim(stripcslashes($data["tanggalLahir"])));
        
        // CEK NISN USER
        if($this->getDataUserSingle($nisn, "siswa") != false) {
            Flasher::setFlash('<p class="poppins text-sm">Siswa mempunyai nisn yang sama!</p>',"error");
            header('location: '.Constant::DIRNAME.'register');
            exit();
        }

        // HASH PASSWORD
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $this->db->query('INSERT INTO siswa (Nisn, NamaLengkap, Password, Jenkel, Kelas, JurusanID, TanggalLahir) VALUES (:nisn ,:namaLengkap ,:password ,:jenkel ,:kelas ,:jurusan , :tanggalLahir)');
            $this->db->bind('nisn', $nisn);
            $this->db->bind('namaLengkap', $namaLengkap);
            $this->db->bind('password', $password);
            $this->db->bind('jenkel', $jenkel);
            $this->db->bind('kelas', $kelas);
            $this->db->bind('jurusan', $jurusan);
            $this->db->bind('tanggalLahir', $tanggalLahir);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
        }
    }
    public function registerSingleAdmin($data) {
        $username = htmlspecialchars(trim(stripcslashes(strtolower($data["username"]))));
        $namaLengkap = htmlspecialchars(trim(stripcslashes($data["namaLengkap"])));
        $email = htmlspecialchars(trim(stripcslashes($data["email"])));
        $notelp = htmlspecialchars(trim(stripcslashes($data["notelp"])));
        $password = htmlspecialchars(trim(stripcslashes($data["password"])));
        $password2 = htmlspecialchars(trim(stripcslashes($data["password2"])));

        // CEK USERNAME USER
        if($this->getDataUserSingle($username, 'users') != false) {
            Flasher::setFlash('<p class="poppins text-sm">Username sudah terdaftar!</p>',"error");
            header('location: '.Constant::DIRNAME.'register');
            exit();
        }

        // CEK PASSWORD
        if($password != $password2) {
            Flasher::setFlash('<p class="poppins text-sm">Pastikan password sama!</p>',"error");
            header('location: '.Constant::DIRNAME.'register');
            exit();
        }

        // HASH PASSWORD
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $this->db->query('INSERT INTO users (Username, NamaLengkap, Email, NoTelp, Password) VALUES (:username, :namaLengkap, :email, :notelp, :password)');
            $this->db->bind('username', $username);
            $this->db->bind('namaLengkap', $namaLengkap);
            $this->db->bind('email', $email);
            $this->db->bind('notelp', $notelp);
            $this->db->bind('password', $password);
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            echo "Error : ". $e->getMessage();
        }
    }

    public function registerAllUser($data) {
        $pathFile = $data["file-csv"]["tmp_name"];
        $extensi = $data["file-csv"]["name"];
        $extensi = pathinfo($extensi, PATHINFO_EXTENSION);

        // CEK INI FILE
        if(!is_file($pathFile)) {
            Flasher::setFlash('<p class="poppins text-sm">Pastikan hanya file yang diupload!</p>',"error");
			header('location: '.Constant::DIRNAME.'register');
			exit();
        }

        // CEK FILE CSV
        if($extensi != "csv") {
            Flasher::setFlash('<p class="poppins text-sm">Pastikan hanya file CSV!</p>',"error");
			header('location: '.Constant::DIRNAME.'register');
			exit();
        }
        
        // AMBIL DATA DI FILE
        $handle = fopen($pathFile, 'r');
        foreach(fgetcsv($handle,0,',') as $key) {
            $header[] = htmlspecialchars(stripslashes(strtolower(str_replace(" ", "", $key)))); 
        }
        try {
            $this->db->beginTransaction();
                while($data = fgetcsv($handle,0,',')) {
                    $row = array_combine($header, $data);
                    $password = password_hash($row["nisn"], PASSWORD_DEFAULT);
                    if($this->getDataUserSingle($row["nisn"], "siswa") != false) {
                        Flasher::setFlash('<p class="poppins text-sm">Salah satu siswa mempunyai nisn yang sama!</p>',"error");
                        header('location: '.Constant::DIRNAME.'register');
                        exit();
                    }
                    // CEK JURUSAN
                    $data = $this->getJurusan("cek",strtoupper($row["jurusan"]));
                    if($data != false) {
                        $row["jurusan"] = $data["JurusanID"];
                    } else {
                        Flasher::setFlash('<p class="poppins text-sm">Jurusan tidak ditemukan!</p>',"error");
                        header('location: '.Constant::DIRNAME.'register');
                        exit();
                    }
                
                    $this->db->query('INSERT INTO siswa (Nisn, NamaLengkap, Password, Jenkel, Kelas, JurusanID, TanggalLahir) VALUES (:nisn ,:namaLengkap ,:password ,:jenkel ,:kelas ,:jurusan , :tanggalLahir)');
                    $this->db->bind('nisn', htmlspecialchars(stripslashes($row["nisn"])));
                    $this->db->bind('namaLengkap', htmlspecialchars(stripslashes($row["namalengkap"])));
                    $this->db->bind('password', htmlspecialchars($password));
                    $this->db->bind('jenkel', htmlspecialchars(strtolower($row["jenkel"] || $row["jeniskelamin"])));
                    $this->db->bind('kelas', htmlspecialchars($row["kelas"]));
                    $this->db->bind('jurusan', htmlspecialchars(stripslashes($row["jurusan"])));
                    $this->db->bind('tanggalLahir', htmlspecialchars(date("Y-m-d", strtotime($row["tanggallahir"]))));
                    $this->db->execute();
                }
            $this->db->commit();
            return $this->db->rowCount();
            fclose($handle);
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
        }
    }

    public function getDataUserSingle($data, $table) {
        try {
            if($table == "siswa") {
                $this->db->query("SELECT * FROM siswa WHERE Nisn = :nisn");
                $this->db->bind("nisn", $data);
                $this->db->execute();
                return $this->db->single();
            } else if($table == "users"){
                $this->db->query("SELECT * FROM users WHERE Username = :user");
                $this->db->bind("user", $data);
                $this->db->execute();
                return $this->db->single();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getJurusan($get,$jurusan = true) {
        try {
            if($get == "all") {
                $this->db->query("SELECT * FROM jurusan");
                $this->db->execute();
                return $this->db->resultSet();
            } else {
                $this->db->query("SELECT JurusanID FROM jurusan WHERE NamaJurusan = :NamaJurusan OR SingkatanJurusan = :SingkatanJurusan");
                $this->db->bind("NamaJurusan", $jurusan);
                $this->db->bind("SingkatanJurusan", $jurusan);
                $this->db->execute();
                return $this->db->single();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}