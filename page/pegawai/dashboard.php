<?php
	$sqlwktu = mysqli_query($koneksi,"SELECT * FROM jam where id_jam='1'");
	$datawaktu = mysqli_fetch_assoc($sqlwktu);
	$datangawal = date('H:i',STRTOTIME($datawaktu['start']));
	$datangakhir = date('H:i',STRTOTIME($datawaktu['finish']));

	$sqlwktu1 = mysqli_query($koneksi,"SELECT * FROM jam where id_jam='2'");
	$datawaktu1 = mysqli_fetch_assoc($sqlwktu1);
	$pulangawal = date('H:i',STRTOTIME($datawaktu1['start']));
	$pulangakhir = date('H:i',STRTOTIME($datawaktu1['finish']));



?>
<main class="flex-shrink-0">
	<div class="container pt-5">
		<div class="card border-2 shadow-sm mb-4">
			<div class="d-flex align-items-center justify-content-center">
				<div class="img" style="width:150px">
					<img class="img-fluid" src="../../assets/img/logo1.png" height=200px" width="200px" alt="">
				</div>
				<div class="title text-center">
					<span style="font-size:20px;font-weight:bold;color:black;">DINAS KETAHANAN PANGAN,PERTANIAN<br>
						DAN PERIKANAN KOTA BANJARBARU</span>
				</div>
			</div>
		</div>

		<div class="row gx-4">
			<div class="col-lg-6 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<div class="card-title" style="font-size:20px">Selamat Datang Dan Selamat Beraktifitas</div>
						<div class="card-text">
						<strong style="font-size:20px"><?=$_SESSION['nama']?></strong></div>
						
					</div>
					<div class="card-footer">
					<?php
							$nik = $_SESSION['nik'];
							$sqldatapegawai = mysqli_query($koneksi,"SELECT * FROM data_pegawai WHERE nik='$nik'");
							$datapgwai = mysqli_num_rows($sqldatapegawai);
							if($datapgwai < 1){
								echo '<strong  class="text-danger"><i class="bi bi-info-circle mr-1"></i>Anda Tidak Dapat Absen </strong>';
								echo '<br><strong  class="text-danger"><i class="bi bi-info-circle mr-1"></i>Data Profil Mohon Diisi Terlebih Dahulu</strong>';
							}else{
								echo '';
							}
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<div class="card-title d-flex bg-primary rounded p-2 text-white justify-content-center"
							style="font-size:30px;color:black">
							<i class="bi bi-clock mr-2"></i>
							<div id="runningTime"></div>
						</div>
						<div class="row text-center mt-4">
							<div class="col-md-6 col-12">
								<h5>Waktu Absen Masuk</h5>
								<strong><?=$datangawal?> - <?=$datangakhir?> Wita</strong>

							</div>
							<div class="col-md-6 col-12">
								<h5>Waktu Absen Keluar</h5>
								<strong><?=$pulangawal?> - <?=$pulangakhir?> Wita</strong>
							</div>
						</div>
						<form action="?page=absen-pegawai" method="post">
							<div class="btn-absen mt-3">
							
							<?php
								date_default_timezone_set("Asia/Makassar");
								$tgl_skarang = date('d-m-Y');
								$frmt = date('l');
								$libur = mysqli_query($koneksi,"SELECT * FROM libur");
								$data = mysqli_fetch_array($libur);
								$tgl = date('d-m-Y', strtotime($data['tgl']));
					
								$time = date('H:i');

								if($tgl_skarang == $tgl OR $frmt == 'Saturday' OR $frmt == 'Sunday'){
									echo '
									<div class="d-block btn btn-dark p-2 text-danger">
										<input type="submit" class="btn text-white w-100" name="absen" value="Absen Libur" disabled>
									</div>';
								}
								else{
									if($time >= $datangawal && $time < $datangakhir){
										echo '
										<div class="d-block btn btn-dark">
										<input type="submit" class="btn text-white w-100" name="absen" value="Absen Masuk Disini">
										</div>';
										// echo '<a href="?page=absen-qrcode" class="btn btn-danger d-block mt-1" name="qrcode">Gunakan QRcode</a>';
									}
									elseif($time >= $pulangawal && $time < $pulangakhir){
										echo '
										<div class="d-block btn btn-dark">
										<input type="submit" class="btn text-white w-100" name="absen" value="Absen Pulang Disini">
										</div>';
										// echo '<a href="?page=absen-qrcode" class="btn btn-danger d-block mt-1" name="qrcode">Gunakan QRcode</a>';
									}else{
										echo '
										<div class="d-block btn btn-dark">
										<input type="submit" class="btn text-white w-100" name="absen" value="Tidak Bisa Absen" disabled>
										</div>';
										// echo '<a class="btn btn-danger text-white d-block mt-1" name="qrcode" disabled>Gunakan QRcode</a>';
									}
								}

							?>
														
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<center>
							<div class="feature-icon-1 bg-warning bg-gradient mb-4">
								<i class="bi-arrow-down-circle"></i>
							</div>
							<h3>Absen</h3>
							<p class="mb-4">Data Absen Harian Anda.</p>
							<a href="?page=absen" class="btn btn-warning rounded-pill fs-5 px-4 py-2">
								Masuk
							</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<center>
							<div class="feature-icon-1 bg-warning bg-gradient mb-4">
								<i class="bi bi-cash"></i>
							</div>
							<h3>Gaji</h3>
							<p class="mb-4">Laporan Gaji Pemilik Akun.</p>
							<a href="?page=slip-gaji" class="btn btn-warning rounded-pill fs-5 px-4 py-2">
								Masuk
							</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<center>
							<div class="feature-icon-1 bg-warning bg-gradient mb-4">
								<i class="bi bi-clipboard-x"></i>
							</div>
							<h3>Cuti/Izin</h3>
							<p class="mb-4">Data Cuti/Izin Serta Pengajuan</p>
							<a href="?page=cuti" class="btn btn-warning rounded-pill fs-5 px-4 py-2">
								Masuk
							</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<center>
							<div class="feature-icon-1 bg-warning bg-gradient mb-4">
								<i class="bi bi-person-circle"></i>
							</div>
							<h3>Profil</h3>
							<p class="mb-4">Data Profil Akun Beserta Data lainnya yang Berhubungan.</p>
							<a href="?page=profil" class="btn btn-warning rounded-pill fs-5 px-4 py-2">
								Masuk
							</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-lg-4 mb-4">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<center>
							<div class="feature-icon-1 bg-warning bg-gradient mb-4">
								<i class="bi-bank"></i>
							</div>
							<h3>Data Laporan</h3>
							<p class="mb-4">Seluruh Data Laporan-Laporan Yang telah Dibuat/Diterima Pemilik Akun.</p>
							<a href="?page=rekap" class="btn btn-warning rounded-pill fs-5 px-4 py-2">
								Masuk
							</a>
						</center>
					</div>
				</div>
			</div>
			<div class="col-lg-12 mb-3">
				<div class="card border-2 shadow-sm">
					<div class="card-body p-4">
						<a href="../../login_logout/aksi_logout.php" class="btnlogout btn btn-info rounded-2"
							onclick='return confirm("Apakah Anda Ingin Keluar ?");'>
							<i class="bi bi-box-arrow-left"> </i>Logout
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>