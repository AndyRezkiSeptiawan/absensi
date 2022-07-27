<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=pegawai/data-pegawai=prosestambah" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
                                <div class="row">
									<div class="form-group col-12 col-md-6">
										<label for="idpegawai" class="col-form-label">ID Pegawai</label>
										<input type="text" required class="form-control" placeholder="Masukkan ID" name="idpegawai">
									</div>
                                    <div class="form-group col-12 col-md-6">
										<label for="nik" class="col-form-label">NIK</label>
										<input type="text" required class="form-control" placeholder="Masukkan NIK" name="nik">
									</div>
									
								</div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-4">
										<label for="nama" class="col-form-label">Nama</label>
										<input type="text" required class="form-control" placeholder="Masukkan Nama" name="nama">
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="namadivisi" class="col-form-label">Nama Bidang</label>
											<select name="namadivisi" required class="form-control">
												<option value="#">-- Pilih --</option>
												<?php
												$query = mysqli_query($koneksi, "SELECT * FROM bidang");
												while ($row = mysqli_fetch_array($query)){
													echo "<option value=\"".$row['id_bidang']."\">".$row['nama_bidang']."</option>";
												};
												?>
											</select>
									</div>
                                    <div class="form-group col-12 col-md-4">
                                            <label for="pangkat" class="col-form-label">Pangkat</label>
											<select name="pangkat" id="pangkat" class="form-control" onchange="pang()">
												<option value="#">-- Pilih --</option>
												<?php
												$query = mysqli_query($koneksi, "SELECT * FROM pangkat");
												while ($row = mysqli_fetch_array($query)){
                                                    ?>
                                                <option id="pangkat" value="<?=$row['id_pangkat']?>"><?=$row['pangkat']?></option>
                                                <?php }?>
											</select>
									</div>
                                </div>
								<hr>
								<div class="row">
                                    
                                    <div class="form-group col-12 col-md-4">
										<label for="golongan" class="col-form-label">Golongan</label>
										<input type="text" name="golongan" id="golongan" class="form-control" readonly="">
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="gaji" class="col-form-label">Gaji</label>
										<input type="text" name="gaji" id="gaji" class="form-control" readonly="">
									</div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="jenis" class="col-form-label">Jenis</label>   
                                        <select name="jenis" required class="form-control">
                                            <option disabled selected>-- Pilih --</option>
                                            <option value="PNS">PNS</option>
                                            <option value="HONORER">HONORER</option>
                                        </select>
                                        
                                    </div>
								</div>
                             
								<div class="form-group mt-4 text-center">
									<div class="col-sm-11">
										<button type="submit" class='btn btn-success rounded-2'> 
											Tambah Data
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