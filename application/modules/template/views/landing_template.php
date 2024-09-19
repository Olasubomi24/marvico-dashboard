<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Home Page</title>

    <link rel="icon" href="<?php echo base_url('assets/images/user.jpg.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/css/responsive.css'); ?>">

</head>

<?php $this->load->view($content_view) ?>