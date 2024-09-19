<!DOCTYPE html>
<html lang="en">

<head>

	<title><?php echo $title; ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />

    <link rel="icon" href=""<?php echo base_url('assets/images/user.jpg.png') ?>" " type="image/x-icon">

<!-- font css -->
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awsome-pro/css/pro.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/feather.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
<!-- vendor css -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/customizer.css'); ?>">

<link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendor/datatables-buttons/css/buttons.bootstrap4.min.css");?>">

<link rel="stylesheet" href="<?php echo base_url('assets/hata/css/datatables.min.css') ?>">


</head>
<body class="">
<?php $this->load->view($content_view)?>