<?php

    if(isset($_POST['filter'])){
        $mulai = $_POST['mulai'];
        $sampai = $_POST['sampai'];
        $no = 1;
        $sqlfilter = mysqli_query($koneksi,"SELECT * FROM riwayat_pangkat 
        INNER JOIN data_pegawai ON riwayat_pangkat.id_pegawai = data_pegawai.id_pegawai
        INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
        WHERE
        waktu_perubahan BETWEEN '".$mulai."' AND '".$sampai."' ");

        while($row = mysqli_fetch_array($sqlfilter))
        {
        ?>
        <tr align="center">
        <td><?=$no++ ?></td>
        <td><?php echo $row['nik']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['pangkat']; ?></td>
        <td><?php echo $row['golongan']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($row['waktu_perubahan'])); ?></td>
        </tr>
        <?php
        }
    }

?>