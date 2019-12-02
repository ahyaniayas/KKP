<?php $this->load->view('_part/header'); ?>
<?php
  $nama = $this->session->nama;
  $kontak = $this->session->kontak;
?>
<div class="page-content-wrapper-inner">
  <div class="content-viewport">
    <div class="row">
      <div class="col-12 py-5">
        <h4>Selamat Datang,</h4>
      </div>
    </div>
    <div class="row">

      <?php
        $batas = count($jadwalH);
        $batas = $batas<4? $batas: "4";
        for($i=0; $i<$batas; $i++){ 
      ?>
      <div class="col-md-3 col-sm-6 col-12 equel-grid">
        <div class="grid">
          <div class="grid-body text-gray">
            <div class="d-flex justify-content-between">
              <p><?= number_format($jadwalH[$i]->jml_nama) ?> Orang</p>
              <p>Rp <?= number_format($jadwalH[$i]->iuran) ?></p>
            </div>
            <p class="text-black" style="font-weight: bold;"><?= substr($jadwalH[$i]->deskripsi, 0, 22) ?><?= strlen($jadwalH[$i]->deskripsi)>22? "...": "" ?></p>
            <p class="text-black">PIC : <?= $nama ?> (<?= $kontak ?>)</p>
            <div class="wrapper w-50 mt-4">
              <a href="<?= base_url(($jadwalH[$i]->link).'/jadwal') ?>">
                <i class="btn mdi mdi-arrow-top-right mdi-2x"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
</div>
<!-- content viewport ends -->
<?php $this->load->view('_part/footer'); ?>