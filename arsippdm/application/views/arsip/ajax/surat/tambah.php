<?php
	$idH = $idH;
?>
<form url="<?= base_url('tambah-arsip-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Tambah Data</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nomor" class="mandatory">Nomor Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper nosurat" name="nomor" id="nomor" maxlength="" placeholder="99-ZZ-99" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tglsurat" class="mandatory">Tanggal</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control datepicker" name="tglsurat" id="tglsurat" maxlength="" placeholder="dd-mm-yyyy" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="perihal" class="mandatory">Perihal</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control upper" name="perihal" id="perihal" maxlength="" placeholder="Masukkan Perihal" required="" style="height: 75px;"></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="jenissurat" class="mandatory">Jenis Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<select class="form-control" name="jenissurat" id="jenissurat" required="">
					<option value="">--- Pilih Jenis Surat ---</option>
					<option>MASUK</option>
					<option>KELUAR</option>
				</select>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tujuandari" class="mandatory">Tujuan/Dari</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="tujuandari" id="tujuandari" maxlength="50" placeholder="Masukkan Perihal" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="file" class="mandatory">File</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="file" name="file" id="file" required="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="arsip_id" value="<?= $idH ?>">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>