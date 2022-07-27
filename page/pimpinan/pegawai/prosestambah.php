<?php 

$id_pegawai = $_POST['idpegawai'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$id_divisi = $_POST['namadivisi'];
$pangkat = $_POST['pangkat'];

$jenis = $_POST['jenis'];

	$query = mysqli_query($koneksi, "INSERT INTO data_pegawai VALUES ('$id_pegawai',
    '$nik','$nama','$id_divisi','$pangkat','$jenis','12')");

	if($query == true){
		echo "
        <script>alert('Data Berhasil Ditambah!');
        document.location = '?page=pegawai/data-pegawai';
        </script>";
    }else{
        echo "
        <script>alert('Data Gagal Ditambah!');
        history.go(-1);
        </script>";
    }

?>