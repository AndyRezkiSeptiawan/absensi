<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8 col-12 bg-white p-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Saya</h1>
            <div class="btn-right">
            <?php
                if(@$_POST['lp'] == 'Laporan Gaji'){
                    echo'<a href="../../cetak_data/cetak_gaji.php?nikgaji='.$_SESSION['nik'].'" target="_blank" name="cetakgaji" class="btn btn-primary">Cetak Laporan</a>';
                }elseif(@$_POST['lp'] == 'Laporan Kenaikan Pangkat'){
                    echo'<a href="../../cetak_data/cetak_kenaikan_pangkat.php?nikkp='.$_SESSION['nik'].'" target="_blank" name="cetakkp"  class="btn btn-primary">Cetak Laporan</a>';
                }
            ?>
            
            <a href="?page=dashboard" class="btn btn-success">Kembali</a>
            <!-- <a class='btn btn-info rounded-2' href="?page=scan-qrcode">Absen Dengan QRCode</a> -->
                <!-- <a class='btn btn-secondary rounded-2' href="?page=kehadiran/absensi=tambahdata">Tambah Data</a> -->
                <!-- <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                    <script>
                        function print_d() {
                            window.open('../../cetak_data/cetak_absen.php?id=<?=$_SESSION['nik']?>', '_blank');
                        }
                    </script>
                </a> -->
            </div>
        </div>

        <div class="col-12 col-md-12">
          
                    <form action="" method="POST">
                        <div class="dropdownlp p-4 d-flex justify-content-center mb-2">
                            <select name="lp" id="lp" class="form-control" style="width:80%">
                                <option value="" disabled selected>--Pilih Laporan --
                                </option>
                                <option value="Laporan Gaji">Laporan Gaji</option>
                                <option value="Laporan Kenaikan Pangkat">Laporan Kenaikan Pangkat</option>
                                
                            </select>

                            <button id="submit" name="submit" class="bt-filter btn btn-primary ml-1">
                                <i class="fa fa-filter"></i>
                                <span>Filter</span>
                            </button>
                        </div>
                    </form>
                </div>

        <div class="table-responsive">
            <table id="datatabel" class="table table-bordered table-hover" width="100%">
                <thead class="table-info">
                    <?php

                        if(@$_POST['lp'] == 'Laporan Gaji'){
                            echo '
                            <tr align="center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Pangkat/Gol</th>
                            <th>Jenis</th>
                            <th>Gaji</th>
                            </tr>
                            ';
                        } 
                        elseif(@$_POST['lp'] == 'Laporan Kenaikan Pangkat'){
                            echo '
                            <tr align="center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Pangkat</th>
                            <th>Golongan</th>
                            <th>Waktu Perubahan</th>
                            </tr>
                            ';
                        }

                    ?>
                   
                </thead>
                <tbody>
                    <?php
                        

                        if(isset($_POST['submit'])){
                            $lpgaji = $_POST['lp'] == 'Laporan Gaji';
                            $lpkp = $_POST['lp'] == 'Laporan Kenaikan Pangkat';

                            if($lpgaji){
                                include 'fil_gaji.php';
                            }
                            elseif($lpkp){
                                include 'fil_kp.php';
                            }
                        }
                    ?>
                                
                </tbody>
            </table>

        </div>
        </div>
    </div>

</div>
