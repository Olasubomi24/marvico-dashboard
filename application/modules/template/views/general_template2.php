<?php 
if (!isset($_SESSION['customer_email'])) {
  session_destroy();
  redirect('auth/sign_out');
  exit();
}
  ?>
<?php $this->load->view('header')?>


<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Mobile header ] start -->
<div class="pc-mob-header pc-header" style="background-color: #1b856a;">
    <div class="pcm-logo">
        <a href="">
            <img src="<?php echo base_url("/assets/images/PVLogo.svg") ?>" alt="" class="logo logo-lg">
        </a>
    </div>
    <div class="pcm-toolbar">
        <a href="#!" class="pc-head-link" id="mobile-collapse">
            <div class="hamburger hamburger--arrowturn">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
            <!-- <i data-feather="menu"></i> -->
        </a>
        <a href="#!" class="pc-head-link" id="headerdrp-collapse">

        </a>
        <a href="#!" class="pc-head-link" id="header-collapse">
            <i data-feather="more-vertical"></i>
        </a>
    </div>
</div>

<nav class="pc-sidebar ">
    <div class="navbar-wrapper ">
        <div class="m-header " style="background-color: #1b856a;">
            <a class="text-center" href="" class="b-brand">

                <!-- ========   change your logo hear   ============ -->
                <img class="mr-2" src="<?php echo base_url('assets/images/user.jpg.png') ?>" alt="" class="logo logo-lg"
                    width="30%"><span style="font-size:13px; color:#fff; font-weight: bold;">Nourished Choice Food  </span>
                <img src="<?php echo base_url('assets/images/user.jpg.png') ?>" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content " style="background-color: #1b856a;">
            <!-- <div class=" col-sm-12 col-md-4 offset-md-4 mt-3">
                <div class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center">
                    <img src="<?php //echo base_url("assets/images/user.jpg.png") ?>" alt="Profile Picture"
                        class="img-fluid rounded-circle"
                        style="width: 50px; height: 50px; background-color: red; mix-blend-mode:mult">

                </div>

            </div> -->
            <p class="mt-3 text-center text-white">
            </p>
            <style>
            .hr {
                border-width: 2.5px;

            }
            </style>
            <hr class="hr mb-2">
            <ul class="pc-navbar">

                <!-- 
<li class="pc-item">
  <a href="<?php //echo site_url('dashboard/dash') ?>" class="pc-link">
	<span class="pc-micon">
	  <i data-feather="check-circle"></i>
	</span>
	<span class="pc-mtext">
	  Dashboard
	</span>
  </a>
</li> -->
                <li class="pc-item">
                    <a href="<?php echo site_url('dashboard/index') ?>" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="check-circle"></i>
                        </span>
                        <span class="pc-mtext">
                           Add Food Detail
                        </span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?php echo site_url('transaction_details/transaction') ?>" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="check-circle"></i>
                        </span>
                        <span class="pc-mtext">
                           Food  Transaction details
                        </span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?php echo site_url('dashboard/user_account') ?>" class="pc-link">
                        <span class="pc-micon">
                            <i data-feather="check-circle"></i>
                        </span>
                        <span class="pc-mtext">
                            Create Account
                        </span>
                    </a>
                </li>

                <li class="pc-item dropdown">
                    <a href="#" class="pc-link dropdown-toggle" data-toggle="dropdown"
                        style="background-color: #1b856a; color: white;">
                        <span class="pc-micon">
                            <i data-feather="check-circle"></i>
                        </span>
                        <span class="pc-mtext">Product Items</span>
                    </a>
                    <ul class="dropdown-menu" style="background-color: #1b856a;">
                        <li class="pc-item">
                            <a href="<?php echo site_url('product_description/index') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Product Description
                                </span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?php echo site_url('product/index') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Product
                                </span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?php echo site_url('package/index') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Package
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item dropdown">
                    <a href="#" class="pc-link dropdown-toggle" data-toggle="dropdown"
                        style="background-color: #1b856a; color: white;">
                        <span class="pc-micon">
                            <i data-feather="check-circle"></i>
                        </span>
                        <span class="pc-mtext">Manage Items</span>
                    </a>
                    <ul class="dropdown-menu" style="background-color: #1b856a;">
                        <li class="pc-item">
                            <a href="<?php echo site_url('dashboard/measureprice') ?>" class="pc-link"
                                style="color: white;">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Measurement and Price
                                </span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?php echo site_url('product_description/measureprice') ?>" class="pc-link"
                                style="color: white;">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Product Description
                                </span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?php echo site_url('product/measureprice') ?>" class="pc-link"
                                style="color: white;">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Product
                                </span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?php echo site_url('package/measureprice') ?>" class="pc-link"
                                style="color: white;">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Package
                                </span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?php echo site_url('process_detail/measureprice') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Process detail
                                </span>
                            </a>
                        </li>

                        <li class="pc-item">
                            <a href="<?php echo site_url('offal_detail /measureprice') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Offal
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item">
                            <a href="<?php echo site_url('process_detail/measureprice') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Production
                                </span>
                            </a>
                        </li>

                        <li class="pc-item">
                            <a href="<?php echo site_url('process_detail/index') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                 Production Summary
                                </span>
                            </a>
                        </li>
<!-- 
                        <li class="pc-item">
                            <a href="<?php // echo site_url('offal_detail/measureprice') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Offal
                                </span>
                            </a>
                        </li> -->
                         
                        <li class="pc-item">
                            <a href="<?php echo site_url('sale_detail/measureprice') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                    Add Sale
                                </span>
                            </a>
                        </li>

                        <li class="pc-item">
                            <a href="<?php echo site_url('sale_detail/index') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                 Sales
                                </span>
                            </a>
                        </li>


<!-- 
                        <li class="pc-item">
                            <a href="<?php //echo site_url('offal_detail/index') ?>" class="pc-link">
                                <span class="pc-micon">
                                    <i data-feather="check-circle"></i>
                                </span>
                                <span class="pc-mtext">
                                 Offal
                                </span>
                            </a>
                        </li> -->


                <!-- <li class="pc-item">
  <a href="<?php //echo site_url('merchant/change_password') ?>" class="pc-link">
	<span class="pc-micon">
	  <i data-feather="check-circle"></i>
	</span>
	<span class="pc-mtext">
	  Change password
	</span>
  </a>
		  </li>

		  <li class="pc-item">
  <a href="<?php //echo site_url('auth/sign_out') ?>" class="pc-link">
	<span class="pc-micon">
	  <i data-feather="check-circle"></i>
	</span>
	<span class="pc-mtext">
	  Logout
	</span>
  </a>
		  </li> -->



            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="pc-header ">
    <div class="header-wrapper">



        <div class="ml-auto">
            <ul class="list-unstyled">


                <li class="pc-h-item">
                    <a class="pc-head-link mr-0" href="#" data-toggle="modal" data-target="#notification-modal">

                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url('assets/images/user.jpg.png') ?>" alt="user-image"
                            class="user-avtar">
                        <span>
                            <span class="user-name"><?php echo $_SESSION['customer_name'] ?></span>

                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                        <div class=" dropdown-header">
                            <h6 class="text-overflow m-0"><?php echo $_SESSION['customer_name'] ?></h6>
                        </div>

                        <a href="<?php echo site_url('auth/sign_out') ?>" class="dropdown-item">
                            <i data-feather="power"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</header>

<!-- Modal -->






<?php $this->load->view($content_view)?>

<?php $this->load->view('footer')?>