<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Absen Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=kehadiran/absensi=prosestambah" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
                                <div class="row">
									<div class="form-group col-12 col-md-12">
										<label for="nama" class="col-form-label">nama</label>
										<div class="col-sm-12">
											<select name="id_pegawai" required class="form-control">
												<option value="#">pilih nama</option>
												<?php
												$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai");
												while ($row = mysqli_fetch_array($query)){
													echo "<option value=\"".$row['id_pegawai']."\">".$row['nama']."</option>";
												};
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="form-group col-6 col-md-6">
										<label for="idabsen" class="col-form-label">No Absen</label>
										<div class="col-sm-12">
											<input type="number" min="1" max="99" required class="form-control" placeholder="Masukkan no absen" name="idabsen">
										</div>
									</div>
									<div class="form-group col-6 col-md-6">
										<label for="tgl" class="col-form-label">Tgl</label>
										<div class="col-sm-12">
											<input type="date" required class="form-control" placeholder="Masukkan Tgl" name="tgl">
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="form-group col-12 col-md-4">
										<label for="waktumasuk" class="col-form-label">Waktu Datang</label>
										<div class="col-sm-12">
											<input type="time" required class="form-control" name="waktumasuk">
										</div>
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="waktupulang" class="col-form-label">Waktu Pulang</label>
										<div class="col-sm-12">
											<input type="time" required class="form-control" name="waktupulang">
										</div>
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="keterangan" class="col-form-label">Keterangan</label>
											<select name="keterangan" required class="form-control">
												<option value="#">pilih</option>
												<option value="Masuk">Masuk</opion>
												<option value="Keluar">Keluar</option>
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