<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Gaji Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=gaji-pegawai=prosestambah" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
                                <div class="row">
									<div class="form-group col-12 col-md-4">
										<label for="id_pegawai" class="col-form-label">Nama Pegawai</label>
											<select name="id_pegawai" id="id_pegawai" required class="form-control" onchange="pg()">
												<option value="#">pilih nama pegawai</option>
												<?php
												$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai");
												while ($row = mysqli_fetch_array($query)){
													echo "<option id='id_pegawai' value=\"".$row['id_pegawai']."\">".$row['id_pegawai']." (".$row['nama'].")</option>";
												};
												?>
											</select>
									</div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="pangkat" class="col-form-label">Pangkat</label>   
                                        <input type="text" id="pangkat" name="pangkat" class="form-control" readonly="">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="gaji" class="col-form-label">Gaji Pokok</label>   
                                        <input type="number" id="gaji" name="gaji" class="form-control" readonly="">   
                                    </div>
                                </div>
								<hr>
                                <div class="title text-center mb-3 bg-primary p-2 text-white" style="text-transform:uppercase;font-weight:bold">Tunjangan</div>
								<div class="row">
                                    
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_istri" class="col-form-label">Tunjangan Istri/Suami</label>   
                                        <input type="number" name="t_istri" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_anak" class="col-form-label">Tunjangan Anak</label>   
                                        <input type="number" name="t_anak" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_umum" class="col-form-label">Tunjangan Umum</label>   
                                        <input type="number" name="t_umum" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_struktur" class="col-form-label">Tunjangan Struktur</label>   
                                        <input type="number" name="t_struktur" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_fungsi" class="col-form-label">Tunjangan Fungsi</label>   
                                        <input type="number" name="t_fungsi" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_lain" class="col-form-label">Tunjangan Lain</label>   
                                        <input type="number" name="t_lain" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_bulat" class="col-form-label">Tunjangan Bulat</label>   
                                        <input type="number" name="t_bulat" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_beras" class="col-form-label">Tunjangan Beras</label>   
                                        <input type="number" name="t_beras" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="t_pajak" class="col-form-label">Tunjangan Pajak</label>   
                                        <input type="number" name="t_pajak" class="form-control" placeholder="......">   
                                    </div>
                                    
								</div>
                                <hr>
                                <div class="title text-center mb-3 bg-danger p-2 text-white" style="text-transform:uppercase;font-weight:bold">Potongan</div>
								<div class="row">
                                    
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="pot_beras" class="col-form-label">Potongan Beras</label>   
                                        <input type="number" name="pot_beras" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="iwp" class="col-form-label">IWP</label>   
                                        <input type="number" name="iwp" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="pot_pph" class="col-form-label">Potongan Pph</label>   
                                        <input type="number" name="pot_pph" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="sewa" class="col-form-label">Sewa Rumah</label>   
                                        <input type="number" name="sewa" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="tunggakan" class="col-form-label">Tunggakan</label>   
                                        <input type="number" name="tunggakan" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="utang" class="col-form-label">Utang</label>   
                                        <input type="number" name="utang" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="pot_lain" class="col-form-label">Potongan Lain</label>   
                                        <input type="number" name="pot_lain" class="form-control" placeholder="......">   
                                    </div>
                                    <div class="form-group col-12 col-md-4"> 
                                        <label for="taperum" class="col-form-label">Taperum</label>   
                                        <input type="number" name="taperum" class="form-control" placeholder="......">   
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