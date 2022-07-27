<?php

  date_default_timezone_set("Asia/Makassar");
  $tgl = date('Y-m-d');


  $sqlabsen = mysqli_query($koneksi,"SELECT * FROM absensi WHERE tgl='$tgl'");
  $dataabsen =mysqli_num_rows($sqlabsen);

  $sqlcuti = mysqli_query($koneksi,"SELECT * FROM cuti WHERE status_cuti='Ajukan'");
  $datacuti =mysqli_num_rows($sqlcuti);

  $sqlkp = mysqli_query($koneksi,"SELECT * FROM riwayat_pangkat");
  $datakp =mysqli_num_rows($sqlkp);

  $sqlpgwai = mysqli_query($koneksi,"SELECT * FROM data_pegawai");
  $datapgwai =mysqli_num_rows($sqlpgwai);

?>

<marquee id="marquee" style="font-size:18px;color:black" behavior="scroll" direction="left" scrollamount="10">
Visi :  “Banjarbaru maju, agamis dan sejahtera” ||
Misi : “Meningkatkan pembangunan perekonomian daerah yang berkelanjutan dengan kearifan lokal dan tetap menjaga kelestarian lingkungan hidup” 
</marquee>

<div class="container-fluid mb-5">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Absen Hari ini</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$dataabsen?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
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

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kenaikan Pangkat</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$datakp?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-angle-double-up fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
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
</div>

<div class="row">
    <div class="col-md-12">
      <!-- <div id='loading'>loading...</div>
      <div id="c"></div> -->
      <div class="img-profile py-4">
        <img src="../../assets/img/struktur.jpg" alt="" style="width:100%;height:550px">
      </div>
    </div>
    <!-- <div class="col-md-5">
       <div id='loading'>loading...</div>
      <div id="calendar"></div>
    </div> -->
</div>


</div>

