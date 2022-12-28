<?php
include_once ('../db/koneksi.php');
// Load tc-lib-pdf library
require_once '../vendor/autoload.php';

//---------Koding CSS--------------//

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$html = ' <div class="judul">
<h2>Laporan Data Transaksi Barang Keluar</h2>
<p>PT. Putra Jaya Sentosa</p>
<p><em>Sidoarjo, Jawa Timur, Indonesia</em> </p>
<hr>
</div>';

// Fetch data from the "employee" table
$idtran = $_GET['id_transaksi'];
$query  = "SELECT * FROM dta_trnsaksi_brng_keluar WHERE id_transaksi = '$idtran'";
$result = $mysqli->query($query);

$html .= '<table border="1" align="center">';
$html .= '<tr align="center">';
$html .= '<th>ID Transaksi</th>';
$html .= '<th>Nama Supplier </th>';
$html .= '<th>Nama Barang</th>';
$html .= '<th>Jumlah</th>';
$html .= '<th>harga</th>';
$html .= '<th>Total</th>';
$html .= '<th>Waktu</th>';
$html .= '</tr>';

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

  $html .= '<tr>';
  $html .= '<td>' . $row['id_transaksi'].'</td>';
  $html .= '<td>' . $row['nmasup'].'</td>';
  $html .= '<td>' . $row['nmabar'].'</td>';
  $html .= '<td>' . $row['jumlah'].'</td>';
  $html .= '<td>' . "Rp. ". number_format($row['harga'], 0, ",", ".").'</td>';
  $html .= '<td>' . "Rp. ". number_format($row['total'], 0, ",", ".").'</td>';
  $html .= '<td>' . $row['waktu'].'</td>';
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
