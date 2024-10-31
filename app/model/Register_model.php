<?php

class Register_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function registerSingleUser($data) {
        $nisn = htmlspecialchars($data["nisn"]);
        $namaLengkap = htmlspecialchars(stripcslashes($data["namaLengkap"]));
        $password = htmlspecialchars(stripcslashes($data["nisn"]));
        $jenkel = htmlspecialchars(stripcslashes($data["jenkel"]));
        $kelas = htmlspecialchars(stripcslashes($data["kelas"]));
        $jurusan = htmlspecialchars(stripcslashes($data["jurusan"]));
        $tanggalLahir = htmlspecialchars(stripcslashes($data["tanggalLahir"]));

        // CEK NISN USER
        if($this->getDataUserSingle($nisn, "siswa") != false) {
            Flasher::setFlash('<p class="poppins text-sm">Siswa mempunyai nisn yang sama!</p>',"error");
            header('location: '.Constant::DIRNAME.'register');
            exit();
        }

        // HASH PASSWORD
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $this->db->query('INSERT INTO siswa (Nisn, NamaLengkap, Password, Jenkel, Kelas, Jurusan, TanggalLahir) VALUES (:nisn ,:namaLengkap ,:password ,:jenkel ,:kelas ,:jurusan , :tanggalLahir)');
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
        $username = htmlspecialchars(stripcslashes(strtolower($data["username"])));
        $namaLengkap = htmlspecialchars(stripcslashes($data["namaLengkap"]));
        $email = htmlspecialchars(stripcslashes($data["email"]));
        $notelp = htmlspecialchars(stripcslashes($data["notelp"]));
        $password = htmlspecialchars(stripcslashes($data["password"]));
        $password2 = htmlspecialchars(stripcslashes($data["password2"]));

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
        foreach(fgetcsv($handle) as $key => $h) {
            $header[$key] = strtolower($h); 
        }
        while($data = fgetcsv($handle)) {
            $row = array_combine($header, $data);
            $password = password_hash($row["nisn"], PASSWORD_DEFAULT);
            if($this->getDataUserSingle($row["nisn"], "siswa") != false) {
                Flasher::setFlash('<p class="poppins text-sm">Salah satu siswa mempunyai nisn yang sama!</p>',"error");
                header('location: '.Constant::DIRNAME.'register');
                exit();
            }
            try {
                $this->db->query('INSERT INTO siswa (Nisn, NamaLengkap, Password, Jenkel, Kelas, Jurusan, tanggalLahir) VALUES (:nisn ,:namaLengkap ,:password ,:jenkel ,:kelas ,:jurusan , :tanggalLahir)');
                $this->db->bind('nisn', htmlspecialchars(stripcslashes($row["nisn"])));
                $this->db->bind('namaLengkap', htmlspecialchars(stripcslashes($row["username"])));
                $this->db->bind('password', htmlspecialchars(stripcslashes($password)));
                $this->db->bind('jenkel', htmlspecialchars(stripcslashes($row["jenkel"])));
                $this->db->bind('kelas', htmlspecialchars(stripcslashes($row["kelas"])));
                $this->db->bind('jurusan', htmlspecialchars(stripcslashes($row["jurusan"])));
                $this->db->bind('tanggalLahir', htmlspecialchars(stripcslashes($row["tanggal-lahir"])));
                $this->db->execute();
            } catch (PDOException $e) {
                echo "Error : ". $e->getMessage();
            }
        }

        return $this->db->rowCount();
        fclose($handle);
    }

    public function getDataUserSingle($data, $table) {
        try {
            if($table == "siswa") {
                $this->db->query("SELECT * FROM siswa WHERE Nisn = :user");
                $this->db->bind("user", $data);
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

    public function getJurusan() {
        try {
            $this->db->query("SELECT * FROM jurusan");
            $this->db->execute();
            return $this->db->resultSet();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}