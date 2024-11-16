		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
            <div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-md md:text-xl lg:text-2xl text-blue-700"></i>
					<h1 class="text-md md:text-xl lg:text-2xl text-blue-700 font-semibold">Detail</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
            <div class="my-3 flex items-center justify-start">
				<a href="<?=Constant::DIRNAME?>spp" class="btn-primary text-sm shadow"><i class="bx bx-left-arrow-alt text-2xl md:text-sm"></i><p class="hidden md:inline-block">Kembali</p></a>
            </div>
            <div class="my-2 p-2 bg-white rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
                <h1 class="font-bold poppins text-lg flex items-center gap-3"><i class="bx bx-user text-2xl"></i> <?=$data["detail"][0]["NamaLengkap"]?></h1>
            </div>
            <div class="my-3 grid grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-3">
            <?php foreach ($data["detail"] as $detail) : ?>
				<div class="card poppins flex flex-col items-center gap-2 relative dark:bg-slate-800 dark:text-slate-200">
					<h1 class="font-bold"><?=$detail["NamaBulan"]?></h1>
					<p class="<?=($detail["PBulanID"]) ? 'bg-green-500' : 'bg-red-500'?> rounded-md p-1 px-2 text-white" style="font-size: 0.7rem;"><?=(($detail["PBulanID"]) ? "Lunas" : "Belum Lunas")?></p>
				</div>
			<?php endforeach; ?>
            </div>
        </section>