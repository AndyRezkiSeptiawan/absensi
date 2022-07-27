<!DOCTYPE html>
<html>
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="UPT Antrian">

	<!--Ico-->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo1.png">

	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<!--Font-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap">

	<!--Judul-->
	<title>Dinas DKP3 Banjarbaru</title>
</head>
<style>
body{
		background-image: url(../assets/img/gambar.png) ;
		background-position: center;
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
body{
	background-color: #7df9ff;
}
img{
	width: 100%;
}
.login {
	height: 625px;
	width: 100%;
	position: relative;
}
.login_box {
	width: 1050px;
	height: 600px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	background: #fff;
	border-radius: 10px;
	box-shadow: 1px 4px 22px -8px #0004;
	display: flex;
	overflow: hidden;
}
.login_box .left{
	width: 41%;
	height: 100%;
	padding: 25px 25px;

}
.login_box .right{
	width: 59%;
	height: 100%  
}
.left .top_link a {
	color: #452A5A;
	font-weight: 400;
}
.left .top_link{
	height: 20px
}
.left .contact{
	display: flex;
	align-items: center;
	justify-content: center;
	align-self: center;
	height: 100%;
	width: 73%;
	margin: auto;
}
.left h3{
	text-align: center;
	margin-bottom: 40px;
}
.left input {
	border: none;
	width: 80%;
	margin: 15px 0px;
	border-bottom: 1px solid #4f30677d;
	padding: 7px 9px;
	width: 100%;
	overflow: hidden;
	background: transparent;
	font-weight: 600;
	font-size: 14px;
}
.left{
	background: linear-gradient(-45deg, #dcd7e0, #fff);
}
.submit {
	border: none;
	padding: 15px 70px;
	border-radius: 8px;
	display: block;
	margin: auto;
	margin-top: 120px;
	background: #7df9ff;
	font-weight: bold;
	-webkit-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
	-moz-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
	box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
}
.right {
	background-image:  url(../assets/img/logo1.png);
	background-position: 50% 15%; 
	background-size: 60%;
	background-repeat: no-repeat;
	position: relative;
}
.right .right-text{
	height: 100%;
	position: relative;
	transform: translate(0%, 45%);
}
.right-text h2{
	padding : 0 75px;
	margin-top: 40px;
	display: block;
	width: 100%;
	text-align: center;
	font-size: 35px;
	font-weight: 500;
}
.right-text h5{
	display: block;
	width: 100%;
	text-align: center;
	font-size: 19px;
	font-weight: 400;
}
.top_link img {
	width: 28px;
	padding-right: 7px;
	margin-top: -3px;
}
.copyright{
	padding-top: 170px;
}

.forgot-password  {
	margin-top : 10px;
	text-align : center;
}
.forgot-password a.forpass {
	font-size : 12px;
}
</style>

		
		<?php
		//Penghitung gaji otomatis
		require '../settings/koneksi.php';

		date_default_timezone_set("Asia/Makassar");
		$tgl = date('Y-m-d');

		$hari = date('d');
		$bulan = date('mY');
		$gto = '29';


		$datapg = mysqli_query($koneksi,"SELECT * FROM data_pegawai
		INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
		ORDER BY id_pegawai ASC");
		$datas = array();
		while($data1 = mysqli_fetch_assoc($datapg)){
			$datas[] = $data1;
		}

		foreach($datas as $data){
			$id = $data['id_pegawai'];
			$gaji = $data['gaji'];

			$sql = mysqli_query($koneksi,"SELECT * FROM riwayat_gaji WHERE id_pegawai='$id' AND tgl_pengajian='$tgl'");
			$cek = mysqli_num_rows($sql);
			if($cek < 1){
			if($hari == $gto){
				$res = mysqli_query($koneksi,"INSERT INTO riwayat_gaji(id_rgaji,id_pegawai,
				tgl_pengajian,gaji) VALUES('','$id','$tgl','$gaji')");
			}
			}    
			
		}
		?>


<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="contact">
					<form action="aksi_login.php" method="post">
						<h3>Selamat Datang</h3>
						<hr>
						<input type="text" required class="form-control" placeholder="USERNAME" name="username">
						<input type="password" required class="form-control" placeholder="PASSWORD" name="password">
						<button class="submit">Masuk</button>
						<!-- <div class="forgot-password">
							<a href="lupa_password.php" name="forpass" >Lupa Password?</a>
						</div> -->
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>Dinas Ketahanan Pangan, Pertanian Dan Perikanan Kota Banjarbaru</h2>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</section>
</body>
</html>