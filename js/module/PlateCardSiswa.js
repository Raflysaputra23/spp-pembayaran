import NumberFormat from './NumberFormat.js';

export default function PlateCardSiswa(response, dirname) {
    const plateCardSiswa = document.getElementById('plate-card-siswa');
    let plate = '';
	if(response != false) {
    response.forEach((data) => {
        plate += `
            	<div class="card bg-white rounded-md shadow dark:bg-slate-800 dark:text-slate-200">
					<section class="flex gap-3 items-center">
						<header class="w-[40%]">
							<img src="${dirname}img/${data.Foto}" alt="" class="aspect-auto w-40 h-40 shadow-md rounded-md overflow-hidden">
						</header>
						<section class="w-[60%] poppins">
							<h1 class="font-bold">${data.NamaLengkap}</h1>
							<p class="text-sm text-slate-700 dark:text-slate-400 mb-2">${data.Kelas} ${data.Jurusan}</p>
							<p class="text-sm">Rp. ${NumberFormat(data.HargaJurusan,0,'.','.')} <span class="text-slate-600 dark:text-slate-200" style="font-size: 12px;">- SPP</span></p>
							<div class="flex my-1 gap-1">
								<a href="${dirname}spp/detail/${data.Nisn}" class="btn-primary text-sm w-[20%]"><i class="fa fa-eye"></i></a>
							</div>
						</section>
					</section>
				</div>
        `;
    });
	} else {
		plate += `<h1 class="absolute start-[50%] -translate-x-[50%] poppins text-xl flex items-center gap-3 dark:text-slate-200">Siswa tidak ditemukan <i class="bx bx-search"></i></h1>`;
	}
	
    plateCardSiswa.innerHTML = plate;
}