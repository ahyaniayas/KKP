<?php
	
	$id = $arsip[0]->arsip_id;
	$nama_arsip = $arsip[0]->nama_arsip;
	$ket = $nama_arsip;

?>
<form url="<?= base_url('hapus-arsip-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Hapus Data <?= $ket ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="arsip_id" value="<?= $id ?>" >
		<button type="submit" class="btn btn-xs btn-danger"><i class="mdi mdi-delete-variant" title="Hapus"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>