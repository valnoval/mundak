<?php
$kanal = $_GET['kanal'];
$aksi = $_GET['aksi'];

	if ($kanal == 'komoditas') {
		include_once('kanal/komoditas/komoditas.php');
	}elseif ($kanal == 'pasar') {
		include_once('kanal/pasar/pasar.php');
	}elseif ($kanal == 'lokasi') {
		include_once('kanal/lokasi/lokasi.php');
	}elseif ($kanal == 'hanas') {
		include_once('kanal/h_nasional/h_nasional.php');
	}elseif ($kanal == 'hatan') {
		include_once('kanal/hatan/h_tani.php');
	}elseif ($kanal == 'harga') {
		include_once('kanal/harga/harga.php');
	}elseif ($kanal == 'user') {
		include_once('kanal/user/user.php');
	}elseif ($kanal == 'admin') {
		include_once('kanal/admin/admin.php');
	}else{
		echo "<div class='jumbotron alert-danger'>
			<h2>Page Not Found</h2>
		</div>";
	}
?>