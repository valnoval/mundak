<!--Content Page Admin-->
	<?php
	// Add & Edit Data Admin
	if ($_GET['kanal'] == 'admin' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=admin' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_admin.php');
	
	// View Data admin
	}else{

	?>

	<h2 class="text-center">Data Admin</h2>
			<a href="index.php?kanal=admin&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah admin</a>
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Username</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT * FROM admin ORDER BY username";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['username']?></td>
				<td><?=$data['level']?></td>
				<td>
					<a href="index.php?kanal=admin&aksi=edit&id=<?=$data['id_admin']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=admin&aksi=hapus&id=<?=$data['id_admin']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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