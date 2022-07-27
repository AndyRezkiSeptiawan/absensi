                    
                   
            <?php 
            if(isset($mulai) && isset($sampai)){
                         $sqlfilter = mysqli_query($koneksi,"SELECT * FROM absensi 
                         INNER JOIN data_pegawai ON absensi.id_pegawai = data_pegawai.id_pegawai
                         WHERE
                         tgl BETWEEN '".$mulai."' AND '".$sampai."' ");
                     }   
                     else{
                        $no=1;
                        $sqlfilter = mysqli_query($koneksi, "SELECT * FROM absensi
                        INNER JOIN data_pegawai ON absensi.id_pegawai = data_pegawai.id_pegawai");
                    }
					
                     while($row = mysqli_fetch_array($sqlfilter))
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
                    <!-- <td>
                        <div class="btn-group">
                            <a href="?page=kehadiran/absensi=editdata&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                               >Ubah</a>
                            <a href="?page=kehadiran/absensi=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
                                onclick="return confirm('Ingin Menghapus Data Ini ?');">Hapus</a>
                        </div>
                    </td> -->
                </tr>
                <?php
                }
    
      