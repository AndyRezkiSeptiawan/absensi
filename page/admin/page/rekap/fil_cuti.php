        <?php
            if(isset($_POST['filtewp'])){
        
                    $mulai = $_POST['mulai'];
                    $sampai = $_POST['sampai'];
                    $no=1;
                    $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM cuti
                    INNER JOIN data_pegawai ON cuti.id_pegawai = data_pegawai.id_pegawai
                    WHERE waktu_pengajuan BETWEEN '".$mulai."' AND '".$sampai."'
                ");
                while($row = mysqli_fetch_array($sqlabsenmsk))
                {
               ?>
            <tr align="center">
                <td><?=$no++?></td>
                <td><?php echo $row['id_pegawai']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($row['waktu_pengajuan'])); ?></td>
                <td>
                    <?php
                    $bukti = $row['bukti'];
                    if($bukti == NULL){
                        echo '';
                    }else{
                        echo '<a href="../../assets/bukti/'.$bukti.'" downlaod>Download</a></td>';
                    }
                ?>

                <td>
                    <?php
                        $status = $row['status_cuti'];
                        if($status == 'Ajukan'){
                            echo '<div class="btn btn-warning">'.$status.'</div>';
                        }elseif($status == 'Diperiksa'){
                            echo '<div class="btn btn-primary">'.$status.'</div>';
                        }elseif($status == 'Diterima'){
                            echo '<div class="btn btn-success">'.$status.'</div>';
                        }elseif($status == 'Ditolak'){
                            echo '<div class="btn btn-danger">'.$status.'</div>';
                        }
                        
                    ?>

                </td>
           
            </tr>
        <?php }
        }
        elseif(isset($_POST['filtercuti']))
        {

        $jenis = $_POST['jc'];
        $no = 1;
        $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM cuti
        INNER JOIN data_pegawai ON cuti.id_pegawai = data_pegawai.id_pegawai
        WHERE cuti.jenis_cuti='$jenis'
        ");
        while($row = mysqli_fetch_array($sqlabsenmsk))

        {
        ?>
        <tr align="center">
            <td><?=$no++?></td>
            <td><?php echo $row['id_pegawai']; ?><br><b><?php echo $row['nama']; ?></b></td>
            <td><?php echo $row['jenis_cuti']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($row['waktu_pengajuan'])); ?></td>
            <td><?php echo date('d-m-Y', strtotime($row['akhir'])); ?></td>
            <td>
                <?php
                            $bukti = $row['bukti'];
                            if($bukti == NULL){
                                echo '';
                            }else{
                                echo '<a href="../../assets/bukti/'.$bukti.'" downlaod>Download</a></td>';
                            }
                        ?>

            <td>
                <?php
                                $status = $row['status_cuti'];
                                if($status == 'Ajukan'){
                                    echo '<div class="btn btn-warning">'.$status.'</div>';
                                }elseif($status == 'Diperiksa'){
                                    echo '<div class="btn btn-primary">'.$status.'</div>';
                                }elseif($status == 'Diterima'){
                                    echo '<div class="btn btn-success">'.$status.'</div>';
                                }elseif($status == 'Ditolak'){
                                    echo '<div class="btn btn-danger">'.$status.'</div>';
                                }
                                
                            ?>

            </td>

        </tr>
        <?php
				}
                  
            }

				?>