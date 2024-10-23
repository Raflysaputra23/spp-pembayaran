		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden flex">
			<form id="login" action="" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4" method="post">
				<h1 class="text-center text-4xl tillana text-shadow text-blue-700 mb-10">Login</h1>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="nisn" id="nisn" class="control-input p-3 pb-2 pe-10 focus-input" minlength="5" autocomplete="nisn" inputmode="numeric" pattern="\d*" required>
					<label for="nisn" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">NISN</label>
					<p class="absolute end-[.2rem] text-sm -bottom-[1.3rem] capitalize"></p>
					<i class="bx bx-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="password" name="password" id="password" class="control-input p-3 pb-2 pe-10 focus-input" minlength="4" autocomplete="current-password" required>
					<label for="password" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">password</label>
					<p class="absolute end-[.2rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-4 poppins flex items-center gap-2 px-1">
					<label for="remember" class="capitalize order-2">Remember me</label>
					<input type="checkbox" name="remember" id="remember" class="order-1" >
				</div>
				<div class="form-group my-4 poppins">
					<button type="submit" class="btn-primary w-[100%]">Login</button>
				</div>
				<div class="form-group my-5 poppins flex items-center gap-10">
					<hr class="border border-slate-300 w-[100%] rounded-md"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group my-4 poppins">	
					<a href="<?=Constant::DIRNAME?>register" class="btn-danger w-[100%]">Register</a>
				</div>
			</form>
		</section>