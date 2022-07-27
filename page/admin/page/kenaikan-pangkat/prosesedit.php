<?php 

$id_rpngkat = $_POST['id_rpngkat'];
$id_pegawai = $_POST['id_pegawai'];
$pangkat_baru = $_POST['pangkat'];
$golongan_baru = $_POST['golongan'];
$waktu_perubahan = $_POST['wktuprbhn'];


	$query = mysqli_query($koneksi, "UPDATE riwayat_pangkat SET id_pegawai = '$id_pegawai', pangkat_baru = '$pangkat_baru', golongan_baru = '$golongan_baru'
	,waktu_perubahan = '$waktu_perubahan' WHERE id_rpngkat = '$id_rpngkat'");

	if($query == true){

		$update = mysqli_query($koneksi, "UPDATE data_pegawai SET pangkat='$pangkat_baru',golongan='$golongan_baru'
		WHERE id_pegawai='$id_pegawai'");

		echo "
		<script>
		alert('Data Berhasil Ditambah!');
		document.location = '?page=kenaikan-pangkat';</script>";
	}else{
		echo "
		<script>
		alert('Data Gagal Ditambah!');
		history.go(-1);
		</script>";
	}
?>