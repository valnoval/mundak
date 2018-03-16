<?php
if ($_GET['kanal']=='daftar') {
?>
<form action="admindak/index.php?kanal=user&aksi=insert" method="post" class="form-group" enctype="multipart/form-data">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Pendaftaran</caption>
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
						<option selected>Status</option>
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
}elseif ($_GET['kanal']=='keluar') {
session_start();
session_destroy();
header("location:../../index.php?kanal=masuk");
}else{
?>

<form action="admindak/config/cek.php" method="post" class="form-group">
	<table class="table table-bordered table-responsive table-striped">
		<caption>Log In User</caption>
		<tbody>

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
					<input type="submit" value="Masuk" class="btn btn-primary"> 
					<a href="index.php?kanal=daftar" class="btn btn-danger">Daftar</a>
				</td>
			</tr>
		</tbody>
	</table>
</form>	

<?php
}
?>