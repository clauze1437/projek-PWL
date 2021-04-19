<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbpegawai;host=localhost';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
  // echo 'Alhamdulillah sukses koneksi database';
} catch (PDOException $e) {
  echo 'Gagal koneksi dengan sebab : ' . $e->getMessage();
}
?>