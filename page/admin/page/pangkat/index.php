<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pangkat</h1>
        <div class="btn-right">
            <a class='btn btn-secondary rounded-2' href="?page=pangkat=tambah">Tambah Data</a>
            <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_data_pangkat.php', '_blank');
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
                    <th>Pangkat</th>
                    <th>Golongan</th>
                    <th>Gaji</th>
					<th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
					 $sqlpngkat = mysqli_query($koneksi, "SELECT * FROM pangkat
                     ");
                     while($row = mysqli_fetch_array($sqlpngkat))
                     {
					?>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['pangkat']; ?></td>
                    <td><?php echo $row['golongan']; ?></td>
                    <td>Rp <?php echo number_format($row['gaji'],0,',','.'); ?></td>

                    <td>
                        <div class="btn-group">
                            <a href="?page=pangkat=edit&id=<?php echo $row['id_pangkat'];?>" class="btn btn-warning mr-1"
                               >Ubah</a>
                            <a href="?page=pangkat=hapus&id=<?php echo $row['id_pangkat']?>" class="btn btn-danger"
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