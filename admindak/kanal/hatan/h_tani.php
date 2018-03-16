<!--Content Page Admin-->
	<?php
	// Add & Edit Data Harga Tani
	if ($_GET['kanal'] == 'hatan' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=hatan' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_h_tani.php');
	
	// View Data Komoditas
	}else{

	?>

	<h2 class="text-center">Data Harga Tani Komoditas Pertanian</h2>
			<a href="index.php?kanal=hatan&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a>
		<!--<form action="" method="post" accept-charset="utf-8" class="form-horizontal">
			<input type="text" name="cari" placeholder="Pencarian" class="form-control">
		</form>-->
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Komoditas</th>
				<th>Lokasi</th>
				<th>Harga</th>
				<th>Waktu</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT harga_tani.id_harga_tani,harga_tani.angka,harga_tani.waktu,komoditas.nama_komoditas,lokasi.kelurahan,lokasi.kecamatan FROM harga_tani,komoditas,lokasi WHERE harga_tani.id_komoditas=komoditas.id_komoditas AND harga_tani.id_lokasi=lokasi.id_lokasi ORDER BY harga_tani.angka";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['nama_komoditas']?></td>
				<td><?=$data['kelurahan']?>-<?=$data['kecamatan']?></td>
				<td>Rp. <?=$data['angka']?></td>
				<td><?=substr($data['waktu'],0,20)?></td>
				<td>
					<a href="index.php?kanal=hatan&aksi=edit&id=<?=$data['id_harga_tani']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=hatan&aksi=hapus&id=<?=$data['id_harga_tani']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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