<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masuk E-Arsip Surat</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.addons.css') ?>" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/shared/style.css') ?>" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/demo_1/style.css') ?>">
    <!-- Layout style -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <!-- Custom CSS -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/label-kecil.gambar') ?>" />
  </head>
  <body>
    <img class="bg-image" src="<?= base_url('assets/images/bg.gambar') ?>"/>
    <?php $this->load->view('_part/loading'); ?>
    <div class="authentication-theme auth-style_1">
      <div class="row">
        <div class="col-12 logo-section">
          <a href="<?= base_url() ?>" class="logo">
            <img src="<?= base_url('assets/images/label.gambar') ?>" alt="logo" />
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid">
            <div class="grid-body">
            <!-- alert -->
            <div class="alert" id="alert">
              <button type="button" class="close" onclick="closeAlert()">&times;</button>
              <strong id="msgAlert"></strong>
            </div>
            <!-- end alert -->
              <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                  <form url="<?= base_url('login-aksi') ?>" onsubmit="submitData(this, event)">
                    <div class="form-group input-rounded">
                      <input type="text" class="form-control text-center" name="username" placeholder="Masukkan Username" required="" />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="password" class="form-control text-center" name="password" placeholder="Masukkan Password" required="" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Masuk </button>
                  </form>
                  <!-- <div class="signup-link">
                    <a href="#">Lupa Password?</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth_footer">
        <p class="text-muted text-center">© ahyaniayas.com - KKP 2019</p>
      </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="<?= base_url('assets/vendors/js/core.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/js/vendor.addons.js') ?>"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="<?= base_url('assets/js/template.js') ?>"></script>
    <!-- endbuild -->
    <!-- Custom JS -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <!-- end Custom JS -->

    <script>

      function submitData(ini, e){
        e.preventDefault();
        showLoading();
        var URL = $(ini).attr("url");

        var formData = new FormData(ini);
        // for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ' = ' + pair[1]); 
        // }
        $.ajax({
          type:'POST',
          url: URL,
          data:formData,
          cache:false,
          contentType: false,
          processData: false,
          success:function(RESPONS){
            var respons = JSON.parse(RESPONS);
            alert(respons[0], "success");
            location="<?= base_url() ?>";
            hideLoading();
          },
          error : function(respons){
            alert("Masuk Gagal", "error");
            hideLoading();
          }
        })
      }
    </script>
  </body>
</html>