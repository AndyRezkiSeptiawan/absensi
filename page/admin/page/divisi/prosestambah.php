<?php 

$id_divisi = $_POST['id_divisi'];
$nama_divisi = $_POST['nama'];

    $cek = mysqli_query($koneksi, "SELECT * FROM bidang where id_bidang='$id_divisi'");

    if($data = (mysqli_num_rows($cek)) > 0){
        echo '
        <script>
        alert("ID Sudah Ada");
        document.location = "?page=divisi=tambah";
        </script>
        ';
    }
    else{
        $query = mysqli_query($koneksi, "INSERT INTO bidang VALUES ('$id_divisi',
        '$nama_divisi')");
    
        if($query == true){
            echo "
            <script>alert('Data Berhasil Ditambah!');
            document.location = '?page=divisi';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Ditambah!');
            history.go(-1);
            </script>";
        }
    }
	

?>