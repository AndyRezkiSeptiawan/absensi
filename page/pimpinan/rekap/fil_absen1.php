                    
                   
            <?php 
            if(isset($_POST['filterabsen']))
            {
    
            $stat = $_POST['status'];
            $no = 1;
            $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM absensi
            INNER JOIN data_pegawai ON absensi.id_pegawai = data_pegawai.id_pegawai
            WHERE keterangan='$stat'
            ");
            while($row = mysqli_fetch_array($sqlabsenmsk))
    
            {
            ?>
                <tr align="center">
                    <td><?=$no++?></td>
                    <td><?php echo $row['1']; ?></td>
                    <td><?php echo $row['8']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['2'])); ?></td>
                    <td><?php echo $row['3']; ?></td>
                    <td>
                        <?php 
                        
                        $tgl_keluar = $row['4'];
                        if($tgl_keluar == 0){
                            echo '';
                        }else{
                            echo "$tgl_keluar";
                        }
                                                
                        ?>


                    </td>
                    <td><?php echo $row['5']; ?></td>
            <?php
                    }
                }
             
            
            
      