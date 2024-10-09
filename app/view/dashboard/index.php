		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<h1 class="text-2xl md:text-3xl tillana text-blue-700 text-shadow">Aplikasi Pembayaran SPP</h1>
			<section class="bg-white shadow-lg p-4 my-2 rounded-md border-l-[7px] border-blue-700 lg:p-5">
				<h1 class="poppins text-sm text-slate-600">Selamat datang diaplikasi pembayaran SPP. anda login sebagai <span class="font-bold text-blue-700">user</span></h1>
			</section>
			<div class="my-8 grid grid-cols-[1fr] md:grid-cols-[1fr_1fr] lg:grid-cols-[1fr_1fr_1fr_1fr] gap-4">
				<div class="card bg-white items-center grid grid-cols-[20%_80%] md:grid-cols-[40%_60%] poppins">
					<div class="py-5 flex bg-blue-700 rounded-md">
						<i class='bx bx-male-female text-3xl m-auto text-white'></i>
					</div>
					<div class="px-4">
						<h2 class="lg:text-sm  text-slate-600">Total Siswa/i</h2>
						<p class="font-bold">60</p>
					</div>
				</div>
				<div class="card bg-white items-center grid grid-cols-[20%_80%] md:grid-cols-[40%_60%] poppins">
					<div class="py-5 flex bg-red-500 rounded-md">
						<i class='bx bx-female-sign text-3xl m-auto text-white'></i>
					</div>
					<div class="px-4">
						<h2 class="text-sm text-slate-600">Total Siswa</h2>
						<p class="font-bold">30</p>
					</div>
				</div>
				<div class="card bg-white items-center grid grid-cols-[20%_80%] md:grid-cols-[40%_60%] poppins">
					<div class="py-5 flex bg-pink-500 rounded-md">
						<i class='bx bx-male-sign text-3xl m-auto text-white'></i>
					</div>
					<div class="px-4">
						<h2 class="text-sm text-slate-600">Total Siswi</h2>
						<p class="font-bold">30</p>
					</div>
				</div>
				<div class="card bg-white items-center grid grid-cols-[20%_80%] md:grid-cols-[40%_60%] poppins">
					<div class="py-5 flex bg-cyan-400 rounded-md">
						<i class='bx bx-history text-3xl m-auto text-white'></i>
					</div>
					<div class="px-4">
						<h2 class="text-sm text-slate-600">History</h2>
						<p class="font-bold">60</p>
					</div>
				</div>
			</div>
			<div class="my-4 grid grid-cols-[1fr] md:grid-cols-[1fr_1fr] gap-4">
				<div class="card grid grid-cols-[20%_80%] md:grid-cols-[30%_70%] items-start poppins">
					<div class="rounded-md bg-yellow-500 py-4 flex">
						<i class="bx bx-money m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4">
						<h2 class="">Pembayaran SPP Anda</h2>
						<p class="font-bold">Rp. 720.000</p>
						<p class="text-red-500 font-semibold text-sm">Belum lunas</p>
					</div>
				</div>
				<div class="card grid grid-cols-[20%_80%] md:grid-cols-[30%_70%] items-start poppins">
					<div class="rounded-md bg-green-500 py-4 flex">
						<i class="bx bx-money-withdraw m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4">
						<h2 class="">SPP Yang Dibayar</h2>
						<p class="font-bold">Rp. 220.000</p>
						<p class="text-sm text-red-500">Rp. -420.000</p>
					</div>
				</div>
			</div>
		</section>

		<!-- CHART JS -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script>
			const bar = document.getElementById('myChart');
			chartBar(bar);
			const bubble = document.querySelectorAll('.bubble');
			bubble.forEach((el) => {
				chartDonat(el,el.dataset.bubble);
			});

			function chartDonat(el,nilai) {
				new Chart(el, {
				    type: 'doughnut',
				    data: {
				      labels: ['RPL'],
				      datasets: [{
				        label: 'Jurusan',
				        data: [nilai],
				        borderWidth: 1,
				        backgroundColor: ['blue']
				      }]	
				    },
				    options: {
				      scales: {
				        y: {
				          beginAtZero: true
				        }
				      }
				    }
				  });
			}

			function chartBar(element) {
			   new Chart(element, {
			    type: 'bar',
			    data: {
			      labels: ['RPL',"AKT","TKJ"],
			      datasets: [{
			        label: 'Jurusan',
			        data: [25, 10, 11],
			        borderWidth: 1,
			        backgroundColor: ['blue']
			      }]	
			    },
			    options: {
			      scales: {
			        y: {
			          beginAtZero: true
			        }
			      }
			    }
			  });
			}
			 
		</script>	