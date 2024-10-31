		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<?php if($data["dataLengkap"]["x"] != $data["dataLengkap"]["n"]) : ?>
			<div class="alert poppins p-4 bg-yellow-300 rounded-md text-white w-100 relative mb-4 overflow-hidden">
				<h1 class="text-black flex justify-between"><span>Lengkapi profil anda!</span><span><?=$data["dataLengkap"]["x"]."/".$data["dataLengkap"]["n"];?></span></h1>
				<div class="load-bar border-2 border-yellow-700 absolute bottom-0 start-0 end-0" style="width:<?=($data["dataLengkap"]["x"] / $data["dataLengkap"]["n"]) * 100?>%;"></div>
			</div>
			<?php endif; ?>
            <div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">Profil</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
            <form id="form-profil" action="<?=Constant::DIRNAME?>profil/setProfil/<?=$_SESSION["Role"]?>" class="grid grid-cols-[1fr] lg:grid-cols-[350px_1fr] my-8 gap-8 items-center" method="post" enctype="multipart/form-data">
				<div class="w-[60%] md:w-[50%] lg:w-[80%] mx-auto relative">
					<img id="plate-foto" src="<?=Constant::DIRNAME?>img/<?=$data["dataUser"]["Foto"]?>" alt="" class="aspect-[3/4] shadow rounded-md">
					<div class="absolute border bg-blue-700 text-white w-12 h-12 rounded-full -end-[15px] -bottom-[15px]">
						<input id="upload-foto" type="file" name="file-gambar" id="file-gambar" class="absolute end-0 start-0 top-0 bottom-0 opacity-0 z-[2] cursor-pointer">
						<input type="hidden" name="file-gambar" value="<?=$data["dataUser"]["Foto"]?>">
						<i class="bx bx-camera start-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] absolute text-2xl z-[1] text-inherit cursor-pointer"></i>
					</div>
				</div>
				<div class="poppins">
					<div class="form-group mb-4">
						<?php if($_SESSION["Role"] == "user") : ?>
							<label for="nisn" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">NISN</label>
							<input type="number" name="nisn" value="<?=$data["dataUser"]["Nisn"]?>" max="10" class="control-input p-2 px-3 border-slate-300 read-only:bg-slate-200" readonly>
						<?php else: ?>
							<label for="nisn" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Username</label>
							<input type="text" name="username" value="<?=$data["dataUser"]["Username"]?>" max="10" class="control-input p-2 px-3 border-slate-300 read-only:bg-slate-200" readonly>
						<?php endif; ?>
					</div>
					<div class="form-group mb-4">	
						<label for="username" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Nama Lengkap</label>
						<input type="text" name="namaLengkap" value="<?=$data["dataUser"]["NamaLengkap"]?>" class="control-input p-2	px-3 border-slate-300" required>
					</div>
					<div class="md:flex md:gap-4 md:items-center">
						<div class="form-group mb-4 w-[100%]">
							<label for="email" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Email</label>
							<input type="email" name="email" value="<?=$data["dataUser"]["Email"]?>" class="control-input p-2 px-3 border-slate-300" required>
						</div>
						<?php if($_SESSION["Role"] == "user") : ?>
						<div class="form-group mb-4 w-[100%]">
							<label for="tanggalLahir" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Tanggal Lahir</label>
							<input type="date" name="tanggalLahir" value="<?=$data["dataUser"]["TanggalLahir"]?>" class="control-input p-2 px-3 border-slate-300" required>
						</div>
						<?php endif; ?>
					</div>
					<div class="flex gap-4 items-center">
						<div class="form-group mb-4 w-[100%]">
							<label for="notelp" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">No. Telp</label>
							<input type="text" name="notelp" id="notelp" value="<?=$data["dataUser"]["NoTelp"]?>" class="control-input p-2 px-3 border-slate-300" required>
						</div>
						<div class="form-group mb-4 w-[100%]">
							<label for="jenkel" class="mb-2 inline-block">Jenis Kelamin</label>
							<select name="jenkel" id="jenkel" class="control-input p-2 px-3 border-slate-300">
								<option value="" disabled>PILIH JENIS KELAMIN</option>
								<option value="laki-laki" <?=($data["dataUser"]["Jenkel"] == "laki-laki") ? "selected" : ""?>>Laki-Laki</option>
								<option value="perempuan" <?=($data["dataUser"]["Jenkel"] == "perempuan") ? "selected" : ""?>>Perempuan</option>
							</select>
						</div>
					</div>
					<?php if(isset($data["dataUser"]["Kelas"]) && isset($data["dataUser"]["Jurusan"])) : ?>
					<div class="flex gap-4 items-center">
						<div class="form-group mb-4 shrink w-[100%]">
							<label for="kelas" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Kelas</label>
							<input type="text" name="kelas" id="kelas" value="<?=$data["dataUser"]["Kelas"]?>" class="control-input p-2 px-3 border-slate-300 read-only:bg-slate-200" readonly>
						</div>	
						<div class="form-group mb-4 shrink w-[100%]">
							<label for="jurusan" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Jurusan</label>
							<input type="text" name="jurusan" id="jurusan" value="<?=$data["dataUser"]["NamaJurusan"]?>" class="control-input p-2 px-3 border-slate-300 uppercase read-only:bg-slate-200" readonly>	
						</div>
					</div>
					<?php endif; ?>
					<div class="">
						<button type="submit" class="btn-primary text-sm">Simpan <i class="bx bx-save"></i></button>
					</div>
					
				</div>
			</form>

			<button type="button" data-modal="modalBox" data-modal-box="modalBox1" data-modal-title="Ganti Password" class="btn-outline-primary text-lg flex items-center gap-3 p-2 rounded-md poppins fixed end-[5%] bottom-[5%]" title="Ganti password"><i class="bx bx-lock"></i></button>
			<section data-modal-static="off" class="hidden">
				<div id="modalBox1" data-modal-size="400" class="poppins" style="width: 500px">
					<form id="form-ubah-password" action="" method="post">
						<header class="mb-5 pb-3 border-b border-slate-400 flex items-center justify-between">
							<h1 class="">Ganti password <i class="bx bx-lock"></i></h1>
							<button data-close-box="modalBox" type="button"><i class="bx bx-x text-2xl hover:text-red-500"></i></button>
						</header>
						<div class="form-group mb-4 w-[100%]">
							<label for="passwordLama" class="mb-2 inline-block">Masukkan password lama</label>
							<input type="password" name="passwordLama" id="passwordLama" class="control-input p-2 px-3 border-slate-300" autocomplete="new-password">	
						</div>
						<div class="mb-4 w-[100%]">
							<div class="form-group mb-4 shrink w-[100%]">
								<label for="passwordBaru" class="mb-2 inline-block">Masukkan password baru</label>
								<input type="password" name="passwordBaru" id="passwordBaru" class="control-input p-2 px-3 border-slate-300" autocomplete="new-password">	
							</div>
							<div class="form-group mb-4 shrink w-[100%]">
								<label for="password2" class="mb-2 inline-block">Confirm password</label>
								<input type="password" name="password2" id="password2" class="control-input p-2 px-3 border-slate-300" autocomplete="new-password">	
							</div>
						</div>
						<footer class="mt-6 pt-3 border-t border-slate-400 items-center flex justify-between">
							<button type="submit" class="btn-primary text-sm">Kirim</button>
							<input type="hidden" name="UserID" value="<?=$_SESSION["UserID"]?>">
							<input type="hidden" name="Role" value="<?=$_SESSION["Role"]?>">
							<span id="alert" class="text-sm"></span>
						</footer>
					</form>
				</div>
			</section>
			
        </section>