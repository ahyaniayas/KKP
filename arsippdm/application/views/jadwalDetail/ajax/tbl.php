<?php
	$iduserlogin = $this->session->userdata('id');
	if($iduserlogin=="1" || $iduserlogin==$id_pj[0]->id_pj){
		$btnDisable = "";
	}else{
		$btnDisable = "disabled";
	}
?>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<th><strong>Nama</strong></th>
			<th><strong>Bayar</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($jadwalDetail as $isi){ 
			$id = $isi->id;
			$idBase64 = str_replace('=', '', base64_encode($id));
			$urlEdit = base_url($idBase64."/edit-jadwal-detail");
			$urlLihat = base_url($idBase64."/lihat-jadwal-detail");
			$urlHapus = base_url($idBase64."/hapus-jadwal-detail");
		?>
		<tr id="<?= $id ?>" ondblclick="trpopup(this.id)">
			<td>
				<!-- Start Tooltip Tools -->
				<a id="trpopup<?= $id ?>" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
				<div style='text-align: right'>
					<button <?= $btnDisable ?> class='btn btn-xs btn-success' type='button' title='Lihat Data' onclick='getForm(&quot;<?= $urlLihat ?>&quot;)'>
						<i class='mdi mdi-note-outline'></i>
					</button>
					<button <?= $btnDisable ?> class='btn btn-xs btn-warning' type='button' title='Edit Data' onclick='getForm(&quot;<?= $urlEdit ?>&quot;)'>
						<i class='mdi mdi-pencil-box-outline'></i>
					</button>
					<button <?= $btnDisable ?> class='btn btn-xs btn-danger' type='button' title='Hapus Data' onclick='getForm(&quot;<?= $urlHapus ?>&quot;)'>
						<i class='mdi mdi-delete-variant'></i>
					</button>
				</div>
				"></a>
				<!-- End Tooltip Tools -->
			
				<?= strtoupper($isi->keterangan) ?>		
			</td>
			<td><?= number_format($isi->bayar) ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatables("#example", "", "", );
</script>