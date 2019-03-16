<?php

/* include autoloader */

require_once 'dompdf/autoload.inc.php';


/* reference the Dompdf namespace */

use Dompdf\Dompdf;


/* instantiate and use the dompdf class */

$dompdf = new Dompdf();
include "format_tgl.php";

$connect = mysqli_connect("localhost", "vien4465_root", "yoviefp33", "vien4465_raport");

	$query1 = mysqli_query($connect, "SELECT * FROM nilai, guru, siswa, kelas, semester, tahun_ajar WHERE nilai.id_guru = guru.nik AND nilai.id_siswa = siswa.nis AND nilai.id_kelas = kelas.id_kelas AND nilai.id_smt = semester.id_smt AND kelas.id_tahun = tahun_ajar.id_tahun AND siswa.nis = '$_POST[tid]'");
	$row = mysqli_fetch_array($query1);


$html = 
'<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
#kiri
{
width:50%;
height:900px;
float:left;
padding: 3px;
}
#kanan
{
width:30%;
height:900px;
float:right;
padding: 3px;
}
#tengah
{
width:100%;
float:center;
padding: 3px;
}
div {
	width:100%;
	height: 50px;
}
.garis_tepi1 {
	border: 1px solid black;
}

		* {
		    box-sizing: border-box;
		}


		/* Create three equal columns that floats next to each other */
		.column {
		    float: left;
		    width: 33.33%;
		    padding: 13px;
		    height: 300px; /* Should be removed. Only for demonstration */
		}

		/* Clear floats after the columns */
		.row:after {
		    content: "";
		    display: table;
		    clear: both;
		}

hr.style{
	border-top: 1px solid #000;
}
</style>
</head>
<body>
<div class="row">
		<div class="col-md-12">
			<br><br><h3 style="text-align: center;">RAPOR <br>SEKOLAH MENENGAH PERTAMA (SMP)</h3><br><br><br>
			<center><img src="../../img_user/logo_smp.png" width="250px" ></center>
			<br><br><br><br>
			<p align="center"><b>Nama Peserta Didik</b><br><u>'.$row['nama_siswa'].'</u></p>
			<p align="center"><b>NIS/NISN</b><br><u>'.$row['nis'].'</u></p>
			<br><br><br><br>
			<h4 style="text-align: center;">PEMERINTAH DAERAH KABUPATEN BANJARNEGARA <br>DINAS PENDIDIKAN, PEMUDA DAN OLAHRAGA <h3">SMP NEGERI 3 SUSUKAN</h3><h5">Alamat: Jl. Lapangan Olahraga Susukan. Telp.(0284) 584148</h5></h4><br><br><br><br><br><br><br><br>
		</div>
</div>
<h3 align="center"><b>RAPOR <br> SEKOLAH MENENGAH PERTAMA<br> (SMP)</b></h3><br><br><br>
<div class="col-md-12">
	<table width="900px" class="table">
	<tr>
		<td>Nama Sekolah</td>
		<td>: SMP Negeri 3 Susukan</td>
	</tr>
	<tr>
		<td>NPSN/NSS</td>
		<td>: 98989898989898989898989</td>
	</tr>
	<tr>
		<td>Alamat Sekolah</td>
		<td>: Jl. Lapangan Olahraga Susukan <br> Kode Pos. 52354 Telp/Fax.0284-44444</td>
	</tr>
	<tr>
		<td>Kelurahan</td>
		<td>: Susukan</td>
	</tr>
	<tr>
		<td>Kabupaten/Kota</td>
		<td>: Banjarnegara</td>
	</tr>
	<tr>
		<td>Provinsi</td>
		<td>: Jawa Tengah</td>
	</tr>
	<tr>
		<td>Website</td>
		<td>: smpn3susukan.sch.id</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: smpn3susukan@smpn3susukan.sch.id</td>
	</tr>
	</table>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<h4 align="center"><b>KETERANGAN TENTANG DIRI PESERTA DIDIK</b></h4><br><br>
<div class="col-md-12">
	<table>
	<tr >
		<td width="30px" style="padding:10px;">1. </td>
		<td width="250px">Nama Peserta didik (Lengkap)</td>
		<td>: '.$row['nama_siswa'].'</td>
	</tr>
	<tr style="padding:10px;">
		<td style="padding:10px;">2. </td>
		<td> Nomor Induk Siswa Nasional</td>
		<td>: '.$row['nis'].'</td>
	</tr>
	<tr>
		<td style="padding:10px;">3. </td>
		<td> Tempat Tanggal Lahir</td>
		<td>: '.$row['tempat_lahir'].', '.indonesian_date($row['tgl_lahir']).'</td>
	</tr>
	<tr>
		<td style="padding:10px;">4. </td>
		<td> Jenis Kelamin</td>
		<td>: '.$row['jenis_kelamin'].'</td>
	</tr>	
	<tr>
		<td style="padding:10px;">5. </td>
		<td> Agama</td>
		<td>: '.$row['agama'].'</td>
	</tr>		
	<tr>
		<td style="padding:10px;">6. </td>
		<td> Alamat Peserta Didik</td>
		<td>: '.$row['alamat'].'</td>
	</tr>
	<tr>
		<td style="padding:10px;">7. </td>
		<td> Jenis Kelamin</td>
		<td>: '.$row['jenis_kelamin'].'</td>
	</tr>	<br><br>
	<tr>
		<td style="padding:10px;">8. </td>
		<td> Nomor Telp</td>
		<td>: '.$row['jenis_kelamin'].'</td>
	</tr>
	<tr>
		<td style="padding:10px;">9. </td>
		<td> Diterima di Sekolah ini<br> Di kelas</td>
		<td>: '.$row['nama_kelas'].'</td>
	</tr>
	<tr>
		<td style="padding:10px;">10. </td>
		<td> Nama Orang Tua</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>a. Ayah</td>
		<td>: '.$row['nama_bapak'].'</td>
	</tr>			
	<tr>
		<td></td>
		<td>a. Ibu</td>
		<td>: '.$row['nama_ibu'].'</td>
	</tr>
	<tr>
		<td style="padding:10px;">11. </td>
		<td> Alamat Orang Tua</td>
		<td>: '.$row['alamat'].'</td>
	</tr>
	<tr>
		<td style="padding:10px;">12. </td>
		<td> Pekerjaan Orang Tua</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>a. Ayah</td>
		<td>: '.$row['pekerjaan_bapak'].'</td>
	</tr>			
	<tr>
		<td></td>
		<td>a. Ibu</td>
		<td>: '.$row['pekerjaan_ibu'].'</td>
	</tr>
	<tr>
		<td></td>
		<td align="center" style="padding-right:10px;"><br><br><img src="../../img_user/small_'.$row['img_pengguna'].'" width="85px"></td>
		<td><br><br><p>Susukan, '.date("d M Y").' </p>
				Kepala Sekolah
				<br><br><br><br>
				Winarti Peni Subekti, S.Pd <br>
				NIP.19650129 198903 2 003</td>
	</tr>
	</table>
		  
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div class="row"><div id="kiri">
		
			<table>
			<tr>
				<td width="100">Nama Sekolah</td>
				<td><u>SMP Negeri 3 Susukan</u></td>
			</tr>

			<tr>
				<td width="100">Nama</td>
				<td> <u>'.$row['nama_siswa'].'</u> </td>
			</tr>

			<tr>
				<td>NIS</td>
				<td> <u>'.$row['nis'].'</u> </td>
			</tr>
		</table>
		</div>
		<div id="kanan">
			<table>
			<tr>
				<td width="100">Kelas</td>
				<td> <u>'.$row['nama_kelas'].'</u> </td>
			</tr>

			<tr>
				<td>Semester</td>
				<td> <u>'.$row['smt'].'</u> </td>
			</tr>

			<tr>
				<td>Tahun Pelajaran</td>
				<td> <u>'.$row['tahun_ajar'].'</u> </td>
			</tr>
			</table>
		</div></div>
		<br><br>
		<center><b>CAPAIAN HASIL BELAJAR</b></center>
		<br>
		<b>A. Sikap <br></b>';
		$html .= ' 1.Sikap Sosial <br>
		<table class="table table-condensed" border="2px">
			<thead>
				<tr>
						<th width="100px">Predikat</th>
						<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>';

				$query2 = mysqli_query($connect, "SELECT * FROM sikap, siswa
					WHERE sikap.id_siswa = siswa.nis
					AND siswa.nis = '$_POST[tid]'");
					$no = 1;
				$data1 = mysqli_fetch_array($query2);
				$html .= '<tr>
					<td>'.$data1['nilai_sikap_sosial'].'</td>
					<td>'.$data1['desk_sikap_sosial'].'</td>
				</tr>
			</tbody>
		</table>';
		$html .= ' 2.Sikap Spiritual <br>
		<table class="table table-condensed" border="2px">
			<thead>
				<tr>
						<th width="100px">Predikat</th>
						<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>';

				$query2 = mysqli_query($connect, "SELECT * FROM sikap, siswa
					WHERE sikap.id_siswa = siswa.nis
					AND siswa.nis = '$_POST[tid]'");
					$no = 1;
				$data1 = mysqli_fetch_array($query2);
				$html .= '<tr>
					<td>'.$data1['nilai_sikap_spiritual'].'</td>
					<td>'.$data1['desk_sikap_spiritual'].'</td>
				</tr>
			</tbody>
		</table>';

		$html .= '<b>B. Pengetahuan dan Keterampilan <br></b>
		<table class="table table-condensed" border="2px">
			<thead>
				<tr>
						<th rowspan="2">No</th>
						<th rowspan="2">Nama Mata Pelajaran</th>
						<th rowspan="2">KKM</th>
						<th colspan="2" align="center">Pengetahuan</th>
						<th colspan="2" align="center">Keterampilan</th>
				</tr>
				<tr>
						<th>Angka</th>
						<th>Predikat</th>
						<th>Angka</th>
						<th>Predikat</th>
				</tr>

			</thead>
			<tbody>';

				$query2 = mysqli_query($connect, "SELECT * FROM siswa, nilai, kelas, mapel WHERE siswa.nis = nilai.id_siswa AND nilai.id_mapel = mapel.id_mapel and nilai.id_kelas = kelas.id_kelas and siswa.nis ='$_POST[tid]'");
					$no = 1;
				while ($data1 = mysqli_fetch_array($query2)) {
				$html .= '<tr>
					<td>'.$no.'</td>
					<td>'.$data1['nama_mapel'].'</td>
					<td>75</td>
					<td>'.$data1['nilai_pengetahuan'].'</td>
					<td>'.$data1['grade_peng'].'</td>
					<td>'.$data1['nilai_ketrampilan'].'</td>
					<td>'.$data1['grade_ket'].'</td>
				</tr>';
			$no++; }
			$html .= '</tbody>
		</table>';
		$html .= '
		<table class="table table-condensed" border="2px">
				<tr>
						<th rowspan="2">KKM</th>
						<th colspan="4" align="center">Predikat</th>
				</tr>
				<tr>
						<th>D = Kurang</th>
						<th>C = Cukup</th>
						<th>B = Baik</th>
						<th>A = Baik Sekali</th>
				</tr>
				<tr style="font-size:10">
					<td> 70 </td>
					<td> kurang dari 70 </td>
					<td> 70 kurang dari = C kurang dari = 79 </td>
					<td> 80 kurang dari = B kurang dari = 89 </td>
					<td> 90 kurang dari = A kurang dari = 100 </td>
				</tr>
		</table>
		<br><br>
		<div class="row"><div id="kiri">
		
			<table>
			<tr>
				<td width="100">Nama Sekolah</td>
				<td><u>SMP Negeri 3 Susukan</u></td>
			</tr>

			<tr>
				<td width="100">Nama</td>
				<td> <u>'.$row['nama_siswa'].'</u> </td>
			</tr>

			<tr>
				<td>NIS</td>
				<td> <u>'.$row['nis'].'</u> </td>
			</tr>
		</table>
		</div>
		<div id="kanan">
			<table>
			<tr>
				<td width="100">Kelas</td>
				<td> <u>'.$row['nama_kelas'].'</u> </td>
			</tr>

			<tr>
				<td>Semester</td>
				<td> <u>'.$row['smt'].'</u> </td>
			</tr>

			<tr>
				<td>Tahun Pelajaran</td>
				<td> <u>'.$row['tahun_ajar'].'</u> </td>
			</tr>
			</table>
		</div></div><br><br><br>';
		$html .= '<b>Deskripsi Pengetahuan dan Keterampilan <br></b>
		<table class="table table-condensed" border="2px">
			<thead>
				<tr>
						<th width="20px">No</th>
						<th width="150px">Mata Pelajaran</th>
						<th width="100px">Ranah</th>
						<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>';
				$query3 = mysqli_query($connect, "SELECT * FROM siswa, nilai, kelas, mapel WHERE siswa.nis = nilai.id_siswa AND nilai.id_mapel = mapel.id_mapel and nilai.id_kelas = kelas.id_kelas and siswa.nis ='$_POST[tid]'");
					$no = 1;
				while ($data2 = mysqli_fetch_array($query3)) {
				$html .= '
			<tr>
		        <td rowspan="2">'.$no.'</td>
				<td rowspan="2">'.$data2['nama_mapel'].'</td>
		        <td>Pengetahuan</td>
		        <td>'.$data2['desk_peng'].'</td>
	      	</tr>
	      	<tr>
		        <td>Keterampilan</td>
		        <td>'.$data2['desk_ket'].'</td>
	      	</tr> ';
			$no++; }
			$html .= '</tbody>
		</table>
		<div class="row"><div id="kiri">
		
			<table>
			<tr>
				<td width="100">Nama Sekolah</td>
				<td><u>SMP Negeri 3 Susukan</u></td>
			</tr>

			<tr>
				<td width="100">Nama</td>
				<td> <u>'.$row['nama_siswa'].'</u> </td>
			</tr>

			<tr>
				<td>NIS</td>
				<td> <u>'.$row['nis'].'</u> </td>
			</tr>
		</table>
		</div>
		<div id="kanan">
			<table>
			<tr>
				<td width="100">Kelas</td>
				<td> <u>'.$row['nama_kelas'].'</u> </td>
			</tr>

			<tr>
				<td>Semester</td>
				<td> <u>'.$row['smt'].'</u> </td>
			</tr>

			<tr>
				<td>Tahun Pelajaran</td>
				<td> <u>'.$row['tahun_ajar'].'</u> </td>
			</tr>
			</table>
		</div></div><br>';
		$html .= '<b>C. Ekstrakulikuler <br></b>
		<table class="table table-condensed" border="2px">
			<thead>
				<tr>
						<th>No</th>
						<th>Kegiatan Ekstrakulikuler</th>
						<th>Nilai</th>
						<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>';
				$query3 = mysqli_query($connect, "SELECT * FROM ekskul, siswa
					WHERE ekskul.id_siswa = siswa.nis
					AND siswa.nis = '$_POST[tid]'");
					$no = 1;
					if (mysqli_num_rows($query3) > 0) {
				while ($data2 = mysqli_fetch_array($query3)) {
				$html .= '<tr>
					<td>'.$no.'</td>
					<td>'.$data2['nama_ekskul'].'</td>
					<td>'.$data2['nilai_ekskul'].'</td>
					<td>'.$data2['desk_ekskul'].'</td>
				</tr>';
			}
		} else {
			$html .= '<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>';
		}
			$html .= '</tbody>
		</table>';
		$html .= '<b>D. Prestasi <br></b>
		<table class="table table-condensed" border="2px">
			<thead>
				<tr>
						<th>No</th>
						<th>Jenis Kegiatan</th>
						<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>';
				$query3 = mysqli_query($connect, "SELECT * FROM prestasi, siswa
					WHERE prestasi.id_siswa = siswa.nis
					AND siswa.nis = '$_POST[tid]'");
					$no = 1;
					if (mysqli_num_rows($query3) > 0) {
				while ($data2 = mysqli_fetch_array($query3)) {
				$html .= '<tr>
					<td>'.$no.'</td>
					<td>'.$data2['nama_prestasi'].'</td>
					<td>'.$data2['deskripsi'].'</td>
				</tr>';
			}
		}else {
			$html .= '<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>';
		}
			$html .= '</tbody>
		</table>';
		$html .= '<b>E. Ketidakhadiran <br></b>
		<table class="table table-condensed" border="2px">
			<tbody>';
				$query3 = mysqli_query($connect, "SELECT * FROM ketidakhadiran, siswa
					WHERE ketidakhadiran.id_siswa = siswa.nis
					AND siswa.nis = '$_POST[tid]'");
					$no = 1;
					if (mysqli_num_rows($query3) > 0) {
				while ($data2 = mysqli_fetch_array($query3)) {
				$html .= '<tr>
					<td width="300px">Sakit </td>
					<td>'.$data2['sakit'].'</td>
					</tr>
					<tr>
					<td width="300px">Izin </td>
					<td>'.$data2['izin'].'</td>
					</tr>
					<tr>
					<td width="300px">Tanpa Keterangan </td>
					<td>'.$data2['alfa'].'</td>
				</tr>';
			}
		}else {
			$html .= '<tr>
				<td width="300px">Sakit </td>
				<td> - kali</td>
			</tr>
			<tr>
				<td width="300px">Izin </td>
				<td> - kali</td>
			</tr>
			<tr>
				<td>Alfa </td>
				<td> - kali</td>
			</tr>';
		}
			$html .= '</tbody>
		</table><br><br><br><br><br><br>
		<div class="row"><div id="kiri">
		
			<table>
			<tr>
				<td width="100">Nama Sekolah</td>
				<td><u>SMP Negeri 3 Susukan</u></td>
			</tr>

			<tr>
				<td width="100">Nama</td>
				<td> <u>'.$row['nama_siswa'].'</u> </td>
			</tr>

			<tr>
				<td>NIS</td>
				<td> <u>'.$row['nis'].'</u> </td>
			</tr>
		</table>
		</div>
		<div id="kanan">
			<table>
			<tr>
				<td width="100">Kelas</td>
				<td> <u>'.$row['nama_kelas'].'</u> </td>
			</tr>

			<tr>
				<td>Semester</td>
				<td> <u>'.$row['smt'].'</u> </td>
			</tr>

			<tr>
				<td>Tahun Pelajaran</td>
				<td> <u>'.$row['tahun_ajar'].'</u> </td>
			</tr>
			</table>
		</div></div><br><br>';
		$html .= '<b>F. Catatan wali kelas <br></b>
		<div class="garis_tepi1"></div><br>';
		$html .= '<b>G. Tanggapan orang tua/wali <br></b>
		<div class="garis_tepi1"></div><br>';
		$html .= '<b>Keterangan kenaikan kelas <br></b>
		<div class="garis_tepi1">
		<p style="padding : 15px" align = "center">keterampilan kenaikan kelas : Naik/Tidak Naik Kelas *)</p>
		</div><br>';
		$html .='		<div class="row">
		  <div class="column" >
				<br><br>
				<p>Orang Tua/Wali</p><br><br><br><br>
				<p><hr class="style" width="50px" align="left" style="padding-right:100px	"></p>

		  </div>
		  <div class="column">
		    <br><br><br><br><br><br><br><br><br>
				Mengetahui,<br>
				Kepala Sekolah
				<br><br><br><br>
				Winarti Peni Subekti, S.Pd <br>
				NIP.19650129 198903 2 003
		  </div>
		  <div class="column">
		    <p>Susukan, '.date("d M Y").' </p>
		    <p>Wali Kelas</p><br><br><br>
			'.$row['nama_guru'].'
			<p>NIP.'.$row['wali_kelas'].'</p>


		  </div>
		</div>
		';

$dompdf->loadHtml($html);


/* Render the HTML as PDF */

$dompdf->render();


/* Output the generated PDF to Browser */

$dompdf->stream();

?>
