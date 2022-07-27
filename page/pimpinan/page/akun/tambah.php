<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Akun Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=akun=prosestambah" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
										<label for="nik" class="col-form-label">NIK</label>
										<input type="text" required class="form-control" placeholder="Masukkan NIK" name="nik">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="nama" class="col-form-label">Nama</label>
										<input type="text" required class="form-control" placeholder="Masukkan nama" name="nama">
									</div>
								</div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
										<label for="telpon" class="col-form-label">Telpon</label>
										<input type="text" required class="form-control" placeholder="Masukkan Telpon" name="telpon">
									</div>
                                    <div class="form-group col-12 col-md-6">
										<label for="email" class="col-form-label">Email</label>
										<input type="email" required class="form-control" placeholder="Masukkan Email" name="email">
									</div>
                               
                                </div>
								<hr>
								<div class="row">
                                    <div class="form-group col-12 col-md-4">
										<label for="username" class="col-form-label">Username</label>
										<input type="text" required class="form-control" placeholder="Masukkan username" name="username">
									</div>
                                    <div class="form-group col-12 col-md-4">
										<label for="password" class="col-form-label">Password</label>
										<input type="password" required class="form-control" placeholder="Masukkan Password" name="password">
									</div>
                                    <div class="form-group col-12 col-md-4">
										<label for="level" class="col-form-label">level</label>
										<select name="level" class="form-control">
                                            <option disabled selected>-- Pilih Level --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pegawai">Pegawai</option>
											<option value="Pimpinan">Pimpinan</option>
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