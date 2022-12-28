<?php
include_once ('../db/koneksi.php');
// Load tc-lib-pdf library
require_once '../vendor/autoload.php';

      

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$html = ' <div class="judul">
<h2>Laporan Data Barang Keluar</h2>
<p>PT. Putra Jaya Sentosa</p>
<p><em>Sidoarjo, Jawa Timur, Indonesia</em> </p>
<hr>
</div>';

// Fetch data from the "employee" table

if (isset($_POST['cetak'])) {
  $tgla = $_POST['tgl_a']." 00.00.01"; 
  $tglb = $_POST['tgl_b']." 23.59.59";

  
      $query  = "SELECT * FROM dta_trnsaksi_brng_keluar WHERE waktu BETWEEN '".$tgla."' AND '".$tglb."'";
      $result = $mysqli->query($query);
    } else {
      $query  = "SELECT * FROM dta_trnsaksi_brng_keluar";
      $result = $mysqli->query($query);
    }

$html .= '<table border="1" align="center">';
$html .= '<tr align="center">';
$html .= '<th>ID Transaksi</th>';
$html .= '<th>Nama Supplier</th>';
$html .= '<th>Nama Barang</th>';
$html .= '<th>Jumlah</th>';
$html .= '<th>Harga</th>';
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
