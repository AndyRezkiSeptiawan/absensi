<?php

    $id = $_GET['id'];

    $hps = mysqli_query($koneksi,"DELETE FROM divisi WHERE id_divisi='$id'");
    if($hps == true){
        echo
        '
        <script>
        alert("Data Berhasil Dihapus");
        document.location = "?page=divisi";
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