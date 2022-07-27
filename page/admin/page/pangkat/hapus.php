<?php

    $id = $_GET['id'];

    $hps = mysqli_query($koneksi,"DELETE FROM pangkat WHERE id_pangkat='$id'");
    if($hps == true){
        echo
        '
        <script>
        alert("Data Berhasil Dihapus");
        document.location = "?page=pangkat";
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