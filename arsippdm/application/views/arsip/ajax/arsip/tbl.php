
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td><strong>Nama Arsip</strong></td>
			<td><strong>Keterangan</strong></td>
		</tr>
		<tr>
			<th>Nama Arsip</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($arsip as $isi){ 
			$id = $isi->arsip_id;
			$idBase64 = str_replace('=', '', base64_encode($id));

			$nama_arsip = $isi->nama_arsip;
			$keterangan = $isi->keterangan;

			$urlEdit = base_url($idBase64."/edit-arsip");
			$urlLihat = base_url($idBase64."/lihat-arsip");
			$urlHapus = base_url($idBase64."/hapus-arsip");

			$urlDetail = base_url("arsip/".$idBase64);
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
					<a href='<?= $urlDetail ?>' class='btn btn-xs btn-success' title='Lihat Detail'>
						<i class='mdi mdi-arrow-top-right'></i>
					</a>
				</div>
				"></a>
				<!-- End Tooltip Tools -->
			
				<?= $nama_arsip ?>		
			</td>
			<td><?= $keterangan ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatablesSearch("#example", "0-asc", "", );
</script>