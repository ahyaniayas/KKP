
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td><strong>Nomor</strong></td>
			<td><strong>Tanggal</strong></td>
			<td><strong>Perihal</strong></td>
			<td><strong>Jenis</strong></td>
			<td><strong>Tujuan/Dari</strong></td>
			<td><strong>File</strong></td>
		</tr>
		<tr>
			<th>Nomor</th>
			<th>Tanggal</th>
			<th>Perihal</th>
			<th>Jenis</th>
			<th>Tujuan/Dari</th>
			<th>File</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($surat as $isi){ 
			$id = $isi->surat_id;
			$idBase64 = str_replace('=', '', base64_encode($id));

			$nomor = $isi->nomor;
			$tglsurat = $isi->tglsurat;
			$perihal = $isi->perihal;
			$jenissurat = $isi->jenissurat;
			$tujuandari = $isi->tujuandari;
			$file = $isi->file;

			$urlEdit = base_url($idBase64."/edit-arsip");
			$urlLihat = base_url($idBase64."/lihat-arsip");
			$urlHapus = base_url($idBase64."/hapus-arsip");
		?>
		<tr id="<?= $id ?>" ondblclick="trpopup(this.id)">
			<td>
				<!-- Start Tooltip Tools -->
				<a id="trpopup<?= $id ?>" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
				<div style='text-align: right'>
					<button class='btn btn-xs btn-success' type='button' title='Lihat Data' onclick='getForm(&quot;<?= $urlLihat ?>&quot;)'>
						<i class='mdi mdi-note-outline'></i>
					</button>
					<button class='btn btn-xs btn-warning' type='button' title='Edit Data' onclick='getForm(&quot;<?= $urlEdit ?>&quot;)'>
						<i class='mdi mdi-pencil-box-outline'></i>
					</button>
					<button class='btn btn-xs btn-danger' type='button' title='Hapus Data' onclick='getForm(&quot;<?= $urlHapus ?>&quot;)'>
						<i class='mdi mdi-delete-variant'></i>
					</button>
				</div>
				"></a>
				<!-- End Tooltip Tools -->
			
				<?= $nomor ?>		
			</td>
			<td>
				<span class="d-none"><?= date("Ymd", strtotime($tglsurat)) ?></span>
				<?= date("d-m-Y", strtotime($tglsurat)) ?>	
			</td>
			<td><?= $perihal ?></td>
			<td><?= $jenissurat ?></td>
			<td><?= $tujuandari ?></td>
			<td><?= $file ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatablesSearch("#example", "1-desc", "0-false", );
</script>