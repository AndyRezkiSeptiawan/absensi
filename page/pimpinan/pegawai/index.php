<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
        <div class="btn-right">
            <!-- <a class='btn btn-secondary rounded-2' href="?page=data-pegawai=tambah">Tambah Data</a> -->
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
                    <th>Pegawai</th>
                    <th>Pangkat/Gol_Ruang</th>
					<th>Bidang</th>
                    <th>Gaji</th>
                    <th>Jenis</th>
					<!-- <th>aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                     $no = 1;
					 $sqldtpgwai = mysqli_query($koneksi, "SELECT * FROM data_pegawai
                     INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
                     INNER JOIN bidang ON data_pegawai.id_bidang = bidang.id_bidang");
                     while($row = mysqli_fetch_array($sqldtpgwai))
                     {
					?>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?=$row['nik'];?><br><b>(<?=$row['nama'];?>)</b></td>
                    <td><?php echo $row['pangkat']; ?> / (<?=$row['golongan']?>)</td>
                    <td><?php echo $row['nama_bidang']; ?></td>
                    <td>Rp <?php echo number_format($row['gaji'],0,',','.'); ?></td>
                    <th><?php echo $row['jenis']; ?></th>
                    <!-- <td>
                        <div class="btn-group">
                            <a href="?page=data-pegawai=qrcode&id=<?php echo $row['0'];?>" class="btn btn-primary mr-1"
                               >Buat QRCode</a>
                            <a href="?page=data-pegawai=edit&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                               >Ubah</a>
                            <a href="?page=data-pegawai=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
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