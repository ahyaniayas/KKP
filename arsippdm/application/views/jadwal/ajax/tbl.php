
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<th><strong>Tgl. Rencana</strong></th>
			<th><strong>Deskripsi</strong></th>
			<th><strong>Lokasi</strong></th>
			<th><strong>Rencana Iuran</strong></th>
			<th><strong>Penanggung Jawab</strong></th>
			<th><strong>Link</strong></th>
			<th><strong>Status</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($jadwal as $isi){ 
			$id = $isi->id;
			$idBase64 = str_replace('=', '', base64_encode($id));
			$status = ($isi->status=="1")? "Aktif": "Non Aktif";
			$urlEdit = base_url($idBase64."/edit-jadwal");
			$urlLihat = base_url($idBase64."/lihat-jadwal");
			$urlHapus = base_url($idBase64."/hapus-jadwal");
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
			
				<?= date("d-m-Y", strtotime($isi->tanggal)) ?>		
			</td>
			<td><?= substr($isi->deskripsi, 0, 40) ?><?= strlen($isi->deskripsi)>40? "...": "" ?></td>
			<td><?= substr($isi->lokasi, 0, 20) ?><?= strlen($isi->lokasi)>20? "...": "" ?></td>
			<td><?= number_format($isi->iuran) ?></td>
			<td><?= strtoupper($isi->nama) ?></td>
			<td><a href="<?= base_url().$isi->link ?>/jadwal"><?= $isi->link ?>/jadwal</a></td>
			<td><?= $status ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatables("#example", "0-desc", "", );
</script>