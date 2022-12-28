<?php
include_once ('../db/koneksi.php');
// Load tc-lib-pdf library
require_once '../vendor/autoload.php';


use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$html = ' <div class="judul">
<h2>Laporan Data Barang</h2>
<p>PT. Putra Jaya Sentosa</p>
<p><em>Sidoarjo, Jawa Timur, Indonesia</em> </p>
<hr>
</div>';

// Fetch data from the "employee" table
$query  = "SELECT * FROM dta_barang";
$result = $mysqli->query($query);

$html .= '<table border="1" align="center">';
$html .= '<tr align="center">';
$html .= '<th>Kode Barang</th>';
$html .= '<th>Nama Barang</th>';
$html .= '<th>Jumlah Barang</th>';
$html .= '<th>Harga Barang</th>';
$html .= '<th>Satuan</th>';
$html .= '<th>Kondisi</th>';
$html .= '<th>Stock Awal</th>';
$html .= '<th>Stock Terjual</th>';
$html .= '</tr>';

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $html .= '<tr>';
  $html .= '<td>' . $row['kd_barang'].'</td>';
  $html .= '<td>' . $row['nama'].'</td>';
  $html .= '<td>' . $row['jumlah'].'</td>';
  $html .= '<td>' . $row['harga'].'</td>';
  $html .= '<td>' . $row['satuan'].'</td>';
  $html .= '<td>' . $row['kondisi'].'</td>';
  $html .= '<td>' . $row['stock_awal'].'</td>';
  $html .= '<td>' . $row['stock_terjual'].'</td>';
  $html .= '</tr>';
}

$html .= '</table>';

$html .= ' <p>Yang bertanda tangan dibawah ini :</p>
<p class="admin">Administrator</p>
<br>
<br>
<br>
<p class="nama">Admin</p>';

mysqli_close($mysqli);

$html2pdf->writeHTML($html);

// Output the PDF document
$html2pdf->output('laporan-barang-keluar.pdf', 'I');

?>
