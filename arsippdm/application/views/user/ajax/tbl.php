
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td style="width: 15%"><strong>No Induk</strong></td>
			<td><strong>Nama</strong></td>
			<td><strong>Username</strong></td>
		</tr>
		<tr>
			<th>No Induk</th>
			<th>Nama</th>
			<th>Username</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($user as $isi){ 
			$id = $isi->user_id;
			$idBase64 = str_replace('=', '', base64_encode($id));

			$no_induk = $isi->no_induk;
			$nama = $isi->nama;
			$username = $isi->username;

			$urlEdit = base_url($idBase64."/edit-user");
			$urlLihat = base_url($idBase64."/lihat-user");
			$urlHapus = base_url($idBase64."/hapus-user");
		?>
		<tr id="<?= $id ?>" ondblclick="trpopup(this.id)">
			<td>
				<?= $no_induk ?>

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
			</td>
			<td><?= $nama ?></td>
			<td><?= $username ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatables("#example", "1-asc", "", );
</script>