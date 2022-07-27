<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Gaji Pegawai</h1>
        <div class="btn-right">
        <a class='btn btn-secondary rounded-2' href="?page=gaji-pegawai=tambahdata">Tambah Data</a>
            <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_gaji.php', '_blank');
                    }
                </script>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>ID Pegawai</th>
                    <th>Nama</th>
					<th>Waktu Digaji</th>
                    <th>Jenis</th>
                    <th>Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php
					 $sqldvsi = mysqli_query($koneksi, "SELECT * FROM gaji
                     INNER JOIN data_pegawai ON gaji.id_pegawai = data_pegawai.id_pegawai");
                     while($row = mysqli_fetch_array($sqldvsi))
                     {
					?>
                <tr align="center">
                    <td><?php echo $row['id_pegawai']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo date('d-m-Y', STRTOTIME($row['waktu'])); ?></td>
                    <td><?php echo $row['jenis']; ?></td>
                    <td>Rp <?= number_format($row['jml_bersih'],0,',','.'); ?></td>
                    <!-- <td>
                        <div class="btn-group">
                            <a href="?page=divisi=edit&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                               >Ubah</a>
                            <a href="?page=divisi=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
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