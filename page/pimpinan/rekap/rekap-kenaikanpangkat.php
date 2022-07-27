<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Kenaikan Pangkat Pegawai</h1>
        <div class="btn-right">
            <!-- <a class='btn btn-secondary rounded-2' href="?page=kehadiran/absensi=tambahdata">Tambah Data</a> -->
            <!-- <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_absen.php', '_blank');
                    }
                </script>
            </a> -->
        </div>
    </div>
                    
    <div class="row mt-2">
        <div class="col-md-4">
            <form action="" method="POST">
                <div class="form-check form-check-inline border p-2">
                    <div class="form-group">
                        <label for="mulai">Mulai Tanggal</label>
                        <input type="date" name="mulai" class="form-control">
                    </div>
                    
                    <div class="form-group ml-1">
                        <label for="sampai">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                    </div>
                    <!-- <div class="form-group ml-1" style="width:150px">
                        <label for="status">Status</label>
                        <select name="status" name="status" class="form-control" id="status">
                            <option disabled selected">-- Pilih --</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div> -->
                    <input type="submit" name="filter" class="form-control btn btn-success mt-3 ml-2 w-50"
                        value="Filter">
                     
                </div>
            </form>
        </div>
        <div class="col-md-4" style="margin-left: 90px;">
            <form action="../../cetak_data/cetak_kenaikan_pangkat.php" target="_blank" method="POST">
                <div class="form-check form-check-inline border p-2">
                    <div class="form-group">
                        <label for="mulai">Mulai Tanggal</label>
                        <input type="date" name="mulai" class="form-control">
                    </div>
                    
                    <div class="form-group ml-1">
                        <label for="sampai">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                    </div>
                    <input type="submit" name="cetak" class="form-control btn btn-primary mt-3 ml-2 w-50"
                        value="Print">
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive" style="margin-top: 10px;">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Pangkat Baru</th>
                    <th>Golongan Baru</th>
                    <th>Waktu Perubahan</th>
        
                </tr>
            </thead>
            <tbody>
                <?php
                        
                        if(isset($_POST['filter'])){
                            $mulai = $_POST['mulai'];
                            $sampai = $_POST['sampai'];

                            if($mulai AND $sampai){
                                include 'fil_kp.php';
                            }
                        }else{
                            $no = 1;
                            $sqlfilter = mysqli_query($koneksi, "SELECT * FROM riwayat_pangkat
                            INNER JOIN data_pegawai ON riwayat_pangkat.id_pegawai = data_pegawai.id_pegawai
                            INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat");
                             while($row = mysqli_fetch_array($sqlfilter))
                          
                             {
                            ?>
                                <tr align="center">
                                <td><?=$no++ ?></td>
                                <td><?php echo $row['nik']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['pangkat']; ?></td>
                                <td><?php echo $row['golongan']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['waktu_perubahan'])); ?></td>
                            </tr>
                            <?php
                            }
                        }
                ?>

            </tbody>
        </table>

    </div>


</div>