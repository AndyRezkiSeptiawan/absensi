<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sqldata = mysqli_query($koneksi,"SELECT * FROM data_pegawai
        RIGHT JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat
        where id_pegawai='$id'");
        $data = mysqli_fetch_array($sqldata);
        $idd = $data['id_bidang'];
        $idp = $data['id_pangkat'];
    }else{
        echo"
        <script>
         alert('Tidak Ada Data');
         history.go(-1);
        </script>
        ";
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=pegawai/data-pegawai=prosesedit" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
                                <div class="row">
									<div class="form-group col-12 col-md-6">
										<label for="idpegawai" class="col-form-label">ID Pegawai</label>
										<input type="text" class="form-control" placeholder="Masukkan ID" name="idpegawai" value="<?=$data[0]?>" readonly="">
									</div>
                                    <div class="form-group col-12 col-md-6">
										<label for="nik" class="col-form-label">NIK</label>
										<input type="text" value="<?=$data[1]?>" readonly="" class="form-control" placeholder="Masukkan NIK" name="nik">
									</div>								
								</div>
                                <div class="row">
                                <div class="form-group col-12 col-md-4">
										<label for="nama" class="col-form-label">Nama</label>
										<input type="text" required class="form-control" placeholder="Masukkan Nama" name="nama" value="<?=$data[2]?>">
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="namadivisi" class="col-form-label">Nama Bidang</label>
											<select name="namadivisi" required class="form-control">
												<option value="#">-- Pilih --</option>
                                                <?php

                                                    $sql = mysqli_query($koneksi,"SELECT * FROM bidang");
                                                    while($datap = mysqli_fetch_assoc($sql)){
                                                        $iddvs = $datap['id_bidang'];
                                                        $namadv = $datap['nama_bidang'];

                                                        if($iddvs == $idd){
                                                            $cek = 'selected';
                                                        }else{
                                                            $cek = '';
                                                        }
                                                ?>
                                                    <option value="<?=$iddvs?>" <?=$cek?>><?=$namadv?></option>
                                                <?php } ?>
                                

											</select>
									</div>

                                    <div class="form-group col-12 col-md-4">
										<label for="pangkat" class="col-form-label">Pangkat</label>
											<select name="pangkat" id="pangkat" class="form-control" onchange="pang()">
												<option value="#">-- Pilih --</option>
                                                <?php

                                                    $sql = mysqli_query($koneksi,"SELECT * FROM pangkat");
                                                    while($datapa = mysqli_fetch_assoc($sql)){
                                                        $iddp = $datapa['id_pangkat'];
                                                        $namap = $datapa['pangkat'];

                                                        if($iddp == $idp){
                                                            $cek = 'selected';
                                                        }else{
                                                            $cek = '';
                                                        }
                                                ?>
                                                    <option id="pagnkat" value="<?=$iddp?>" <?=$cek?>><?=$namap?></option>
                                                <?php } ?>
                                

											</select>
									</div>
                                </div>
								<hr>
								<div class="row">
                                    
                                    <div class="form-group col-12 col-md-4">
									<label for="golongan" class="col-form-label">Golongan</label>
										<input type="text" name="golongan" id="golongan" value=<?=$data['golongan']?> class="form-control" readonly="">
									</div>
                                    <div class="form-group col-12 col-md-4">
										<label for="gaji" class="col-form-label">Gaji</label>
										<input type="text" name="gaji" id="gaji" value=<?=$data['gaji']?> class="form-control" readonly="">
									</div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="jenis" class="col-form-label">Jenis</label>   
                                        <select name="jenis" required class="form-control">
                                            <option disabled selected>-- Pilih --</option>
                                            <option value="PNS" <?php if($data['jenis'] == 'PNS') echo 'selected'; ?>>PNS</option>
                                            <option value="HONORER" <?php if($data['jenis'] == 'HONORER') echo 'selected'; ?>>HONORER</option>
                                        </select>
                                        
                                    </div>
                                  
								</div>
			
								<div class="form-group mt-4 text-center">
									<div class="col-sm-11">
										<button type="submit" class='btn btn-success rounded-2'> 
											Ubah Data
										</button>
										<button type="reset" class='btn btn-warning rounded-2'> 
											Reset
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>