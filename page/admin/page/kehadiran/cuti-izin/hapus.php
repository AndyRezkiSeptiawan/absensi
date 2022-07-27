<?php

    $id = $_GET['id'];
    $sqlhps = mysqli_query($koneksi, "DELETE FROM absensi where id_absen='$id'");
    if($sqlhps == true){
        echo
        '<script>alert("Data Berhasil Dihapus");document.location = "?page=kehadiran/absensi";</script>';
    }else{
        echo
        '<script>alert("Data Gagal Dihapus");history.go(-1);</script>';
    }

?>