<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Laundry Online</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/linearicons.css">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/main.css">
  </head>
    <body>
    <div class="main-wrapper-first">
      <div class="hero-area relative">
        <header>
          <div class="container">
            <div class="header-wrap">
              <div class="header-top d-flex justify-content-between align-items-center">
                <div class="logo">
                  <a href="<?php echo base_url('Home') ?>" class=""><h6 class="text-white text-uppercase">Laundry</h6> </a>
                </div>

                <div class="main-menubar d-flex align-items-center">
                  <nav class="">
                    <a href="<?php echo base_url('Home/Perfume') ?>">Perfume</a>
                    <a href="<?php echo base_url('Home/about') ?>">About</a>
                    <a href="<?php echo base_url('Home/list_order') ?>">List Order</a>
                    <?php if ($this->session->userdata('logged_in')): ?>
                      <a href="<?php echo base_url('Login/logout') ?>">Logout</a>
                      <?php else: ?>
                        <a href="<?php echo base_url('Login/login') ?>">Login</a>
                    <?php endif ?>
                  </nav>
                  <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                </div>
              </div>
            </div>
          </div>
        </header>