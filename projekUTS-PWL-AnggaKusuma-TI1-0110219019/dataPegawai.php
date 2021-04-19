<?php
require_once 'models/Pegawai.php';
//buat object dari class Pegawai
$obj = new Pegawai();
//panggil method tampilkan data
$rs = $obj->dataPegawai();
?>
<h3 class="pb-3">Data Pegawai</h3>
<?php 
  if(isset($member)){
?>
<a href="index.php?hal=formPegawai" class="btn btn-primary">Tambah</a>
<?php 
  }
?>
<div class="table-responsive pt-3">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIP</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Agama</th>
        <th scope="col">Divisi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach($rs as $peg){
    ?>
      <tr>
        <td><?= $no; ?></td>
        <td><?= $peg['nip']; ?></td>
        <td><?= $peg['nama']; ?></td>
        <td><?= $peg['email']; ?>@netnotz.com</td>
        <td><?= $peg['agama']; ?></td>
        <td><?= $peg['divisi']; ?></td>
        <td>
          <form method="POST" action="controllers/pegawaiController.php">
            <a href="index.php?hal=detailPegawai&id=<?= $peg['id']; ?>" class="btn btn-info">Detail</a>
            <?php 
              $role = $member['role'];
              if(isset($member)){
            ?>
            <a href="index.php?hal=formEditPegawai&id=<?= $peg['id']; ?>" class="btn btn-warning">Ubah</a>
            <?php 
              if($role != 'staff'){
            ?>
            <button name="proses" value="hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn btn-danger">Hapus</button>
            <?php } ?>
            <input type="hidden" name="idx" value="<?= $peg['id'] ?>" />
            <?php } ?>
          </form>
        </td>
      </tr>
    <?php 
    $no++;
    }
    ?>
    </tbody>
  </table>
</div>