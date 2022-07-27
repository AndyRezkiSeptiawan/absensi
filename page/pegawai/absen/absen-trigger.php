<?php

if(isset($_POST['absen'])){

    $nik =$_SESSION['nik'];
    $sqlpgw = mysqli_query($koneksi, "SELECT id_pegawai,nik FROM data_pegawai
    WHERE nik='$nik'");
    $data = mysqli_fetch_array($sqlpgw);
    $idpeggawai = $data['id_pegawai'];

    date_default_timezone_set('Asia/Makassar');
    $tgl = date('Y-m-d');
    $wktumsuk = date('H:i');

    $sqlcek = mysqli_query($koneksi,"SELECT * FROM absensi
    where id_pegawai='$idpeggawai' AND tgl='$tgl'");

    $dataabsen = mysqli_num_rows($sqlcek);

    if($dataabsen < 1){
        $tmbahabsen = mysqli_query($koneksi,"INSERT INTO absensi(id_absen,id_pegawai,
        tgl,waktu_masuk,waktu_keluar,keterangan) VALUES('','$idpeggawai','$tgl','$wktumsuk','','Masuk')");
        if($tmbahabsen == true){
            echo '
            <script>
            alert("Anda Berhasil Melakukan Absen Masuk");
            history.go(-1);
            </script>
            ';
        }else{
            echo '
            <script>
            alert("Anda Tidak Dapat Melakukan Absen Masuk");
            history.go(-1);
            </script>
            ';
        }
    }else{
        $sqlcekwktukeluar = mysqli_query($koneksi,"SELECT * FROM absensi WHERE
        id_pegawai='$idpeggawai' AND tgl='$tgl'");
        $datacek = mysqli_fetch_array($sqlcekwktukeluar);
        if($datacek['waktu_masuk'] != 0 AND $datacek['waktu_keluar'] == 0){
            $idabsen = $datacek['id_absen'];
            $waktukluar = date('H:i');

            $updatewktu = mysqli_query($koneksi,"UPDATE absensi SET waktu_keluar='$waktukluar',
            keterangan='Keluar' WHERE id_absen='$idabsen'");
             
            if($updatewktu == true){
                echo '
                <script>
                alert("Anda Berhasil Melakukan Absen Keluar");
                history.go(-1);
                </script>
                ';
            }
            else{
                echo '
                <script>
                alert("Anda Tidak Dapat Melakukan Absen Keluar");
                history.go(-1);
                </script>
                ';
            }
        }
        elseif($datacek['waktu_masuk'] != 0 AND $datacek['waktu_keluar'] != 0){
            echo '
            <script>
            alert("Anda Sudah Melakukan Absen Masuk Dan Keluar Hari Ini");
            history.go(-1);
            </script>
            ';
        }
    }

}

?>