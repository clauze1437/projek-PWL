<?php
require_once 'models/Pegawai.php';
//tangkap request id di url
$id = $_REQUEST['id'];
$obj = new Pegawai();
$rs = $obj->getPegawai($id);
//print_r($rs); exit();
?>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-guuters">
    <div class="col-md-6">
      <?php 
        $gambar = (!empty($rs['foto'])) ? $rs['foto'] : "no_image.jpg";
      ?>
      <img src="images/<?= $gambar ?>" class="img-fluid">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title"><?= $rs['nama'] ?></h5>
        <p class="card-text">
          NIP : <?= $rs['nip'] ?>
          </br>Email : <?= $rs['email'] ?>@netnotz.com
          </br>Agama : <?= $rs['agama'] ?>
          </br>Divisi : <?= $rs['divisi'] ?>
        </p>
        <a href="index.php?hal=dataPegawai" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>