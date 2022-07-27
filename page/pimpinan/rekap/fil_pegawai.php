<?php

    if(isset($_POST['filter'])){

        $jenis = $_POST['jenis'];
        $no =1;
        $sql = mysqli_query($koneksi,"SELECT * FROM data_pegawai
        INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
        INNER JOIN bidang ON data_pegawai.id_bidang = bidang.id_bidang
        WHERE jenis='$jenis'");

        while($row = mysqli_fetch_assoc($sql))
        {
        
        ?>
            <tr align="center">
            <td><?=$no++?></td>
            <td><?php echo $row['nik']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['pangkat']?>/<?=($row['golongan'])?></td>
            <td><?php echo $row['nama_bidang']; ?></td>
            <td><?php echo $row['jenis']; ?></td>
            </tr>
            <?php } 

    }

    
?>