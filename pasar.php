<?php
$query = "SELECT pasar.id_pasar,pasar.nama_pasar,pasar.id_lokasi,pasar.gambar,lokasi.kelurahan,lokasi.kecamatan FROM pasar,lokasi WHERE pasar.id_lokasi=lokasi.id_lokasi ORDER BY nama_pasar LIMIT 0,4";
$stmt = $kon->prepare($query);
$stmt->execute();
$no =1;
while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {  
    if($no % 2 == 0){
?>
    
    <div class="col-md-7 col-md-push-5">
      <h2 class=""><?=$data['nama_pasar']?> <span class="text-muted"><?=$data['kelurahan']?>-<?=$data['kecamatan']?></span></h2>
      <p class="lead">Yang ino paaya.</p>
    <hr>
    </div>
    <div class="col-md-5 col-md-pull-7">
      <img class="img-rounded img-responsive center-block" src="admindak/images/<?=$data['gambar']?>" alt="Pasar">
    <hr>
    </div>

    <?php
    }else{
    ?>
      
    <div class="col-md-7">
      <h2 class=""><?=$data['nama_pasar']?> <span class="text-muted"><?=$data['kelurahan']?>-<?=$data['kecamatan']?></span></h2>
      <p class="lead">Terserah.</p>
    <hr>
    </div>
    <div class="col-md-5">
      <img class="img-rounded img-responsive center-block" src="admindak/images/<?=$data['gambar']?>" alt="Generic placeholder image">
    <hr>
    </div>
<?php
    }
$no++;
}
?>    