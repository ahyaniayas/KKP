<?php
	$idH = $idH;
?>
<form url="<?= base_url('tambah-surat-aksi') ?>" onsubmit="submitData(this, event)">
	<div class="modal-header">
		<h6 class="modal-title">Tambah Data</h6>
		<button type="button" class="close" data-dismiss="modal" title="Batal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="jenissurat" class="mandatory">Jenis Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<select class="form-control" name="jenissurat" id="jenissurat" onchange="aksiJenisSurat(this.value)" required="">
					<option>MASUK</option>
					<option>KELUAR</option>
				</select>
			</div>
		</div>
		<div class="form-group row showcase_row_area MASUK">
			<div class="col-md-3 showcase_text_area">
				<label for="no_agenda" class="">Nomor Agenda</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control IMASUK" name="no_agenda" id="no_agenda" maxlength="5" value="<?= $no_agenda ?>" placeholder="Masukkan No Agenda" readonly="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="nomor" class="mandatory">Nomor Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control" name="nomor" id="nomor" maxlength="100" placeholder="Masukkan No Surat" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area MASUK">
			<div class="col-md-3 showcase_text_area">
				<label for="tglditerima" class="mandatory">Tanggal Diterima</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control datepicker IMASUK" name="tglditerima" id="tglditerima" maxlength="" placeholder="dd-mm-yyyy" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="tglsurat" class="mandatory">Tanggal Surat</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control datepicker" name="tglsurat" id="tglsurat" maxlength="" placeholder="dd-mm-yyyy" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="perihal" class="mandatory">Perihal</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control upper" name="perihal" id="perihal" maxlength="" placeholder="Masukkan Perihal" required="" style="height: 50px;"></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="pengirim" class="mandatory">Pengirim</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="pengirim" id="pengirim" maxlength="100" placeholder="Masukkan Pengirim" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="penerima" class="mandatory">Penerima</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="text" class="form-control upper" name="penerima" id="penerima" maxlength="100" placeholder="Masukkan Penerima" required="">
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="disposisi" class="">Disposisi / Catatan</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<textarea class="form-control" name="disposisi" id="disposisi" maxlength="" placeholder="Masukkan Disposisi / Catatan" style="height: 75px;"></textarea>
			</div>
		</div>
		<div class="form-group row showcase_row_area">
			<div class="col-md-3 showcase_text_area">
				<label for="file" class="LFILE">File</label>
			</div>
			<div class="col-md-9 showcase_content_area">
				<input type="file" class="IFILE" name="file" id="file">
				<!-- <p class="text-danger">* Sementara upload file maksimal 120kb</p> -->
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="arsip_id" value="<?= $idH ?>">
		<button type="submit" class="btn btn-xs btn-primary"><i class="mdi mdi-content-save" title="Tambah"></i></button>
		<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal" title="Batal"><i>&times;</i></button>
	</div>
</form>
<script>
	function aksiJenisSurat(jenis){
		if(jenis=="MASUK"){
			$(".IMASUK").removeAttr("disabled");
			$(".MASUK").show("fast");

			$(".LFILE").removeClass("mandatory");
			$(".IFILE").removeAttr("required");
		}else if(jenis=="KELUAR"){
			$(".IMASUK").attr("disabled", "");
			$(".MASUK").hide("fast");

			$(".LFILE").addClass("mandatory");
			$(".IFILE").attr("required", "");
		}
	}
</script>