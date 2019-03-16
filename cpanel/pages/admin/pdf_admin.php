<?php
include ('pdf/class.ezpdf.php');

$pdf = new Cezpdf('Legal','landscape');

$pdf->ezSetCmMargins(3.5,2,2,2);
$pdf->selectFont('fonts/Helvetica.afm');

$all = $pdf->openObject();
//tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);

$pdf->addText(120, 560, 14,' <b>SMP N 3 Susukan</b>');
$pdf->addText(120, 540, 14,' <b>Daftar admin</b>');

//Garis header
$pdf->line(10, 520, 1000, 520);

//Garis footer
$pdf->line(10, 50, 1000, 50);

$pdf->addText(10,34,10,' Dicetak tanggal : ' . date('d M Y'));

$pdf->closeObject();
//tampilkan object di semua halaman
$pdf->addObject($all, 'all');

include "../../../conf/koneksi.php";

$sql=mysqli_query($connect, "SELECT * from pengguna,admin
							 WHERE pengguna.idu = admin.idu AND pengguna.hak_akses = 'Admin' Order By admin.id_admin");
$i=1;
while ($r = mysqli_fetch_array($sql)) {
  $data[$i]=array('<b>No. </b>'=>$i,
  				  '<b>No. Induk</b>'=>$r['id_admin'],
                  '<b>Nama Pegawai</b>'=>$r['nama_admin'],
				  '<b>Username</b>'=>$r['username'],
				  '<b>Password</b>'=>$r['pass_asli'],
					'<b>Jenis Kelamin</b>'=>$r['jenis_kelamin'],
					'<b>Tempat Lahir</b>'=>$r['tempat_lahir'],
					'<b>Tanggal Lahir</b>'=>$r['tgl_lahir'],
					'<b>Nomor Telepon</b>'=>$r['no_telp'],
					'<b>Agama</b>'=>$r['agama'],
  				  '<b>Alamat</b>'=>$r['alamat']);
$i++;
}
$pdf->ezTable($data, '', '', '');

$pdf->ezStartPageNumbers(990, 34, 10);
$pdf->ezStream();
?>
