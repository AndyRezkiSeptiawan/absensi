<?php

require '../../../../settings/koneksi.php';
$id = $_GET['idp'];

$sql = mysqli_query($koneksi, "SELECT * FROM data_pegawai
RIGHT JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat 
where id_pegawai='$id'");

$data = mysqli_fetch_array($sql);

$arr = array(
    'nama' => $data['pangkat'],
    'gaji' => $data['gaji'],
);
echo json_encode($arr);

?>