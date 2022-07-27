<?php

if(isset($_POST['idpegawai'])){
    // var_dump($_POST['idpegawai']);
    $no = $_POST['idpegawai'];

    $sql = mysqli_query($koneksi,"SELECT * FROM data_pegawai where id_pegawai='$no'");
    $data = mysqli_num_rows($sql);

    if($data < 1){
        echo '
        <script>
        alert("QRCode Dilarang");
        history.go(-1);
        </script>
        ';
    }else{
        $no = $_POST['idpegawai'];
    
            $sqlpgwai = mysqli_query($koneksi, "SELECT * FROM data_pegawai where
            id_pegawai='$no'");

            $datapgwai = mysqli_fetch_array($sqlpgwai);
            $id_pegawai = $datapgwai['id_pegawai'];

            date_default_timezone_set("Asia/Makassar"); //WITA

            $tgl = date('Y-m-d');
            $waktumsuk = date('H:i');
            $ket = "Masuk";

            $cek = mysqli_query($koneksi, "SELECT * FROM absensi where id_pegawai='$id_pegawai' AND tgl='$tgl' AND keterangan='$ket'");
            $datacek = mysqli_fetch_array($cek);
            $waktul = $datacek['waktu_keluar'];
            $dataket = $datacek['keterangan'];

            if($dataket == 'Masuk'){
                $waktukeluar = date('H:i');
                $ketpl = 'Keluar';
                $update = mysqli_query($koneksi,"UPDATE absensi SET waktu_keluar='$waktukeluar',keterangan='$ketpl'
                WHERE id_pegawai='$id_pegawai'
                ");
                echo '
                <script>
                alert("Anda Berhasil Absen Pulang");
                document.location = "?page=dashboard";
                </script>
                ';
            }
            else{
                $cek = mysqli_query($koneksi, "SELECT * FROM absensi where id_pegawai='$id_pegawai' AND tgl='$tgl'");
                $datacek = mysqli_fetch_array($cek);
                
                if($datacek == true){
                    echo '
                    <script>
                    alert("Maksimal Absen Cuma 1x Perhari");
                    document.location = "?page=dashboard";
                    </script>';
                }else{
                    $sqltmbhabsenpgwai = mysqli_query($koneksi,"INSERT INTO absensi(id_absen,id_pegawai,tgl,waktu_masuk,waktu_keluar,keterangan)
                    VALUES('','$no','$tgl','$waktumsuk','','$ket')");

                    if($sqltmbhabsenpgwai == true){
                        echo '
                        <script>
                        alert("Anda Berhasil Absen Masuk");
                        document.location = "?page=dashboard";
                        </script>
                        ';
                    }
                    else{
                        echo '
                        <script>
                        alert("Anda Gagal Absen");
                        history.go(-1);
                        </script>
                        ';
                    }
                }
            }      
    }
    
}


?>