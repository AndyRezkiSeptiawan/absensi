<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8 col-12 bg-white p-5">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Gaji Pegawai</h1>
                <div class="btn-right">
                    <!-- <a class='btn btn-primary name="cetak_semua" rounded-2 text-white' target="_blank" onclick='print_d()'> Cetak Data
                        <script>
                            function print_d() {
                                window.open('../../cetak_data/cetak_gaji.php?nik=<?=$_SESSION['nik']?>');
                            }
                        </script>
                    </a> -->
                </div>
            </div>

            <div class="table-responsive">
                <table id="datatabel" class="table table-bordered table-hover" width="100%">
                    <thead class="table-info">
                        <tr align="center">
                        <th>ID Pegawai</th>
                        <th>Nama</th>
                        <th>Waktu Digaji</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $id = $_SESSION['nik'];
					 $sqldvsi = mysqli_query($koneksi, "SELECT * FROM riwayat_gaji
                     INNER JOIN data_pegawai ON riwayat_gaji.id_pegawai = data_pegawai.id_pegawai
                     WHERE data_pegawai.nik ='$id'");
                     while($row = mysqli_fetch_array($sqldvsi))
                     {
                        
					?>
                <tr align="center">
                    <td><?php echo $row['id_pegawai']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo date('d-m-Y', STRTOTIME($row['tgl_pengajian'])); ?></td>
                    <td>Rp <?= number_format($row['gaji'],0,',','.'); ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="../../cetak_data/cetak_gaji.php?id=<?php echo $row['id_rgaji'];?>" name="cetak_id" target="_blank" class="btn btn-primary mr-1"
                               >Print</a>
                            <!-- <a href="?page=slip-gaji=show&id=<?php echo $row['0'];?>" class="btn btn-secondary mr-1"
                               >Detail</a> -->
                            
                        </div>
                    </td>
                </tr>
                <?php
						}
						    mysqli_close($koneksi); 
						?>
            </tbody>
                </table>
                <div class="btn-kembali text-right pt-5 pr-4">
                    <a href="?page=dashboard" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>

</div>

