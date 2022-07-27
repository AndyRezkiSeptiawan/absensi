<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM riwayat_pangkat 
INNER JOIN data_pegawai ON riwayat_pangkat.id_pegawai = data_pegawai.id_pegawai
INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
WHERE id_rpngkat = '$id'");
$row = mysqli_fetch_array($query);
$idpgwi = $row['id_pegawai'];
$pngkatlm = $row['pangkat'];
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Kenaikan Pangkat Pegawai</h1>
    </div>

    <body class="d-flex flex-column h-100" style='background-color: #7df9ff;'>
        <main class="flex-shrink-0">
            <div class="container pt-5">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-grid p-5">
                                <form action="?page=kenaikan-pangkat=prosesedit" method="post">
                                    <input type="hidden" name="id_rpngkat" value="<?=$row['id_rpngkat']?>">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-12">
                                            <label for="nama" class="col-form-label">nama</label>
                                            <select name="id_pegawai" required class="form-control">
                                                <option value="#">pilih nama</option>
                                                <?php

                                                    $sqlpgwai = mysqli_query($koneksi,"SELECT * FROM data_pegawai");
                                                    while($datapgwai = mysqli_fetch_array($sqlpgwai)){
                                                        $id_pegawai = $datapgwai['id_pegawai'];
                                                        $nama = $datapgwai['nama'];
                                                        
                                                        if($id_pegawai == $idpgwi){
                                                            $cek = 'selected';
                                                        }else {
                                                            $cek = '';
                                                        }
                                                    ?>
                                                <option value="<?=$id_pegawai?>" <?=$cek?>><?=$nama?></option>
                                                <?php } ?>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-md-4">
                                            <label for="pangkat" class="col-form-label">Pangkat</label>
                                            <select name="pangkat" class="form-control" id="pangkat" required>
                                                <option disabled selected>-- Pilih --</option>
                                                <option value="Pembina Utama Muda"
                                                    <?php if($row['pangkat_baru'] == 'Pembina Utama Muda') echo 'selected'; ?>
                                                    Pembina Utama Muda</option>
                                                <option value="Pembina Tingkat I"
                                                    <?php if($row['pangkat_baru'] == 'Pembina Tingkat I') echo 'selected'; ?>>
                                                    Pembina Tingkat I</option>
                                                <option value="Penata Tingkat I"
                                                    <?php if($row['pangkat_baru'] == 'Penata Tingkat I') echo 'selected'; ?>>
                                                    Penata Tingkat I</option>
                                                <option value="Pembina"
                                                    <?php if($row['pangkat_baru'] == 'Pembina') echo 'selected'; ?>>
                                                    Pembina</option>
                                                <option value="Penata"
                                                    <?php if($row['pangkat_baru'] == 'Penata') echo 'selected'; ?>>
                                                    Penata</option>
                                                <option value="Penata Muda Tingkat I"
                                                    <?php if($row['pangkat_baru'] == 'Penata Muda Tingkat I') echo 'selected'; ?>>
                                                    Penata Muda Tingkat I</option>
                                                <option value="Penata Muda"
                                                    <?php if($row['pangkat_baru'] == 'Penata Muda') echo 'selected'; ?>>
                                                    Penata Muda</option>
                                                <option value="Pengatur Tingkat I"
                                                    <?php if($row['pangkat_baru'] == 'Pengatur Tingkat I') echo 'selected'; ?>>
                                                    Pengatur Tingkat I</option>
                                                <option value="Pengatur"
                                                    <?php if($row['pangkat_baru'] == 'Pengatur') echo 'selected'; ?>>
                                                    Pengatur</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="golongan" class="col-form-label">Golongan</label>
                                            <select name="golongan" required class="form-control">
                                                <option disabled selected>-- Pilih --</option>
                                                <option value="IV/a" <?php if($row['golongan_baru'] == 'IV/a') echo 'selected'; ?>>
                                                    IV/a</option>
                                                <option value="IV/b" <?php if($row['golongan_baru'] == 'IV/b') echo 'selected'; ?>>
                                                    IV/b</option>
                                                <option value="IV/c" <?php if($row['golongan_baru'] == 'IV/c') echo 'selected'; ?>>
                                                    IV/c</option>
                                                <option value="IV/d" <?php if($row['golongan_baru'] == 'IV/d') echo 'selected'; ?>>
                                                    IV/d</option>
                                                <option value="III/a" <?php if($row['golongan_baru'] == 'III/a') echo 'selected'; ?>>
                                                    III/a</option>
                                                <option value="III/b" <?php if($row['golongan_baru'] == 'III/b') echo 'selected'; ?>>
                                                    III/b</option>
                                                <option value="III/c" <?php if($row['golongan_baru'] == 'III/c') echo 'selected'; ?>>
                                                    III/c</option>
                                                <option value="III/d" <?php if($row['golongan_baru'] == 'III/d') echo 'selected'; ?>>
                                                    III/d</option>
                                                <option value="II/a" <?php if($row['golongan_baru'] == 'II/a') echo 'selected'; ?>>
                                                    II/a</option>
                                                <option value="II/b" <?php if($row['golongan_baru'] == 'II/b') echo 'selected'; ?>>
                                                    II/b</option>
                                                <option value="II/c" <?php if($row['golongan_baru'] == 'II/c') echo 'selected'; ?>>
                                                    II/c</option>
                                                <option value="II/d" <?php if($row['golongan_baru'] == 'II/d') echo 'selected'; ?>>
                                                    II/d</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12 col-md-4">
                                            <label for="wktuprbhn" class="col-form-label">Waktu Perubahan</label>
                                            <div class="col-sm-12">
                                                <input type="date" required class="form-control"
                                                    value=<?=$row['waktu_perubahan']?> name="wktuprbhn">
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