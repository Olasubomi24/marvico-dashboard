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
							<h4 class="mb-3 f-w-600"><span  style="color: #000080;">	<img src="<?php echo base_url('assets/images/user.jpg.png') ?>"  alt="" class="logo logo-lg" width="20%"></span></h4>
							<h2 class="text-muted mb-4">Reset password <br></h2>
						</div>
						<div class="">
                        <?php echo form_open('auth/reset_password_update')?>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i data-feather="mail"></i></span>
								</div>
								<input type="email" class="form-control" placeholder="email" name="email">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i data-feather="lock"></i></span>
								</div>
								<input type="password" class="form-control" placeholder=" Password" name="password">
							</div>
							<div class="form-group text-left my-2">
                                <button class="btn text-white  btn-block mt-2" style="background-color: #008000; color: #FFFFFF;">Submit</button>

							</div>
						</div>
						<div class="text-right">
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>