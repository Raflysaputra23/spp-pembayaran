		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<h1 class="text-2xl md:text-3xl tillana text-blue-700 text-shadow">Aplikasi Pembayaran SPP</h1>
			<section class="bg-white shadow-lg p-4 my-2 rounded-md border-l-[7px] border-blue-700 dark:bg-slate-800 lg:p-5">
				<h1 class="poppins text-sm text-slate-600 dark:text-slate-300">Selamat datang diaplikasi pembayaran SPP. anda login sebagai <span class="font-bold text-blue-700"><?=$_SESSION["Role"]?></span></h1>
			</section>
			<div class="my-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
				<div class="card bg-white poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="items-center grid grid-cols-[30%_70%] md:grid-cols-[40%_60%]">
						<div class="py-5 flex bg-blue-700 rounded-md">
							<i class='bx bx-male-female text-3xl m-auto text-white'></i>
						</div>
						<div class="px-4">
							<h2 class="lg:text-sm  text-slate-600 dark:text-slate-300">Total Siswa/i</h2>
							<p class="font-bold"><?=count($data["dataUser"]["all"]);?></p>
						</div>
					</div>
					<hr class="w-100 mt-4 mb-2">
					<a href="<?=Constant::DIRNAME?>siswa" class="flex items-center justify-center text-blue-700 group text-md md:text-sm">Lebih banyak <i class="bx bx-chevron-right group-hover:translate-x-[.3rem] transition"></i></a>
				</div>
				<div class="card bg-white poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="items-center grid grid-cols-[30%_70%] md:grid-cols-[40%_60%]">
						<div class="py-5 flex bg-red-500 rounded-md">
							<i class='bx bx-female-sign text-3xl m-auto text-white'></i>
						</div>
						<div class="px-4">
							<h2 class="text-sm text-slate-600 dark:text-slate-300">Total Siswa</h2>
							<p class="font-bold"><?=count($data["dataUser"]["laki-laki"]);?></p>
						</div>
					</div>
					<hr class="w-100 mt-4 mb-2">
					<a href="<?=Constant::DIRNAME?>siswa/laki-laki" class="flex items-center justify-center text-blue-700 group text-md md:text-sm">Lebih banyak <i class="bx bx-chevron-right group-hover:translate-x-[.3rem] transition"></i></a>
				</div>
				<div class="card bg-white poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="items-center grid grid-cols-[30%_70%] md:grid-cols-[40%_60%]">
						<div class="py-5 flex bg-pink-500 rounded-md">
							<i class='bx bx-male-sign text-3xl m-auto text-white'></i>
						</div>
						<div class="px-4">
							<h2 class="text-sm text-slate-600 dark:text-slate-300">Total Siswi</h2>
							<p class="font-bold"><?=count($data["dataUser"]["perempuan"]);?></p>
						</div>
					</div>
					<hr class="w-100 mt-4 mb-2">
					<a href="<?=Constant::DIRNAME?>siswa/perempuan" class="flex items-center justify-center text-blue-700 group text-md md:text-sm">Lebih banyak <i class="bx bx-chevron-right group-hover:translate-x-[.3rem] transition"></i></a>
				</div>
				<div class="card bg-white poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="items-center grid grid-cols-[30%_70%] md:grid-cols-[40%_60%]">
						<div class="py-5 flex bg-cyan-400 rounded-md">
							<i class='bx bx-history text-3xl m-auto text-white'></i>
						</div>
						<div class="px-4">
							<h2 class="text-sm text-slate-600 dark:text-slate-300">History</h2>
							<p class="font-bold"><?= count($data["history"])?></p>
						</div>
					</div>
					<hr class="w-100 mt-4 mb-2">
					<a href="<?=Constant::DIRNAME?>history" class="flex items-center justify-center text-blue-700 group text-md md:text-sm">Lebih banyak <i class="bx bx-chevron-right group-hover:translate-x-[.3rem] transition"></i></a>
				</div>
			</div>
			<?php if($_SESSION["Role"] == "user") : ?>
			<div class="my-4 grid grid-cols-[1fr] md:grid-cols-[1fr_1fr] gap-4">
			
				<div class="card bg-slate-150 poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="grid grid-cols-[20%_80%] md:grid-cols-[30%_70%] items-start">
						<div class="rounded-md bg-yellow-500 py-4 flex">
							<i class="bx bx-money m-auto text-3xl text-white"></i>
						</div>
						<div class="px-4">
							<h2 class="dark:text-slate-300">Pembayaran SPP bulan ini</h2>
							<p class="font-bold">Rp. <?= ($data["lunas"]) ? "0" : number_format($data["tagihan"]["HargaJurusan"],0,'.','.')?></p>
							<p class="bg-<?= ($data["lunas"]) ? "green-500" : "red-500"?> rounded-md p-1 px-2 text-white text-sm inline-block"><?= ($data["lunas"]) ? "Lunas" : "Belum Lunas"?></p>
						</div>
					</div>
					<hr class="w-100 mt-4 mb-2">
					<a href="<?=Constant::DIRNAME?>spp" class="flex items-center justify-center text-blue-700 group text-md md:text-sm">Lebih banyak <i class="bx bx-chevron-right group-hover:translate-x-[.3rem] transition"></i></a>
				</div>
				
				<div class="card bg-slate-150 poppins dark:bg-slate-800 dark:text-slate-200">
					<div class="grid grid-cols-[20%_80%] md:grid-cols-[30%_70%] items-start">
						<div class="rounded-md bg-green-500 py-4 flex">
							<i class="bx bx-money-withdraw m-auto text-3xl text-white"></i>
						</div>
						<div class="px-4">
							<h2 class="dark:text-slate-300">SPP Yang Dibayar</h2>
							<p class="font-bold">Rp. <?=number_format($data["tagihan"]["HargaJurusan"] * $data["tagihan"]["Lunas"],0,'.','.')?></p>
							<p class="text-sm text-red-500">Rp. - <?=number_format($data["tagihan"]["HargaJurusan"] * (12 - $data["tagihan"]["Lunas"]),0,'.','.')?></p>
						</div>
					</div>
					<hr class="w-100 mt-4 mb-2">
					<a href="<?=Constant::DIRNAME?>spp" class="flex items-center justify-center text-blue-700 group text-md md:text-sm">Lebih banyak <i class="bx bx-chevron-right group-hover:translate-x-[.3rem] transition"></i></a>
				</div>
				<?php endif; ?>
			</div>
		</section>

		<!-- CHART JS -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		