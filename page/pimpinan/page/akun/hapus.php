<?php

    $id = $_GET['id'];

    $hpsakun = mysqli_query($koneksi,"DELETE FROM users WHERE id_user='$id'");

    if($hpsakun == true){
        echo
        '
        <script>
        alert("Data Berhasil Dihapus");
        document.location = "?page=akun";
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