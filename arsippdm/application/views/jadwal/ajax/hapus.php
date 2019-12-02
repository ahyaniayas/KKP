
<form url="<?= base_url('hapus-jadwal-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Hapus Data <?= substr($jadwalEdit[0]->deskripsi, 0, 40) ?><?= strlen($jadwalEdit[0]->deskripsi)>40? "...": "" ?></h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="idjadwal_h" value="<?= $jadwalEdit[0]->id ?>" >
		<button type="submit" class="btn btn-xs btn-danger"><i class="mdi mdi-delete-variant" title="Hapus"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>