<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id_hn = $_POST['id_hn'];
	$komoditas = $_POST['komoditas'];
	$angka = $_POST['angka'];
	$waktu = $_POST['waktu'];

// Form Tambah Data harga nasional
if($kanal == "hanas" && $aksi == "tambah"){
	
?>

<form action="index.php?kanal=hanas&aksi=insert" method="post" class="form-group" enctype="multipart/form-data">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data Harga Nasional</caption>
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
					<span class="input-group-addon">Rp.</span>
					<input type="text" name="angka" placeholder="Harga" class="form-control">
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
// Form Edit Data harga nasional
	}elseif ($kanal == "hanas" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM harga_nasional WHERE id_harga_nasional = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=hanas&aksi=update" method="post" accept-charset="utf-8" class="form-group" enctype="multipart/form-data">
	<input type="hidden" name="id_hn" value="<?=$id?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data Harga Nasional</caption>
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
					<span class="input-group-addon"></span>
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
// Insert Data harga nasional
}elseif ($kanal == "hanas" && $aksi == "insert"){

	$query = "INSERT INTO harga_nasional(id_komoditas,angka,waktu) VALUES(:komoditas,:angka,:waktu)";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':komoditas',$komoditas);
	$stmt->bindparam(':angka',$angka);
	$stmt->bindparam(':waktu',$waktu);
	$stmt->execute();
	header("location:index.php?kanal=hanas");

// Update Data harga nasional
}elseif ($kanal == "hanas" && $aksi == "update"){
	
	$query = "UPDATE harga_nasional SET id_komoditas=:komoditas,angka=:angka,waktu=:waktu WHERE id_harga_nasional=:id_hn";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':komoditas',$komoditas);
	$stmt->bindparam(':angka',$angka);
	$stmt->bindparam(':waktu',$waktu);
	$stmt->bindparam(':id_hn',$id_hn);
	$stmt->execute();
	header("location:index.php?kanal=hanas");

// Delete Data harga nasional
}elseif ($kanal == "hanas" && $aksi == "hapus"){
	$id = $_GET['id'];
	$query = "DELETE FROM harga_nasional WHERE id_harga_nasional = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=hanas");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
?>