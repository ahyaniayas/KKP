
<form url="<?= base_url('tambah-jadwal-detail-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Tambah Data</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="keteranganTambah" class="mandatory">Nama</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="keterangan" id="keteranganTambah" maxlength="25" placeholder="Masukkan Nama" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="bayarTambah" class="mandatory">Bayar</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control number" name="bayar" id="bayarTambah" maxlength="" placeholder="Masukkan Jumlah Bayar" required="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="id_jadwal" value="<?= $idH?>">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>