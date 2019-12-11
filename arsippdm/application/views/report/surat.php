<?php

// data Arsip
$nama_arsip = $arsip[0]->nama_arsip;
$keterangan = $arsip[0]->keterangan;
$progress = $arsip[0]->progress;

$surat_masuk=0;
$surat_keluar=0;
foreach($surat as $isi_surat){
	if($isi_surat->jenissurat=="MASUK"){
		$surat_masuk++;
	}
	if($isi_surat->jenissurat=="KELUAR"){
		$surat_keluar++;
	}
}

// create new PDF document
$pdf = new PdfLib(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ahyani');
// $pdf->SetTitle('Laporan');
$pdf->SetSubject('Laporan');
$pdf->SetKeywords('acara, laporan, jadwal');

// remove default header/footer
$pdf->setPrintHeader(false);
// $pdf->setPrintFooter(false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(15, 10, 10);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage("P", "A4");

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '
	<style>
		.bA{
			border: 0.1px #bed7e8 solid;
		}
		.bL{
			border-left: 0.1px #bed7e8 solid;
		}
		.bR{
			border-right: 0.1px #bed7e8 solid;
		}
		.bT{
			border-top: 0.1px #bed7e8 solid;
		}
		.bB{
			border-bottom: 0.1px #bed7e8 solid;
		}
		.bBA{
			border: 1px #bed7e8 solid;
		}
		.bBL{
			border-left: 1px #bed7e8 solid;
		}
		.bBR{
			border-right: 1px #bed7e8 solid;
		}
		.bBT{
			border-top: 1px #bed7e8 solid;
		}
		.bBB{
			border-bottom: 1px #bed7e8 solid;
		}
		table{
			font-size: 10pt;
		}
		.font-8{
			font-size: 8pt;
		}
	</style>
	<table cellpadding="5">
		<tr>
			<td class="bA">
				<table cellpadding="3">
					<tr>
						<td class="bB" style="text-align: center;" width="20%">
							<center>
								<img src="'.base_url('assets/images/label-kecil.gif').'" width="70"/>
							</center>
						</td>
						<td class="bB" style="text-align: center;font-size: 12pt;font-weight: bold;vertical-align: middle;" width="80%">
							<br>
							E-ARSIP<br>
							PIMPINAN DAERAH MUHAMMADIYAH<br>
							BEKASI
						</td>
					</tr>
					<tr>
						<td width="60%">
							<table cellpadding="3">
								<tr>
									<td width="75">Arsip</td>
									<td width="10">:</td>
									<td width="250">'.$nama_arsip.'</td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td>:</td>
									<td>'.$keterangan.'</td>
								</tr>
								<tr>
									<td>Progress</td>
									<td>:</td>
									<td>'.$progress.'</td>
								</tr>
							</table>
						</td>
						<td>
							<table cellpadding="3">
								<tr>
									<td width="150">Jumlah Surat Masuk</td>
									<td width="10">:</td>
									<td>'.number_format($surat_masuk).'</td>
								</tr>
								<tr>
									<td>Jumlah Surat Keluar</td>
									<td>:</td>
									<td>'.number_format($surat_keluar).'</td>
								</tr>
								<tr>
									<td><b>Total Surat</b></td>
									<td>:</td>
									<td><b>'.number_format($surat_keluar+$surat_masuk).'</b></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>
		';
	if(!empty($surat)){
$html .='
	<table cellpadding="3" width="790">
		<tr>
			<td class="bBB font-8" style="font-weight:bold;" width="25">No</td>
			<td class="bBB font-8" style="font-weight:bold;" width="50">Jenis</td>
			<td class="bBB font-8" style="font-weight:bold;">Nomor</td>
			<td class="bBB font-8" style="font-weight:bold;">Tanggal Diterima</td>
			<td class="bBB font-8" style="font-weight:bold;">Tanggal Surat</td>
			<td class="bBB font-8" style="font-weight:bold;">Perihal</td>
			<td class="bBB font-8" style="font-weight:bold;">Pengirim</td>
			<td class="bBB font-8" style="font-weight:bold;">Penerima</td>
		</tr>
';
	$no=0;
	foreach ($surat as $isi_surat) {
		$no++;
		$jenissurat = $isi_surat->jenissurat;
		$no_agenda = $isi_surat->no_agenda;
		$no_agenda = $jenissurat=="MASUK"? $no_agenda." - ": "";
		$nomor = $isi_surat->nomor;
		$tglditerima = $isi_surat->tglditerima;
		$tglditerima = $jenissurat=="MASUK"? date("d-m-Y", strtotime($tglditerima)): "";
		$tglsurat = $isi_surat->tglsurat;
		$perihal = $isi_surat->perihal;
		$pengirim = $isi_surat->pengirim;
		$penerima = $isi_surat->penerima;
		$html .='
		<tr>
			<td class="bB font-8">'.$no.'</td>
			<td class="bB font-8">'.$jenissurat.'</td>
			<td class="bB font-8">'.$no_agenda.$nomor.'</td>
			<td class="bB font-8">'.$tglditerima.'</td>
			<td class="bB font-8">'.date("d-m-Y", strtotime($tglsurat)).'</td>
			<td class="bB font-8">'.$perihal.'</td>
			<td class="bB font-8">'.$pengirim.'</td>
			<td class="bB font-8">'.$penerima.'</td>
		</tr>
				';
	}

$html .='
	</table>
					';
	}

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($nama_arsip.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
