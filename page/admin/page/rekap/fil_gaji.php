<?php

    if(isset($_POST['filter'])){

        $jenis = $_POST['jenis'];
        $no =1;
        $sql = mysqli_query($koneksi,"SELECT * FROM riwayat_gaji
        INNER JOIN data_pegawai ON riwayat_gaji.id_pegawai = data_pegawai.id_pegawai
        INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
        WHERE jenis='$jenis'");

        while($row = mysqli_fetch_assoc($sql))
        {
        
        ?>
            <tr align="center">
            <td><?=$no++?></td>
            <td><?php echo $row['nik']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['pangkat']?>/(<?=($row['golongan'])?>)</td>
            <td><?php echo $row['jenis']; ?></td>
            <td><?php echo number_format($row['gaji'],0,',','.'); ?></td>
            </tr>
            <?php } 

    }

    
?>