<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Akun Pegawai</h1>
        <div class="btn-right">
            <a class='btn btn-secondary rounded-2' href="?page=akun=tambahdata">Tambah Data</a>
            <!-- <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_data_pegawai.php', '_blank');
                    }
                </script>
            </a> -->
        </div>
    </div>

    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>level</th>
					<th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
					 $sqldtpgwai = mysqli_query($koneksi, "SELECT * FROM users
                     where level='Pegawai'
                     ");
                     while($row = mysqli_fetch_array($sqldtpgwai))
                     {
					?>
                <tr align="center">
                    <td><?=$no++?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['level']; ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="?page=akun=editdata&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                               >Ubah</a>
                            <a href="?page=akun=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
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