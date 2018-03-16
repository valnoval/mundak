<?php
session_start();
include_once("admindak/config/config.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="admindak/images/sayur6.jpg">

    <title>Mundak.in</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css" media="screen">
    body{
        min-height:2000px;
        padding-top: 50px;     
    }

    footer{
        padding-top: 30px;
    }
  </style>
  <body>
      
<!--Navigasi-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-leaf"></i> mundak.in</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#pantau">Pantau Harga</a></li>
            <li><a href="#pasar">Pasar</a></li>
            <li><a href="#komoditas">Komoditas</a></li>
            <li><a href="index.php?kanal=masuk">Masuk</a></li>
            <?php
                if($_SESSION['uname'] && $_SESSION['uid']){
            ?>
            <li><a href="index.php?kanal=keluar">Keluar</a></li>
            <?php
                }
            ?>            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>      
<!--End navigasi-->

<!--Konten Uatama-->
<div class="container">

<?php
if (!isset($_GET['kanal'])) {
?>

<!--Pantau Harga-->
    <div id="pantau">  
        <h2 class="panel-heading text-center">Pantau Harga</h2>
        <hr>  
        <?php include_once('pantau.php') ?>
        <div class="row text-cen">
            <nav>
                      <ul class="pagination pagination-lg">
                        <li>
                          <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                          <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                     </nav>

        </div>
    </div>
    <hr>        
<!--End Pantau-->

<!--PASAR-->
    <div id="pasar">
    <h2 class="panel-heading">Pasar</h2>
      <hr>
        <?php include_once('pasar.php') ?>
        <div class="row text-center">
            <a href="#" class="btn btn-success btn-lg">LAINYA >></a>
        </div>
    </div>
    <hr>
<!--End PASAR-->
      
<!--Komoditas-->

    <div id="komoditas">
    <h2 class="panel-heading">Komoditas</h2>
    <hr>
        <?php include_once('komoditas.php') ?>
    </div>
<!--End Komoditas-->                                    

<!--Login/Daftar-->                                    
<div id="user">
    <div class="col-sm-8 col-md-4 text-center"">
<?php
}else{
    include_once("user.php");
}
?>
    </div>
</div>
<!--End-->                                    

</div>
<!--Enc Konten Utama-->

    <footer>
      <div class="navbar navbar-default navbar-static-bottom">
        <p></p>
        <p class="text-center">
          Copyright &copy; 2018 Mundak.in
        </p>
      </div>  
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
  </body>
</html>
