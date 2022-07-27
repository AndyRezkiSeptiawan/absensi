<?php 

$idgaji = rand(100,1000);

$id_pegawai = $_POST['id_pegawai'];
$gaji = $_POST['gaji'];
$t_istri = $_POST['t_istri'];
$t_anak = $_POST['t_anak'];
$t_umum = $_POST['t_umum'];
$t_struktur = $_POST['t_struktur'];
$t_fungsi = $_POST['t_fungsi'];
$t_lain = $_POST['t_lain'];
$t_bulat = $_POST['t_bulat'];
$t_beras = $_POST['t_beras'];
$t_pajak = $_POST['t_pajak'];

$jumlah_kotor = ((int)$gaji + (int)$t_istri + (int)$t_anak + (int)$t_umum + (int)$t_struktur +
(int)$t_fungsi + (int)$t_lain + (int)$t_bulat + (int)$t_beras + (int)$t_pajak);


$pot_beras = $_POST['pot_beras'];
$iwp = $_POST['iwp'];
$pot_pph = $_POST['pot_pph'];
$sewa = $_POST['sewa'];
$tunggakan = $_POST['tunggakan'];
$utang = $_POST['utang'];
$pot_lain = $_POST['pot_lain'];
$taperum = $_POST['taperum'];

$jumlah_potongan = ((int)$pot_beras+(int)$iwp+(int)$pot_pph+(int)$sewa+(int)$tunggakan+
(int)$utang+(int)$pot_lain+(int)$taperum);

$gaji_bersih = $jumlah_kotor - $jumlah_potongan;
$waktu_gajian = "05";
$tgl  = date('d');
$bul  = date('Y-m-d');

    $slct  = mysqli_query($koneksi,"SELECT * FROM gaji WHERE id_pegawai='$id_pegawai' AND waktu='$bul'");
    $data  = mysqli_num_rows($slct);
 
    if($data > 0){
        echo'<script>alert("Data Sudah Ada!!");history.go(-1);</script>';
    }else{
        $sqltmbh = mysqli_query($koneksi,"INSERT INTO gaji(id_gaji,id_pegawai,waktu,gaji_pokok,t_istri_suami,
        t_anak,t_umum,t_struktur,t_fungsi,t_lain,t_bulat,t_beras,t_pajak,jml_kotor,
        pot_beras,iwp,pot_pph,sewa_rumah,tunggakan,utang,pot_lain,taperum,jml_pot,jml_bersih)
        VALUES('$idgaji','$id_pegawai','$bul','$gaji','$t_istri','$t_anak','$t_umum','$t_struktur','$t_fungsi'
        ,'$t_lain','$t_bulat','$t_beras','$t_pajak','$jumlah_kotor','$pot_beras','$iwp',
        '$pot_pph','$sewa','$tunggakan','$utang','$pot_lain','$taperum','$jumlah_potongan','$gaji_bersih')
        ");
    
        if($sqltmbh == true){
            $updategaji = mysqli_query($koneksi,"UPDATE data_pegawai SET gaji='$idgaji'
            where id_pegawai='$id_pegawai'
            ");
    
            echo'
            <script>
            alert("Gaji Baru Saja Ditambahkan");
            document.location = "?page=gaji-pegawai";
            </script>
            ';
           
            
        }else{
            echo'
            <script>
            alert("Gaji Gagal Ditambahkan");
            history.go(-1);e
            </script>
            ';
        }
    }

   

?>