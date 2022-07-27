<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE id_absen = '$id'");
$row = mysqli_fetch_row($query);
$namaid = $row[1];
$select = $row[4];
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
                                                <input type="text" value="<?=$row[0];?>" readonly required class="form-control" placeholder="Masukkan no absen" name="idabsen">
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
                                        <div class="form-group col-12 col-md-12">
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
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-6 col-md-6">
                                            <label for="keterangan" class="col-form-label">Keterangan</label>
                                            <div class="col-sm-12">
                                                <select name="keterangan" required class="form-control">
                                                    <option value="#">pilih</option>
                                                    <option value="Cuti Tahunan" <?php if($data['2'] == 'Cuti Tahunan') echo 'selected';?>>Cuti Tahunan</opion>
											<option value="Cuti Sakit" <?php if($data['2'] == 'Cuti Sakit') echo 'selected';?>>Cuti Sakit</option>
											<option value="Cuti Alasan Penting" <?php if($data['2'] == 'Cuti Alasan Penting') echo 'selected';?>>Cuti Alasan Penting</option>
											<option value="Cuti Melahirkan" <?php if($data['2'] == 'Cuti Melahirkan') echo 'selected';?>>Cuti Melahirkan</option>
											<option value="Cuti Besar" <?php if($data['2'] == 'Cuti Besar') echo 'selected';?>>Cuti Besar</option>
											<option value="Cuti Diluar Tanggungan Negara" <?php if($data['2'] == 'Cuti Diluar Tanggungan Negara') echo 'selected';?>>Cuti Diluar Tanggungan Negara</option>
                                                </select>
                                            </div>
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