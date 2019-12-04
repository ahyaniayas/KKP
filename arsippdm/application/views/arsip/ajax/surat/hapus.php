<?php
	
	$id = $surat[0]->surat_id;
	$nomor = $surat[0]->nomor;
	$file = $surat[0]->file;
	$ket = $nomor;

?>
<form url="<?= base_url('hapus-surat-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Hapus Data <?= $ket ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="surat_id" value="<?= $id ?>" >
		<input type="hidden" name="file" value="<?= $file ?>" >
		<button type="submit" class="btn btn-xs btn-danger"><i class="mdi mdi-delete-variant" title="Hapus"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>