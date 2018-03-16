<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id = $_POST['id'];
	$nm_p = $_POST['nama_pasar'];
	$lokasi = $_POST['lokasi'];
	$gambar = $_POST['gambar'];

// Form Tambah Data pasar
if($kanal == "pasar" && $aksi == "tambah"){
	
?>

<form action="index.php?kanal=pasar&aksi=insert" method="post" class="form-group" enctype="multipart/form-data">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data pasar</caption>
		<tbody>
			<tr>
				<td>
					<input type="text" name="nama_pasar" placeholder="Nama pasar" class="form-control">
				</td>
			</tr>


			<tr>
				<td>
					<select name="lokasi" class="form-control">
						<option selected>Lokasi Terdekat</option>
						
						<?php
						$query = "SELECT * FROM lokasi ORDER BY kecamatan";
						$stmt = $kon->prepare($query);
						$stmt->execute();			
						
						while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<option value="<?=$data['id_lokasi']?>"><?=$data['kelurahan']?> | <?=$data['kecamatan']?></option>
						
						<?php
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td>
					<input type="file" name="gambar" class="form-control">
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
// Form Edit Data pasar
	}elseif ($kanal == "pasar" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM pasar WHERE id_pasar = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=pasar&aksi=update" method="post" accept-charset="utf-8" class="form-group" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$data['id_pasar']?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data pasar</caption>
		<tbody>
			<tr>
				<td>
					<input type="text" name="nama_pasar" value="<?=$data['nama_pasar']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<select name="lokasi" class="form-control">
						<option selected>Lokasi Terdekat</option>
						
						<?php
						$sql = "SELECT * FROM lokasi ORDER BY kecamatan";
						$lks = $kon->prepare($sql);
						$lks->execute();
						while ($go=$lks->fetch(PDO::FETCH_ASSOC)) {
							
							if($data['id_lokasi'] == $go['id_lokasi']){
						?>

								<option value="<?=$go['id_lokasi']?>" selected><?=$go['kelurahan']?> | <?=$go['kecamatan']?></option>

						<?php	
							}else{
						?>		

								<option value="<?=$go['id_lokasi']?>"><?=$go['kelurahan']?> | <?=$go['kecamatan']?></option>
								
						<?php
							}	
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td>
					<img src="images/<?=$data['gambar']?>" alt="Gambar Pasar" width='75'>
				</td>
			</tr>

			<tr>
				<td>
					<input type="file" name="gambar" class="form-control">
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
// Insert Data pasar
}elseif ($kanal == "pasar" && $aksi == "insert"){

	$nama_gambar = $_FILES['gambar']['name'];
	$tmp_gambar = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($tmp_gambar,"images/$nama_gambar");
	
	$query = "INSERT INTO pasar(nama_pasar,id_lokasi,gambar) VALUES('$nm_p', '$lokasi', '$nama_gambar')";
	$stmt = $kon->prepare($query);
	$stmt->execute();
	header("location:index.php?kanal=pasar");

// Update Data pasar
}elseif ($kanal == "pasar" && $aksi == "update"){

	$query = "UPDATE pasar SET nama_pasar='$nm_p',id_lokasi='$lokasi',gambar='$gambar WHERE id_pasar='$id'";
	$stmt = $kon->prepare("$query");
	$stmt->execute();
	header("location:index.php?kanal=pasar");

// Delete Data pasar
}elseif ($kanal == "pasar" && $aksi == "hapus"){
	$id = $_GET['id'];
	$query = "DELETE FROM pasar WHERE id_pasar = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=pasar");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
?>