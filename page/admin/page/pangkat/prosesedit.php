<?php
    $id = $_POST['id_pangkat'];
    $pangkat = $_POST['pangkat'];
    $golongan = $_POST['golongan'];
    $gaji = $_POST['gaji'];

        $query = mysqli_query($koneksi, "UPDATE pangkat SET 
        pangkat='$pangkat', golongan='$golongan',gaji='$gaji'
        WHERE id_pangkat='$id'");

        if($query == true){
            echo "
            <script>alert('Data Berhasil Diubah!');
            document.location = '?page=pangkat';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Diubah!');
            history.go(-1);
            </script>";
        }
?>