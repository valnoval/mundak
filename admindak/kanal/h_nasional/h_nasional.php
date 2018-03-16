<!--Content Page Admin-->
	<?php
	// Add & Edit Data Harga Nasional
	if ($_GET['kanal'] == 'hanas' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=hanas' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_h_nasional.php');
	
	// View Data Komoditas
	}else{

	?>

	<h2 class="text-center">Data Harga Nasional Komoditas Pertanian</h2>
			<a href="index.php?kanal=hanas&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
		<!--<form action="" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="text" name="cari" placeholder="Pencarian" class="form-control">
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
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT harga_nasional.id_harga_nasional,harga_nasional.angka,harga_nasional.waktu,komoditas.nama_komoditas FROM harga_nasional,komoditas WHERE harga_nasional.id_komoditas=komoditas.id_komoditas ORDER BY harga_nasional.angka";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['nama_komoditas']?></td>
				<td><?=$data['angka']?></td>
				<td><?=substr($data['waktu'],0,20)?></td>
				<td>
					<a href="index.php?kanal=hanas&aksi=edit&id=<?=$data['id_harga_nasional']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=hanas&aksi=hapus&id=<?=$data['id_harga_nasional']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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