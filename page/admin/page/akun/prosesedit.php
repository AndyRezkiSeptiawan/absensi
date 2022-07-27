<?php
   
$id_user = ($_POST['id_user']);

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$telpon = $_POST['telpon'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$level = $_POST['level'];

        $query = mysqli_query($koneksi, "UPDATE users SET nik='$nik',nama='$nama', telp='$telpon',
        email='$email',username='$username',password='$password',level='$level' WHERE id_user='$id_user'");

        if($query == true){
            echo "
            <script>alert('Data Berhasil Diubah!');
            document.location = '?page=akun';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Diubah!');
            history.go(-1);
            </script>";
        }
?>