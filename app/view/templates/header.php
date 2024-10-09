<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="authors" content="Rafly saputra">
	<title><?=$data['judul']?></title>
	<link rel="icon" href="img/iconTitle.png">

	<!-- ICONS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!-- SWEETALERT -->
	<script src="tools/swetalert/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="tools/sweetalert/swetalert2.min.css">
	<!-- FONTS GOOGLE -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Tillana:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CHART JS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- TAILWIND CSS -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  	</script>
	<style type="text/tailwindcss">
		@layer utilities
		@layer base
		@layer components

		@layer base {
			
		}

		@layer components {
			.btn-primary {
				@apply py-2 px-3 rounded-md shadow-sm bg-blue-700 text-white flex justify-center items-center gap-2;
				font-family:'Poppins', sans-serif;
			}

			.btn-outline-primary {
				@apply py-1 px-3 rounded-md shadow-sm border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white transition;
				font-family:'Poppins',sans-serif;
			}
			.card {
				@apply shadow-lg rounded-md p-3;
			}
			.control-input {
				@apply py-1 px-2 rounded-md bg-transparent w-[100%] border outline-0;
			}

		}

		@layer utilities {
			.poppins {
				font-family:'Poppins', sans-serif;
			}
			.tillana {
				font-family:'Tillana', sans-serif;
			}
			.bg-primary {
				@apply bg-blue-700;
			}
			.bg-gray {
				@apply bg-gray-100;
			}
			.text-shadow {
				text-shadow: -1px 1px 2px #000;
			}
			.active {
				@apply bg-blue-700 text-white;
			}
		}
		
	</style>
</head>
<body class="overflow-hidden bg-gray">

<header id="header" class="h-[8vh] mx-auto container">
	<nav class="bg-primary px-5 flex justify-between h-[100%]" style="border-bottom-right-radius: .8rem; border-bottom-left-radius: .8rem;">
		<section class="flex items-center gap-3 poppins text-white relative">
			<img src="<?=Constant::DIRNAME?>/img/iconTitle.png" alt="" class="rounded-full w-10 h-10 shadow-md border">
			<a href=""><h3 class="text-sm w-52 leading-[15px] flex items-center gap-1">M. Rafly Saputra <i class="bx bx-chevron-down text-lg"></i></h3></a>
		</section>
		<section class="flex gap-5 items-center">
			<button type="button"><i class="bx bxs-moon text-white text-2xl"></i></button>
			<button type="button"><i class="bx bx-cog text-white text-2xl hover:rotate-[360deg] transition"></i></button>
		</section>
	</nav>
</header>
<main id="main" class="h-[92vh] mx-auto container">
	<div class="container grid grid-cols-[60px_1fr] lg:grid-cols-[180px_1fr]  h-[100%]">
		<aside id="aside" class="bg-white shadow-lg px-2 lg:px-4 py-2 h-[100%] poppins overflow-hidden" style="border-top-left-radius: .8rem;">
			<a href="<?=Constant::DIRNAME?>dashboard" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 hover:text-white transition <?=($data['judul'] == "Dashboard") ? "active" : "" ?>"><i class="bx bx-menu text-lg"></i><p class="hidden lg:block">Dashboard</p></a>
			<a href="" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 relative hover:text-white transition"><i class="bx bx-group text-xl"></i><p class="hidden lg:block">Siswa</p><i class="bx bx-chevron-right hidden lg:block toggle text-xl absolute end-[8px]"></i></a>
			<div class="dropdown-menu h-0 overflow-hidden actives">
				<a href="<?=Constant::DIRNAME?>siswa" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 relative hover:text-white transition <?=($data['judul'] == "Siswa") ? "active" : "" ?>"><i class="bx bx-group text-xl"></i><p class="hidden lg:block">Data Siswa</p></a>
				<a href="<?=Constant::DIRNAME?>kelas" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 relative hover:text-white transition <?=($data['judul'] == "Kelas") ? "active" : "" ?>"><i class="bx bx-group text-xl"></i><p class="hidden lg:block">Kelas</p></a>
			</div>

			<a href="<?=Constant::DIRNAME?>spp" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 hover:text-white transition <?=($data['judul'] == "Spp") ? "active" : "" ?>"><i class="bx bx-money text-lg"></i><p class="hidden lg:block">SPP</p></a>
			<a href="<?=Constant::DIRNAME?>history" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 hover:text-white transition <?=($data['judul'] == "History") ? "active" : "" ?>"><i class="bx bx-history text-lg"></i><p class="hidden lg:block">History</p></a>
		</aside>
		
	

