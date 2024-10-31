		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
            <div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">SPP</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
			<div class="grid grid-cols-[1fr] md:grid-cols-[1.2fr_1fr] gap-4 my-3">
				<form id="form-spp" action="" class="bg-white rounded-md grid grid-cols-2 md:grid-cols-3 gap-6" method="post">
					<?php foreach ($data["bulan"] as $key => $bulan) : ?>
					<?php if ($key != "BulanID" && $key != "SiswaID") : ?>
					<div class="card poppins flex flex-col items-center gap-2 relative">
						<input type="checkbox" name="pilihan[]" data-harga="<?=$data["hargaSpp"]["Harga"]?>" value="<?=$key?>" class="absolute start-[5px] top-[5px] <?=(($bulan) ? "hidden" : "")?>">
						<h1 class="font-bold"><?=$key?></h1>
						<p class="<?=($bulan) ? 'bg-green-500' : 'bg-red-500'?> rounded-md p-1 px-2 text-white" style="font-size: 0.7rem;"><?=(($bulan) ? "Lunas" : "Belum Lunas")?></p>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
				</form>
				<div class="bg-white rounded-md overflow-hidden p-3 relative">
					<div class="alert-primary poppins text-sm relative">
						<i class="fa fa-exclamation absolute -rotate-[30deg] text-2xl -top-[12px] -start-[4px]"></i>
						<h2>Silahkan membayar spp anda tepat waktu!</h2>
					</div>
					<div class="grid grild-cols-1 md:grid-cols-2 gap-4 poppins my-2 mb-20">
						<div class="flex flex-col items-center gap-1 bg-blue-700 p-2 rounded-md w-[100%] shadow">
							<p class="text-white font-bold text-md">SPP 1 bulan</p>
							<p class="text-sm text-white">Rp. <?=number_format($data["hargaSpp"]["Harga"],0,'.','.')?></p>
						</div>
						<div class="flex flex-col items-center gap-1 bg-blue-700 p-2 rounded-md w-[100%] shadow">
							<p class="text-white font-bold text-md">Total Tagihan</p>
							<p class="text-sm text-white">Rp <?=number_format(($data["hargaSpp"]["Harga"] * count(array_filter($data["bulan"], function($bulan) {return $bulan == null;}))),0,'.','.')?></p>
						</div>
					</div>
					<div class="absolute bottom-0 start-0 end-0 p-2 bg-blue-700 flex items-center gap-3">
						<p id="total-harga" class="w-[70%] text-center text-lg text-white poppins">Rp. 0</p>
						<button id="btn-spp" type="submit" class="btn-primary bg-green-500 w-[30%] shadow disabled" disabled>Bayar</button>
					</div>
				</div>
			</div>

        </section>