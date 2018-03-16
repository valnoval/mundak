<!--Content Page Admin-->
	<?php
	// Add & Edit Data Komoditas
	if ($_GET['kanal'] == 'komoditas' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=komoditas' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_komoditas.php');
	
	// View Data Komoditas
	}else{

	?>

	<h2 class="text-center">Data Komoditas Pertanian</h2>
			<a href="index.php?kanal=komoditas&aksi=tambah" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Komoditas</a>
		<!--<form action="" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="text" n=ame="cari" placeholder="Pencarian" class="form-control">
		</form>-->
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Nama</th>
				<th>Jenis</th>
				<th>Ket</th>
				<th>Foto</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT * FROM komoditas ORDER BY nama_komoditas LIMIT 0,5";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['nama_komoditas']?></td>
				<td><?=$data['jenis']?></td>
				<td><?=substr($data['keterangan'],0,20)?></td>
				<td><img src="images/<?=$data['foto']?>" alt="Foto" width="50"></td>
				<td>
					<a href="index.php?kanal=komoditas&aksi=edit&id=<?=$data['id_komoditas']?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=komoditas&aksi=hapus&id=<?=$data['id_komoditas']?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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