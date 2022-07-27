<?php 

    $id_pegawai = $_POST['id_pegawai'];

    $pangkat_baru = $_POST['pangkatb'];
    $pangkat = $_POST['pangkat'];
    $gol = $_POST['golongan'];
    $waktu_perubahan = $_POST['wktuprbhn'];

    $gb = ($pangkat.''.' ('. $gol .')');
        $query = mysqli_query($koneksi, "INSERT INTO riwayat_pangkat 
        (id_rpngkat,id_pegawai,pangkat_lama,pangkat_baru,waktu_perubahan)
        VALUES ('','$id_pegawai','$gb','$pangkat_baru','$waktu_perubahan')");

        if($query == true){

            $update = mysqli_query($koneksi, "UPDATE data_pegawai SET id_pangkat='$pangkat_baru'
            WHERE id_pegawai='$id_pegawai'");

            echo "
            <script>
            alert('Data Berhasil Ditambah!');
            document.location = '?page=kenaikan-pangkat=tambahdata';</script>";
        }else{
            echo "
            <script>
            alert('Data Gagal Ditambah!');
            history.go(-1);
            </script>";
        }
        

?>
