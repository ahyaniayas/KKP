<?php 
	$iduserlogin = $this->session->userdata('id');

	$hideStatus = $iduserlogin=="1"? "": "display:none;";

	if(!empty($parameter) && $parameter=="lihat"){
		$judul = "Lihat Data";
	}else{
		$judul = "Edit Data";
	}
?>
<form url="<?= base_url('edit-jadwal-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title"><?= $judul ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tanggalEdit" class="mandatory">Tgl. Rencana </label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input class="gijgo" name="tanggal" id="tanggalEdit" placeholder="31-12-9999" value="<?= date('d-m-Y', strtotime($jadwalEdit[0]->tanggal))?>" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="deskripsiEdit" class="mandatory">Deskripsi </label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="deskripsi" id="deskripsiEdit" maxlength="" placeholder="Masukkan Deskripsi" required="" style="height: 75px;"><?= $jadwalEdit[0]->deskripsi ?></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="lokasiEdit" class="mandatory">Lokasi </label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="lokasi" id="lokasiEdit" maxlength="" placeholder="Masukkan Lokasi" required="" style="height: 40px;"><?= $jadwalEdit[0]->lokasi ?></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="iuranEdit" class="mandatory">Rencana Iuran</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control number" name="iuran" id="iuranEdit" maxlength="" value="<?= number_format($jadwalEdit[0]->iuran) ?>" placeholder="Masukkan Jumlah Target Iuran" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area" style="<?= $hideStatus ?>">
			<div class="col-md-3 showcase_text_area">
				<label for="statusEdit" class="mandatory">Status</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<select class="form-control" name="status" required="">
					<option value="1" <?= $jadwalEdit[0]->status==1? "selected": "" ?> >Aktif</option>
					<option value="0" <?= $jadwalEdit[0]->status!=1? "selected": "" ?>>Non Aktif</option>
				</select>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="idjadwal_h" value="<?= $jadwalEdit[0]->id ?>" >
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Edit"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>
<script>
	<?php if(!empty($parameter) && $parameter=="lihat"){ ?>
	$("input").attr("readonly", "");
	$("select").attr("disabled", "");
	$("button[type='submit']").hide();
	<?php } ?>
</script>