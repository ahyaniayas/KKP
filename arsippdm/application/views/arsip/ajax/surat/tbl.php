
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td><strong>Jenis</strong></td>
			<td><strong>Nomor</strong></td>
			<td><strong>Tanggal Diterima</strong></td>
			<td><strong>Tanggal Surat</strong></td>
			<td><strong>Perihal</strong></td>
			<td><strong>Pengirim</strong></td>
			<td><strong>Penerima</strong></td>
			<td><strong>File</strong></td>
		</tr>
		<tr>
			<th>Jenis</th>
			<th>Nomor</th>
			<th>Tanggal Diterima</th>
			<th>Tanggal Surat</th>
			<th>Perihal</th>
			<th>Pengirim</th>
			<th>Penerima</th>
			<th>File</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($surat as $isi){ 
			$id = $isi->surat_id;
			$idBase64 = str_replace('=', '', base64_encode($id));

			$jenissurat = $isi->jenissurat;
			$no_agenda = $isi->no_agenda;
			$nomor = $isi->nomor;
			$tglditerima = $isi->tglditerima;
			$tglsurat = $isi->tglsurat;
			$perihal = $isi->perihal;
			$pengirim = $isi->pengirim;
			$penerima = $isi->penerima;
			$file = $isi->file;
			$fileBase64 = str_replace('=', '', base64_encode($file));

			$urlEdit = base_url($idBase64."/edit-surat");
			$urlLihat = base_url($idBase64."/lihat-surat");
			$urlHapus = base_url($idBase64."/hapus-surat");
		?>
		<tr id="<?= $id ?>" ondblclick="trpopup(this.id)">

			<td><?= $jenissurat ?></td>
			<td>
				<?= $jenissurat=="MASUK"? $no_agenda." - ": "" ?><?= $nomor ?>
				
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
			<td>
				<?php if($jenissurat=="MASUK"){ ?>
				<span class="d-none"><?= strtotime($tglditerima) ?></span>
				<?= date("d-m-Y", strtotime($tglditerima)) ?>	
				<?php } ?>
			</td>
			<td>
				<span class="d-none"><?= strtotime($tglsurat) ?></span>
				<?= date("d-m-Y", strtotime($tglsurat)) ?>
			</td>
			<td><?= $perihal ?></td>
			<td><?= $pengirim ?></td>
			<td><?= $penerima ?></td>
			<td>
				<?php if(file_exists("./upload/".$file) && !empty($file)){ ?>
				<a href="<?= base_url($fileBase64.'/downsurat') ?>" target="_blank" title="Download Surat"><?= $file ?></a>
				<?php }else{ ?>
				Tidak ada file
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<script>
    // datatables("#idtable", "order-valueOrder", "target-orderable");
    datatablesSearch("#example", "3-desc", "", );
</script>