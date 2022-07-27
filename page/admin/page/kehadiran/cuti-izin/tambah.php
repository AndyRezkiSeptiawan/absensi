<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Cuti Atau Izin Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=kehadiran/cuti-izin=prosestambah" method="post" enctype="multipart/form-data">
								<input type="hidden" name="lama" id="lama" class="form-control">
                                <div class="row">
									<div class="form-group col-12 col-md-12">
										<label for="nama" class="col-form-label">Nama</label>
											<select name="id_pegawai"  class="form-control" required>
												<option value="#">pilih nama</option>
												<?php
												$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai");
												while ($row = mysqli_fetch_array($query)){
													echo "<option value=\"".$row['id_pegawai']."\">(".$row['nama'].") ID : ".$row['id_pegawai']." </option>";
												};
												?>
											</select>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 col-md-4">
										<label for="jenis" class="col-form-label">Jenis Cuti</label>

										<select name="jenis" required class="form-control">
											<option value="#">pilih</option>
											<option value="Cuti Tahunan">Cuti Tahunan</opion>
											<option value="Cuti Sakit">Cuti Sakit</option>
											<option value="Cuti Alasan Penting">Cuti Alasan Penting</option>
											<option value="Cuti Melahirkan">Cuti Melahirkan</option>
											<option value="Cuti Besar">Cuti Besar</option>
											<option value="Cuti Diluar Tanggungan Negara">Cuti Diluar Tanggungan Negara</option>
										</select>
	
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="awal" class="col-form-label">Mulai Cuti</label>
										<input type="date" name="awal" id="awal" class="form-control" onchange="cl()" required>
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="akhir" class="col-form-label">Akhir Cuti</label>
										<input type="date" name="akhir" id="akhir" class="form-control" onchange="cl()" required>
									</div>
								</div>
								<div class="row">
								    <div class="form-group col-12 col-md-4">
										<label for="bukti" class="col-form-label">Bukti</label>
										<div class="col-sm-12">
											<input type="file" class="form-control-file" name="bukti" required>
										</div>
									</div>
									
								</div>
								<div class="form-group col-12 col-md-12">
										<label for="ket" class="col-form-label">Keterangan</label>
										<textarea id="ket" name="ket" id="" cols="30" rows="10"></textarea>
								</div>
								<hr>

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