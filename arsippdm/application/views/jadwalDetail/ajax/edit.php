<?php 
	if(!empty($parameter) && $parameter=="lihat"){
		$judul = "Lihat Data";
	}else{
		$judul = "Edit Data";
	}
?>
<form url="<?= base_url('edit-jadwal-detail-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title"><?= $judul ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="keteranganEdit" class="mandatory">Nama</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="keterangan" id="keteranganEdit" value="<?= $jadwalH[0]->keterangan ?>" maxlength="25" placeholder="Masukkan Nama" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="bayarEdit" class="mandatory">Bayar</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control number" name="bayar" id="bayarEdit" value="<?= number_format($jadwalH[0]->bayar) ?>" maxlength="" placeholder="Masukkan Jumlah Bayar" required="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="idjadwal_d" value="<?= $jadwalH[0]->id ?>" >
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Edit"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>
<script>
	<?php if(!empty($parameter) && $parameter=="lihat"){ ?>
	$("input").attr("readonly", "");
	$("button[type='submit']").hide();
	<?php } ?>
</script>