<?php

    if(isset($_POST['filter'])){

        $jenis = $_POST['jenis'];
        $no =1;
        $sql = mysqli_query($koneksi,"SELECT * FROM data_pegawai
        INNER JOIN divisi ON data_pegawai.id_divisi = divisi.id_divisi
        WHERE jenis='$jenis'");

        while($row = mysqli_fetch_assoc($sql))
        {
        
        ?>
            <tr align="center">
            <td><?=$no++?></td>
            <td><?php echo $row['nik']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['pangkat']?>/<?=($row['golongan'])?></td>
            <td><?php echo $row['nama_divisi']; ?></td>
            <td><?php echo $row['jenis']; ?></td>
            </tr>
            <?php } 

    }

    
?>