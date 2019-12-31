
<div class="row">
	<div class="col-lg-6 col-xs-12">
		<div class="content-viewport">
			<form url="<?= base_url('tampilan-aksi') ?>" onsubmit="submitData(this, event)">
				<div class="grid">
					<p class="grid-header">Background</p>
					<div class="item-wrapper text-center" style="padding: 5px;">
						<p style="color: red">* Maksimal ukuran file 5MB, dengan rekomendasi skala 3x2</p>
						<img src="<?= base_url('assets/images/bg.gambar') ?>" width="55%">
						<div class="col-lg-12">
							<input type="file" class="iBg" name="bg" id="bg" accept="image/*" style="margin-top: 10px" required="">
							<button type="submit" class="btn btn-xs btn-primary" title="Simpan"><i class="mdi mdi-content-save"></i></button>
						</div>
					</div>
				</div>
			</form>			
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="content-viewport">
			<form url="<?= base_url('tampilan-aksi') ?>" onsubmit="submitData(this, event)">
				<div class="grid">
					<p class="grid-header">Logo Panjang</p>
					<div class="item-wrapper text-center" style="padding: 5px;">
						<p style="color: red">* Maksimal ukuran file 500KB, dengan rekomendasi skala 2x1 dan background transparan</p>
						<img src="<?= base_url('assets/images/label-panjang.gambar') ?>" width="55%">
						<div class="col-lg-12">
							<input type="file" class="iLabel_panjang" name="label_panjang" id="label_panjang" accept="image/*" style="margin-top: 10px" required="">
							<button type="submit" class="btn btn-xs btn-primary" title="Simpan"><i class="mdi mdi-content-save"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="content-viewport">
			<form url="<?= base_url('tampilan-aksi') ?>" onsubmit="submitData(this, event)">
				<div class="grid">
					<p class="grid-header">Logo</p>
					<div class="item-wrapper text-center" style="padding: 5px;">
						<p style="color: red">* Maksimal ukuran file 500KB, dengan rekomendasi skala 1x1 dan background transparan</p>
						<img src="<?= base_url('assets/images/label.gambar') ?>" width="55%">
						<div class="col-lg-12">
							<input type="file" class="iLabel" name="label" id="label" accept="image/*" style="margin-top: 10px" required="">
							<button type="submit" class="btn btn-xs btn-primary" title="Simpan"><i class="mdi mdi-content-save"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="content-viewport">
			<form url="<?= base_url('tampilan-aksi') ?>" onsubmit="submitData(this, event)">
				<div class="grid">
					<p class="grid-header">Logo Kecil</p>
					<div class="item-wrapper text-center" style="padding: 5px;">
						<p style="color: red">* Maksimal ukuran file 500KB, dengan rekomendasi skala 1x1 dan background transparan</p>
						<img src="<?= base_url('assets/images/label-kecil.gambar') ?>" width="55%">
						<div class="col-lg-12">
							<input type="file" class="iLabel_kecil" name="label_kecil" id="label_kecil" accept="image/*" style="margin-top: 10px" required="">
							<button type="submit" class="btn btn-xs btn-primary" title="Simpan"><i class="mdi mdi-content-save"></i></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>