        <section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
            <div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">History</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
            <div class="flex justify-end my-2">
				<button id="btn-sort" type="button" data-sort="DESC" data-siswa-id="<?=$_SESSION["UserID"]?>" class="btn-primary"><i class="bx bx-sort transition rotate-0"></i></button>
			</div>
			<?php if (count($data["history"]) != 0) : ?>
			<div id="plate-card-history" class="grid justify-self-center items-start grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
				<?php foreach ($data["history"] as $history) : ?>
				<div class="card bg-white poppins max-w-64 dark:bg-slate-800 dark:text-slate-200">
					<header class="">
						<h1 class="w-[80%] mx-auto text-center tillana text-shadow text-lg mb-2">Aplikasi Pembayaran <span class="text-blue-700">SPP</span></h1>
						<p class="" style="font-size: .7rem;">No. Tranksaksi : <span><?=$history["TranksaksiID"]?></span></p>
						<p class="" style="font-size: .7rem;">Metode Pay : <span><?=$history["MetodePay"]?></span></p>
						<p class="" style="font-size: .7rem;">Waktu Tranksaksi : <span><?=$history["CreateAt"]?></span></p>
					</header>
					<hr class="my-2">	
					<div class="body">
						<header class="flex justify-between items-center mb-3">
							<h2 class="font-bold text-sm">Bulan</h2>
							<h2 class="font-bold text-sm">Harga</h2>
						</header>
						<?php foreach(explode(",", $history["Bulan"]) as $key => $value) : ?>
						<div class="flex justify-between items-center my-1">
							<p class="text-sm"><?=$value?></p>
							<p class="text-sm"><?=explode(",", $history["Harga"])[$key]?></p>
						</div>
						<?php endforeach; ?>
						<footer class="flex justify-between items-center mt-3">
							<p class="font-bold text-sm">Total</p>
							<p class="text-sm"><?=$history["TotalHarga"]?></p>
						</footer>
					</div>
					<hr class="my-2">
					<footer class="my-2">
						<h1 class="w-[80%] mx-auto text-center font-bold" style="font-size: 12px;">Terima kasih sudah membayar tepat waktu</h1>
					</footer>
				</div>
				<?php endforeach; ?>
			</div>
			<?php else: ?>
			<h1 class="text-center text-xl lg:text-2xl my-6 poppins">Tidak Ada History <i class="bx bx-search"></i></h1>
			<?php endif; ?>
        </section>	