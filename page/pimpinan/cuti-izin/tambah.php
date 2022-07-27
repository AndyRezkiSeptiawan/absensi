<?php
		$nik = $_SESSION['nik'];
		$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai where nik='$nik'");
		$data = mysqli_fetch_assoc($query)			
	?>

<div class="container-fluid">
	<div class="container pt-2" style="margin-bottom:100px">
		<div class="row justify-content-lg-center">
			<div class="col-lg-10">
				<div class="card border-0 shadow-sm">
					<div class="d-flex justify-content-between py-2 px-4 border-bottom">
						<h1 class="h3 mb-0 text-gray-800">Tambah Data Cuti Atau Izin</h1>
					</div>
					<div class="card-body d-grid p-5">
						<form action="?page=cuti-prosesadd" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pegawai" value="<?=$data['id_pegawai']?>">
							<!-- <input type="hidden" name="idabsen"> -->
							<div class="row">
								<div class="form-group col-12 col-md-12">
									<label for="nama" class="col-form-label">nama</label>
									<input type="text" value="<?=$data['nama']?>" name="nama" class="form-control"
										readonly="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12 col-md-4">
									<label for="jenis" class="col-form-label">Jenis Cuti</label>
									<div class="col-sm-12">
										<select name="jenis" required class="form-control">
											<option value="#">pilih</option>
											<option value="Cuti Tahunan">Cuti Tahunan</opion>
											<option value="Cuti Sakit">Cuti Sakit</option>
											<option value="Cuti Alasan Penting">Cuti Alasan Penting</option>
											<option value="Cuti Melahirkan">Cuti Melahirkan</option>
											<option value="Cuti Besar">Cuti Besar</option>
											<option value="Cuti Diluar Tanggungan Negara">Cuti Diluar Tanggungan Negara
											</option>
										</select>
									</div>
								</div>
								<div class="form-group col-12 col-md-4">
									<label for="awal" class="col-form-label">Mulai Cuti</label>
									<input type="date" name="awal" class="form-control">
								</div>
								<div class="form-group col-12 col-md-4">
									<label for="akhir" class="col-form-label">Akhir Cuti</label>
									<input type="date" name="akhir" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12 col-md-4">
									<label for="bukti" class="col-form-label">Bukti</label>
									<div class="col-sm-12">
										<input type="file" class="form-control-file" name="bukti">
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