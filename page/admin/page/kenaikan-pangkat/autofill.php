<?php

require '../../../../settings/koneksi.php';
$id = $_GET['id_p'];

$sql = mysqli_query($koneksi, "SELECT * FROM data_pegawai
INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat 
where id_pegawai='$id'");

$data = mysqli_fetch_array($sql);

$arr = array(
    'id' => $data['id_pangkat'],
    'nama' => $data['pangkat'],
    'gol' => $data['golongan'],
);
echo json_encode($arr);

?>