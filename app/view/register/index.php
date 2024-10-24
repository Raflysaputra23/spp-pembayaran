		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<div id="toggle-form" class="max-w-[400px] mx-auto flex gap-4 items-center mb-6">
				<button id="btn-manual" type="button" class="btn-outline-primary w-[100%]">User</button>
				<button id="btn-otomatis" type="button" class="btn-outline-primary w-[100%]">Via File</button>
				<button id="btn-admin" type="button" class="btn-primary w-[100%]">Admin</button>
			</div>
			<form id="Manual-form" action="<?=Constant::DIRNAME?>register/registerSingleUser" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4 hidden" method="post" autocomplete="off">
				<h1 class="text-center text-4xl tillana text-shadow text-red-500 mb-10">Register</h1>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="nisn" id="nisn" class="control-input p-3 pb-2 pe-10 focus-input" inputmode="numeric" pattern="\d*" required>
					<label for="nisn" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">NISN</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="namaLengkap" id="namaLengkap" class="control-input p-3 pb-2 pe-10 focus-input" required>
					<label for="namaLengkap" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Nama Lengkap</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<select name="jenkel" id="jenkel" class="control-input p-3 pb-2 focus-input" required>
						<option value="" readonly></option>
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
					<label for="jenkel" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition">Jenis Kelamin</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
				</div>
				<div class="flex items-center gap-2">
					<div class="form-group mt-6 poppins relative w-[100%]">
						<select name="kelas" id="kelas" class="control-input p-3 pb-2 focus-input" required>
							<option value="" readonly></option>
							<option value="12">12</option>
							<option value="10">10</option>
						</select>
						<label for="kelas" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition">kelas</label>
						<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					</div>
					<div class="form-group mt-6 poppins relative w-[100%]">
						<select name="jurusan" id="jurusan" class="control-input p-3 pb-2 focus-input uppercase	" required>
							<option value="" readonly></option>
							<option value="AK" class="uppercase">ak</option>
							<option value="RPL" class="uppercase">rpl</option>
						</select>
						<label for="jurusan" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition">jurusan</label>
						<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					</div>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="date" name="tanggalLahir" id="tanggalLahir" class="control-input p-3 pb-2 pe-10 focus-input check-value" required>
					<label for="tanggalLahir" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Tanggal Lahir</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 my-4 poppins">
					<button type="submit" class="btn-danger w-[100%]">Register</button>
				</div>
				<div class="form-group my-5 poppins flex items-center gap-10">
					<hr class="border border-slate-300 w-[100%] rounded-md"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group my-4 poppins">
					<a href="<?=Constant::DIRNAME?>login" class="btn-primary w-[100%]">Login</a>
				</div>
			</form>
			<form id="Otomatis-form" action="<?=Constant::DIRNAME?>register/registerAllUser" method="post" enctype="multipart/form-data" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4 hidden">
				<h1 class="text-center text-4xl tillana text-shadow text-red-500 mb-10">Register</h1>
				<div class="form-group mt-6 poppins relative">
					<input type="file" name="file-csv" id="file-csv" class="control-input p-3 pb-2 pe-10 check-value" required>
					<label for="file-csv" class="absolute bottom-[1.1rem] start-[.7rem] capitalize transition cursor-text">file CSV</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 my-4 poppins">
					<button type="submit" class="btn-danger w-[100%]">Register</button>
				</div>
				<div class="form-group my-5 poppins flex items-center gap-10">
					<hr class="border border-slate-300 w-[100%] rounded-md"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group my-4 poppins">
					<a href="<?=Constant::DIRNAME?>login" class="btn-primary w-[100%]">Login</a>
				</div>
			</form>
			<form id="Admin-form" action="<?=Constant::DIRNAME?>register/registerSingleAdmin" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4" method="post" autocomplete="off">
				<h1 class="text-center text-4xl tillana text-shadow text-red-500 mb-10">Register</h1>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="username" id="username" class="control-input p-3 pb-2 pe-10 focus-input" required>
					<label for="username" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Username</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="namaLengkap" id="namaLengkap2" class="control-input p-3 pb-2 pe-10 focus-input" required>
					<label for="namaLengkap2" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Nama Lengkap</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="email" name="email" id="email" class="control-input p-3 pb-2 pe-10 focus-input" required>
					<label for="email" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Email</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-at absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="notelp" id="notelp" class="control-input p-3 pb-2 pe-10 focus-input" required>
					<label for="notelp" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">No. Telp</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-phone absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="password" name="password" id="password3" class="control-input p-3 pb-2 pe-10 focus-input" minlength="4" autocomplete="new-password" required>
					<label for="password3" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">password</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="password" name="password2" id="password4" class="control-input p-3 pb-2 pe-10 focus-input" minlength="4" autocomplete="new-password" required>
					<label for="password4" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Confirm Password</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 my-4 poppins">
					<button type="submit" class="btn-danger w-[100%]">Register</button>
				</div>
				<div class="form-group my-5 poppins flex items-center gap-10">
					<hr class="border border-slate-300 w-[100%] rounded-md"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group my-4 poppins">
					<a href="<?=Constant::DIRNAME?>login" class="btn-primary w-[100%]">Login</a>
				</div>
			</form>
		</section>