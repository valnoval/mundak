<?php
$query = "SELECT jual.id_jual,komoditas.nama_komoditas,lokasi.kelurahan
      ,lokasi.kecamatan,harga_tani.angka as hatan ,harga_nasional.angka as hanas,jual.angka as hajul,jual.waktu,user.nama,pasar.nama_pasar,pasar.gambar FROM jual,komoditas,lokasi,harga_tani,harga_nasional,user,pasar WHERE jual.id_komoditas=komoditas.id_komoditas AND jual.id_lokasi=lokasi.id_lokasi AND jual.id_lokasi=harga_tani.id_lokasi AND jual.id_komoditas=harga_nasional.id_komoditas AND jual.id_user=user.id_user AND lokasi.id_lokasi=pasar.id_lokasi ORDER BY jual.angka LIMIT 0,3";
$stmt = $kon->prepare($query);
$stmt->execute();
while ($data=$stmt->fetch(PDO::FETCH_ASSOC)) {
?>
  <div class="col-sm-4 col-md-4">
    <div class="panel panel-info center-block">
       <div class="panel-heading">
        <h3 class="panel-title"><?=$data['nama_komoditas']?></h3>
       </div>
       <div class="panel-body">  
            <img src="admindak/images/<?=$data['gambar']?>" alt="Gambar" class="img-rounded img-responsive">
        
       </div>
       <table class="table">
        <tbody>
        <tr>
          <td><span class="label label-danger">Mualai dari Rp.<?=$data['hajul']?></span></td>
          <td><span class="label label-success"><i class="glyphicon glyphicon-globe"></i> Standar : Rp.<?=$data['hanas']?></span></td>
        </tr>
        <tr>
          <td><span class="label label-info"><i class="glyphicon glyphicon-map-marker"></i> <?=$data['nama_pasar']?></span></td>
          <td><span class="label label-warning"><i class="glyphicon glyphicon-list-alt"></i> Dari Tani : Rp.<?=$data['hatan']?></span></td>
        </tr>
        <tr>
          <td colspan="2"><span class="label label-info"><i class="glyphicon glyphicon-calendar"></i> <?=$data['waktu']?></span></td>
        </tr>  
       </tbody>
       </table>
    </div>    
  </div>

<?php
}
?>