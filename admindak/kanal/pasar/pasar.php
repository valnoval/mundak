<!--Content Page Admin-->
	<?php
	// Add & Edit Data Pasar
	if ($_GET['kanal'] == 'pasar' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=pasar' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_pasar.php');
	
	// View Data pasar
	}else{

	?>

	<h2 class="text-center">Data Pasar</h2>
			<a href="index.php?kanal=pasar&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah pasar</a>
		<!--<form action="" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="text" name="cari" placeholder="Pencarian" class="form-control">
		</form>-->
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Pasar</th>
				<th>Lokasi</th>
				<th>Gambar</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT pasar.id_pasar,pasar.nama_pasar,pasar.id_lokasi,pasar.gambar,lokasi.kelurahan,lokasi.kecamatan FROM pasar,lokasi WHERE pasar.id_lokasi=lokasi.id_lokasi ORDER BY nama_pasar";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			

			<tr>
				<td><?=$no?></td>
				<td><?=$data['nama_pasar']?></td>
				<td><?=$data['kelurahan']?>-<?=$data['kecamatan']?></td>
				<td>
					<?php echo"<img src='images/$data[gambar]' alt='Gambar Pasar' width='75'>"; ?>
				</td>
				<td>
					<a href="index.php?kanal=pasar&aksi=edit&id=<?=$data['id_pasar']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=pasar&aksi=hapus&id=<?=$data['id_pasar']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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