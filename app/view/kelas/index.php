		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow dark:bg-slate-800 ">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">Kelas</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href="" class="dark:text-slate-300"></a>
				</div>
			</div>
			<div class="my-3 flex justify-between poppins">
				<a id="btn-back" href="<?=Constant::DIRNAME?>dashboard" class="btn-primary text-sm shadow"><i class="bx bx-left-arrow-alt text-xl md:text-sm"></i><p class="hidden md:inline-block">Kembali</p></a>
				<div class="flex items-center gap-2">
					<?php if($_SESSION["Role"] == "admin") : ?>
					<a id="btn-jurusan" href="" class="btn-primary text-sm shadow"><i class="bx bx-plus text-xl md:text-sm"></i><p class="hidden md:inline-block">Tambah Jurusan</p></a>
					<?php endif; ?>
				</div>
			</div>
			<?php if($_SESSION["Role"] == "admin") : ?>
			<form id="form-jurusan" action="<?=Constant::DIRNAME?>kelas/tambahJurusan" method="post" class="my-3 bg-white rounded-md shadow p-4 poppins h-0 overflow-hidden hidden dark:bg-slate-800 dark:text-slate-200">
				<div class="grid grid-cols-[1fr] md:grid-cols-3 gap-5">
					<div class="form-group my-1">
						<label for="jurusan">Nama Jurusan</label>
						<input type="text" name="namaJurusan" class="control-input">
					</div>
					<div class="form-group my-1">
						<label for="singkatanJurusan">Singkatan Jurusan</label>
						<input type="text" name="singkatanJurusan" class="control-input uppercase">
					</div>
					<div class="form-group my-1">
						<label for="">Harga SPP</label>
						<input type="number" name="hargaSpp" class="control-input">
					</div>
				</div>
				<button type="submit" class="btn-primary text-sm mt-2">Submit</button>
			</form>
			<?php endif; ?>
			<div class="mt-10 grid grid-cols-[1fr] md:grid-cols-[1fr_1fr_1fr] lg:grid-cols-[1fr_1fr_1fr_1fr] gap-3">
				<?php foreach ($data["dataJurusan"] as $jurusan) : ?>
				<div class="card grid grid-cols-[40%_60%] md:grid-cols-[40%_60%] items-start poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="rounded-md bg-blue-700 py-4 flex h-[100%]">
						<i class="bx bx-user m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4 flex justify-center items-center flex-col gap-1">
						<h2 class="text-2xl font-bold"><?=$jurusan["TotalSiswa"]?></h2>
						<p class="text-sm text-slate-700 text-center capitalize dark:text-slate-300"><?=$jurusan["SingkatanJurusan"]?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="mt-10 w-[100%] md:w-[80%] lg:w-[60%] mx-auto poppins">
				<canvas id="chartKelas"></canvas>
			</div>
		</section>