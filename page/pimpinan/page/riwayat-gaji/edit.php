<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sqldata = mysqli_query($koneksi,"SELECT * FROM data_pegawai
        where id_pegawai='$id'");
        $data = mysqli_fetch_array($sqldata);
        $idd = $data[3];
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
										<input type="text" value="<?=$data[1]?>" required class="form-control" placeholder="Masukkan NIK" name="nik">
									</div>								
								</div>
                                <div class="row">
                                <div class="form-group col-12 col-md-4">
										<label for="nama" class="col-form-label">Nama</label>
										<input type="text" required class="form-control" placeholder="Masukkan Nama" name="nama" value="<?=$data[2]?>">
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="namadivisi" class="col-form-label">Nama Divisi</label>
											<select name="namadivisi" required class="form-control">
												<option value="#">pilih nama divisi</option>
                                                <?php

                                                    $sql = mysqli_query($koneksi,"SELECT * FROM divisi");
                                                    while($datap = mysqli_fetch_assoc($sql)){
                                                        $iddvs = $datap['id_divisi'];
                                                        $namadv = $datap['nama_divisi'];

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
                                            <select name="pangkat" class="form-control" id="pangkat" required>
                                                    <option disabled selected>-- Pilih --</option>
                                                    <option value="Pembina Utama Muda" <?php if($data[4] == 'Pembina Utama Muda') echo 'selected'; ?>>
                                                        Pembina Utama Muda</option>
                                                    <option value="Pembina Tingkat I" <?php if($data[4] == 'Pembina Tingkat I') echo 'selected'; ?>>
                                                        Pembina Tingkat I</option>
                                                    <option value="Penata Tingkat I" <?php if($data[4] == 'Penata Tingkat I') echo 'selected'; ?>>
                                                        Penata Tingkat I</option>
                                                    <option value="Pembina" <?php if($data[4] == 'Pembina') echo 'selected'; ?>>
                                                        Pembina</option>
                                                    <option value="Penata" <?php if($data[4] == 'Penata') echo 'selected'; ?>>
                                                        Penata</option>
                                                    <option value="Penata Muda Tingkat I" <?php if($data[4] == 'Penata Muda Tingkat I') echo 'selected'; ?>>
                                                        Penata Muda Tingkat I</option>
                                                    <option value="Penata Muda" <?php if($data[4] == 'Penata Muda') echo 'selected'; ?>>
                                                        Penata Muda</option>
                                                    <option value="Pengatur Tingkat I" <?php if($data[4] == 'Pengatur Tingkat I') echo 'selected'; ?>>
                                                        Pengatur Tingkat I</option>
                                                    <option value="Pengatur" <?php if($data[4] == 'Pengatur') echo 'selected'; ?>>
                                                        Pengatur</option>
                                            </select>
									</div>
                                </div>
								<hr>
								<div class="row">
                                    
                                    <div class="form-group col-12 col-md-4">
										<label for="golongan" class="col-form-label">Golongan</label>
											<select name="golongan" required class="form-control">
                                                    <option disabled selected>-- Pilih --</option>
                                                    <option value="IV/a" <?php if($data[5] == 'IV/a') echo 'selected'; ?>>
                                                        IV/a</option>
                                                    <option value="IV/b" <?php if($data[5] == 'IV/b') echo 'selected'; ?>>
                                                        IV/b</option>
                                                    <option value="IV/c" <?php if($data[5] == 'IV/c') echo 'selected'; ?>>
                                                        IV/c</option>
                                                    <option value="IV/d" <?php if($data[5] == 'IV/d') echo 'selected'; ?>>
                                                        IV/d</option>
                                                    <option value="III/a" <?php if($data[5] == 'III/a') echo 'selected'; ?>>
                                                        III/a</option>
                                                    <option value="III/b" <?php if($data[5] == 'III/b') echo 'selected'; ?>>
                                                        III/b</option>
                                                    <option value="III/c" <?php if($data[5] == 'III/c') echo 'selected'; ?>>
                                                        III/c</option>
                                                    <option value="III/d" <?php if($data[5] == 'III/d') echo 'selected'; ?>>
                                                        III/d</option>
                                                    <option value="II/a" <?php if($data[5] == 'II/a') echo 'selected'; ?>>
                                                        II/a</option>
                                                    <option value="II/b" <?php if($data[5] == 'II/b') echo 'selected'; ?>>
                                                        II/b</option>
                                                    <option value="II/c" <?php if($data[5] == 'II/c') echo 'selected'; ?>>
                                                        II/c</option>
                                                    <option value="II/d" <?php if($data[5] == 'II/d') echo 'selected'; ?>>
                                                        II/d</option>
                                            </select>
									</div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="jenis" class="col-form-label">Jenis</label>   
                                        <select name="jenis" required class="form-control">
                                            <option disabled selected>-- Pilih --</option>
                                            <option value="PNS" <?php if($data[7] == 'PNS') echo 'selected'; ?>>PNS</option>
                                            <option value="HONORER" <?php if($data[7] == 'HONORER') echo 'selected'; ?>>HONORER</option>
                                        </select>
                                        
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="gaji" class="col-form-label">Gaji</label>   
                                        <input type="number" name="gaji" value="<?=$data[6]?>" class="form-control" placeholder="Masukan Gaji">   
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