<?php 
	if(!empty($parameter) && $parameter=="lihat"){
		$judul = "Lihat Data";
	}else{
		$judul = "Edit Data";
	}

	$user_id = $user[0]->user_id;
	$no_induk = $user[0]->no_induk;
	$nama = $user[0]->nama;
	$username = $user[0]->username;
?>
<form url="<?= base_url('edit-user-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title"><?= $judul ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="no_indukE" class="mandatory">No Induk</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="no_induk" id="no_indukE" maxlength="25" value="<?= $no_induk ?>" placeholder="Masukkan No Induk" required="" <?= $no_induk=="999999999"? "readonly": "" ?>>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="namaE" class="mandatory">Nama</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="nama" id="namaE" maxlength="25" value="<?= $nama ?>" placeholder="Masukkan Nama" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="usernameE" class="mandatory">Username</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control" name="username" id="usernameE" maxlength="15" value="<?= $username ?>" placeholder="Masukkan Username" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="passwordE" class="">Password</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control" name="password" id="passwordE" maxlength="6" placeholder="Masukkan Password">
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="user_id" value="<?= $user_id ?>" >
		<input type="hidden" name="no_induk_lama" value="<?= $no_induk ?>" >
		<input type="hidden" name="username_lama" value="<?= $username ?>" >
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