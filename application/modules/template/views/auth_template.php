<!DOCTYPE html>
<html lang="en">

<head>

	<title>Login </title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />

	<!-- Favicon icon -->
	
	<link rel="icon" href="<?php echo base_url('assets/images/user.jpg.png') ?>"  type="image/x-icon">
<!-- font css -->
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awsome-pro/css/pro.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/feather.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<!-- vendor css -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/customizer.css'); ?>">



</head>
<body class="">

<?php $this->load->view($content_view) ?>

<?php $this->load->view('footer') ?>