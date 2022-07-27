<?php

    $id = $_SESSION['id'];
    $nik = $_SESSION['nik'];
    $nama = $_SESSION['nama'];
    $level = $_SESSION['level'];
   

    $ambldt = mysqli_query($koneksi,"SELECT * FROM data_pegawai
    RIGHT JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
    WHERE nik='$nik'");
    $data = mysqli_fetch_assoc($ambldt);
    $id_peggawaidt = $data['id_pegawai'];
    $id_pangkat = $data['id_pangkat'];
    $golongan = $data['golongan'];
    $idd = $data['id_bidang'];

    $ambluser = mysqli_query($koneksi,"SELECT * FROM users
    WHERE id_user='$id'");
    $data1 = mysqli_fetch_assoc($ambluser);
?>
<div class="container rounded bg-white shadow-sm" style="margin-bottom:100px;">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 pt-2 border-bottom">
                <img class="rounded mt-5" style="width:150px;height:150px;max-width:150px;max-height:150px" src="../../assets/img/foto/<?=$data1['foto']?>"><span
                    class="font-weight-bold mt-3"><?=$nama?></span><span
                    class="text-black-50"><?=$data1['email']?></span><span>
                </span>
                <form action="?page=unggah-foto&id=<?=$data1['nik']?>" method="POST" enctype="multipart/form-data"
                    class="mt-5">
                    <input type="file" name="foto" id="img" style="display:none;" />
                    <label for="img">--->Ubah Foto<---</label>
                    <br>
                    <input type="submit" name="submit" class="btn btn-primary btn-sm mt-2">
                </form>
            </div>

            <!-- <div class="qrcode text-center">
                <a href="?page=buat-qrcode&id=<?=$id_peggawaidt?>">Buat QRCode</a>
            </div>
            <div class="qrcode text-center">
                <a href="../../assets/qrcode/<?=$id_peggawaidt .'.png'?>" download>
                    <img src="../../assets/qrcode/<?=$id_peggawaidt .'.png'?>" class="img-fluid" alt="">
                </a>

            </div> -->
        </div>
        <div class="col-md-8 col-12">
            <div class="" style="padding:50px 50px">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="" method="POST">
                    <input type="hidden" value="<?=$data1['id_user']?>" name="id_user">
                    <input type="hidden" value="<?=$data['id_pegawai']?>" name="id_pegawai">
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Nama</label><input type="text" name="nama"
                                class="form-control" placeholder="Masukan Nama" value="<?=$data['nama']?>"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">NIK</label><input type="text" class="form-control"
                                name="nik" placeholder="Masukan Nik" readonly="" value="<?=$nik?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                class="form-control" name="email" placeholder="Masukan email"
                                value="<?=$data1['email']?>"></div>
                        <div class="col-md-12"><label class="labels">No Telp.</label><input type="text"
                                class="form-control" name="no_telp" placeholder="Masukan No Telp"
                                value="<?=$data1['telp']?>"></div>
                        <div class="col-md-12"><label class="labels">Jenis</label>
                            <select name="jenis" class="form-control">
                                <option value="PNS" <?php if($data['jenis'] == 'PNS') echo 'selected'; ?>>PNS</option>
                               
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <label for="pangkat" class="col-form-label">Pangkat</label>
                            <select name="pangkat" id="pangkat" class="form-control" onchange="pang()">
                                <option value="#">-- Pilih --</option>
                                <?php

                                $sql = mysqli_query($koneksi,"SELECT * FROM pangkat");
                                while($datap = mysqli_fetch_assoc($sql)){
                                    $iddp = $datap['id_pangkat'];
                                    $namap = $datap['pangkat'];

                                    if($iddp == $id_pangkat){
                                        $cek = 'selected';
                                    }else{
                                        $cek = '';
                                    }
                                ?>
                                <option id="pangkat" value="<?=$iddp?>" <?=$cek?>><?=$namap?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-12">
                            <label for="golongan" class="col-form-label">Golongan</label>
                            <input type="text" name="golongan" id="golongan" value="<?=$golongan?>" class="form-control"
                                readonly="">
                        </div>
                        <div class="col-md-12"><label class="labels">Divisi</label>
                            <select name="namadivisi" required class="form-control">
                                <option value="#">-- Pilih --</option>
                                <?php

                                                    $sql = mysqli_query($koneksi,"SELECT * FROM bidang");
                                                    while($datap = mysqli_fetch_assoc($sql)){
                                                        $iddvs = $datap['id_bidang'];
                                                        $namadv = $datap['nama_bidang'];

                                                        if($iddvs == $idd){
                                                            $cek = 'selected';
                                                        }else{
                                                            $cek = '';
                                                        }
                                                ?>
                                <option value="<?=$iddvs?>" <?=$cek?>><?=$namadv?></option>
                                <?php } ?>


                            </select>
                        </div>
                        <!-- <div class="col-md-12"><label class="labels">Gaji (Rp)</label>
                        <div class="form-control">
                            Rp <?=number_format($gaji,0,',','.')?>
                        </div>
                       
                            </div> -->
                    </div>
                    <div class="mt-5 text-center border-top">
                        <input class="btn btn-primary profile-button" type="submit" name="submit"
                            value="Save Profile"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

    if(@$_POST['submit']){
        
        $id_pegawai = $_POST['id_pegawai'];

        $randid = rand(1000,100000);

        var_dump($randid);
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        //database user
        $email = $_POST['email'];
        $no_telp = $_POST['no_telp'];

        $jenis = $_POST['jenis'];
        $pangkat = $_POST['pangkat'];
        $namadivisi = $_POST['namadivisi'];

        $cekid = mysqli_query($koneksi,"SELECT * FROM data_pegawai where nik='$nik'");

        $data = mysqli_num_rows($cekid);
        
            if($data < 1){
                    $tambah = mysqli_query($koneksi,"INSERT INTO data_pegawai(
                    id_pegawai,nik,nama,id_bidang,id_pangkat,jenis,jum_cuti)
                    VALUES('$randid','$nik','$nama','$namadivisi','$pangkat','$jenis','12')
                    ");

                    echo '
                    <script>
                    alert("Data Didatabase Pegawai Baru Dibuat");
                    document.location = "?page=profil";  
                    </script>
                    ';
            }
            else{
                
                $update = mysqli_query($koneksi,"UPDATE data_pegawai SET nik='$nik',nama='$nama',
                id_bidang='$namadivisi',id_pangkat='$pangkat',jenis='$jenis'
                where id_pegawai='$id_pegawai'
                ");
                $updateus = mysqli_query($koneksi,"UPDATE users SET telp='$no_telp',email='$email' where id_user='$id_user'");

                echo '
                <script>
                alert("Data Berhasil Diubah");
                document.location = "?page=profil";  
                </script>
                ';
            }

    }else{

    }


?>