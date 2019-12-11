<?php
	$user_id = $user[0]->user_id;
	$password = $user[0]->password;
?>
<form url="<?= base_url('gantipassword-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Ganti Password</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-4 showcase_text_area">
				<label for="password_lama" class="mandatory">Password Lama</label>
			</div>
			<div class="col-md-8 showcase_content_area">
				<input type="password" class="form-control" name="password_lama" id="password_lama" maxlength="6" placeholder="Masukkan Password Lama" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-4 showcase_text_area">
				<label for="password_baru" class="mandatory">Password Baru</label>
			</div>
			<div class="col-md-8 showcase_content_area">
				<input type="password" class="form-control" name="password_baru" id="password_baru" maxlength="6" placeholder="Masukkan Password Lama" required="">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="user_id" value="<?= $user_id ?>">
		<input type="hidden" name="password" value="<?= $password ?>">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>