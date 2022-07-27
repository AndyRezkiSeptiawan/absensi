<?php

    $id = $_GET['id'];

    $hpsabsen = mysqli_query($koneksi,"DELETE FROM absensi WHERE id_pegawai='$id'");
    $hpscuti = mysqli_query($koneksi,"DELETE FROM cuti WHERE id_pegawai='$id'");
    $hpsgaji = mysqli_query($koneksi,"DELETE FROM gaji WHERE id_pegawai='$id'");
    $hpskp = mysqli_query($koneksi,"DELETE FROM riwayat_pangkat WHERE id_pegawai='$id'");
    $hps = mysqli_query($koneksi,"DELETE FROM data_pegawai WHERE id_pegawai='$id'");
    if($hpsabsen == true AND $hpscuti == true AND $hpsgaji == true
    AND $hpskp == true AND $hps == true){
        echo
        '
        <script>
        alert("Data Berhasil Dihapus");
        document.location = "?page=pegawai/data-pegawai";
        </script>
        ';
    }else{
        echo
        '
        <script>
        alert("Data Gagal Dihapus");
        history.go(-1);
        </script>
        ';
    }


?>