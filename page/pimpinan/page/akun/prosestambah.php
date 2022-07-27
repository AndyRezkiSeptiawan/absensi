<?php 

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$telpon = $_POST['telpon'];
$email = $_POST['email'];
$username = $_POST['username'];

$password = md5($_POST['password']);

$level = $_POST['level'];


    $ceksqlnik = mysqli_query($koneksi,"SELECT * FROM users where nik='$nik'");
    $data = mysqli_num_rows($ceksqlnik);
    if($data > 0){
        echo '
        <script>
        alert("Nik Sudah Terdaftar");
        history.go(-1);
        </script>       
        ';
    }else{
        $query = mysqli_query($koneksi, "INSERT INTO users 
        (id_user,nik,nama,telp,email,foto,username,password,level)
        VALUES ('','$nik','$nama','$telpon','$email','','$username','$password','$level')");

        if($query == true){
            echo "
            <script>alert('Data Berhasil Ditambah!');
            document.location = '?page=akun=tambahdata';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Ditambah!');
            history.go(-1);
            </script>";
        }
    }



	

?>