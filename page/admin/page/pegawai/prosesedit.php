<?php
    $id_pegawai = $_POST['idpegawai'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $id_divisi = $_POST['namadivisi'];
    $pangkat = $_POST['pangkat'];
    $jenis = $_POST['jenis'];

        $query = mysqli_query($koneksi, "UPDATE data_pegawai SET nik='$nik',nama='$nama', id_bidang='$id_divisi',
        id_pangkat='$pangkat',jenis='$jenis' WHERE id_pegawai='$id_pegawai'");

        if($query == true){
            echo "
            <script>alert('Data Berhasil Diubah!');
            document.location = '?page=pegawai/data-pegawai';
            </script>";
        }else{
            echo "
            <script>alert('Data Gagal Diubah!');
            history.go(-1);
            </script>";
        }
?>