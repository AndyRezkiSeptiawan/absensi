<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kenaikan Pangkat Pegawai</h1>
    </div>

    <div class="container pt-2">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-grid p-5">
                        <form action="?page=kenaikan-pangkat=prosestambah" method="post">
                           
                            <div class="row">
                                <div class="form-group col-12 col-md-12">
                                    <label for="nama" class="col-form-label">nama</label>
                                        <select name="id_pegawai" id="id_pegawai" class="form-control" onchange="kp()">
                                            <option value="#">-- Pilih --</option>
                                            <?php
												$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai
                                                INNER JOIN pangkat ON data_pegawai.id_pangkat = pangkat.id_pangkat");
												while ($row = mysqli_fetch_array($query)){
													echo "<option id='id_pegawai' value=\"".$row['id_pegawai']."\">".$row['nama']." || ID :( ".$row['id_pegawai'].")
                                                    </option>";
												};
												?>
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="form-group col-12 col-md-6">
										<label for="pangkat" class="col-form-label">Pangkat</label>
										<input type="text" name="pangkat" id="pangkat" class="form-control" readonly="">
									</div>
                                    <div class="form-group col-12 col-md-6">
										<label for="golongan" class="col-form-label">Golongan</label>
										<input type="text" name="golongan" id="golongan" class="form-control" readonly="">
									</div>
                            </div>
                            <div class="row">

                                <div class="form-group col-12 col-md-6">
                                    <label for="pangkatb" class="col-form-label">Pangkat Baru</label>
                                    <select name="pangkatb" id="pangkatb" class="form-control">
                                            <option value="#">-- Pilih --</option>
                                            <?php
												$query = mysqli_query($koneksi, "SELECT * FROM pangkat
                                                ");
												while ($row = mysqli_fetch_array($query)){
													echo "<option id='pangkat' value=\"".$row['id_pangkat']."\">".$row['pangkat']." ( ".$row['golongan'].")
                                                    </option>";
												};
												?>
                                        </select>
                                </div>
                                
                                <div class="form-group col-12 col-md-6">
                                    <label for="wktuprbhn" class="col-form-label">Waktu Perubahan</label>
                                    <div class="col-sm-12">
                                        <input type="date" required class="form-control" name="wktuprbhn">
                                    </div>
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