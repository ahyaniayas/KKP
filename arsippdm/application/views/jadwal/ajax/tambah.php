
<form url="<?= base_url('tambah-jadwal-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Tambah Data</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tanggalTambah" class="mandatory">Tgl. Rencana </label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input class="gijgo" name="tanggal" id="tanggalTambah" placeholder="31-12-9999" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="deskripsiTambah" class="mandatory">Deskripsi </label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="deskripsi" id="deskripsiTambah" maxlength="" placeholder="Masukkan Deskripsi" required="" style="height: 75px;"></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="lokasiTambah" class="mandatory">Lokasi </label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="lokasi" id="lokasiTambah" maxlength="" placeholder="Masukkan Lokasi" required="" style="height: 40px;"></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="iuranTambah" class="mandatory">Rencana Iuran</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control number" name="iuran" id="iuranTambah" maxlength="" placeholder="Masukkan Jumlah Target Iuran" required="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>