<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Data Pegawai</h1>
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
                <div class="form border p-2">
                    <div class="form-group ml-1 mx-auto" style="width:100%">
                        <label for="jenis">jenis</label>
                        <select name="jenis" name="status" class="form-control">
                            <option disabled selected>-- Pilih --</option>
                            <option value="PNS">PNS</option>
                            <option value="HONORER">HONORER</option>
                        </select>
                    </div>
                    <input type="submit" name="filter" class="form-control btn btn-primary text-center w-100"
                        value="Filter">
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form action="../../cetak_data/cetak_data_pegawai.php" target="_blank" method="POST">
                <div class="border p-2">
                    <div class="form-group ml-1" style="width:100%">
                        <label for="jenis">jenis</label>
                        <select name="jenis" name="status" class="form-control">
                            <option disabled selected>-- Pilih --</option>
                            <option value="PNS">PNS</option>
                            <option value="HONORER">HONORER</option>
                        </select>
                    </div>
                    <input type="submit" name="cetak" class="form-control btn btn-success w-100"
                        value="Print">
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Pangkat/Gol</th>
                    <th>Divisi</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        
                        if(isset($_POST['filter'])){
                            $pns = $_POST['jenis'] == 'PNS';
                            $honorer = $_POST['jenis'] == 'HONORER';

                            if($pns){
                                include 'fil_pegawai.php';
                            }elseif($honorer){
                                include 'fil_pegawai.php';
                            }
                        }
                        else{
                            $no = 1;
                            $sql = mysqli_query($koneksi,"SELECT * FROM data_pegawai
                            INNER JOIN divisi ON data_pegawai.id_divisi = divisi.id_divisi");
                             while($row = mysqli_fetch_array($sql))
                             {
                            ?>
                                <tr align="center">
                                <td><?=$no++?></td>
                                <td><?php echo $row['nik']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['pangkat']?>/<?=($row['golongan'])?></td>
                                <td><?php echo $row['nama_divisi']; ?></td>
                                <td><?php echo $row['jenis']; ?></td>
                                </tr>
                            <?php
                            }
                        }
                ?>

            </tbody>
        </table>

    </div>


</div>