<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id_ht = $_POST['id_ht'];
	$komoditas = $_POST['komoditas'];
	$lokasi = $_POST['lokasi'];
	$angka = $_POST['angka'];
	$waktu = $_POST['waktu'];

// Form Tambah Data harga tani
if($kanal == "hatan" && $aksi == "tambah"){
	
?>

<form action="index.php?kanal=hatan&aksi=insert" method="post" class="form-group">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data Harga tani</caption>
		<tbody>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i> </span>
					<select name="komoditas" class="form-control">
						<option selected>Komoditas</option>
						
						<?php
						$query = "SELECT id_komoditas,nama_komoditas FROM komoditas";
						$stmt = $kon->prepare($query);
						$stmt->execute();			
						
						while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<option value="<?=$data['id_komoditas']?>"><?=$data['nama_komoditas']?></option>
						
						<?php
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i> </span>
					<select name="lokasi" class="form-control">
						<option selected>Lokasi</option>
						
						<?php
						$query = "SELECT * FROM lokasi";
						$stmt = $kon->prepare($query);
						$stmt->execute();			
						
						while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<option value="<?=$data['id_lokasi']?>"><?=$data['kelurahan']?>-<?=$data['kecamatan']?></option>
						
						<?php
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon">Rp.</span>
					<input type="text" name="angka" placeholder="Harga" class="span2 form-control">
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
					<input type="date" name="waktu" placeholder="" class="form-control">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Simpan" class="btn btn-danger">
				</td>
			</tr>

		</tbody>
	</table>
</form>

<?php
// Form Edit Data harga tani
	}elseif ($kanal == "hatan" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM harga_tani WHERE id_harga_tani = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=hatan&aksi=update" method="post" class="form-group">
	<input type="hidden" name="id_ht" value="<?=$data['id_harga_tani']?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data Harga Tani</caption>
		<tbody>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i> </span>
					<select name="komoditas" class="form-control">
						<option selected>Komoditas</option>
						
						<?php
						$sql = "SELECT id_komoditas,nama_komoditas FROM komoditas";
						$lks = $kon->prepare($sql);
						$lks->execute();
						while ($go=$lks->fetch(PDO::FETCH_ASSOC)) {
							
							if($data['id_komoditas'] == $go['id_komoditas']){
						?>

								<option value="<?=$go['id_komoditas']?>" selected><?=$go['nama_komoditas']?></option>

						<?php	
							}else{
						?>		

								<option value="<?=$go['id_komoditas']?>"><?=$go['nama_komoditas']?></option>
								
						<?php
							}	
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i> </span>
					<select name="lokasi" class="form-control">
						<option selected>Lokasi</option>
						
						<?php
						$sql = "SELECT * FROM lokasi";
						$lks = $kon->prepare($sql);
						$lks->execute();
						while ($go=$lks->fetch(PDO::FETCH_ASSOC)) {
							
							if($data['id_lokasi'] == $go['id_lokasi']){
						?>

								<option value="<?=$go['id_lokasi']?>" selected><?=$go['kelurahan']?>-<?=$go['kecamatan']?></option>

						<?php	
							}else{
						?>		

								<option value="<?=$go['id_lokasi']?>"><?=$go['kelurahan']?>-<?=$go['kecamatan']?></option>
								
						<?php
							}	
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon">Rp.</span>
					<input type="text" name="angka" value="<?=$data['angka']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
					<input type="data" name="waktu" value="<?=$data['waktu']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="submit" value="Update" class="btn btn-danger">
				</td>
			</tr>

		</tbody>
	</table>
</form>

<?php	
// Insert Data harga tani
}elseif ($kanal == "hatan" && $aksi == "insert"){

	$query = "INSERT INTO harga_tani(id_komoditas,id_lokasi,angka,waktu) VALUES(:komoditas,:lokasi,:angka,:waktu)";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':komoditas',$komoditas);
	$stmt->bindparam(':lokasi',$lokasi);
	$stmt->bindparam(':angka',$angka);
	$stmt->bindparam(':waktu',$waktu);
	$stmt->execute();
	header("location:index.php?kanal=hatan");

// Update Data harga tani
}elseif ($kanal == "hatan" && $aksi == "update"){

	$query = "UPDATE harga_tani SET id_komoditas=:komoditas,id_lokasi=:lokasi,angka=:angka,waktu=:waktu WHERE id_harga_tani=:id_ht";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':komoditas',$komoditas);
	$stmt->bindparam(':lokasi',$lokasi);
	$stmt->bindparam(':angka',$angka);
	$stmt->bindparam(':waktu',$waktu);
	$stmt->bindparam(':id_ht',$id_ht);
	$stmt->execute();
	header("location:index.php?kanal=hatan");

// Delete Data harga tani
}elseif ($kanal == "hatan" && $aksi == "hapus"){
	$id = $_GET['id'];
	$query = "DELETE FROM harga_tani WHERE id_harga_tani = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=hatan");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
?>