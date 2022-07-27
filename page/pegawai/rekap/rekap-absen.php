<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Absen Pegawai</h1>
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
                    
    <!-- <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                <div class="form-check form-check-inline border p-2">
                    <div class="form-group">
                        <label for="mulai">Mulai Tanggal</label>
                        <input type="date" name="mulai" class="form-control">
                    </div>
                    <div class="form-group ml-1">
                        <label for="sampai">Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                    </div> -->
                    <!-- <div class="form-group ml-1" style="width:150px">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option disabled selected">-- Pilih --</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                        </select>
                    </div> -->
                    <!-- <input type="submit" name="submit" class="form-control btn btn-primary mt-3 ml-2"
                        value="Cetak">
                </div>
            </form>
        </div>
    </div> -->
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
        <div class="col-md-4">
            <form action="../../cetak_data/cetak_absen.php" target="_blank" method="POST">
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
                    <input type="submit" name="cetak" class="form-control btn btn-primary mt-3 ml-2 w-50"
                        value="Print">
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No Absen</th>
                    <th>nama</th>
                    <th>Tgl</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Pulang</th>
                    <th>Keterangan</th>
                    <!-- <th>aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                        
                        if(isset($_POST['filter'])){
                            $mulai = $_POST['mulai'];
                            $sampai = $_POST['sampai'];

                            if($mulai AND $sampai){
                                include 'fil_absen.php';
                            }
                        }else{
                            $sqlfilter = mysqli_query($koneksi, "SELECT * FROM absensi
                            INNER JOIN data_pegawai ON absensi.id_pegawai = data_pegawai.id_pegawai");
                             while($row = mysqli_fetch_array($sqlfilter))
                             {
                            ?>
                                <tr align="center">
                                <td><?php echo $row['0']; ?></td>
                                <td><?php echo $row['8']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['2'])); ?></td>
                                <td><?php echo $row['3']; ?></td>
                                <td>
                                    <?php 
                                    
                                    $tgl_keluar = $row['4'];
                                    if($tgl_keluar == 0){
                                        echo '';
                                    }else{
                                        echo "$tgl_keluar";
                                    }
                                                            
                                    ?>
            
            
                                </td>
                                <td><?php echo $row['5']; ?></td>
                                <!-- <td>
                                    <div class="btn-group">
                                        <a href="?page=kehadiran/absensi=editdata&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                                        >Ubah</a>
                                        <a href="?page=kehadiran/absensi=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
                                            onclick="return confirm('Ingin Menghapus Data Ini ?');">Hapus</a>
                                    </div>
                                </td> -->
                            </tr>
                            <?php
                            }
                        }
                ?>

            </tbody>
        </table>

    </div>


</div>