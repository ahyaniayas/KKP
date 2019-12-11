
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td><strong>Nama Arsip</strong></td>
			<td><strong>Keterangan</strong></td>
			<td style="width: 12%;"><strong>Total Surat</strong></td>
			<td><strong>Progress</strong></td>
			<td style="width: 15%;"><strong>Dibuat Pada</strong></td>
		</tr>
		<tr>
			<th>Nama Arsip</th>
			<th>Keterangan</th>
			<th>Total Surat</th>
			<th>Progress</th>
			<th>Dibuat Pada</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($arsip as $isi){ 
			$id = $isi->arsip_id;
			$idBase64 = str_replace('=', '', base64_encode($id));

			$nama_arsip = $isi->nama_arsip;
			$keterangan = $isi->keterangan;
			$jml_surat = $isi->jml_surat;
			$progress = $isi->progress;
			$created_on = $isi->created_on;

			$urlEdit = base_url($idBase64."/edit-arsip");
			$urlLihat = base_url($idBase64."/lihat-arsip");
			$urlHapus = base_url($idBase64."/hapus-arsip");

			$urlDetail = base_url("arsip/".$idBase64);
		?>
		<tr id="<?= $id ?>" ondblclick="trpopup(this.id)">
			<td>
				<?= $nama_arsip ?>	

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
					<a href='<?= $urlDetail ?>' class='btn btn-xs btn-dark' title='Lihat Detail'>
						<i class='mdi mdi-arrow-top-right'></i>
					</a>
				</div>
				"></a>
				<!-- End Tooltip Tools -->	
			</td>
			<td><?= $keterangan ?></td>
			<td><?= number_format($jml_surat) ?> Surat</td>
			<td><?= $progress ?></td>
			<td>
				<span class="d-none"><?= strtotime($created_on) ?></span>
				<?= date("d-m-Y", strtotime($created_on)) ?>	
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatablesSearch("#example", "4-desc", "", );
</script>