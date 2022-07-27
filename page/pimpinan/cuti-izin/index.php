<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cuti Atau Izin Pimpinan</h1>
        <div class="btn-right">
           
            <!-- <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_cuti.php?id=<?=$_SESSION['nik']?>', '_blank');
                    }
                </script>
            </a> -->
        </div>
    </div>

    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No</th>
                    <th>Pegawai</th>
                    <th>Jenis</th>
                    <th>Waktu Pengajuan</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $nik = $_SESSION['nik'];
					$sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM cuti
                     INNER JOIN data_pegawai ON cuti.id_pegawai = data_pegawai.id_pegawai
                     WHERE nik='$nik' ORDER BY id_cuti DESC
                    ");
                     while($row = mysqli_fetch_array($sqlabsenmsk))

                     {
					?>
                   <tr align="center">
                            <td><?=$no++?></td>
                            <td><?php echo $row['id_pegawai']; ?><br><b><?php echo $row['nama']; ?></b></td>
                            <td><?php echo $row['jenis_cuti']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['waktu_pengajuan'])); ?></td>
                            <td>
                                <?php
                        $bukti = $row['bukti'];
                        if($bukti == NULL){
                            echo '';
                        }else{
                            // echo '<a href="../../assets/bukti/'.$bukti.'" downlaod>Download</a></td>';
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
                                echo '<div class="btn btn-info">'.$status.'</div>';
                            }elseif($status == 'Ditolak'){
                                echo '<div class="btn btn-danger">'.$status.'</div>';
                            }elseif($status == ''){
                                echo '';
                            }
                            
                        ?>

                            </td>
                            <td>
                                <div class="btn-group">
                               
                                <?php
                        
                                    $idcuti = $row['id_cuti'];
                                    $status = $row['status_cuti'];

                                    
                                   
                                    if($status == ''){
                                        echo '<a href="?page=cuti-ajukan&id='.$idcuti.'" class="btn btn-primary mr-1"
                                        >Ajukan</a>';
                                        echo '<a href="?page=cuti-edit&id='.$idcuti.'" class="btn btn-secondary mr-1"
                                        >Ubah</a>';
                                        echo '<a href="?page=cuti-hapus&id='.$idcuti.'" class="btn btn-danger"
                                        onclick="return confirm("Ingin Menghapus Data Ini ?"");">Hapus</a>';
                                    }
                                    elseif($status == 'Ajukan'){
                                        echo '<div class="btn btn-secondary mr-1"
                                        >Data Sudah Diajukan</a>';
                                    }
                                    elseif($status == 'Diperiksa'){
                                        echo '<a href="?page=cuti-edit&id='.$idcuti.'" class="btn btn-secondary mr-1 disabled"
                                        >Ubah</a>';
                                        echo '<a href="?page=cuti-hapus&id='.$idcuti.'" class="btn btn-danger disabled"
                                        onclick="return confirm(`Ingin Menghapus Data Ini ?`);">Hapus</a>';
                                    }elseif($status == 'Diterima'){
                                        echo '<a href="cuti-izin/cetak_rtf.php?id='.$idcuti.'" class="btn btn-success mr-1">Print</a>';
                                    }
                                    elseif($status == 'Ditolak'){
                                        echo '<a href="?page=cuti-hapus&id='.$idcuti.'" class="btn btn-danger"
                                        onclick="return confirm("Ingin Menghapus Data Ini ?"");">Hapus</a>';
                                    }
                                ?>
                               
                                </div>
                            </td>
                        </tr>
                <?php
								}
								mysqli_close($koneksi); 
								?>
            </tbody>
        </table>

    </div>


</div>
