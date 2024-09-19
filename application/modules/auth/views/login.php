<body class="text-success">
<!-- [ auth-signup ] start -->
<div class="auth-wrapper  auth-v3">
	<div class="auth-content">
		<div class="card ">
			<div class="row align-items-stretch text-center ">
				<div class="col-md-6 img-card-side">
                <img src="<?php echo base_url('assets/images/pexels-anna-shvets-4482900.jpg'); ?>" alt="" class="img-fluid">

				
				</div>
				<div class="col-md-6">
					<div class="card-body">
						<div class="text-center">
						<h4 class="mb-3 f-w-600"><span  style="color: #000080;">	<img src="<?php echo base_url('assets/images/user.jpg.png') ?>" alt="" class="logo logo-lg" width="20%"></span></h4>
							<p class="text-muted mb-4">Welcome back, Please login <br>into a account</p>
						</div>
						<div class="">
                        <?php echo form_open('auth/login')?>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i data-feather="mail"></i></span>
								</div>
								<input type="email" class="form-control" placeholder="Email address" name="email">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i data-feather="lock"></i></span>
								</div>
								<input type="password" class="form-control" placeholder="Password" name="password">
							</div>
							<div class="form-group text-left my-2">
                                <!-- <button class="btn text-white  btn-block mt-2" style="background-color: #000080;color:#2E8B57;">Sign in</button> -->
								<button class="btn text-white btn-block mt-2" style="background-color: #008000; color: #FFFFFF;">Sign in</button>


							</div>

						</div>
						<div class="text-right">
						<p>Forget password? <a href="<?php echo site_url('auth/reset_password'); ?>" class="pc-link">Click here</a></p>

						<div class="">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>