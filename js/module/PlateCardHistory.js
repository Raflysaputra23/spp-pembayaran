import NumberFormat from './NumberFormat.js';

export default function PlateCardHistory(response, dirname) {
    const plateCardHistory = document.getElementById('plate-card-history');
    let plate = '';
    if(response != false) {
        response.forEach((history) => {
            plate += `
                <div class="card bg-white poppins max-w-64 dark:bg-slate-800 dark:text-slate-200">
					<header class="">
						<h1 class="w-[80%] mx-auto text-center tillana text-shadow text-lg mb-2">Aplikasi Pembayaran <span class="text-blue-700">SPP</span></h1>
						<p class="" style="font-size: .7rem;">No. Tranksaksi : <span>${history.TranksaksiID}</span></p>
						<p class="${(!history.SiswaID ? 'hidden' : '')}" style="font-size: .7rem;">NISN : <a href="${dirname}spp/detail/${history.SiswaID}" class="text-blue-700"><span>${history.SiswaID}</span></a></p>
						<p class="" style="font-size: .7rem;">Metode Pay : <span>${history.MetodePay}</span></p>
						<p class="" style="font-size: .7rem;">Waktu Tranksaksi : <span>${history.CreateAt}</span></p>
					</header>
					<hr class="my-2">	
					<div class="body">
						<header class="flex justify-between items-center mb-3">
							<h2 class="font-bold text-sm">Bulan</h2>
							<h2 class="font-bold text-sm">Harga</h2>
						</header>
                        ${history.Bulan.split(",").map((item, key) => {
                        return `<div class="flex justify-between items-center my-1">
                            <p class="text-sm">${item}</p>
                            <p class="text-sm">${history.Harga.split(",")[key]}</p>
                        </div>`
                        }).join('')}
						<footer class="flex justify-between items-center mt-3">
							<p class="font-bold text-sm">Total</p>
							<p class="text-sm">${NumberFormat(history.TotalHarga, 0, '.', '.')}</p>
						</footer>
					</div>
					<hr class="my-2">
					<footer class="my-2">
						<h1 class="w-[80%] mx-auto text-center font-bold" style="font-size: 12px;">Terima kasih sudah membayar tepat waktu</h1>
					</footer>
				</div>
            `;
        });
    } else {
        plate += `<h1 class="absolute start-[50%] -translate-x-[50%] poppins text-xl flex items-center gap-3 dark:text-slate-200">History tidak ditemukan <i class="bx bx-search"></i></h1>`;
    }
    plateCardHistory.innerHTML = plate;
}