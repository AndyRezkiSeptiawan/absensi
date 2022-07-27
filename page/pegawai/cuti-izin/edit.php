<?php
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM cuti 
    INNER JOIN data_pegawai ON cuti.id_pegawai = data_pegawai.id_pegawai
    where id_cuti='$id'");
    $data = mysqli_fetch_array($sql);
?>
<div class="container-fluid">

	<div class="container pt-2">
		<div class="row justify-content-lg-center">
			<div class="col-lg-10">
				<div class="card border-0 shadow-sm">
					<div class="d-flex justify-content-between py-2 px-4 border-bottom">
						<h1 class="h3 mb-0 text-gray-800">Edit Data Cuti Atau Izin</h1>
						<div class="btn-kmbali">
						<a href="?page=cuti" class="btn btn-success">Kembali</a>
						</div>
					</div>
			
					<div class="card-body d-grid p-5">
						<form action="?page=cuti-prosesedit" method="post"
							enctype="multipart/form-data">
                            <input type="hidden" name="id_cuti" value="<?=$data['id_cuti']?>">
							<input type="hidden" name="id_pegawai" value="<?=$data['id_pegawai']?>">
							<!-- <input type="hidden" name="idabsen"> -->
							<div class="row">
								<div class="form-group col-12 col-md-12">
									<label for="nama" class="col-form-label">nama</label>
									<input type="text" value="<?=$data['nama']?>" name="nama"
										class="form-control" readonly="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12 col-md-4">
									<label for="jenis" class="col-form-label">Jenis Cuti</label>
										<select name="jenis" required class="form-control">
											<option value="#">pilih</option>
											<option value="Cuti Tahunan" <?php if($data['2'] == 'Cuti Tahunan') echo 'selected';?>>Cuti Tahunan</opion>
											<option value="Cuti Sakit" <?php if($data['2'] == 'Cuti Sakit') echo 'selected';?>>Cuti Sakit</option>
											<option value="Cuti Alasan Penting" <?php if($data['2'] == 'Cuti Alasan Penting') echo 'selected';?>>Cuti Alasan Penting</option>
											<option value="Cuti Melahirkan" <?php if($data['2'] == 'Cuti Melahirkan') echo 'selected';?>>Cuti Melahirkan</option>
											<option value="Cuti Besar" <?php if($data['2'] == 'Cuti Besar') echo 'selected';?>>Cuti Besar</option>
											<option value="Cuti Diluar Tanggungan Negara" <?php if($data['2'] == 'Cuti Diluar Tanggungan Negara') echo 'selected';?>>Cuti Diluar Tanggungan Negara</option>
										</select>
								</div>
								<div class="form-group col-12 col-md-4">
									<label for="awal" class="col-form-label">Mulai Cuti</label>
									<input type="date" name="awal" value="<?=$data['mulai']?>" class="form-control">
								</div>
								<div class="form-group col-12 col-md-4">
									<label for="akhir" class="col-form-label">Akhir Cuti</label>
									<input type="date" name="akhir" value="<?=$data['akhir']?>" class="form-control">
								</div>
							</div>
							<div class="row">
                                <div class="bukti-lama form-group col-md-8">
                                    <label for="file" class="col-form-label">File</label>
                                    <a class="form-control" name="file" href="../../assets/bukti/<?=$data['bukti']?>" download><?=$data['bukti']?></a>
                                </div>
								<div class="form-group col-12 col-md-4">
									<label for="bukti" class="col-form-label">Bukti</label>
									<div class="col-sm-12">
										<input type="file" class="form-control-file" name="bukti">
									</div>
								</div>
							</div>
							<div class="form-group col-12 col-md-12">
								<label for="ket" class="col-form-label">Keterangan</label>
								<textarea id="ket" name="ket" id="" cols="30" rows="10">
                                    <?=$data['keterangan']?>
                                </textarea>
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