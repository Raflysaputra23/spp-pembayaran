		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden">
			<div id="toggle-form" class="max-w-[400px] mx-auto flex gap-4 items-center mb-6">
				<button id="btn-user" type="button" class="btn-primary w-[100%]">User</button>
				<button id="btn-admin" type="button" class="btn-outline-primary w-[100%]">Admin</button>
			</div>
			<form id="User-form" action="<?=Constant::DIRNAME?>login/loginUser" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4 dark:bg-slate-800" method="post">
				<h1 class="text-center text-4xl tillana text-shadow text-blue-700 mb-10">Login</h1>
				<div class="form-group mt-6 poppins relative dark:text-slate-200">
					<input type="text" name="nisn" id="nisn" class="control-input p-3 pb-2 pe-10 focus-input " minlength="5" autocomplete="nisn" inputmode="numeric" pattern="\d*" required>
					<label for="nisn" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">NISN</label>
					<p class="absolute end-[.2rem] text-sm -bottom-[1.3rem] capitalize"></p>
					<i class="bx bx-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative dark:text-slate-200">
					<input type="password" name="password" id="password" class="control-input p-3 pb-2 pe-10 focus-input" minlength="4" autocomplete="current-password" required>
					<label for="password" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">password</label>
					<p class="absolute end-[.2rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-4 poppins flex items-center gap-2 px-1 dark:text-slate-200">
					<label for="remember" class="capitalize order-2">Remember me</label>
					<input type="checkbox" name="remember" id="remember" class="order-1" >
				</div>
				<div class="form-group my-4 poppins dark:text-slate-200">
					<button type="submit" class="btn-primary w-[100%]">Login</button>
				</div>
				<div class="form-group dark:text-slate-200 my-5 poppins flex items-center gap-10">
					<hr class="border border-slate-300 w-[100%] rounded-md dark:text-slate-200"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group dark:text-slate-200 my-4 poppins">	
					<a href="<?=Constant::DIRNAME?>register" class="btn-danger w-[100%]">Register</a>
				</div>
			</form>
			<form id="Admin-form" action="<?=Constant::DIRNAME?>login/loginAdmin" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4 hidden dark:bg-slate-800" method="post">
				<h1 class="text-center text-4xl tillana text-shadow text-blue-700 mb-10">Login</h1>
				<div class="form-group mt-6 poppins relative dark:text-slate-200">
					<input type="text" name="username" id="username" class="control-input p-3 pb-2 pe-10 focus-input" minlength="4" autocomplete="off" required>
					<label for="username" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Username</label>
					<p class="absolute end-[.2rem] text-sm -bottom-[1.3rem] capitalize"></p>
					<i class="bx bx-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative dark:text-slate-200">
					<input type="password" name="password" id="password2" class="control-input p-3 pb-2 pe-10 focus-input" minlength="4" autocomplete="current-password" required>
					<label for="password2" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">password</label>
					<p class="absolute end-[.2rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-4 poppins flex items-center gap-2 px-1 dark:text-slate-200">
					<label for="remember2" class="capitalize order-2">Remember me</label>
					<input type="checkbox" name="remember" id="remember2" class="order-1" >
				</div>
				<div class="form-group my-4 poppins dark:text-slate-200">
					<button type="submit" class="btn-primary w-[100%]">Login</button>
				</div>
				<div class="form-group my-5 poppins flex items-center gap-10 dark:text-slate-200">
					<hr class="border border-slate-300 w-[100%] rounded-md text-red-500"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group my-4 poppins dark:text-slate-200">	
					<a href="<?=Constant::DIRNAME?>register" class="btn-danger w-[100%]">Register</a>
				</div>
			</form>
		</section>