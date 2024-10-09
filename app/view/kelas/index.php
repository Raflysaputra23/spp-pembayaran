		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-2xl text-blue-700"></i>
					<h1 class="text-2xl text-blue-700 font-semibold">Kelas</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a href="" class="">Siswa</a>
					<span>/</span>
					<a href="" class="text-blue-700">Kelas</a>
				</div>
			</div>
			<div class="my-3 flex justify-between poppins">
				<a id="btn-back" href="<?=Constant::DIRNAME?>dashboard" class="btn-primary text-sm shadow"><i class="bx bx-left-arrow-alt"></i> Kembali</a>
				<div class="flex items-center gap-2">
					<a id="btn-kelas" href="" class="btn-primary text-sm shadow"><i class="bx bx-plus"></i> Tambah Kelas</a>
					<a id="btn-jurusan" href="" class="btn-primary text-sm shadow"><i class="bx bx-plus"></i> Tambah Jurusan</a>
				</div>
			</div>
			<form id="form-kelas" action="" method="post" class="my-3 bg-white rounded-md shadow p-4 poppins h-0 overflow-hidden hidden">
				<div class="grid grid-cols-[1fr] md:grid-cols-[1fr_1fr] gap-5">
					<div class="form-group my-1">
						<label for="jurusan">Pilih Jurusan</label>
						<select name="jurusan" id="jurusan" class="control-input">
							<option value="" disabled>PILIH JURUSAN</option>
							<option value="">RPL</option>
							<option value="">AKT</option>
							<option value="">TKJ</option>
							<option value="">PM</option>
						</select>
					</div>
					<div class="form-group my-1">
						<label for="">Pilih Kelas</label>
						<select name="jurusan" id="jurusan" class="control-input">
							<option value="" disabled>PILIH KELAS</option>
							<option value="">X</option>
							<option value="">XI</option>
							<option value="">XII</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn-primary text-sm mt-2">Submit</button>
			</form>
			<form id="form-jurusan" action="" method="post" class="my-3 bg-white rounded-md shadow p-4 poppins h-0 overflow-hidden hidden">
				<div class="grid grid-cols-[1fr] md:grid-cols-[1fr_1fr] gap-5">
					<div class="form-group my-1">
						<label for="jurusan">Nama Jurusan</label>
						<input type="text" name="namaJurusan" class="control-input">
					</div>
					<div class="form-group my-1">
						<label for="">Harga SPP</label>
						<input type="number" name="hargaSpp" class="control-input">
					</div>
				</div>
				<button type="submit" class="btn-primary text-sm mt-2">Submit</button>
			</form>
			<div class="mt-10 grid grid-cols-[1fr_1fr] md:grid-cols-[1fr_1fr_1fr] lg:grid-cols-[1fr_1fr_1fr_1fr] gap-3">
				<div class="card grid grid-cols-[40%_60%] md:grid-cols-[40%_60%] items-start poppins">
					<div class="rounded-md bg-blue-700 py-4 flex">
						<i class="bx bx-user m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4 flex justify-center items-center flex-col">
						<h2 class="text-2xl font-bold">30</h2>
						<p class="text-sm text-slate-700">RPL</p>
					</div>
				</div>
				<div class="card grid grid-cols-[40%_60%] md:grid-cols-[40%_60%] items-start poppins">
					<div class="rounded-md bg-violet-600 py-4 flex">
						<i class="bx bx-user m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4 flex justify-center items-center flex-col">
						<h2 class="text-2xl font-bold">30</h2>
						<p class="text-sm text-slate-700">AKT</p>
					</div>
				</div>
				<div class="card grid grid-cols-[40%_60%] md:grid-cols-[40%_60%] items-start poppins">
					<div class="rounded-md bg-red-600 py-4 flex">
						<i class="bx bx-user m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4 flex justify-center items-center flex-col">
						<h2 class="text-2xl font-bold">30</h2>
						<p class="text-sm text-slate-700">TKJ</p>
					</div>
				</div>
				<div class="card grid grid-cols-[40%_60%] md:grid-cols-[40%_60%] items-start poppins">
					<div class="rounded-md bg-yellow-500 py-4 flex">
						<i class="bx bx-user m-auto text-3xl text-white"></i>
					</div>
					<div class="px-4 flex justify-center items-center flex-col">
						<h2 class="text-2xl font-bold">30</h2>
						<p class="text-sm text-slate-700">MM</p>
					</div>
				</div>
			</div>
			<div class="mt-10 w-[100%] md:w-[80%] lg:w-[60%] mx-auto poppins">
				<canvas id="chartKelas"></canvas>
			</div>
		</section>

		<script>
			const chartKelas = document.getElementById('chartKelas');
			chartBar(chartKelas, ["RPL","AKT","TKJ","MM"], [30,20,40,20],'Jurusan');

			const btnKelas = document.getElementById('btn-kelas');
			const formKelas = document.getElementById('form-kelas');
			const btnJurusan = document.getElementById('btn-jurusan');
			const formJurusan = document.getElementById('form-jurusan');

			btnKelas.addEventListener('click', function(element) {
				element.preventDefault();
				formKelas.classList.toggle('actives');

				if (formKelas.classList.contains('actives')) {
					formKelas.style.display = 'block';
					formKelas.style.height = `${formKelas.scrollHeight}px`;
					formKelas.style.transition = "all .3s ease";
				} else {
					formKelas.style.height = `0px`;
					formKelas.style.transition = "all .3s ease";
					setTimeout(() => {
						formKelas.style.display = 'none';
					},200);
				}
			});

			btnJurusan.addEventListener('click', function(element) {
				element.preventDefault();
				formJurusan.classList.toggle('actives');

				if (formJurusan.classList.contains('actives')) {
					formJurusan.style.display = 'block';
					formJurusan.style.height = `${formJurusan.scrollHeight}px`;
					formJurusan.style.transition = "all .3s ease";
				} else {
					formJurusan.style.height = `0px`;
					formJurusan.style.transition = "all .3s ease";
					setTimeout(() => {
						formJurusan.style.display = 'none';
					},200);
				}
			});


			function chartBar(element, data, jumlahData, label) {
		         new Chart(element, {
		          type: 'bar',
		          data: {
		            labels: data,
		            datasets: [{
		              label: label,
		              data: jumlahData,
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