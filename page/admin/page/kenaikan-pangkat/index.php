<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kenaikan Pangkat Pegawai</h1>
        <div class="btn-right">
            <a class='btn btn-secondary rounded-2' href="?page=kenaikan-pangkat=tambahdata">Tambah Data</a>
            <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_kenaikan_pangkat.php', '_blank');
                    }
                </script>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No</th>
                    <th>Id Pegawai</th>
                    <th>Nama</th>
                    <th>Pangkat/(Golongan) Lama</th>
                    <th>Pangkat/(Golongan) Baru</th>
                    <th>Waktu Perubahan</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
					 $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM riwayat_pangkat
                     INNER JOIN data_pegawai ON riwayat_pangkat.id_pegawai = data_pegawai.id_pegawai
                     INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat");
                     while($row = mysqli_fetch_array($sqlabsenmsk))
                    //  var_dump($row);
                     {
					?>
                <tr align="center">
                    <td><?=$no?></td>
                    <td><?=$row['id_pegawai']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['pangkat_lama']?></td>
                    <td><?=$row['pangkat']?> (<?=$row['golongan']?>)</td>
                    <td><?php echo date('d-m-Y', strtotime($row['waktu_perubahan'])); ?></td>
                                 
                    <td>
                        <div class="btn-group">
                            <!-- <a href="?page=kenaikan-pangkat=editdata&id=<?php echo $row['id_rpngkat'];?>" class="btn btn-warning mr-1"
                               >Ubah</a> -->
                            <a href="?page=kenaikan-pangkat=hapus&id=<?php echo $row['id_rpngkat']?>" class="btn btn-danger"
                                onclick="return confirm('Ingin Menghapus Data Ini ?');">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php
								}
								mysqli_close($koneksi); 
								?>
            </tbody>
        </table>

    </div>


</div>
