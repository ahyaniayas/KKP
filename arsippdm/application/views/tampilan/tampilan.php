<?php $this->load->view('_part/header'); ?>
<?php
	$judulH = "Konfigurasi";
	$judul = "Tampilan";
?>
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
				<li class="breadcrumb-item">
					<a href="<?= base_url() ?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page"><?= $judulH." ".$judul ?></li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="grid">
			<p class="grid-header"><?= $judul ?></p>
			<div class="item-wrapper" style="padding: 5px;">
				<!-- <button type="button" class="btn btn-primary btn-xs float-right" style="margin: 5px 0;" title="Perbaharui Data" onclick="location.reload()"><i class="mdi mdi-autorenew"></i> Perbaharui Data</button> -->
				<div class="table-responsive" id="tempatTbl">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- content viewport ends -->

<!-- modals -->
<!-- modal for TAMBAH, EDIT, LIHAT, HAPUS -->
<div class="modal fade" id="modalForm">
	<div class="modal-dialog modal-md">
		<div class="modal-content" id="tempatForm">
		</div>
	</div>
</div>
<!-- end modals -->

<!-- script for this page -->
<script>
	var tblUrl = "<?= base_url('tbl-tampilan') ?>";
	var tempatTbl = "#tempatTbl";
	$(document).ready(function(){
		resetTable(tblUrl, tempatTbl);
	});

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
				// console.log(respons);
				if(respons[1]=="tambah"){
				    getForm("<?= base_url('tambah-user') ?>");
			    }else{
			    	$(".modal").modal("hide");
			    }
		    	alert("Silahkan clear cache browser anda jika gambar tidak berubah", "error");
		    	alertPopup(respons[0]);
				resetTable(tblUrl, tempatTbl);
				hideLoading();
				location="#";
			},
			error : function(respons){
				// alert("Proses Gagal", "error");
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
<!-- end script for this page -->
<?php $this->load->view('_part/footer'); ?>