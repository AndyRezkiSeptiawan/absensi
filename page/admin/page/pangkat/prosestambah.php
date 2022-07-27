<?php 

$pangkat = $_POST['pangkat'];
$golongan = $_POST['golongan'];
$gaji = $_POST['gaji'];

        $query = mysqli_query($koneksi, "INSERT INTO pangkat(id_pangkat,pangkat,golongan,gaji)
         VALUES(NULL,'$pangkat','$golongan','$gaji')");
    
        if($query == true){
            echo "
            <script>alert('Data Berhasil Ditambah!');
            document.location = '?page=pangkat';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Ditambah!');
            history.go(-1);
            </script>";
        }

	

?>