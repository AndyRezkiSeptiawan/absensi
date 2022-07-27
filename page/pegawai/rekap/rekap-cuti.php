<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Cuti Dan Izin Pegawai</h1>
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
                    <div class="form-group ml-1" style="width:250px">
                        <label for="jc">Jenis Pengajuan</label>
                        <select name="jc" class="form-control" id="status">
                            <option value="" disabled selected>-- Pilih Jenis--</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                        </select>
                    </div>
                    <input type="submit" name="filtercuti" class="form-control btn btn-success mt-3 ml-2"
                        style="width:100px" value="Filter Jenis">
                </div>
            </form>
        </div>
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
                    <input type="submit" name="filtewp" class="form-control btn btn-primary mt-3 ml-2 w-50"
                        value="Filter Waktu">
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No</th>
                    <th>ID Pegawai</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Waktu Pengajuan</th>
                    <th>Bukti</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        if(isset($_POST['filtercuti'])){
                            $cuti = $_POST['jc'] == 'Cuti';
                            $izin = $_POST['jc'] == 'Izin';
                            $sakit = $_POST['jc'] == 'Sakit';

                            if($cuti){
                                include 'fil_cuti.php';
                            }elseif($izin){
                                include 'fil_cuti.php';
                            }elseif($sakit){
                                include 'fil_cuti.php';
                            }
                            else{
                                echo '<script>history.go(-1);</script>';
                            }
                        }
                        elseif(isset($_POST['filtewp'])){
                            $mulai = $_POST['mulai'];
                            $sampai = $_POST['sampai'];

                            if($mulai AND $sampai){
                                include 'fil_cuti.php';
                            }
                        }
                        else{
                            
                            $no = 1;
                             $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM cuti
                             INNER JOIN data_pegawai ON cuti.id_pegawai = data_pegawai.id_pegawai
                            ");
                             while($row = mysqli_fetch_array($sqlabsenmsk))
                             {
                            ?>
                        <tr align="center">
                            <td><?=$no++?></td>
                            <td><?php echo $row['id_pegawai']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['2']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['waktu_pengajuan'])); ?></td>
                            <td>
                            <?php
                                $bukti = $row['bukti'];
                                if($bukti == NULL){
                                    echo '';
                                }else{
                                    echo '<a href="../../assets/bukti/'.$bukti.'" downlaod>Download</a></td>';
                                }
                            ?>
                            
                            <td>
                                <?php
                                    $status = $row['status_cuti'];
                                    if($status == 'Ajukan'){
                                        echo '<div class="btn btn-warning">'.$status.'</div>';
                                    }elseif($status == 'Diperiksa'){
                                        echo '<div class="btn btn-primary">'.$status.'</div>';
                                    }elseif($status == 'Diterima'){
                                        echo '<div class="btn btn-success">'.$status.'</div>';
                                    }elseif($status == 'Ditolak'){
                                        echo '<div class="btn btn-danger">'.$status.'</div>';
                                    }
                                    
                                ?>
                            
                            </td>
                            <!-- <td>
                                <div class="btn-group">
                                                                   
                                
                                    <a href="?page=kehadiran/cuti-izin=editdata&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                                       >Ubah</a>
                                    <a href="?page=kehadiran/cuti-izin=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
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