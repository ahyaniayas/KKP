<?php
  $judul = $this->uri->segment(1);
  $iduserlogin = $this->session->userdata('id');
  $nama = $this->session->nama;
  $kontak = $this->session->kontak;
  $token = $this->session->userdata('token');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aplikasi Acara</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') ?>">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/shared/style.css') ?>">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/demo_1/style.css') ?>">
    <!-- Layout style -->
    <!-- bootstrap datatables -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/css/dataTables.bootstrap4.min.css') ?>">
    <!-- end bootstrap datatables -->
    <!-- icon title -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/label-acara.gif') ?>" />
    <!-- end icon title -->
    <!-- gijgo -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/gijgo/dist/combined/css/gijgo.min.css') ?>"/>
    <!-- end gijgo -->
  </head>
  <body class="header-fixed">
    <?php $this->load->view('_part/loading'); ?>
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="<?= base_url() ?>">
          <img class="logo" src="<?= base_url('assets/images/label-acara-panjang.gif') ?>" alt="">
          <img class="logo-mini" src="<?= base_url('assets/images/label-acara.gif') ?>" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          <?php if($iduserlogin=="1"){ ?>
          <form action="#" class="t-header-search-box">
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari" autocomplete="off">
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form>
          <?php } ?>
          <ul class="nav ml-auto">
            <li>
              <?= strtoupper($nama) ?> <?= empty($kontak)? "Tamu": "(".$kontak.")" ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <ul class="navigation-menu">
          <li class="nav-category-divider">MENU</li>
          <?php if(!empty($token)){ ?>
          <li class="<?= empty($judul)? 'active': ''; ?>">
            <a href="<?= base_url() ?>">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <?php } ?>
          <li>
            <a href="#navigation1" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Manajemen Data</span>
              <i class="mdi mdi-database link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="navigation1">
              <?php if($iduserlogin=="1"){ ?>
              <li>
                <a href="<?= base_url('user') ?>">Pengguna</a>
              </li>
              <?php } ?>
              <li>
                <?php if(empty($token)){ ?>
                <a href="#jadwal">Jadwal</a>
                <?php }else{ ?>
                <a href="<?= base_url('jadwal') ?>">Jadwal</a>
                <?php } ?>
              </li>
            </ul>
          </li>
          <?php if(!empty($token)){ ?>
          <li>
            <a href="<?= base_url('login') ?>">
              <span class="link-title">Keluar</span>
              <i class="mdi mdi-logout link-icon"></i>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        <!-- alert -->
        <div class="alert" id="alert">
          <button type="button" class="close" onclick="closeAlert()">&times;</button>
          <strong id="msgAlert"></strong>
        </div>
        <!-- end alert -->

<!-- SCRIPT LOADING START FORM HERE /////////////-->
<!-- plugins:js -->
<script src="<?= base_url('assets/vendors/js/core.js') ?>"></script>
<!-- endinject -->
<!-- Vendor Js For This Page Ends-->
<script src="<?= base_url('assets/vendors/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/chartjs/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/js/charts/chartjs.addon.js') ?>"></script>
<!-- Vendor Js For This Page Ends-->
<!-- build:js -->
<script src="<?= base_url('assets/js/template.js') ?>"></script>
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
<!-- endbuild -->
<!-- bootstrap -->
<script src="<?= base_url('assets/vendors/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- end bootstrap -->
<!-- jquery datatables -->
<script src="<?= base_url('assets/vendors/jquery/jquery.dataTables.min.js') ?>"></script>
<!-- end jquery datatables -->
<script src="<?= base_url('assets/vendors/bootstrap/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- end bootstrap datatables -->
<!-- Custom JS -->
<script src="<?= base_url('assets/js/custom.js') ?>"></script>
<!-- end Custom JS -->
<!-- gijgo -->
<script src="<?= base_url('assets/vendors/gijgo/dist/combined/js/gijgo.min.js') ?>"></script>
<!-- end gijgo -->
<!-- numeral -->
<script src="<?= base_url('assets/vendors/numeral/numeral.js') ?>"></script>
<!-- end numeral -->