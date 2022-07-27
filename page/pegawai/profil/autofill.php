<?php

require '../../../settings/koneksi.php';
$id = $_GET['id_p'];

$sql = mysqli_query($koneksi, "SELECT * FROM pangkat 
where id_pangkat='$id'");

$data = mysqli_fetch_array($sql);

$arr = array(
    'gol' => $data['golongan'],
    'gaji' => $data['gaji'],
);
echo json_encode($arr);

?>