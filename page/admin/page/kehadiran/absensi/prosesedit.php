<?php 

$idabsen = $_POST['idabsen'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl'];
$waktu = $_POST['waktu'];
$waktu_keluar = $_POST['waktu_keluar'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "SELECT * FROM absensi");
if($query){
	$query = mysqli_query($koneksi, "UPDATE absensi SET id_pegawai = '$nama', tgl = '$tgl',
	waktu_masuk = '$waktu',waktu_keluar = '$waktu_keluar', keterangan = '$keterangan' WHERE id_absen = '$idabsen'");
	echo "<script>alert('Data Berhasil Diubah!'); document.location = '?page=kehadiran/absensi';</script>";
}
else{
	echo "Galat, Terjadi Error Pada : ". mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>