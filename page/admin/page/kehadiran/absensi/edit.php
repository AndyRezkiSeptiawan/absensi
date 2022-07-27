<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE id_absen = '$id'");
$row = mysqli_fetch_array($query);
$namaid = $row[1];
$select = $row['keterangan'];
?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Absen Masuk</h1>
</div>

    <body class="d-flex flex-column h-100"  style='background-color: #7df9ff;'>
        <main class="flex-shrink-0">
            <div class="container pt-5">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-grid p-5">
                                <form action="?page=kehadiran/absensi=prosesedit" method="post">
                                    <div class="row">
                                        <div class="form-group col-4 col-md-4">
                                            <label for="idabsen" class="col-form-label">No Absen</label>
                                            <div class="col-sm-12">
                                                <input type="text" value="<?=$row['id_absen'];?>" readonly required class="form-control" placeholder="Masukkan no absen" name="idabsen">
                                            </div>
                                        </div>
                                        <div class="form-group col-4 col-md-4">
                                            <label for="tgl" class="col-form-label">Tgl</label>
                                            <div class="col-sm-12">
                                                <input type="date"value="<?=$row[2];?>" required class="form-control" placeholder="Masukkan Tgl" name="tgl">
                                            </div>
                                        </div>
                                        <div class="form-group col-4 col-md-4">
                                            <label for="waktu" class="col-form-label">Waktu</label>
                                            <div class="col-sm-12">
                                                <input type="time"value="<?=$row[3];?>" required class="form-control" placeholder="Masukkan Jam" name="waktu">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-6">
                                            <label for="nama" class="col-form-label">nama</label>
                                            <select name="nama" required class="form-control">
												<option value="#">pilih nama</option>
												<?php

                                                    $sqlpgwai = mysqli_query($koneksi,"SELECT * FROM data_pegawai");
                                                    while($datapgwai = mysqli_fetch_array($sqlpgwai)){
                                                        $nama = $datapgwai[1];
                                                        
                                                        if($nama == $namaid){
                                                            $cek = 'selected';
                                                        }else {
                                                            $cek = '';
                                                        }
                                    


                                                    ?>
                                                    <option value="<?=$nama?>"<?=$cek?>><?=$nama?></option>
                                                    <?php } ?>
                                                
											</select>

                                           </div>
                                           <div class="form-group col-4 col-md-6">
                                            <label for="waktu_keluar" class="col-form-label">waktu Keluar</label>
                                            <div class="col-sm-12">
                                                <input type="time"value="<?=$row['waktu_keluar'];?>" required class="form-control" placeholder="Masukkan Jam" name="waktu_keluar">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-6 col-md-6">
                                            <label for="keterangan" class="col-form-label">Keterangan</label>
                                                <select name="keterangan" required class="form-control">
                                                    <option value="#">pilih</option>
                                                    <option value="Masuk" <?php if($select == 'Masuk') echo 'selected';?>>Masuk</opion>
                                                    <option value="Keluar" <?php if($select == 'Keluar') echo 'selected'?>>Keluar</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 text-center">
                                        <div class="col-sm-12">
                                            <button type="submit" class='btn btn-success rounded-2'> 
                                                Ubah Data
                                            </button>
                                            <button type="reset" class='btn btn-warning rounded-2'> 
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </body>

</div>