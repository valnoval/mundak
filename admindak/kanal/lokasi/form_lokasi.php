<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$kdl = $_POST['kdl'];
	$kelurahan = $_POST['kelurahan'];
	$kecamatan = $_POST['kecamatan'];
	$id_acak = AcakId(5);
	/**/


// Form Tambah Data lokasi
if($kanal == "lokasi" && $aksi == "tambah"){
?>

<form action="index.php?kanal=lokasi&aksi=insert" method="post" accept-charset="utf-8" class="form-group">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data Lokasi</caption>
		<tbody>
			<tr>
				<td>
					<input type="text" name="kdl" placeholder="Kode Lokasi" value="<?=$id_acak?>" class="form-control" readonly>
				</td>
			</tr>


			<tr>
				<td>
					<input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control">
				</td>
			</tr>


			<tr>
				<td>
					<input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control">
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
// Form Edit Data lokasi
	}elseif ($kanal == "lokasi" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM lokasi WHERE id_lokasi = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=lokasi&aksi=update" method="post" accept-charset="utf-8" class="form-group">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data lokasi</caption>
		<tbody>
			<tr>
				<td>
					<input type="text" name="kdl" value="<?=$data['id_lokasi']?>" class="form-control" readonly>
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="kelurahan" value="<?=$data['kelurahan']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="kecamatan" value="<?=$data['kecamatan']?>" class="form-control">
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
// Insert Data lokasi
}elseif ($kanal == "lokasi" && $aksi == "insert"){

	$query = "INSERT INTO lokasi(id_lokasi,kelurahan,kecamatan) VALUES(:kdl, :kelurahan, :kecamatan)";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':kdl',$kdl);
	$stmt->bindParam(':kelurahan',$kelurahan);
	$stmt->bindParam(':kecamatan',$kecamatan);
	$stmt->execute();
	header("location:index.php?kanal=lokasi");

// Update Data lokasi
}elseif ($kanal == "lokasi" && $aksi == "update"){

	$query = "UPDATE lokasi SET kelurahan=:kelurahan,kecamatan=:kecamatan WHERE id_lokasi=:kdl";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':kdl',$kdl);
	$stmt->bindparam(':kelurahan',$kelurahan);
	$stmt->bindparam(':kecamatan',$kecamatan);
	$stmt->execute();
	header("location:index.php?kanal=lokasi");

// Delete Data lokasi
}elseif ($kanal == "lokasi" && $aksi == "hapus"){
	$id = $_GET['id'];
	$query = "DELETE FROM lokasi WHERE id_lokasi = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=lokasi");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
?>