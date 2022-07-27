<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cuti Atau Izin Pegawai</h1>
        <div class="btn-right">
            <a class='btn btn-secondary rounded-2' href="?page=kehadiran/cuti-izin=tambahdata">Tambah Data</a>
            <a class='btn btn-primary rounded-2 text-white' onclick='print_d()'> Cetak Data
                <script>
                    function print_d() {
                        window.open('../../cetak_data/cetak_cuti.php', '_blank');
                    }
                </script>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table id="datatabel" class="table table-bordered table-hover" width="100%">
            <thead class="table-info">
                <tr align="center">
                    <th>No</th>
                    <th>Pegawai</th>
                    <th>Jenis Cuti</th>
                    <th>Mulai</th>
                    <th>Akhir</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
					 $sqlabsenmsk = mysqli_query($koneksi, "SELECT * FROM cuti
                     INNER JOIN data_pegawai ON cuti.id_pegawai = data_pegawai.id_pegawai
                     WHERE status_cuti='Ajukan' OR status_cuti='Diperiksa' OR status_cuti='Diterima'
                    ");
                     while($row = mysqli_fetch_array($sqlabsenmsk))

                     {
					?>
                <tr align="center">
                    <td><?=$no++?></td>
                    <td><?php echo $row['id_pegawai']; ?><br><b><?php echo $row['nama']; ?></b></td>
                    <td><?php echo $row['jenis_cuti']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['mulai'])); ?></td>
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
                    <td>
                        <div class="btn-group">
                            <?php
                                $id = $row['id_cuti'];
                                $status = $row['status_cuti'];
                                if($status == 'Ajukan'){
                                    echo '<a href="?page=kehadiran/cuti-izin=cek-status&id='.$id.'&status=Diperiksa" class="btn btn-secondary btn-sm mr-1"><i class="fas fa-eye"></i></a>';
                                }
                                elseif($status == 'Diperiksa'){
                                    echo '<a href="?page=kehadiran/cuti-izin=cek-status&id='.$id.'&status=Diterima" class="btn btn-success btn-sm mr-1"><i class="fas fa-check"></i></a>';
                                    echo '<a href="?page=kehadiran/cuti-izin=cek-status&id='.$id.'&status=Ditolak" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>';
                                }
                                elseif($status == 'Ditolak'){
                                    echo '<a href="?page=kehadiran/cuti-izin=cek-status&id='.$id.'&status=Ditolak" class="btn btn-danger btn-sm disabled"><i class="fas fa-times"></i></a>';
                                }
                                elseif($status == 'Diterima'){
                                    echo '<a href="page/kehadiran/cuti-izin/cetak_rtf.php?id='.$id.'" target="_blank" class="btn btn-primary btn-sm"><i class="far fa-file-alt"></i></a>';
                                }
                            ?>
                            
                            
                            
                            <!-- <a href="?page=kehadiran/cuti-izin=editdata&id=<?php echo $row['0'];?>" class="btn btn-warning mr-1"
                               >Ubah</a>
                            <a href="?page=kehadiran/cuti-izin=hapus&id=<?php echo $row['0']?>" class="btn btn-danger"
                                onclick="return confirm('Ingin Menghapus Data Ini ?');">Hapus</a> -->
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
