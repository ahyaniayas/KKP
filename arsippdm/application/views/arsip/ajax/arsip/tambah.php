
<form url="<?= base_url('tambah-arsip-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Tambah Data</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nama_arsip" class="mandatory">Nama Arsip</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="nama_arsip" id="nama_arsip" maxlength="25" placeholder="Masukkan Nama Arsip" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="keterangan" class="mandatory">Keterangan</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control upper" name="keterangan" id="keterangan" maxlength="" placeholder="Masukkan Keterangan" required="" style="height: 75px;"></textarea>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>