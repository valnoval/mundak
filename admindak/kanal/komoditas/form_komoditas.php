<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id_k = $_POST['id'];
	$nm_k = $_POST['nama_kom'];
	$jns = $_POST['jenis'];
	$ket = $_POST['ket'];
	/**/


// Form Tambah Data Komoditas
if($kanal == "komoditas" && $aksi == "tambah"){
?>

<form action="index.php?kanal=komoditas&aksi=insert" method="post" class="form-group" enctype="multipart/form-data">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data Komoditas</caption>
		<tbody>
			<tr>
				<td>
					<input type="text" name="nama_kom" placeholder="Nama Komoditas" class="form-control">
				</td>
			</tr>


			<tr>
				<td>
					<input type="text" name="jenis" placeholder="Jenis" class="form-control">
				</td>
			</tr>


			<tr>
				<td>
					<input type="text" name="ket" placeholder="Keterangan" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="file" name="foto" class="form-control">
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
// Form Edit Data Komoditas
	}elseif ($kanal == "komoditas" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM komoditas WHERE id_komoditas = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=komoditas&aksi=update" method="post" enctype="multipart/form-data" class="form-group">
	<input type="hidden" name="id" value="<?=$data['id_komoditas']?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data komoditas</caption>
		<tbody>
			<tr>
				<td>
					<input type="text" name="nama_kom" value="<?=$data['nama_komoditas']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="jenis" value="<?=$data['jenis']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="ket" value="<?=$data['keterangan']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<img src="images/<?=$data['foto']?>" alt="foto Komoditas" width='75'>
				</td>
			</tr>

			<tr>
				<td>
					<input type="file" name="foto" class="form-control">
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
// Insert Data Komoditas
}elseif ($kanal == "komoditas" && $aksi == "insert"){
	$nama_foto = $_FILES['foto']['name'];
	$tmp_foto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_foto,"images/$nama_foto");
	
	$query = "INSERT INTO komoditas(nama_komoditas,jenis,keterangan,foto) VALUES(:nm_k, :jns, :ket, :nama_foto)";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':nm_k',$nm_k);
	$stmt->bindParam(':jns',$jns);
	$stmt->bindParam(':ket',$ket);
	$stmt->bindParam(':nama_foto',$nama_foto);
	$stmt->execute();
	header("location:index.php?kanal=komoditas");

// Update Data Komoditas
}elseif ($kanal == "komoditas" && $aksi == "update"){

	$nama_foto = $_FILES['foto']['name'];
	$tmp_foto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($tmp_foto,"images/$nama_foto");
	
	$query = "UPDATE komoditas SET nama_komoditas=:nm_k,jenis=:jns,keterangan=:ket,foto=:nama_foto WHERE id_komoditas=:id_k";
	$stmt = $kon->prepare("$query");
	$stmt->bindparam(':id_k',$id_k);
	$stmt->bindparam(':nm_k',$nm_k);
	$stmt->bindparam(':jns',$jns);
	$stmt->bindparam(':ket',$ket);
	$stmt->bindparam(':nama_foto',$nama_foto);
	$stmt->execute();
	header("location:index.php?kanal=komoditas");

// Delete Data Komoditas
}elseif ($kanal == "komoditas" && $aksi == "hapus"){
	$id = $_GET['id'];
	$query = "DELETE FROM komoditas WHERE id_komoditas = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=komoditas");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
?>