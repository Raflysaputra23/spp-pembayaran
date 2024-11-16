		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<?php if($_SESSION["Role"] == "user") : ?>
            <div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">SPP</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
			<div class="grid grid-cols-[1fr] md:grid-cols-[1.2fr_1fr] gap-4 my-3">
				<form id="form-spp" action="" class="bg-white rounded-md grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 dark:bg-slate-900" method="post">
					<?php foreach ($data["bulan"] as $bulan) : ?>
					<div class="card poppins flex flex-col items-center gap-2 relative <?=($data["bulanNow"] == $bulan["NamaBulan"]) ? ($bulan["PBulanID"]) ? "border-2 border-green-500" : "border-2 border-red-500" : ''?> dark:bg-slate-800 dark:text-slate-200">
						<input type="checkbox" name="pilihan[]" data-bulan-id="<?=$bulan["BulanID"]?>" data-siswa-id ="<?=$bulan["Nisn"]?>" data-harga="<?=$data["harga"]["HargaJurusan"]?>" value="<?=$bulan["NamaBulan"]?>" data-nama="<?=$bulan["NamaLengkap"]?>" data-email="<?=$bulan["Email"]?>" data-notelp="<?=$bulan["NoTelp"]?>" class="absolute start-[5px] top-[5px] <?=(($bulan["PBulanID"]) ? "hidden" : "")?>">
						<h1 class="font-bold"><?=$bulan["NamaBulan"]?></h1>
						<p class="<?=($bulan["PBulanID"]) ? 'bg-green-500' : 'bg-red-500'?> rounded-md p-1 px-2 text-white" style="font-size: 0.7rem;"><?=(($bulan["PBulanID"]) ? "Lunas" : "Belum Lunas")?></p>
					</div>
					<?php endforeach; ?>
				</form>
				<div class="bg-white rounded-md overflow-hidden p-3 relative dark:bg-slate-800 dark:text-slate-200">
					<div class="alert-primary poppins text-sm relative dark:bg-slate-700">
						<i class="fa fa-exclamation absolute -rotate-[30deg] text-2xl -top-[12px] -start-[4px]"></i>
						<h2>Silahkan membayar spp anda tepat waktu!</h2>
					</div>
					<div class="grid grild-cols-1 md:grid-cols-2 gap-4 poppins my-2 mb-20">
						<div class="flex flex-col items-center gap-1 bg-blue-700 p-2 rounded-md w-[100%] shadow dark:bg-slate-700">
							<p class="text-white font-bold text-md">SPP 1 bulan</p>
							<p class="text-sm text-white">Rp. <?= number_format($data["harga"]["HargaJurusan"],0,'.','.')?></p>
						</div>
						<div class="flex flex-col items-center gap-1 bg-blue-700 p-2 rounded-md w-[100%] shadow dark:bg-slate-700">
							<p class="text-white font-bold text-md">Total Tagihan</p>
							<p class="text-sm text-white">Rp <?= number_format(($data["harga"]["HargaJurusan"] * (12 - count($data["totalHarga"]))),0,'.','.')?></p>
						</div>
					</div>
					<div class="absolute bottom-0 start-0 end-0 p-2 bg-blue-700 flex items-center gap-3 dark:bg-slate-700">
						<p id="total-harga" class="w-[70%] text-center text-lg text-white poppins">Rp. 0</p>
						<button id="btn-spp" type="submit" class="btn-primary bg-green-500 w-[30%] shadow disabled" disabled>Bayar</button>
					</div>
				</div>
			</div>
			<?php else: ?>
			<div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">Rekap</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
			<div class="alert-primary poppins text-sm relative my-2 dark:bg-slate-700 dark:text-slate-200">
				<i class="fa fa-exclamation absolute -rotate-[30deg] text-2xl -top-[12px] -start-[4px]"></i>
				<h2>Rekap Siswa Pembayaran SPP</h2>
			</div>
			<section class="my-2 mb-6 poppins dark:text-slate-200">
				<form id="form-search" action="" method="post" class="flex items-center gap-2">
					<input type="search" name="search" class="control-input border text-sm border-slate-300 p-2" placeholder="Cari siswa..."/>
					<button type="submit" class="btn-primary"><i class="bx bx-search"></i></button>
				</form>
			</section>
			<?php if($data["getRekapSiswa"] != false) : ?>
			<div id="plate-card-siswa" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 my-3 relative">
				<?php foreach ($data["getRekapSiswa"] as $siswa) : ?>
				<div class="card bg-white rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
					<section class="flex gap-3 items-center">
						<header class="w-[40%]">
							<img src="<?=Constant::DIRNAME ?>img/<?=$siswa["Foto"]?>" alt="" class="aspect-auto w-40 h-40 shadow-md rounded-md overflow-hidden">
						</header>
						<section class="w-[60%] poppins">
							<h1 class="font-bold"><?=$siswa["NamaLengkap"]?></h1>
							<p class="text-sm text-slate-700 mb-2 dark:text-slate-400"><?=$siswa["Kelas"]?> <?=$siswa["Jurusan"]?></p>
							<p class="text-sm">Rp. <?= number_format($siswa["HargaJurusan"],0,'.','.')?> <span class="text-slate-600 dark:text-slate-400" style="font-size: 12px;">- SPP</span></p>
							<div class="flex my-1 gap-1">
								<a href="<?=Constant::DIRNAME ?>spp/detail/<?=$siswa["Nisn"]?>" class="btn-primary text-sm w-[20%]"><i class="fa fa-eye"></i></a>
							</div>
						</section>
					</section>
				</div>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
				<h1 class="absolute start-[50%] -translate-x-[50%] poppins text-xl flex items-center gap-3 dark:text-slate-200">Siswa tidak ditemukan <i class="bx bx-search"></i></h1>
			<?php endif; ?>
			<?php endif; ?>
        </section>