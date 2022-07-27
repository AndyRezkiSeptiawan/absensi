<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $sqldata = mysqli_query($koneksi,"SELECT * FROM pangkat
        where id_pangkat='$id'");
        $row = mysqli_fetch_array($sqldata);
    }else{
        echo"
        <script>
         alert('Tidak Ada Data');
         history.go(-1);
        </script>
        ";
    }

?>

<div class="container pt-2">
	<div class="row justify-content-lg-center">
		<div class="col-lg-10">
			<div class="card border-0 shadow-sm">
				<div class="card-body d-grid p-5">
					<form action="?page=pangkat=prosesedit" method="post">
						<input type="hidden" name="id_pangkat" value="<?=$row['id_pangkat']?>">
						<div class="form-group">
							<label for="pangkat" class="col-form-label">Pangkat</label>
							<select name="pangkat" class="form-control" id="pangkat" required>
								<option disabled selected>-- Pilih --</option>
								<option value="Pembina Utama Muda"
									<?php if($row['pangkat'] == 'Pembina Utama Muda') echo 'selected'; ?>> Pembina Utama
									Muda</option> <option value="Pembina Tingkat I"
									<?php if($row['pangkat'] == 'Pembina Tingkat I') echo 'selected'; ?>>
									Pembina Tingkat I</option>
								<option value="Penata Tingkat I"
									<?php if($row['pangkat'] == 'Penata Tingkat I') echo 'selected'; ?>>
									Penata Tingkat I</option>
								<option value="Pembina" <?php if($row['pangkat'] == 'Pembina') echo 'selected'; ?>>
									Pembina</option>
								<option value="Penata" <?php if($row['pangkat'] == 'Penata') echo 'selected'; ?>>
									Penata</option>
								<option value="Penata Muda Tingkat I"
									<?php if($row['pangkat'] == 'Penata Muda Tingkat I') echo 'selected'; ?>>
									Penata Muda Tingkat I</option>
								<option value="Penata Muda"
									<?php if($row['pangkat'] == 'Penata Muda') echo 'selected'; ?>>
									Penata Muda</option>
								<option value="Pengatur Tingkat I"
									<?php if($row['pangkat'] == 'Pengatur Tingkat I') echo 'selected'; ?>>
									Pengatur Tingkat I</option>
								<option value="Pengatur" <?php if($row['pangkat'] == 'Pengatur') echo 'selected'; ?>>
									Pengatur</option>
							</select>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label for="golongan" class="col-form-label">Golongan</label>
								<select name="golongan" required class="form-control">
									<option disabled selected>-- Pilih --</option>
									<option value="IV/a" <?php if($row['golongan'] == 'IV/a') echo 'selected'; ?>>
										IV/a</option>
									<option value="IV/b" <?php if($row['golongan'] == 'IV/b') echo 'selected'; ?>>
										IV/b</option>
									<option value="IV/c" <?php if($row['golongan'] == 'IV/c') echo 'selected'; ?>>
										IV/c</option>
									<option value="IV/d" <?php if($row['golongan'] == 'IV/d') echo 'selected'; ?>>
										IV/d</option>
									<option value="III/a" <?php if($row['golongan'] == 'III/a') echo 'selected'; ?>>
										III/a</option>
									<option value="III/b" <?php if($row['golongan'] == 'III/b') echo 'selected'; ?>>
										III/b</option>
									<option value="III/c" <?php if($row['golongan'] == 'III/c') echo 'selected'; ?>>
										III/c</option>
									<option value="III/d" <?php if($row['golongan'] == 'III/d') echo 'selected'; ?>>
										III/d</option>
									<option value="II/a" <?php if($row['golongan'] == 'II/a') echo 'selected'; ?>>
										II/a</option>
									<option value="II/b" <?php if($row['golongan'] == 'II/b') echo 'selected'; ?>>
										II/b</option>
									<option value="II/c" <?php if($row['golongan'] == 'II/c') echo 'selected'; ?>>
										II/c</option>
									<option value="II/d" <?php if($row['golongan'] == 'II/d') echo 'selected'; ?>>
										II/d</option>
								</select>
							</div>
							<div class="form-group col-12 col-md-6">
								<label for="gaji" class="col-form-label">Gaji</label>
								<input type="number" value="<?=$row['gaji']?>" class="form-control" name="gaji"
									placeholder="............">
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