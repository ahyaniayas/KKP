<?php 
	if(!empty($parameter) && $parameter=="lihat"){
		$judul = "Lihat Data";
	}else{
		$judul = "Edit Data";
	}

	$id = $surat[0]->surat_id;
	$nomor = $surat[0]->nomor;
	$tglsurat = $surat[0]->tglsurat;
	$perihal = $surat[0]->perihal;
	$uraian = $surat[0]->uraian;
	$jenissurat = $surat[0]->jenissurat;
	$tujuandari = $surat[0]->tujuandari;
	$file = $surat[0]->file;
?>
<form url="<?= base_url('edit-surat-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title"><?= $judul ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="jenissuratE" class="mandatory">Jenis Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<select class="form-control" name="jenissurat" id="jenissuratE" required="">
					<option value="">--- Pilih Jenis Surat ---</option>
					<option <?= ($jenissurat=="MASUK")? "selected": ""; ?>>MASUK</option>
					<option <?= ($jenissurat=="KELUAR")? "selected": ""; ?>>KELUAR</option>
				</select>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nomorE" class="">Nomor Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control" name="nomor" id="nomorE" maxlength="50" placeholder="Masukkan No Surat" value="<?= $nomor ?>" readonly="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tglsuratE" class="mandatory">Tanggal</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control datepicker" name="tglsurat" id="tglsuratE" maxlength="" placeholder="dd-mm-yyyy" value="<?= date("d-m-Y", strtotime($tglsurat)) ?>" required="">
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
				<label for="uraianE" class="mandatory">Uraian</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="uraian" id="uraianE" maxlength="" placeholder="Masukkan Uraian" required="" style="height: 75px;"><?= $uraian ?></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tujuandariE" class="mandatory">Tujuan/Dari</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="tujuandari" id="tujuandariE" maxlength="100" placeholder="Masukkan Tujuan/Dari" value="<?= $tujuandari ?>" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="fileE" class="">File</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="file" name="file" id="fileE">
				<p class="text-danger">* Sementara upload file maksimal 120kb</p>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="surat_id" value="<?= $id ?>" >
		<input type="hidden" name="file_lama" value="<?= $file ?>" >
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
</script>