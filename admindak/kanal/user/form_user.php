 	<?php
ob_start();
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$uname = $_POST['uname'];
	$upass = $_POST['upass'];
	$foto = $_POST['foto'];
	$level = $_POST['level'];
	$skrg = date("Y-m-d");
	/**/

// Form Tambah Data user
if($kanal == "user" && $aksi == "tambah"){
?>

<form action="index.php?kanal=user&aksi=insert" method="post" class="form-group" enctype="multipart/form-data">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data User</caption>
		<tbody>

			<tr>
				<td>
					<input type="text" name="nama" placeholder="Nama" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="uname" placeholder="Username/E-mail" class="form-control">
				</td>
			</tr>


			<tr>
				<td>
					<input type="password" name="upass" placeholder="Password" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="file" name="foto" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<select name="level" class="form-control">
						<option selected>Level</option>
						<option value="pedagang">Pedagang</option>
						<option value="konsumen">Konsumen</option>
					</select>	
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
// Form Edit Data user
	}elseif ($kanal == "user" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM user WHERE id_user = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=user&aksi=update" method="post" class="form-group" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?=$data['id_user']?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data user</caption>
		<tbody>
			
			<tr>
				<td>
					<input type="text" name="nama" value="<?$data['nama']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<input type="text" name="uname" value="<?$data['username']?>" class="form-control">
				</td>
			</tr>


			<tr>
				<td>
					<input type="password" name="upass" value="<?$data['password']?>" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<img src="images/<?=$data['foto']?>" alt="Gambar User" width='75'>
				</td>
			</tr>

			<tr>
				<td>
					<input type="file" name="foto" class="form-control">
				</td>
			</tr>

			<tr>
				<td>
					<select name="level" class="form-control">
					
					<?php
					if ($data['level'] == 'pedagang') {
						# code...
					?>
						<option value="pedagang" selected>Pedagang</option>
						<option value="konsumen">Konsumen</option>
					<?php
					}else{
					?>
						<option value="pedagang">Pedagang</option>
						<option value="konsumen" selected>Konsumen</option>
					<?php
					}
					?>
					</select>	
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
// Insert Data user
}elseif ($kanal == "user" && $aksi == "insert"){
	$nama_foto = $_FILES['foto']['name'];
	$lks_foto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lks_foto,"images/$nama_foto");

	$query = "INSERT INTO user(nama,username,password,foto,level,tgl_daftar) VALUES(:nama, :uname, :upass, :nama_foto, :level, :skrg)";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':nama',$nama);
	$stmt->bindParam(':uname',$uname);
	$stmt->bindParam(':upass',$upass);
	$stmt->bindParam(':nama_foto',$nama_foto);
	$stmt->bindParam(':level',$level);
	$stmt->bindParam(':skrg',$skrg);
	$stmt->execute();
	header("location:../index.php?kanal=masuk");

// Update Data user
}elseif ($kanal == "user" && $aksi == "update"){
	$nama_foto = $_FILES['foto']['name'];
	$lks_foto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lks_foto,"images/$nama_foto");

	$query = "UPDATE user SET nama=:nama, username=:uname, password=:upass, foto=:nama_foto, level=:level WHERE id_user=:id";
	$stmt = $kon->prepare("$query");
	$stmt->bindparam(':id',$id);
	$stmt->bindParam(':nama',$nama);
	$stmt->bindParam(':uname',$uname);
	$stmt->bindParam(':upass',$upass);
	$stmt->bindParam(':nama_foto',$nama_foto);
	$stmt->bindParam(':level',$level);
	$stmt->execute();
	header("location:index.php?kanal=user");

// Delete Data user
}elseif ($kanal == "user" && $aksi == "hapus"){
	
	$id = $_GET['id'];
	$query = "DELETE FROM user WHERE id_user = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=user");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
ob_flush();
?>