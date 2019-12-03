<?php $this->load->view('_part/header'); ?>
<div class="page-content-wrapper-inner">
  <div class="content-viewport">
    <div class="row">
      <div class="col-12 py-5">
        <h4>Selamat Datang,</h4>
      </div>
    </div>
    <div class="row">

      <div class="col-md-3 col-sm-6 col-12 equel-grid">
        <div class="grid">
          <div class="grid-body text-gray">
            <div class="row">
              <div class="col-4">
                <i class="mdi mdi-calendar-multiple mdi-6x"></i>
              </div>
              <div class="col-8" style="padding: 10px;">
                <p><b>HARI</b></p>
                <p>TGL INA</p>
              </div>
            </div>
            <!-- <div style="clear: both;"></div> -->
            <p class="text-black"><b></b></p>
            <div class="wrapper w-100 mt-4">
              <a href="<?= base_url() ?>">
                <i class="btn btn-outline-success col-12 mdi mdi-arrow-top-right mdi-2x"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- content viewport ends -->
<?php $this->load->view('_part/footer'); ?>