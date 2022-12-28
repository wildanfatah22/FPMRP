<?php
//deklarasi variabel untuk nama server, username, dan password
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "fp_mrp";

$mysqli = new mysqli($host, $user, $pass, $dbnm);
if ($mysqli->connect_errno) {

  echo "Gagal Konek !" . $mysqli->connect_errno;
} else {

  // echo "Koneksi Berhasil !";

}
?>