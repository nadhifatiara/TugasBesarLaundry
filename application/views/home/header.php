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
        <div class="banner-area">
          <div class="container">
            <div class="row height align-items-center">
              <div class="col-lg-7">
                <div class="banner-content">
                  <h1 class="text-white text-uppercase mb-10">Laundry, <br> Where ever you are</h1>
                  <p class="text-white mb-30"></p>
                  <?php if (!$this->session->userdata("logged_in")): ?>
                    <a href="<?php echo base_url('Login/login') ?>" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Log in First</span><span class="lnr lnr-arrow-right"></span></a>
                  
                  <?php endif ?>
                  <?php if ($this->session->userdata("logged_in") && $this->session->flashdata('order_data') == null): ?>
                   <?php echo form_open("Home/order"); ?>
                   <div class="col-md-12">
                      <div class="input-group">
                      <select name="perfume" id="" class="form-control">
                      <?php foreach ($perfume as $key => $value): ?>
                        <option value="<?php echo $value['perfume_id'] ?>"><?php echo $value['perfume_name']." Rp.".$value['perfume_costperkilo'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <select name="typelaundry" id="" class="form-control">
                      <?php foreach ($typelaundry as $key => $value): ?>
                        <option value="<?php echo $value['typelaundry_id'] ?>"><?php echo $value['typelaundry_name']." Rp. ".$value['typelaundry_costperkilo'] ?></option>
                      <?php endforeach ?>
                    </select>
                   
                    </div>
                     <input type="text" name="address" class="single-input" placeholder="Address Pickup">
                     <input type="submit" class="genric-btn primary-border btn-block" value="Pick Up">
                   </div>
                   <?php echo form_close(); ?>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('order_data') != null): ?>

                      <p class="text-white">Pemesanan Anda Sedang Diproses, <a href="<?php echo base_url("Home/list_order") ?>" class="btn btn-primary cicle">Check Transaksi</a></p>
                    <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>