<?php
session_start();
// include koneksi
include_once('../db/koneksi.php');

// mengambil data yang diinput dari form
$namauser = $_POST['inpuser'];
$passuser = $_POST['inppass'];

// select username dan password dari tabel login_kontak
$sql = mysqli_query($conn, "SELECT * FROM masuk WHERE username = '$namauser' AND password = '$passuser'");

// menghitung jumlah data yang ditemukan
$valid = mysqli_num_rows($sql);

if ($valid > 0) {
  $_SESSION['inpuser']  = $namauser;
  $_SESSION['password'] = $passuser;
  header("location: ../admin/admin.php");
} else {
  header("location:masuk.php?pesan=gagal");
}
