<!DOCTYPE html>
<html lang="id" class="">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="authors" content="Rafly saputra">
	<title><?=$data['judul']?></title>
	<link rel="icon" href="img/iconTitle.png">
	<script>
		const html = document.querySelector('html');
		if(localStorage.getItem('Mode') == 'dark') {
			html.classList.add('dark');
		} else {
			html.classList.remove('dark');
		}
	</script>
	<!-- ICONS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="<?=Constant::DIRNAME?>tools/fontawesome/css/font-awesome.min.css">
	<!-- SWEETALERT -->
	<script src="<?=Constant::DIRNAME?>tools/swetalert/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="<?=Constant::DIRNAME?>tools/sweetalert/swetalert2.min.css">
	<!-- FONTS GOOGLE -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Tillana:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CHART JS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- TAILWIND CSS -->
	<link rel="stylesheet" href="<?=Constant::DIRNAME?>css/style.css">	
	<!-- MIDTRANS -->
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-1LY7-JC0IdygFO05"></script>
</head>
<body class="overflow-hidden bg-gray dark:bg-slate-900">
<!-- FLASHER -->
<?=Flasher::getFlash()?>

<header id="header" class="h-[8vh] mx-auto container dark:text-slate-800 dark:bg-slate-800">
	<nav class="bg-primary px-5 flex justify-between h-[100%]" style="border-bottom-right-radius: .8rem; border-bottom-left-radius: .8rem;">
		<section class="flex items-center gap-3 poppins text-white relative">
			<img src="<?=Constant::DIRNAME?>img/<?=((isset($_SESSION["Foto"])) ? $_SESSION["Foto"] : "iconTitle.png")?>" alt="" class="rounded-full w-10 h-10 shadow-md border">
			<a href="<?=Constant::DIRNAME?>profil"><h3 class="text-sm w-52 leading-[15px] flex items-center gap-1 capitalize"><?=(isset($_SESSION["Username"])) ? $_SESSION["Username"] : "Anonymous" ;?> <i class="bx bx-chevron-down text-lg"></i></h3></a>
		</section>
		<section class="flex gap-5 items-center">
			<button id="btn-mode" type="button" class="overflow-hidden h-8 w-8 light">
				<i class="bx bxs-moon text-white text-2xl transition -translate-y-8"></i>
				<i class="bx bxs-sun text-white text-2xl transition -translate-y-8"></i>
			</button>
			<div class="relative">
				<button id="btn-setting" type="button"><i class="bx bx-cog text-white text-2xl hover:rotate-[360deg] transition"></i></button>
				<div class="absolute z-20 w-32 shadow-md end-0 mt-6 rounded-md poppins text-sm backdrop-blur-md bg-white/30 overflow-hidden h-0">
				<?php if(isset($_SESSION["UserID"])) : ?>
					<a href="<?=Constant::DIRNAME?>dashboard/logout" class="w-[100%] block p-2 rounded-md flex items-center gap-2 hover:text-white dark:text-slate-200 hover:bg-red-500 transition"><i class="bx bx-log-out"></i> <span class="">Log out</span></a>
				<?php else: ?>
					<a href="<?=Constant::DIRNAME?>login" class="w-[100%] block p-2 rounded-md flex items-center gap-2 hover:text-white dark:text-slate-200 hover:bg-green-500 transition"><i class="bx bx-log-in"></i> <span class="">Log in</span></a>
					<a href="<?=Constant::DIRNAME?>register" class="w-[100%] block p-2 rounded-md flex items-center gap-2 hover:text-white dark:text-slate-200 hover:bg-red-500 transition"><i class="bx bx-log-out"></i> <span class="">Register</span></a>
				<?php endif; ?>
				</div>
			</div>
		</section>
	</nav>
</header>
<main id="main" class="h-[92vh] mx-auto container">
	<div class="container grid h-[100%] <?=($data['judul'] != 'Login' && $data['judul'] != 'Register') ? 'grid-cols-[60px_1fr] lg:grid-cols-[180px_1fr]' : 'grid-cols-[1fr]'?>">

		<?php if ($data["judul"] != "Login" && $data["judul"] != "Register"): ?>
			<aside id="aside" class="bg-white shadow-lg px-2 lg:px-4 py-2 h-[100%] poppins overflow-hidden dark:bg-slate-800" style="border-top-left-radius: .8rem;">

				<a id="dashboard" href="<?=Constant::DIRNAME?>dashboard" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 dark:hover:bg-slate-900 hover:text-white transition <?=($data['judul'] == "Dashboard") ? "active" : "" ?> dark:text-slate-200"><i class="bx bx-menu text-lg"></i><p class="hidden lg:block">Dashboard</p></a>

				<a id="siswa" href="" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 dark:hover:bg-slate-900 relative hover:text-white transition dark:text-slate-200"><i class="bx bx-group text-xl"></i><p class="hidden lg:block">Siswa</p><i class="bx bx-chevron-right hidden lg:block toggle text-xl absolute end-[8px]"></i></a>
				<div class="h-0 overflow-hidden">
					<a id="data-siswa" href="<?=Constant::DIRNAME?>siswa" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 dark:hover:bg-slate-900 relative hover:text-white transition <?=($data['judul'] == "Siswa") ? "active" : "" ?> dark:text-slate-200"><i class="bx bx-group text-xl"></i><p class="hidden lg:block">Data Siswa</p></a>
					<a id="kelas" href="<?=Constant::DIRNAME?>kelas" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 dark:hover:bg-slate-900 relative hover:text-white transition <?=($data['judul'] == "Kelas") ? "active" : "" ?> dark:text-slate-200"><i class="bx bx-group text-xl"></i><p class="hidden lg:block">Kelas</p></a>
				</div>

				<a id="spp" href="<?=Constant::DIRNAME?>spp" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 dark:hover:bg-slate-900 hover:text-white transition <?=($data['judul'] == "Spp") ? "active" : "" ?> dark:text-slate-200"><i class="bx bx-money text-lg"></i><p class="hidden lg:block">SPP</p></a>

				<a id="history" href="<?=Constant::DIRNAME?><?=($_SESSION["Role"] == "user") ? 'history' : 'tranksaksi'?>" class="w-100 p-2 rounded-md text-sm text-black flex justify-center lg:justify-start items-center gap-3 hover:bg-blue-700 dark:hover:bg-slate-900 hover:text-white transition <?=($data['judul'] == "History" || $data['judul'] == "Tranksaksi") ? "active" : "" ?> dark:text-slate-200"><?=($_SESSION["Role"] == "user") ? '<i class="bx bx-history text-lg"></i><p class="hidden lg:block">History</p>' : '<i class="bx bx-search text-lg"></i><p class="hidden lg:block">Tranksaksi</p>'?></a>

			</aside>
		<?php endif ?>
		
	


