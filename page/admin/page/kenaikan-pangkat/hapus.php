<?php

    $id = $_GET['id'];
    $sqlhps = mysqli_query($koneksi, "DELETE FROM riwayat_pangkat where id_rpngkat='$id'");
    if($sqlhps == true){
        echo
        '<script>alert("Data Berhasil Dihapus");document.location = "?page=kenaikan-pangkat";</script>';
    }else{
        echo
        '<script>alert("Data Gagal Dihapus");history.go(-1);</script>';
    }

?>