
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<th><strong>Nama</strong></th>
			<th><strong>Kontak</strong></th>
			<th><strong>Token</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($user as $isi){ 
			$id = $isi->id;
			$idBase64 = str_replace('=', '', base64_encode($id));
			$urlEdit = base_url($idBase64."/edit-user");
			$urlLihat = base_url($idBase64."/lihat-user");
			$urlHapus = base_url($idBase64."/hapus-user");
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
			
				<?= strtoupper($isi->nama) ?>		
			</td>
			<td><?= $isi->kontak ?></td>
			<td><?= $isi->token ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatables("#example", "", "", );
</script>