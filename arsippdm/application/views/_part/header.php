<?php
  $segment1 = $this->uri->segment(1);
  $user_id = $this->session->userdata('user_id');
  $user_idBase64 = str_replace('=', '', base64_encode($user_id));

  $no_induk = $this->session->no_induk;
  $username = $this->session->username;
  $nama = $this->session->nama;

  // print_r($this->session);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Arsip Surat</title>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <!-- end Custom CSS -->
    <!-- bootstrap datatables -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/css/dataTables.bootstrap4.min.css') ?>">
    <!-- end bootstrap datatables -->
    <!-- icon title -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/label-kecil.gif') ?>" />
    <!-- end icon title -->
    <!-- gijgo -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/gijgo/dist/combined/css/gijgo.min.css') ?>"/>
    <!-- end gijgo -->
    <!-- Bootstrap Material Datetimepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/material-datetimepicker/css/bootstrap-material-datetimepicker.css') ?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/vendors/material-datetimepicker/css/custom.css') ?>"/>
    <!-- end Bootstrap Material Datetimepicker -->
  </head>
  <body class="header-fixed">
    <?php $this->load->view('_part/loading'); ?>
    <!-- partial:partials/_header.html -->
    <!-- Alert Popup -->
    <div class="alertPopup" style="display:none">Alert</div>
    <!-- end Alert Popup -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="<?= base_url() ?>">
          <img class="logo" src="<?= base_url('assets/images/label-panjang.gif') ?>" alt="">
          <img class="logo-mini" src="<?= base_url('assets/images/label-kecil.gif') ?>" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          <!-- <form action="#" class="t-header-search-box">
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari" autocomplete="off">
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form> -->
          <ul class="nav ml-auto">
            <li style="margin: 0 5px;">
              <?= $nama ?>
            </li>
            <li style="margin: 0 5px;">
              <strong id="jam">00:00:00</strong>
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
          <li class="<?= empty($segment1)? 'active': ''; ?>">
            <a href="<?= base_url() ?>">
              <span class="link-title">Dashboard</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>

          <li class="<?= ($segment1=='arsip')? 'active': ''; ?>">
            <a href="<?= base_url('arsip') ?>">
              <span class="link-title">Arsip</span>
              <i class="mdi mdi-file-document link-icon"></i>
            </a>
          </li>

          <li>
            <a href="#" onclick="getForm('<?= base_url($user_idBase64.'/gantipassword') ?>')">
              <span class="link-title">Ganti Password</span>
              <i class="mdi mdi-key link-icon"></i>
            </a>
          </li>

          <?php
            $konfActive="";
            $konfAria="false";
            $konfUl="";
            if($segment1=='user'){
              $konfActive="active";
              $konfAria="true";
              $konfUl="show";
            }
          ?>
          <?php if($no_induk=="999999999"){ ?>
          <li class="<?= $konfActive ?>">
            <a href="#navigation1" data-toggle="collapse" aria-expanded="<?= $konfAria ?>">
              <span class="link-title">Konfigurasi</span>
              <i class="mdi mdi-settings link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu <?= $konfUl ?>" id="navigation1">
              <li>
                <a class="<?= ($segment1=='user')? 'active': ''; ?>" href="<?= base_url('user') ?>">Pengguna</a>
              </li>
              <!-- <li>
                <a class="" href="">Tampilan</a>
              </li> -->
            </ul>
          </li>
          <?php } ?>
          
          <li>
            <a href="<?= base_url('login') ?>">
              <span class="link-title">Keluar</span>
              <i class="mdi mdi-logout link-icon"></i>
            </a>
          </li>
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
<!-- inputmask -->
<script src="<?= base_url('assets/vendors/Inputmask/dist/jquery.inputmask.js') ?>"></script>
<!-- end inputmask -->
<!-- jquery-mask -->
<script src="<?= base_url('assets/vendors/jquery-mask/src/jquery.mask.js') ?>"></script>
<!-- end jquery-mask -->
<!-- Bootstrap Material Datetimepicker -->
<script src="<?= base_url('assets/vendors/material-datetimepicker/momentjs/moment.js') ?>"></script>
<script src="<?= base_url('assets/vendors/material-datetimepicker/js/bootstrap-material-datetimepicker.js') ?>"></script>
<!-- end Bootstrap Material Datetimepicker -->