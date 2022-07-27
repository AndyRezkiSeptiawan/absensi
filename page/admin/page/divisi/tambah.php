<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Divisi</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=divisi=prosestambah" method="post">
                                <!-- <input type="hidden" name="idabsen"> -->
                                <div class="row">
									<div class="form-group col-12 col-md-6">
										<label for="id_divisi" class="col-form-label">ID Divisi</label>
										<input type="text" required class="form-control" placeholder="Masukkan ID Divisi" name="id_divisi">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="nama" class="col-form-label">Nama</label>
										<input type="text" required class="form-control" placeholder="Masukkan Nama Divisi" name="nama">
									</div>
								<div>
								<div class="form-group mt-4">
										<button type="submit" class='btn btn-success rounded-2'> 
											Tambah Data
										</button>
										<button type="reset" class='btn btn-warning rounded-2'> 
											Reset
										</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>