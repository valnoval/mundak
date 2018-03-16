<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];
	
	/*Data Kirim method POST*/
	$id = $_POST['id'];
	$uname = $_POST['uname'];
	$upass = password_hash($_POST['upass'], PASSWORD_DEFAULT);
	$level = $_POST['level'];
	/**/

// Form Tambah Data admin
if($kanal == "admin" && $aksi == "tambah"){
?>

<form action="index.php?kanal=admin&aksi=insert" method="post" accept-charset="utf-8" class="form-group">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Tambah Data Admin</caption>
		<tbody>
			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
					<input type="text" name="uname" placeholder="Username" class="form-control">
				</td>
			</tr>


			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
					<input type="password" name="upass" placeholder="Password" class="form-control">
				</td>
			</tr>


			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i> </span>
					<select name="level" class="form-control">
						<option value="admin">Admin</option>
						<option value="superadmin">Super Admin</option>
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
// Form Edit Data admin
	}elseif ($kanal == "admin" && $aksi == "edit") {
		$id = $_GET['id'];
		$query = "SELECT * FROM admin WHERE id_admin = :id";
		$stmt = $kon->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="index.php?kanal=admin&aksi=update" method="post" accept-charset="utf-8" class="form-group">
	<input type="hidden" name="id" value="<?=$data['id_admin']?>" class="form-control">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Form Edit Data admin</caption>
		<tbody>
			
			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
					<input type="text" name="uname" value="<?$data['username']?>" class="form-control">
				</td>
			</tr>


			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
					<input type="password" name="upass" value="<?$data['password']?>" class="form-control">
				</td>
			</tr>


			<tr>
				<td class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i> </span>
					<select name="level" class="form-control">
					
					<?php
					if ($data['level'] == 'admin') {
						# code...
					?>
						<option value="admin" selected>Admin</option>
						<option value="superadmin">Super Admin</option>
					<?php
					}else{
					?>	
						<option value="admin">Admin</option>
						<option value="superadmin"  selected>Super Admin</option>
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
// Insert Data admin
}elseif ($kanal == "admin" && $aksi == "insert"){

	$query = "INSERT INTO admin(username,password,level) VALUES(:uname, :upass, :level)";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':upass',$upass);
	$stmt->bindParam(':uname',$uname);
	$stmt->bindParam(':level',$level);
	$stmt->execute();
	header("location:index.php?kanal=admin");

// Update Data admin
}elseif ($kanal == "admin" && $aksi == "update"){

	$query = "UPDATE admin SET username=:uname,password=:upass,level=:level WHERE id_admin=:id";
	$stmt = $kon->prepare("$query");
	$stmt->bindparam(':id',$id);
	$stmt->bindParam(':upass',$upass);
	$stmt->bindParam(':uname',$uname);
	$stmt->bindParam(':level',$level);
	$stmt->execute();
	header("location:index.php?kanal=admin");

// Delete Data admin
}elseif ($kanal == "admin" && $aksi == "hapus"){
	$id = $_GET['id'];
	$query = "DELETE FROM admin WHERE id_admin = :id";
	$stmt = $kon->prepare($query);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	header("location:index.php?kanal=admin");

// Perintah tidak dikenali				
}else{
	echo "<div class='jumbotron alert-danger'>
			<h2>404 Page Not Found</h2>
		</div>";
}
?>