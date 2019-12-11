
<form url="<?= base_url('tambah-user-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Tambah Data</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="no_induk" class="mandatory">No Induk</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="no_induk" id="no_induk" maxlength="25" placeholder="Masukkan No Induk" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nama" class="mandatory">Nama</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="nama" id="nama" maxlength="25" placeholder="Masukkan Nama" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="username" class="mandatory">Username</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control" name="username" id="username" maxlength="15" placeholder="Masukkan Username" required="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>