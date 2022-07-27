<?php 
	include '../settings/koneksi.php';
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
	if(mysqli_num_rows($query)>0){
		session_start();
		$data = mysqli_fetch_row($query);
		$_SESSION['id'] = $data[0];
		$_SESSION['nik'] = $data[1];
		$_SESSION['nama'] = $data[2];
		$_SESSION['username'] = $data[7];
		$_SESSION['level'] = $data[8];

		echo '<meta http-equiv="refresh" content="1;url=../page"/>';
		}else{
			echo "<script>alert('LOGIN GAGAL! Periksa kembali username dan password apakah sudah benar.');</script>";
			echo '<meta http-equiv="refresh" content="1;url=login_view.php"/>';
		}
?>