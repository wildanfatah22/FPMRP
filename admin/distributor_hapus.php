<?php
// untuk koneksi
session_start();
include_once ('../db/koneksi.php');

$idsup = $_GET['id_distributor'];
$sql   = "DELETE FROM dta_distributor WHERE id_distributor = '$idsup'";
$query = $mysqli->query($sql);

if ($query) {
  header('location:'.'distributor.php?&hapus');
}

 ?>
