<?php

    $id = $_GET['id'];
    $sqlhps = mysqli_query($koneksi, "DELETE FROM cuti where id_cuti='$id'");
    if($sqlhps == true){
        echo
        '<script>alert("Data Berhasil Dihapus");document.location = "?page=cuti";</script>';
    }else{
        echo
        '<script>alert("Data Gagal Dihapus");history.go(-1);</script>';
    }

?>