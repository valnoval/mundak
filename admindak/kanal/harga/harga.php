<!--Content Page Admin-->
	<?php
	// Add & Edit Data Harga Jual
	if ($_GET['kanal'] == 'harga' && isset($_GET['aksi'])) {
		echo "<p>
				<a href='index.php?kanal=harga' class='btn btn-success'> <i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
			</p>
			";
		include_once('form_harga.php');
	
	// View Data Harga Pantau
	}else{

	?>

	<h2 class="text-center">Data Pantau Harga</h2>
			<a href="index.php?kanal=harga&aksi=tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Komoditas</a>
	<hr>
	<table class="table table-bordered table-responsive table-striped">
		<thead>
			</tr>
			<tr class="alert-info">
				<th>No.</th>
				<th>Komoditas</th>
				<th>Harga Nasional</th>
				<th>Lokasi</th>
				<th>Harga Tani</th>
				<th>Harga Jual</th>
				<th>Waktu</th>
				<th>Pengirim</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$query = "SELECT jual.id_jual,komoditas.nama_komoditas,lokasi.kelurahan,lokasi.kecamatan,harga_tani.angka as hatan ,harga_nasional.angka as hanas,jual.angka as hajul,jual.waktu,user.nama FROM jual,komoditas,lokasi,harga_tani,harga_nasional,user WHERE jual.id_komoditas=komoditas.id_komoditas AND jual.id_lokasi=lokasi.id_lokasi AND jual.id_harga_tani=harga_tani.id_harga_tani AND jual.id_harga_nasional=harga_nasional.id_harga_nasional AND jual.id_user=user.id_user ORDER BY jual.angka";
			$stmt = $kon->prepare($query);
			$stmt->execute();
			$no=1;
			while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
			?>			
			<tr>
				<td><?=$no?></td>
				<td><?=$data['nama_komoditas']?></td>
				<td><?=$data['hanas']?></td>
				<td><?=$data['kelurahan']?>-<?=$data['kecamatan']?></td>
				<td><?=$data['hatan']?></td>
				<td><?=$data['hajul']?></td>
				<td><?=$data['waktu']?></td>
				<td><?=$data['nama']?></td>	
				<td>
					<a href="index.php?kanal=harga&aksi=edit&id=<?=$data['id_jual']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="index.php?kanal=harga&aksi=hapus&id=<?=$data['id_jual']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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