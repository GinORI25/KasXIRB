<!-- Sign In Start -->
<div class="container-fluid">
	<div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
		<div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
		
			<div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
				<div class="d-flex align-items-center justify-content-between mb-3">
					<a href="#" class="">
						<h3 class="text-primary"><i class="ri-book-mark-line"></i>Kas Buku</h3>
					</a>
					<h3>Login</h3>
				</div>
				<form action="<?= base_url('Auth/login');?>" method="post">
					<div class="form-floating mb-3">
						<input type="name" name="username" id="username" class="form-control" placeholder="Username">
						<label for="username">Username</label>
					</div>
					<div class="form-floating mb-4">
						<input type="password" name="password" class="form-control" id="Password"
							placeholder="Password">
						<label for="password">Password</label>
					</div>

					<button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Login</button>
					<p class="text-center mb-0"><i>wellcome to kas buku</i></p>
					
					<div id="hilang">
                    <?php echo $this->session->flashdata('alert', true); ?>
               		 </div>
                </div>
				<form>
			</div>
		</div>
	</div>
</div>
<!-- Sign In End -->
</div>
