<?php
$query = "SELECT * FROM komoditas ORDER BY nama_komoditas LIMIT 0,4";
$stmt = $kon->prepare($query);
$stmt->execute();
while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {  
?>
      
    <div class="col-md-3 text-center">
      <img class="img-circle" src="admindak/images/<?=$data['foto']?>" alt="Generic placeholder image" width="140" height="140">
      <h2><?=$data['nama_komoditas']?></h2>
      <p><?=$data['jenis']?></p>
      <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
    </div>
<?php
}
?>