<?php
$status1 = $_GET['status'];
if($status1 == 'Diperiksa'){
    $id = $_GET['id'];
    $status = $_GET['status'];
    $update = mysqli_query($koneksi, "UPDATE cuti SET status_cuti='$status'
    where id_cuti='$id'
    ");
    echo '
    <script>
    history.go(-1);
    </script>
    ';
}
else if($status1 == 'Diterima'){
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sqlpg = mysqli_query($koneksi,"SELECT * FROM cuti WHERE id_cuti='$id'");
    $data = mysqli_fetch_array($sqlpg);
    $id_pegawai = $data['id_pegawai'];
    $aw = date('d', strtotime($data['mulai']));
    $ak = date('d', strtotime($data['akhir']));
    $lama = abs($ak-$aw+1);
    
    $max = 0;
    $sqlpg = mysqli_query($koneksi,"select * from data_pegawai where id_pegawai='$id_pegawai'");
    $data = mysqli_fetch_array($sqlpg);
    $jm_cuti = $data['jum_cuti'];

    $kurang = $jm_cuti - $lama;
 
    if($kurang < $max){
        echo '<script>alert("Mak Cuti Pegawai sisa '.$jm_cuti.' Dibulan ini");history.go(-1);</script>';
    }
    else{
          $update = mysqli_query($koneksi, "UPDATE cuti SET status_cuti='$status'
        where id_cuti='$id'
        ");
          $updates = mysqli_query($koneksi, "UPDATE data_pegawai SET jum_cuti='$kurang'
          where id_pegawai='$id_pegawai'
          ");

        if($update == true AND $updates == TRUE){
            echo '
            <script>
            history.go(-1);
            </script>
            ';
            }
    }
}
elseif($status1 == 'Ditolak'){
    $id = $_GET['id'];
    $status = $_GET['status'];
    $update = mysqli_query($koneksi, "UPDATE cuti SET status_cuti='$status'
    where id_cuti='$id'
    ");
     echo '
     <script>
     history.go(-1);
     </script>
     ';
}
?>