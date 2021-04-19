<?php
require_once 'models/Pegawai.php';
$ar_agama = ['Islam','Kristen','Hindu','Budha','Konghucu'];
$obj = new Pegawai();
$rs = $obj->dataDivisi();
//tangkap request id di url
$id = $_REQUEST['id'];
$data_edit = $obj->getPegawai($id);
?>
<h3>Form Pegawai</h3>
<form method="POST" action="controllers/pegawaiController.php">
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">NIP</label> 
    <div class="col-8">
      <input id="nip" name="nip" value="<?= $data_edit['nip'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pegawai</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $data_edit['nama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" value="<?= $data_edit['email'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Agama</label> 
    <div class="col-8">
    <?php
    $no = 0;
    foreach($ar_agama as $agama){
    //edit agama
    $cek = ($data_edit['agama'] == $agama) ? "checked" : "";
    ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="agama" id="agama_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $agama?>" <?= $cek ?> required="required"> 
        <label for="agama_<?= $no ?>" class="custom-control-label"><?= $agama?></label>
      </div>
    <?php 
    $no++; 
    } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" class="custom-select" required="required">
        <option value="">-- Pilih Divisi --</option>
        <?php 
        foreach($rs as $d){
        //edit divisi
        $sel = ($data_edit['iddivisi'] == $d['id']) ? "selected" : "";
        ?>
          <option value="<?= $d['id'] ?>" <?=$sel ?>> <?= $d['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?= $data_edit['foto'] ?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="ubah" class="btn btn-primary">Ubah</button>
      <input type="hidden" name="idx" value="<?= $id ?>" />
    </div>
  </div>
</form>