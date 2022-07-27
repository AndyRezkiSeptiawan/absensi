<?php
	$host     = "localhost";
	$username = "root";
	$password = "";
	$database = "absensi";

	$koneksi = mysqli_connect($host, $username, $password, $database);

	if (!$koneksi){
		die('Database Gagal Terkoneksi : ' . mysqli_connect_error());
	}
?>