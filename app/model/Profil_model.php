<?php

class Profil_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function setProfil($data, $role) {
        try {
            if($role == "user") {
                $SiswaID = $_SESSION["UserID"];
                $foto = ($_FILES["file-gambar"]["error"] == 0) ? $this->uploadFileFoto($_FILES["file-gambar"], $data["file-gambar"]) : $data["file-gambar"];
                $namaLengkap = htmlspecialchars(stripcslashes($data["namaLengkap"])); 
                $email = htmlspecialchars(stripcslashes($data["email"]));
                $tanggalLahir = htmlspecialchars(stripslashes($data["tanggalLahir"]));
                $notelp = htmlspecialchars(stripslashes($data["notelp"]));
                $jenkel = htmlspecialchars(stripslashes($data["jenkel"]));

                $this->db->query("UPDATE siswa SET Foto = :foto, NamaLengkap = :namaLengkap, Email = :email, TanggalLahir = :tanggalLahir, NoTelp = :notelp, Jenkel = :jenkel WHERE SiswaID = :SiswaID");
                $this->db->bind("SiswaID", $SiswaID);
                $this->db->bind("foto", $foto);
                $this->db->bind("namaLengkap", $namaLengkap);
                $this->db->bind("email", $email);
                $this->db->bind("tanggalLahir", $tanggalLahir);
                $this->db->bind("notelp", $notelp);
                $this->db->bind("jenkel", $jenkel);
                $this->db->execute();
                if($this->db->rowCount() > 0) {
                    $dataUser = $this->getDataUserByID($SiswaID, $role);
                    $_SESSION["Username"] = $dataUser["NamaLengkap"];
                    $_SESSION["Foto"] = $dataUser["Foto"];
                    return 1;
                } else {
                    return 0;
                }
            } else if($role == "admin") {
                $UserID = $_SESSION["UserID"];
                $foto = ($_FILES["file-gambar"]["error"] == 0) ? $this->uploadFileFoto($_FILES["file-gambar"], $data["file-gambar"]) : $data["file-gambar"];
                $namaLengkap = htmlspecialchars(stripcslashes($data["namaLengkap"])); 
                $email = htmlspecialchars(stripcslashes($data["email"]));
                $notelp = htmlspecialchars(stripslashes($data["notelp"]));
                $jenkel = htmlspecialchars(stripslashes($data["jenkel"]));

                $this->db->query("UPDATE users SET Foto = :foto, NamaLengkap = :namaLengkap, Email = :email, NoTelp = :notelp, Jenkel = :jenkel WHERE UserID = :UserID");
                $this->db->bind("UserID", $UserID);
                $this->db->bind("foto", $foto);
                $this->db->bind("namaLengkap", $namaLengkap);
                $this->db->bind("email", $email);
                $this->db->bind("notelp", $notelp);
                $this->db->bind("jenkel", $jenkel);
                $this->db->execute();
                if($this->db->rowCount() > 0) {
                    $dataUser = $this->getDataUserByID($UserID, $role);
                    $_SESSION["Username"] = $dataUser["NamaLengkap"];
                    $_SESSION["Foto"] = $dataUser["Foto"];
                    return 1;
                } else {
                    return 0;
                }
            }
        } catch (PDOException $th) {
            echo $e->getMessage();
        }
    }

    public function uploadFileFoto($fileFoto, $fileFotoLama) {
        $tmp_name = $fileFoto["tmp_name"];
        $size = $fileFoto["size"];
        $extensi = $fileFoto["name"];
        
        // CEK EKTENSI
        $extensiValid = ["jpg","jpeg","png","webp"];
        $extensi = pathinfo($extensi, PATHINFO_EXTENSION);
        if(!in_array($extensi, $extensiValid)) {
            Flasher::setFlash('<p class="poppins text-sm">File harus berupa gambar!</p>', "error");
			header("location:".Constant::DIRNAME.'profil');
			exit();
        }

        // CEK SIZE GAMBAR
        if($size > 2000000) {
            Flasher::setFlash('<p class="poppins text-sm">Size gambar max 2 MB!</p>', "error");
			header("location:".Constant::DIRNAME.'profil');
			exit();
        }

        // ACAK NAMA GAMBAR
        $fileFotoBaru = uniqid().'.'.$extensi;
        $pathFoto = 'img/';

        // SIMPAN GAMBAR PADA FOLDER IMG
        move_uploaded_file($tmp_name, $pathFoto.$fileFotoBaru);

        // HAPUS FOTO JIKA DIGANTI
        if(file_exists($pathFoto.$fileFotoLama)) unlink($pathFoto.$fileFotoLama);
        return $fileFotoBaru;
    }

    public function getPassword($data) {
        try {
            $UserID = $data["UserID"];
            $role = $data["Role"];
            $passwordLama = htmlspecialchars(stripcslashes($data["passwordLama"]));
            $passwordBaru = htmlspecialchars(stripcslashes($data["passwordBaru"]));
            $password2 = htmlspecialchars(stripcslashes($data["password2"]));
            $dataUser = $this->getDataUserByID($UserID, $role);
            if(!password_verify($passwordLama, $dataUser["Password"])) return ["status" => "error","pesan" => "Password salah"];
            if($passwordBaru != $password2) return ["status" => "error","pesan" => "Password tidak sama"];
            if($passwordBaru == $passwordLama) return ["status" => "error","pesan" => "Passwordnya sama dengan password lama"];
            $passwordBaru = password_hash($passwordBaru, PASSWORD_DEFAULT);
            
            if($role == "admin") {
                $this->db->query("UPDATE users SET Password = :passwordBaru WHERE UserID = :UserID");
                $this->db->bind("passwordBaru", $passwordBaru);
                $this->db->bind("UserID", $UserID);
                $this->db->execute();
                return ["status" => "success", "pesan" => "Password berhasil diubah"];
            } else if($role == "user"){
                $this->db->query("UPDATE siswa SET Password = :passwordBaru WHERE SiswaID = :SiswaID");
                $this->db->bind("passwordBaru", $passwordBaru);
                $this->db->bind("SiswaID", $UserID);
                $this->db->execute();
                return ["status" => "success", "pesan" => "Password berhasil diubah"];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataUserByID($UserID, $role) {
        try {
            if($role == "user") {
                $this->db->query("SELECT * FROM siswa join jurusan WHERE siswa.Jurusan = jurusan.JurusanID AND SiswaID = :SiswaID");
                $this->db->bind("SiswaID", $UserID);
                $this->db->execute();
                return $this->db->single();
            } else if($role == "admin"){
                $this->db->query("SELECT * FROM users WHERE UserID = :UserID");
                $this->db->bind("UserID", $UserID);
                $this->db->execute();
                return $this->db->single();
            }
        } catch (PDOException $th) {
            echo $e->getMessage();
        }
    }
}