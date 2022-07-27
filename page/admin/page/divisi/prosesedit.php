<?php
    $id_divisi = $_POST['id_divisi'];
    $nama_divisi = $_POST['nama'];


        $query = mysqli_query($koneksi, "UPDATE bidang SET nama_bidang='$nama_divisi'
        WHERE id_bidang='$id_divisi'");

        if($query == true){
            echo "
            <script>alert('Data Berhasil Diubah!');
            document.location = '?page=divisi';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Diubah!');
            history.go(-1);
            </script>";
        }
?>