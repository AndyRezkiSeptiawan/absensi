<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8 col-12 bg-white p-4">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Absensi Saya</h1>
            <div class="btn-right">
            <!-- <a class='btn btn-info rounded-2' href="?page=scan-qrcode">Absen Dengan QRCode</a> -->
                <!-- <a class='btn btn-secondary rounded-2' href="?page=kehadiran/absensi=tambahdata">Tambah Data</a> -->
                <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                    <script>
                        function print_d() {
                            window.open('../../cetak_data/cetak_absen.php?id=<?=$_SESSION['nik']?>', '_blank');
                        }
                    </script>
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="datatabel" class="table table-bordered table-hover" width="100%">
                <thead class="table-info">
                    <tr align="center">
                        <th>nama</th>
                        <th>Tgl Absen</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Pulang</th>
                        <th>Keterangan</th>
                        <!-- <th>aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $nik = $_SESSION['nik'];
                        $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM absensi
                        INNER JOIN data_pegawai ON absensi.id_pegawai = data_pegawai.id_pegawai
                        where data_pegawai.nik='$nik'");
                        while($row = mysqli_fetch_array($sqlabsenmsk))
                        // var_dump($row);
                        {
                        ?>
                    <tr align="center">
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
                                    mysqli_close($koneksi); 
                                    ?>
                </tbody>
            </table>

        </div>
        </div>
    </div>

</div>
