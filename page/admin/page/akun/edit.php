<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sqldata = mysqli_query($koneksi,"SELECT * FROM users
        where id_user='$id'");
        $data = mysqli_fetch_array($sqldata);
        $ps = trim($data['password']);
    }else{
        echo"
        <script>
         alert('Tidak Ada Data');
         history.go(-1);
        </script>
        ";
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun Pegawai</h1>
    </div>

    <div class="container pt-2">
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="card border-0 shadow-sm">
						<div class="card-body d-grid p-5">
							<form action="?page=akun=prosesedit" method="post">
                                <input type="hidden" name="id_user" value=<?=$data['id_user']?>>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
										<label for="nik" class="col-form-label">NIK</label>
										<input type="text" readonly="" required class="form-control" value="<?=$data['nik']?>" placeholder="Masukkan NIK" name="nik">
									</div>
									<div class="form-group col-12 col-md-6">
										<label for="nama" class="col-form-label">Nama</label>
										<input type="text" required class="form-control" value="<?=$data['nama']?>" placeholder="Masukkan nama" name="nama">
									</div>
								</div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
										<label for="telpon" class="col-form-label">Telpon</label>
										<input type="text" required class="form-control" value="<?=$data['telp']?>" placeholder="Masukkan Telpon" name="telpon">
									</div>
                                    <div class="form-group col-12 col-md-6">
										<label for="email" class="col-form-label">Email</label>
										<input type="email" required class="form-control" value="<?=$data['email']?>" placeholder="Masukkan Email" name="email">
									</div>
                               
                                </div>
								<hr>
								<div class="row">
                                    <div class="form-group col-12 col-md-4">
										<label for="username" class="col-form-label">Username</label>
										<input type="text" required class="form-control" value="<?=$data['username']?>" placeholder="Masukkan username" name="username">
									</div>
									<div class="form-group col-12 col-md-4">
										<label for="password" class="col-form-label">Password</label>
										<input type="password" required class="form-control" value="<?=$data['password']?>" placeholder="Masukkan Password" name="password">
									</div>
                                    <div class="form-group col-12 col-md-4">
										<label for="level" class="col-form-label">level</label>
										<select name="level" class="form-control">
                                            <option disabled selected>-- Pilih Level --</option>
                                            <option value="Admin" <?php if($data['level'] == 'Admin') echo 'selected' ?>>Admin</option>
                                            <option value="Pegawai" <?php if($data['level'] == 'Pegawai') echo 'selected' ?>>Pegawai</option>
                                        </select>
									</div>
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