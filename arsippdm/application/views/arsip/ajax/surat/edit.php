<?php 
	if(!empty($parameter) && $parameter=="lihat"){
		$judul = "Lihat Data";
	}else{
		$judul = "Edit Data";
	}

	$id = $surat[0]->surat_id;
	$arsip_id = $surat[0]->arsip_id;
	$no_agenda = $surat[0]->no_agenda;
	$nomor = $surat[0]->nomor;
	$jenissurat = $surat[0]->jenissurat;
	$tglditerima = $surat[0]->tglditerima;
	$tglsurat = $surat[0]->tglsurat;
	$perihal = $surat[0]->perihal;
	$disposisi = $surat[0]->disposisi;
	$pengirim = $surat[0]->pengirim;
	$penerima = $surat[0]->penerima;
	$file = $surat[0]->file;
	$fileBase64 = str_replace('=', '', base64_encode($file));
?>
<form url="<?= base_url('edit-surat-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title"><?= $judul ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="jenissuratE" class="">Jenis Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<select class="form-control" name="jenissurat" id="jenissuratE" onchange="aksiJenisSurat(this.value)" disabled="">
					<option <?= $jenissurat=="MASUK"? "selected": "" ?>>MASUK</option>
					<option <?= $jenissurat=="KELUAR"? "selected": "" ?>>KELUAR</option>
				</select>
			</div>
		</div>
		<div class="form-group row showcase_row_area MASUKE">
			<div class="col-md-3 showcase_text_area">
				<label for="no_agendaE" class="">Nomor Agenda</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control IMASUK" name="no_agenda" id="no_agendaE" maxlength="5" value="<?= $no_agenda ?>" placeholder="Masukkan No Agenda" readonly="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nomorE" class="mandatory">Nomor Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control" name="nomor" id="nomorE" maxlength="100" value="<?= $nomor ?>" placeholder="Masukkan No Surat" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area MASUKE">
			<div class="col-md-3 showcase_text_area">
				<label for="tglditerimaE" class="mandatory">Tanggal Diterima</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control datepicker IMASUK" name="tglditerima" id="tglditerimaE" maxlength="" value="<?= date("d-m-Y", strtotime($tglditerima)) ?>" placeholder="dd-mm-yyyy" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tglsuratE" class="mandatory">Tanggal Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control datepicker" name="tglsurat" id="tglsuratE" maxlength="" value="<?= date("d-m-Y", strtotime($tglsurat)) ?>" placeholder="dd-mm-yyyy" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="perihalE" class="mandatory">Perihal</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control upper" name="perihal" id="perihalE" maxlength="" placeholder="Masukkan Perihal" required="" style="height: 50px;"><?= $perihal ?></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="pengirimE" class="mandatory">Pengirim</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="pengirim" id="pengirimE" maxlength="100" value="<?= $pengirim ?>" placeholder="Masukkan Pengirim" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="penerimaE" class="mandatory">Penerima</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="penerima" id="penerimaE" maxlength="100" value="<?= $penerima ?>" placeholder="Masukkan Penerima" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="disposisiE" class="">Disposisi / Catatan</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="disposisi" id="disposisiE" maxlength="" placeholder="Masukkan Disposisi / Catatan" style="height: 75px;"><?= $disposisi ?></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="file">File</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="file" name="file" id="file">

				<?php if(file_exists("./upload/".$file) && !empty($file)){ ?>
				<p>File tersimpan : <a href="<?= base_url($fileBase64.'/downsurat') ?>" target="_blank" title="Download Surat"><?= $file ?></a></p>
				<?php }else{ ?>
				<p>Tidak ada file tersimpan</p>
				<?php } ?>
				<!-- <p class="text-danger">* Sementara upload file maksimal 120kb</p> -->
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="surat_id" value="<?= $id ?>" >
		<input type="hidden" name="arsip_id" value="<?= $arsip_id ?>" >
		<input type="hidden" name="file_lama" value="<?= $file ?>" >
		<input type="hidden" name="nomor_lama" value="<?= $nomor ?>" >
		<input type="hidden" name="jenissurathide" value="<?= $jenissurat ?>" >
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Edit"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>
<script>
	<?php if(!empty($parameter) && $parameter=="lihat"){ ?>
	$("input").attr("disabled", "");
	$("select").attr("disabled", "");
	$("textarea").attr("readonly", "");
	$("button[type='submit']").hide();
	<?php } ?>

	<?php if($jenissurat=="MASUK"){ ?>
	$(".IMASUKE").removeAttr("disabled");
	$(".MASUKE").show("fast");

	<?php }elseif($jenissurat=="KELUAR"){ ?>
	$(".IMASUKE").attr("disabled", "");
	$(".MASUKE").hide("fast");
	<?php } ?>
</script>