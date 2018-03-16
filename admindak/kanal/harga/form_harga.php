<?php
ob_start();
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id_jl = $_POST['id_jl'];
	$komoditas = $_POST['komoditas'];
	$lokasi = $_POST['lokasi'];
	$nasional = $_POST['nasional'];
	$tani = $_POST['tani'];
	$angka = $_POST['angka'];
	$skrg = date("Y-m-d");

// Form Tambah Data Harga Jual
if($kanal == "harga" && $aksi == "tambah"){
	
?>

<form action="index.php?kanal=harga&aksi=insert" method="post" class="form-group">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data Harga Jual</caption>
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
					<select name="nasional" class="form-control">
						<option selected>Harga Nasional</option>
						
						<?php
						$query = "SELECT * FROM harga_nasional";
						$stmt = $kon->prepare($query);
						$stmt->execute();			
						
						while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<option value="<?=$data['id_harga_nasional']?>"><?=$data['angka']?></option>
						
						<?php
						}
						?>

					</select>
				</td>
			</tr>


			<tr>
				<td class="input-group">
					<span class="input-group-addon">Rp.</span>
					<select name="tani" class="form-control">
						<option selected>Harga Tani</option>
						
						<?php
						$query = "SELECT * FROM harga_tani";
						$stmt = $kon->prepare($query);
						$stmt->execute();			
						
						while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<option value="<?=$data['id_harga_tani']?>"><?=$data['angka']?></option>
						
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
				<td>
					<input type="submit" value="Simpan" class="btn btn-danger">
				</td>
			</tr>

		</tbody>
	</table>
</form>

<?php
// Form Edit Data harga tani
	}elseif ($kanal == "harga" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM jual WHERE id_jual = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=harga&aksi=update" method="post" class="form-group">
	<input type="hidden" name="id_jl" value="<?=$data['id_jual']?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data Harga Jual</caption>
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
					<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i> </span>
					<select name="nasional" class="form-control">
						<option selected>Harga Nasional</option>
						
						<?php
						$sql = "SELECT * FROM harga_nasional";
						$lks = $kon->prepare($sql);
						$lks->execute();
						while ($go=$lks->fetch(PDO::FETCH_ASSOC)) {
							
							if($data['id_harga_nasional'] == $go['id_harga_nasional']){
						?>

								<option value="<?=$go['id_harga_nasional']?>" selected><?=$go['angka']?></option>

						<?php	
							}else{
						?>		

								<option value="<?=$go['id_harga_nasional']?>"><?=$go['angka']?></option>
								
						<?php
							}	
						}
						?>

					</select>
				</td>
			</tr>

			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i> </span>
					<select name="tani" class="form-control">
						<option selected>Harga Tani</option>
						
						<?php
						$sql = "SELECT * FROM harga_tani";
						$lks = $kon->prepare($sql);
						$lks->execute();
						while ($go=$lks->fetch(PDO::FETCH_ASSOC)) {
							
							if($data['id_harga_tani'] == $go['id_harga_tani']){
						?>

								<option value="<?=$go['id_harga_tani']?>" selected><?=$go['angka']?></option>

						<?php	
							}else{
						?>		

								<option value="<?=$go['id_harga_tani']?>"><?=$go['angka']?></option>
								
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
				<td>
					<input type="submit" value="Update" class="btn btn-danger">
				</td>
			</tr>

		</tbody>
	</table>
</form>

<?php	
// Insert Data harga tani
}elseif ($kanal == "harga" && $aksi == "insert"){

	$query = "INSERT INTO jual(id_komoditas,id_lokasi,id_harga_tani,id_harga_nasional,angka,waktu) VALUES(:komoditas,:lokasi,:tani,:nasional,:angka,:skrg)";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':komoditas',$komoditas);
	$stmt->bindparam(':lokasi',$lokasi);
	$stmt->bindparam(':tani',$tani);
	$stmt->bindparam(':nasional',$nasional);
	$stmt->bindparam(':angka',$angka);
	$stmt->bindparam(':skrg',$skrg);
	$stmt->execute();
	header("location:index.php?kanal=harga");
	
// Update Data harga tani
}elseif ($kanal == "harga" && $aksi == "update"){

	$query = "UPDATE jual SET id_komoditas=:komoditas,id_lokasi=:lokasi,id_harga_nasional=:nasional,id_harga_tani=:tani,angka=:angka,waktu=:waktu WHERE id_jual=:id_jl";
	$stmt = $kon->prepare($query);
	$stmt->bindparam(':komoditas',$komoditas);
	$stmt->bindparam(':lokasi',$lokasi);
	$stmt->bindparam(':nasional',$nasional);
	$stmt->bindparam(':tani',$tani);
	$stmt->bindparam(':angka',$angka);
	$stmt->bindparam(':waktu',$waktu);
	$stmt->bindparam(':id_jl',$id_jl);
	$stmt->execute();
	header("location:index.php?kanal=harga");

// Delete Data harga tani
}elseif ($kanal == "harga" && $aksi == "hapus"){
	
	$id = $_GET['id'];
	$query = "DELETE FROM jual WHERE id_jual = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=harga");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
ob_flush();
?>