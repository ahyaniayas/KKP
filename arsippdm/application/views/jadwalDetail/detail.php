<?php $this->load->view('_part/header'); ?>
<?php
	if(empty($jadwalH) || $jadwalH[0]->status=="0"){
		redirect(base_url());
	}
	$iduserlogin = $this->session->userdata('id');

	$judul = "Detail Jadwal";
	$idH = $idBase64 = str_replace('=', '', base64_encode($jadwalH[0]->id));
	$urlGoogleDocsView = "https://docs.google.com/gview?url=";
	$googleDocsView = (base_url()=='http://acara.ahyaniayas.com/')? $urlGoogleDocsView: "";
	$judulLaporan = ($jadwalH[0]->link).("-").(substr($jadwalH[0]->deskripsi, 0, 20)).(strlen($jadwalH[0]->deskripsi)>20? "...": "").(" .pdf");
?>
<div class="page-content-wrapper-inner">
	<div class="viewport-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb has-arrow">
				<li class="breadcrumb-item">
					<a href="<?= base_url() ?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="#">Manajemen Data</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page"><?= $judul ?></li>
			</ol>
		</nav>
	</div>
	<div class="content-viewport">
		<div class="grid">
			<p class="grid-header"><?= $judul ?></p>
			<div class="item-wrapper" style="padding: 5px;overflow: auto;">
				<table cellpadding="5">
					<tr>
						<td style="vertical-align: top;">
							<b>Deskripsi</b>
						</td>
						<td style="vertical-align: top;">
							:
						</td>
						<td>
							<?= $jadwalH[0]->deskripsi ?><br>
							di <?= $jadwalH[0]->lokasi ?><br>
							Tanggal <?= date("d-m-Y", strtotime($jadwalH[0]->tanggal)) ?>
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							<b>Rencana Iuran</b>
						</td>
						<td style="vertical-align: top;">
							:
						</td>
						<td>
							Rp <?= number_format($jadwalH[0]->iuran) ?>
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							<b>Iuran Terkumpul</b>
						</td>
						<td style="vertical-align: top;">
							:
						</td>
						<td id="iuranTerkumpul">
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							<b>Penanggung Jawab</b>
						</td>
						<td style="vertical-align: top;">
							:
						</td>
						<td>
							<?= strtoupper($jadwalH[0]->nama) ?> (<?= $jadwalH[0]->kontak ?>)
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							<b>Link</b>
						</td>
						<td style="vertical-align: top;">
							:
						</td>
						<td>
							<i id="link-jadwal-detail"><?= base_url().$jadwalH[0]->link ?>/jadwal</i>
							<i class="btn btn-secondary mdi mdi-content-copy mdi-2x" title="Salin Link" style="cursor: pointer;" onclick="copyText('link-jadwal-detail')"></i>
						</td>
					</tr>
				</table>
			</div>
			<div class="item-wrapper" style="padding: 5px;">
				<a href="<?= ($googleDocsView).base_url('cetak/'.$judulLaporan) ?>" class="btn btn-warning btn-xs float-right" style="margin: 5px;" title="Cetak Data"><i class="mdi mdi-printer"></i>Cetak Data</a>

				<?php if($iduserlogin=="1" || $iduserlogin==$jadwalH[0]->id_pj){ ?>
				<a href="#" class="btn btn-primary btn-xs float-right" style="margin: 5px;" onclick="getForm('<?= base_url($idH.'/tambah-jadwal') ?>')" title="Tambah Data"><i class="mdi mdi-playlist-plus"></i>Tambah Data</a>
				<?php } ?>
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
	var tblUrl = "<?= base_url($idH.'/tbl-jadwal') ?>";
	var tempatTbl = "#tempatTbl";
	$(document).ready(function(){
		resetTable(tblUrl, tempatTbl);
	});
	function getTerkumpul(){
		$("#iuranTerkumpul").load("<?= base_url($idH.'/terkumpul-jadwal-detail') ?>")
	}
	getTerkumpul();

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
				    getForm("<?= base_url($idH.'/tambah-jadwal') ?>");
			    }else{
			    	$(".modal").modal("hide");
			    }
		    	alert(respons[0], "success");
				resetTable(tblUrl, tempatTbl);
				getTerkumpul();
				hideLoading();
			},
			error : function(respons){
				alert("Proses Gagal", "error");
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
				mandatory();
				upper();
				numFormat("0,0");
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