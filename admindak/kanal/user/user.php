<!--Content Page Admin-->
	<?php
	// Add & Edit Data user
	if ($_GET['kanal'] == 'user' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=user' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_user.php');
	
	// View Data user
	}else{

	?>

	<h2 class="text-center">Data User</h2>
			<a href="index.php?kanal=user&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah user</a>
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Nama</th>
				<th>Username/E-mail</th>
				<th>Foto</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT * FROM user ORDER BY username";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['nama']?></td>
				<td><?=$data['username']?></td>
				<td><?php echo"<img src='images/$data[foto]' alt='Gambar User' width='75'>"; ?></td>
				<td><?=$data['level']?></td>
				<td>
					<a href="index.php?kanal=user&aksi=edit&id=<?=$data['id_user']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=user&aksi=hapus&id=<?=$data['id_user']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			
			<?php
			$no++;
			}	
			?>
		</tbody>
	</table>
	
	<?php
	}
	?>