<?php

$link = base_url().($jadwalH[0]->link)."/jadwal";

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
		table{
			font-size: 10pt;
		}
	</style>
	<table cellpadding="5">
		<tr>
			<td class="bA">
				<table cellpadding="3">
					<tr>
						<td colspan="2" class="bB" style="text-align: center;font-size: 14pt;font-weight: bold;">
							'.$jadwalH[0]->deskripsi.'
						</td>
					</tr>
					<tr>
						<td width="60%">
							<table cellpadding="3">
								<tr>
									<td>Penanggung Jawab</td>
									<td width="10">:</td>
									<td>'.strtoupper($jadwalH[0]->nama).' ('.$jadwalH[0]->kontak.')</td>
								</tr>
								<tr>
									<td colspan="3">
										<a href="">'.$link.'</a>
									</td>
								</tr>
							</table>
						</td>
						<td>
							<table cellpadding="3">
								<tr>
									<td>Rencana Iuran</td>
									<td width="10">:</td>
									<td>Rp '.number_format($jadwalH[0]->iuran).'</td>
								</tr>
							</table>
							<table cellpadding="3">
								<tr>
									<td>Iuran Terkumpul</td>
									<td width="10">:</td>
									<td>Rp '.number_format($terkumpul[0]->terkumpul).'</td>
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
		';
	if(!empty($jadwalD)){
$html .='
		<tr>
			<td class="bB">
				<table cellpadding="3">
					<tr>
						<td style="font-weight:bold;">Nama</td>
						<td style="font-weight:bold;">Bayar</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellpadding="3">
';
	foreach ($jadwalD as $isi) {
		$html .='
					<tr>
						<td class="bB">'.strtoupper($isi->keterangan).'</td>
						<td class="bB">'.number_format($isi->bayar).'</td>
					</tr>
				';
	}

$html .='
					<tr>
						<td class="bB bT" style="font-weight:bold;">'.strtoupper("total").'</td>
						<td class="bB bT" style="font-weight:bold;">'.number_format($terkumpul[0]->terkumpul).'</td>
					</tr>
				</table>
			</td>
		</tr>
					';
	}
$html .='
	</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('', 'I');

//============================================================+
// END OF FILE
//============================================================+
