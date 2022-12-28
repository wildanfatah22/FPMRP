<?php
include_once ('../db/koneksi.php');
// Load tc-lib-pdf library
require_once '../vendor/autoload.php';

//---------Koding CSS--------------//

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$html = ' <div class="judul">
<h2>Laporan Data Distributor</h2>
<p>PT. Putra Jaya Sentosa</p>
<p><em>Sidoarjo, Jawa Timur, Indonesia</em> </p>
<hr>
</div>';

// Fetch data from the "employee" table
$query  = "SELECT * FROM dta_distributor";
$result = $mysqli->query($query);

$html .= '<table border="1" align="center">';
$html .= '<tr align="center">';
$html .= '<th>ID distributor</th>';
$html .= '<th>Nama </th>';
$html .= '<th>Nomor Telp.</th>';
$html .= '<th>Fax</th>';
$html .= '<th>Email</th>';
$html .= '<th>Website</th>';
$html .= '<th>Alamat</th>';
$html .= '</tr>';

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $html .= '<tr>';
  $html .= '<td>' . $row['id_distributor'].'</td>';
  $html .= '<td>' . $row['nama'].'</td>';
  $html .= '<td>' . $row['nomor'].'</td>';
  $html .= '<td>' . $row['fax'].'</td>';
  $html .= '<td>' . $row['email'].'</td>';
  $html .= '<td>' . $row['website'].'</td>';
  $html .= '<td>' . $row['alamat'].'</td>';

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
$html2pdf->output('laporan-distributor.pdf', 'I');

?>
