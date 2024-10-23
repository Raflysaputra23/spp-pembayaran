		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<div class="flex items-center justify-between poppins bg-white p-4 rounded-md shadow">
				<div class="flex items-center gap-3">
					<i class="bx bxs-dashboard text-2xl text-blue-700"></i>
					<h1 class="text-2xl text-blue-700 font-semibold">Data siswa</h1>
				</div>
				<div class="flex items-center poppins gap-2 text-sm">
					<a id="path-url" href=""></a>
				</div>
			</div>
			<div class="my-3 flex justify-between poppins">
				<a href="<?=Constant::DIRNAME?>dashboard" class="btn-primary text-sm shadow"><i class="bx bx-left-arrow-alt text-2xl md:text-sm"></i><p class="hidden md:inline-block">Kembali</p></a>
				<div class="flex items-center gap-2">
					<h3 class="">Tampilkan: </h3>
					<div class="relative">
						<button id="btn-dropdown-show" type="button" class="w-20 py-1 rounded-md bg-white gap-4 flex justify-center items-center shadow"><span id="change-number">All</span><i class="bx bx-chevron-down"></i></button>
						<div id="box-dropdown-show" class="mt-2 w-20 rounded-md bg-white/30 backdrop-blur-md shadow text-center w-[100%] absolute h-0 overflow-hidden z-10">
							<a href="" class="flex justify-center p-2 hover:active transition">10</a>
							<a href="" class="flex justify-center p-2 hover:active transition">25</a>
							<a href="" class="flex justify-center p-2 hover:active transition">50</a>
							<a href="" class="flex justify-center p-2 hover:active transition">100</a>
							<a href="" class="flex justify-center p-2 hover:active transition">All</a>
						</div>
					</div>
				</div>
			</div>
			<div class="my-3 poppins flex items-center justify-between">
				<form action="" class="flex items-center gap-5" method="post">
					<input type="search" name="search" class="control-input w-100 md:w-52" list="datalist" autocomplete="on">
					<button type="submit" class="btn-primary text-sm"><span class="hidden md:inline-block">Search</span><i class="bx bx-search"></i></button>
				</form>

			</div>
			<div class="bg-white rounded-md p-2 overflow-auto shadow hover-scroll hidden-scroll">
				<table class="w-[100%] min-w-[60rem] poppins">
					<thead>
						<tr class="">
							<th class="p-1 w-16">No <a id="btn-sort-id" href="" data-sort="ASC"><i class="bx bx-sort transition rotate-0"></i></a></th>
							<th class="p-1 w-32">NISN <a id="btn-sort-nisn" href="" data-sort="ASC"><i class="bx bx-sort transition rotate-0"></i></a></th>
							<th class="p-1">Nama Lengkap <a id="btn-sort-username" href="" data-sort="ASC"><i class="bx bx-sort transition rotate-0"></i></a></th>
							<th class="p-1">L/P</th>
							<th class="p-1">Kelas</th>
							<th class="p-1">Jurusan</th>
							<th class="p-1 w-20">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd:bg-white even:bg-slate-50 border-y">
							<td class="p-1 text-center">1</td>
							<td class="p-1 text-center">2428371923</td>
							<td class="p-1 text-start">Rafly</td>
							<td class="p-1 text-center">L</td>
							<td class="p-1 text-center">12</td>
							<td class="p-1 text-center">RPL</td>
							<td class="p-2 flex gap-1">
								<a href="" class="w-8 h-8 flex bg-blue-700 rounded-md text-white"><i class="bx bx-trash m-auto"></i></a>
								<a href="" class="w-8 h-8 flex bg-blue-700 rounded-md text-white"><i class="bx bx-pencil m-auto"></i></a>
							</td>
						</tr>
						<tr class="odd:bg-white even:bg-slate-50 border-y">
							<td class="p-1 text-center">1</td>
							<td class="p-1 text-center">2428371923</td>
							<td class="p-1 text-start">Lili ramadhani</td>
							<td class="p-1 text-center">P</td>
							<td class="p-1 text-center">2</td>
							<td class="p-1 text-center">SMP</td>
							<td class="p-2 flex gap-1">
								<a href="" class="w-8 h-8 flex bg-blue-700 rounded-md text-white"><i class="bx bx-trash m-auto"></i></a>
								<a href="" class="w-8 h-8 flex bg-blue-700 rounded-md text-white"><i class="bx bx-pencil m-auto"></i></a>
							</td>
						</tr>
						<tr class="odd:bg-white even:bg-slate-50 border-y">
							<td class="p-1 text-center">1</td>
							<td class="p-1 text-center">2428371923</td>
							<td class="p-1 text-start">Rafly</td>
							<td class="p-1 text-center">L</td>
							<td class="p-1 text-center">12</td>
							<td class="p-1 text-center">RPL</td>
							<td class="p-2 flex gap-1">
								<a href="" class="w-8 h-8 flex bg-blue-700 rounded-md text-white"><i class="bx bx-trash m-auto"></i></a>
								<a href="" class="w-8 h-8 flex bg-blue-700 rounded-md text-white"><i class="bx bx-pencil m-auto"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>