<?php 
	include '../settings/koneksi.php';
	include '../assets/fpdf/fpdf.php';
?>
<?php
	$PDF = new FPDF('P', 'cm', 'A4');
	$PDF -> AddPage();
	$PDF -> SetTitle('Keluar');
	$PDF -> Image('../assets/img/logo.png', 1, 1, 2.5, 2.5);
	$PDF -> Image('../assets/img/logo.png', 17.5, 1, 2.5, 2.5);
	$PDF -> SetFont('Arial','B', 14);
	$PDF -> Cell(18, 0.6,'DPK3 Banjarbaru', 0, 0.6, 'C');
	$PDF -> SetFont('Arial','', 11);
	$PDF -> SetLineWidth(0.1);
	$PDF -> Line(1, 4.1, 20, 4.1);
	$PDF -> Line(1.5, 4.3, 19.5, 4.3);
	$PDF -> ln();
	$PDF -> SetFont('Arial','', 12);
	$PDF -> Cell(18, 1,'LAPORAN DATA ABSENSI KELUAR PEGAWAI', 0, 1, 'C');
	$PDF -> ln(2);
	$PDF -> SetLineWidth(0.05);
	$PDF -> SetFont('Arial','B', 11);
	$PDF -> SetFillColor(102,179,255);
	$PDF -> Cell(3, 1, 'ID absen', 1, 0, 'C', true);
	$PDF -> Cell(3, 1, 'Nama', 1, 0, 'C', true);
	$PDF -> Cell(3, 1, 'Waktu', 1, 0, 'C', true);
	$PDF -> Cell(4, 1, 'Keterangan', 1, 1, 'C', true);
	$PDF -> SetFont('Arial','', 11);
?>
<?php
	$PDF -> SetFillColor(179,217,255);
	$query  = mysqli_query($koneksi, "SELECT * FROM absen_keluar");
	while ($row = mysqli_fetch_array($query)) {
		$PDF -> Cell(3, 0.7, $row[1], 1, 0, 'C', true);
		$PDF -> Cell(3, 0.7, $row[2], 1, 0, 'C', true);
		$PDF -> Cell(3, 0.7, $row[3], 1, 0, 'C', true);
		$PDF -> Cell(4, 0.7, $row[4], 1, 1, 'C', true);
	}
	$PDF -> ln();
	$PDF -> Cell(18, 0.5, 'Banjarbaru, '.date("d M Y"), 0, 1, 'R');
	$PDF -> Cell(18, 0.5, 'Mengetahui', 0, 1, 'R');
	$PDF -> Cell(18, 0.5, 'Kepala Dinas DKP3 Banjarbaru', 0, 1, 'R');
	$PDF -> ln(2);
	$PDF -> SetFont('Arial','BU', 11);
	$PDF -> Cell(18, 0.5, 'Hamdah, SP, MT.', 0, 1, 'R');
	$PDF -> SetFont('Arial','', 11);
	$PDFTitle = 'Laporan Data Absen Keluar.pdf';
	$PDF -> output('D', $PDFTitle, true);
?>