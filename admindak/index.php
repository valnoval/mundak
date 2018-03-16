<?php
include_once("config/config.php");
include_once("config/lib.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mundak-in</title>
	<meta name="keywords" content="" />
		<meta name="description" content="" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="../asset/css/bootstrap.min.css" rel='stylesheet' type='text/css'>
</head>
<body>
	<body>			
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-leaf"></i> Mundak.in</a>
				</div>
				<div class="collapse navbar-collapse" id="menu">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
						<li><a href="index.php?kanal=komoditas"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
					</ul>
				</div>
			 </div><!-- /.container -->
		</nav>

		<div class="container-fluid">
			<div class="row">
			<!--Admin Navigasi-->
			<div class="col-sm-12 col-md-2 sidebar">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#klik" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			  	</div>
			  	<div class="collapse navbar-collapse" id="klik">
					<ul class="nav nav-sidebar">
						<li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
						<li><a href="index.php?kanal=harga"><i class="glyphicon glyphicon-th-large"></i> Harga</a></li>
						<li><a href="index.php?kanal=hanas"><i class="glyphicon glyphicon-th-list"></i> Harga Nasional</a></li>
						<li><a href="index.php?kanal=hatan"><i class="glyphicon glyphicon-list"></i> Harga Petani</a></li>
						<li><a href="index.php?kanal=komoditas"><i class="glyphicon glyphicon-dashboard"></i> Komoditas</a></li>
						<li><a href="index.php?kanal=pasar"><i class="glyphicon glyphicon-shopping-cart"></i> Pasar</a></li>
						<li><a href="index.php?kanal=lokasi"><i class="glyphicon glyphicon-map-marker"></i> Lokasi</a></li>
						<li><a href="index.php?kanal=user"><i class="glyphicon glyphicon-user"></i> User</a></li>
						<li><a href="index.php?kanal=admin"><i class="glyphicon glyphicon-lock"></i> Admin</a></li>
					</ul>
				</div>	
			</div>

			<!--Content Page Admin-->
			<div class="col-sm-12 col-md-9">
				<?php
				if (isset($_GET['kanal'])) {
					include_once('kanal.php');
				}else{
				?>

				<!--Selamat-->
				<div class="jumbotron">
					<h2>Hello Admin</h2>
				</div>

				<?php
				}
				?>
			</div>	
			</div>
		</div>

		<footer>
			<div class="navbar navbar-static-bottom">
				<p></p>
				<p class="text-center">
					Copyright &copy; 2018 Mundak.in
				</p>
			</div>	
		</footer>
		
	
	
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script-->
	<script src="../asset/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../asset/js/bootstrap.min.js"></script>
</body>
</body>
</html>