<?php
	
	$id = $user[0]->user_id;
	$no_induk = $user[0]->no_induk;
	$username = $user[0]->username;
	$nama = $user[0]->nama;
	$ket = $no_induk." - ".$nama;

?>
<form url="<?= base_url('hapus-user-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Hapus Data <?= $ket ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="user_id" value="<?= $id ?>" >
		<input type="hidden" name="no_induk" value="<?= $no_induk ?>" >
		<input type="hidden" name="username" value="<?= $username ?>" >
		<button type="submit" class="btn btn-xs btn-danger"><i class="mdi mdi-delete-variant" title="Hapus"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>