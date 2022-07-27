
<?php

date_default_timezone_set("Asia/Makassar");
$id_cuti = $_POST['id_cuti'];
$id_pegawai = $_POST['id_pegawai'];
$jenis = $_POST['jenis'];
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

$keterangan = $_POST['ket'];

//FILE IMG     
$file = $_FILES['bukti']['name'];
$tmpfile = $_FILES['bukti']['tmp_name'];

if(!$file){
	$sqlupdate = mysqli_query($koneksi,"UPDATE cuti SET jenis_cuti='$jenis',mulai='$awal',akhir='$akhir',
	keterangan='$keterangan' where id_cuti='$id_cuti'
	");
	if($sqlupdate == true){
		echo '<script>
			alert("Data Berhasil Diubah");
			document.location="?page=cuti";</script>';
	}else{
		echo '<script>history.go(-1);</script>';
	}
}else{

	$namefile = date('dmYHis').$file;
	$lokasi = "../../assets/bukti/".$namefile;

	if(move_uploaded_file($tmpfile,$lokasi)){
		$sqlupdate = mysqli_query($koneksi,"UPDATE cuti SET jenis='$jenis',mulai='$awal',akhir='$akhir',
		bukti='$namefile',keterangan='$keterangan' where id_cuti='$id_cuti'
		");

		if($sqlupdate == true){
			echo '<script>
			alert("Data Berhasil Diubah");
			document.location="?page=cuti";</script>';
		}else{
			echo '<script>history.go(-1);</script>';
		}
	}
}


?>