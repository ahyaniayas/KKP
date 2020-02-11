<?php $this->load->view('_part/header'); ?>
<?php
  // print_r($arsip);
  $nama = $this->session->nama;
?>
<div class="page-content-wrapper-inner">
  <div class="content-viewport">
    <div class="row">
      <div class="col-12 py-5">
        <h4>Selamat Datang, <?= $nama ?></h4>
      </div>
    </div>
    <div class="row">

      <?php 
        foreach($arsip as $isi){ 
          $arsip_id = $isi->arsip_id;
          $arsip_idBase64 = str_replace('=', '', base64_encode($arsip_id));
          $nama_arsip = $isi->nama_arsip;
          $pada = date("d-m-Y", strtotime($isi->created_on));
          $jml_surat = $isi->jml_surat;
      ?>
      <div class="col-md-3 col-sm-6 col-12 equel-grid">
        <div class="grid">
          <div class="grid-body text-gray">
            <div class="row">
              <div class="col-4">
                <i class="mdi mdi-file-document mdi-6x"></i>
              </div>
              <div class="col-8" style="padding: 10px;">
                <p><b><?= $nama_arsip ?></b></p>
                <p><?= $pada ?></p>
                <p><?= number_format($jml_surat) ?> Surat</p>
              </div>
            </div>
            <!-- <div style="clear: both;"></div> -->
            <p class="text-black"><b></b></p>
            <div class="wrapper w-100 mt-4">
              <a href="<?= base_url('arsip/'.$arsip_idBase64) ?>">
                <i class="btn btn-outline-success col-12 mdi mdi-arrow-top-right mdi-2x"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>

  <!-- modals -->
  <!-- modal for TAMBAH, EDIT, LIHAT, HAPUS -->
  <div class="modal fade" id="modalForm">
    <div class="modal-dialog modal-md">
      <div class="modal-content" id="tempatForm">
      </div>
    </div>
  </div>
  <!-- end modals -->

</div>

<script>

  function submitData(ini, e){
    e.preventDefault();
    showLoading();
    var URL = $(ini).attr("url");

    var formData = new FormData(ini);
    $.ajax({
      type:'POST',
      url: URL,
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(RESPONS){
        var respons = JSON.parse(RESPONS);
        if(respons[1]=="tambah"){
          getForm("<?= base_url('tambah-user') ?>");
        }else{
          $(".modal").modal("hide");
        }
        alertPopup(respons[0]);
        // resetTable(tblUrl, tempatTbl);
        hideLoading();
      },
      error : function(respons){
        alertPopup("Proses Gagal");
        $(".modal").modal("hide");
        hideLoading();
      }

    })
  }

  function getForm(tujuan){
    showLoading();
    var url = tujuan;
    $("#tempatForm").load(url, function(responseTxt, statusTxt, xhr){
      if(statusTxt == "success"){
        closepopup();
        upper();
        $("#modalForm").modal("show");
        hideLoading();
      }
      if(statusTxt == "error"){
        alert("Error: " + xhr.status + ": " + xhr.statusText, "error");
        hideLoading();
      }
    });
  }
</script>

<!-- content viewport ends -->
<?php $this->load->view('_part/footer'); ?>
