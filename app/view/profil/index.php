		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
            <div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">Profil</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
            <form id="form-profil" action="" class="grid grid-cols-[1fr] lg:grid-cols-[350px_1fr] my-8 gap-8 items-center" method="post">
				<div class="w-[60%] md:w-[50%] lg:w-[80%] mx-auto relative">
					<img src="<?=Constant::DIRNAME?>img/iconTitle.png" alt="" class="aspect-[3/4] shadow rounded-md">
					<div class="absolute border bg-blue-700 text-white w-12 h-12 rounded-full -end-[15px] -bottom-[15px]">
						<input type="file" name="file-gambar" id="file-gambar" class="absolute end-0 start-0 top-0 bottom-0 opacity-0 z-[2] cursor-pointer">
						<i class="bx bx-camera start-[50%] top-[50%] -translate-x-[50%] -translate-y-[50%] absolute text-2xl z-[1] text-inherit cursor-pointer"></i>
					</div>
				</div>
				<div class="poppins">
					<div class="form-group mb-4">
						<label for="nisn" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">NISN</label>
						<input type="number" name="nisn" max="10" class="control-input p-2	px-3 border-slate-300 read-only:bg-slate-200" readonly>
					</div>
					<div class="form-group mb-4">	
						<label for="username" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Nama Lengkap</label>
						<input type="text" name="username" class="control-input p-2	px-3 border-slate-300">
					</div>
					<div class="form-group mb-4">
						<label for="email" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Email</label>
						<input type="email" name="email" class="control-input p-2 px-3 border-slate-300">
					</div>
					<div class="flex gap-4 items-center">
						<div class="form-group mb-4 shrink w-[100%]">
							<label for="notelp" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">No. Telp</label>
							<input type="text" name="notelp" id="notelp" class="control-input p-2 px-3 border-slate-300">
						</div>
						<div class="form-group mb-4 shrink w-[100%]">
							<label for="jenkel" class="mb-2 inline-block">Jenis Kelamin</label>
							<select name="jenkel" id="jenkel" value="" class="control-input p-2 px-3 border-slate-300">
								<option value="" disabled>PILIH JENIS KELAMIN</option>
								<option value="laki-laki">Laki-Laki</option>
								<option value="perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="flex gap-4 items-center">
						<div class="form-group mb-4 shrink w-[100%]">
							<label for="kelas" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Kelas</label>
							<input type="text" name="kelas" id="kelas" value="" class="control-input p-2 px-3 border-slate-300 read-only:bg-slate-200" readonly>
						</div>	
						<div class="form-group mb-4 shrink w-[100%]">
							<label for="jurusan" class="mb-2 inline-block after:content-['*'] after:ms-1 after:text-red-500">Jurusan</label>
							<input type="text" name="jurusan" id="jurusan" value="" class="control-input p-2 px-3 border-slate-300 read-only:bg-slate-200" readonly>	
						</div>
					</div>
					<div class="">
						<button type="submit" class="btn-primary text-sm">Simpan <i class="bx bx-save"></i></button>
					</div>
					
				</div>
			</form>
        </section>