		<section class="p-5 md:p-10 lg:p-15 overflow-y-auto overflow-x-hidden flex">
			<form id="register" action="" class="container max-w-[400px] rounded-md shadow-lg m-auto p-4" method="post" autocomplete="off">
				<h1 class="text-center text-4xl tillana text-shadow text-red-500 mb-10">Register</h1>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="username" id="username" class="control-input p-3 pb-2 focus-input" minlength="4" required>
					<label for="username" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">username</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="text" name="namaLengkap" id="namaLengkap" class="control-input p-3 pb-2 focus-input" required>
					<label for="namaLengkap" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Nama Lengkap</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-user absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="email" name="email" id="email" class="control-input p-3 pb-2 focus-input" required>
					<label for="email" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Email</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-at absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="password" name="password" id="password" class="control-input p-3 pb-2 focus-input" minlength="4" autocomplete="new-password" required>
					<label for="password" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">password</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 poppins relative">
					<input type="password" name="password2" id="password2" class="control-input p-3 pb-2 focus-input" minlength="4" autocomplete="new-password" required>
					<label for="password2" class="absolute bottom-[.7rem] start-[.7rem] capitalize transition cursor-text">Confirm Password</label>
					<p class="absolute end-[.1rem] text-sm -bottom-[1.3rem]"></p>
					<i class="fa fa-eye-slash eye absolute bottom-[.6rem] end-[.7rem] text-xl"></i>
				</div>
				<div class="form-group mt-6 my-4 poppins">
					<button type="submit" class="btn-danger w-[100%]">Register</button>
				</div>
				<div class="form-group my-5 poppins flex items-center gap-10">
					<hr class="border border-slate-300 w-[100%] rounded-md"><span>OR</span><hr class="border border-slate-300 w-[100%] rounded-md">
				</div>
				<div class="form-group my-4 poppins">
					<a href="<?=Constant::DIRNAME?>login" class="btn-primary w-[100%]">Login</a>
				</div>
			</form>
		</section>