<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pangkat</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=pangkat=prosestambah" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
									<div class="form-group">
										<label for="pangkat" class="col-form-label">Nama Pangkat</label>
										<select name="pangkat" class="form-control" id="pangkat" required>
											<option disabled selected>-- Pilih --</option>
											<option value="Pembina Utama Muda">
												Pembina Utama Muda</option>
											<option value="Pembina Tingkat I">
												Pembina Tingkat I</option>
											<option value="Penata Tingkat I">
												Penata Tingkat I</option>
											<option value="Pembina">
												Pembina</option>
											<option value="Penata">
												Penata</option>
											<option value="Penata Muda Tingkat I">
												Penata Muda Tingkat I</option>
											<option value="Penata Muda">
												Penata Muda</option>
											<option value="Pengatur Tingkat I">
												Pengatur Tingkat I</option>
											<option value="Pengatur">
												Pengatur</option>
										</select>
									</div>
								<div class="row">								
									<div class="form-group col-12 col-md-6">
										<label for="golongan" class="col-form-label">Golongan</label>
										<select name="golongan" required class="form-control">
											<option disabled selected>-- Pilih --</option>
											<option value="IV/a">
												IV/a</option>
											<option value="IV/b">
												IV/b</option>
											<option value="IV/c">
												IV/c</option>
											<option value="IV/d">
												IV/d</option>
											<option value="III/a">
												III/a</option>
											<option value="III/b">
												III/b</option>
											<option value="III/c">
												III/c</option>
											<option value="III/d">
												III/d</option>
											<option value="II/a">
												II/a</option>
											<option value="II/b">
												II/b</option>
											<option value="II/c">
												II/c</option>
											<option value="II/d">
												II/d</option>
										</select>
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="gaji" class="col-form-label">Gaji</label>
										<input type="number" class="form-control" name="gaji" placeholder="............">
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