<!--Content Page Admin-->
	<?php
	// Add & Edit Data lokasi
	if ($_GET['kanal'] == 'lokasi' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=lokasi' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_lokasi.php');
	
	// View Data lokasi
	}else{

	?>

	<h2 class="text-center">Data Lokasi Pertanian</h2>
			<a href="index.php?kanal=lokasi&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah lokasi</a>
		<!--<form action="" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="text" name="cari" placeholder="Pencarian" class="form-control">
		</form>-->
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Kode Lokasi</th>
				<th>Kelurahan</th>
				<th>Kecamatan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT * FROM lokasi ORDER BY kecamatan";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['id_lokasi']?></td>
				<td><?=$data['kelurahan']?></td>
				<td><?=substr($data['kecamatan'],0,20)?></td>
				<td>
					<a href="index.php?kanal=lokasi&aksi=edit&id=<?=$data['id_lokasi']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=lokasi&aksi=hapus&id=<?=$data['id_lokasi']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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