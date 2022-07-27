<?php 

$idabsen = $_POST['idabsen'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$waktu = $_POST['waktu'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "SELECT * FROM absensi");
if($query){
	$query = mysqli_query($koneksi, "UPDATE absensi SET nama = '$nama', tgl = '$tgl', waktu = '$waktu', keterangan = '$keterangan' WHERE id_absen = '$idabsen'");
	echo "<script>alert('Data Berhasil Diubah!'); document.location = '?page=kehadiran/absensi';</script>";
}
else{
	echo "Galat, Terjadi Error Pada : ". mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>