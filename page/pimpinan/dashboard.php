<?php

  date_default_timezone_set("Asia/Makassar");
  $tgl = date('Y-m-d');

  $nik = $_SESSION['nik'];
  $pgwai = mysqlI_query($koneksi,"SELECT  * FROM data_pegawai WHERE nik='$nik'");
  $data = mysqli_fetch_array($pgwai);
  $idp =$data['id_pegawai'];

  $sqlcuti = mysqli_query($koneksi,"SELECT * FROM cuti WHERE status_cuti='Diterima' AND id_pegawai='$idp'");
  $datacuti =mysqli_num_rows($sqlcuti);

  $sqlpgwai = mysqli_query($koneksi,"SELECT * FROM data_pegawai");
  $datapgwai =mysqli_num_rows($sqlpgwai);

  $sqlwktu = mysqli_query($koneksi,"SELECT * FROM jam where id_jam='1'");
	$datawaktu = mysqli_fetch_assoc($sqlwktu);
	$datangawal = date('H:i',STRTOTIME($datawaktu['start']));
	$datangakhir = date('H:i',STRTOTIME($datawaktu['finish']));

	$sqlwktu1 = mysqli_query($koneksi,"SELECT * FROM jam where id_jam='2'");
	$datawaktu1 = mysqli_fetch_assoc($sqlwktu1);
	$pulangawal = date('H:i',STRTOTIME($datawaktu1['start']));
	$pulangakhir = date('H:i',STRTOTIME($datawaktu1['finish']));


?>

<marquee id="marquee" style="font-size:18px;color:black" behavior="scroll" direction="left" scrollamount="10">
  Visi : “Banjarbaru maju, agamis dan sejahtera” ||
  Misi : “Meningkatkan pembangunan perekonomian daerah yang berkelanjutan dengan kearifan lokal dan tetap menjaga
  kelestarian lingkungan hidup”
</marquee>

<div class="container-fluid mb-5">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <!-- <div class="row justify-content-end">
    <div class="col-lg-4 mb-4">
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
									elseif($time >= '17:00' && $time < '19:00'){
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
  </div> -->

  <div class="row" style="margin-bottom:100px">
    <div class="col md-4">
      <div class="row">
      <div class="col-xl-12 col-md-12 mb-3">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajuan Cuti</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$datacuti?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-12 col-md-12 mb-3">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Pegawai</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$datapgwai?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user-tie fa-2x text-gray-300"></i>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12 mb-4">
          <div class="card border-2 shadow-sm">
            <div class="card-body p-4">
              <div class="card-title d-flex bg-primary rounded p-2 text-white justify-content-center"
                style="font-size:30px;color:black">
                <i class="bi bi-clock mr-2"></i>
                <div id="runningTime"></div>
              </div>
              <div class="row text-center mt-4">
                <div class="col-md-6 col-12">
                  <h5 style="font-size:15px">Waktu Absen Masuk</h5>
                  <strong><?=$datangawal?> - <?=$datangakhir?> Wita</strong>

                </div>
                <div class="col-md-6 col-12">
                  <h5 style="font-size:15px">Waktu Absen Keluar</h5>
                  <strong><?=$pulangawal?> - <?=$pulangakhir?> Wita</strong>
                </div>
              </div>
              <form action="?page=absen" method="post">
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
									elseif($time >= '17:00' && $time < '23:00'){
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

      </div>
    </div>
    <div class="col-md-8">
      <!-- <div id='loading'>loading...</div>
      <div id="c"></div> -->
      <div class="img-profile">
        <img src="../../assets/img/struktur.jpg" alt="" style="width:100%;height:550px">
      </div>
    </div>

  </div>


</div>