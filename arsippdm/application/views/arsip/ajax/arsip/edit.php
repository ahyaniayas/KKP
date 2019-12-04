<?php 
	if(!empty($parameter) && $parameter=="lihat"){
		$judul = "Lihat Data";
	}else{
		$judul = "Edit Data";
	}

	$id = $arsip[0]->arsip_id;
	$nama_arsip = $arsip[0]->nama_arsip;
	$keterangan = $arsip[0]->keterangan;
?>
<form url="<?= base_url('edit-arsip-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title"><?= $judul ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nama_arsipE" class="mandatory">Nama Arsip</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="nama_arsip" id="nama_arsipE" maxlength="25" value="<?= $nama_arsip ?>" placeholder="Masukkan Nama Arsip" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="keteranganE" class="mandatory">Keterangan</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control upper" name="keterangan" id="keteranganE" maxlength="" placeholder="Masukkan Keterangan" required="" style="height: 75px;"><?= $keterangan ?></textarea>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="arsip_id" value="<?= $id ?>" >
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Edit"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>
<script>
	<?php if(!empty($parameter) && $parameter=="lihat"){ ?>
	$("input").attr("readonly", "");
	$("select").attr("disabled", "");
	$("textarea").attr("readonly", "");
	$("button[type='submit']").hide();
	<?php } ?>
</script>