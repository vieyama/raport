<?php 
	$connect = mysqli_connect("localhost", "root", "", "raport");

	$query1 = mysqli_query($connect, "SELECT * FROM nilai, guru, siswa, kelas, semester, tahun_ajar WHERE nilai.id_guru = guru.nik AND nilai.id_siswa = siswa.nis AND nilai.id_kelas = kelas.id_kelas AND nilai.id_smt = semester.id_smt AND kelas.id_tahun = tahun_ajar.id_tahun AND siswa.nis = '9967596641'");
	$row = mysqli_fetch_array($query1);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="row">
		<div class="col-md-12">
			<br><br><h3 style="text-align: center;">RAPOR <br>SEKOLAH MENENGAH PERTAMA (SMP)</h3><br><br><br>
			<center><img src="../../img_user/logo_smp.png" width="250px" ></center>
			<br><br><br><br>
			<p align="center"><b>Nama Peserta Didik</b></p>
			<p align="center"><b>Nama Peserta Didik</b><br><i style="border-style: solid; text-align: center;">&nbsp;&nbsp;Yovie Fesya Pratama&nbsp;&nbsp;</i></p>
			<p align="center"><b>NIS/NISN</b></p>
			<center><p style="border-style: solid; width: 300px; text-align: center;"><?= $row['nis']?></p></center>
			<br><br><br><br>
			<h4 style="text-align: center;">PEMERINTAH DAERAH KABUPATEN PEMALANG <br>DINAS PENDIDIKAN, PEMUDA DAN OLAHRAGA <p style="font-size:25px;">SMA NEGERI 1 RANDUDONGKAL</p><p style="font-size:15px;">Alamat: Jl. Lapangan Olahraga Randudongkal. Telp.(0284) 584148</p></h4><br><br><br><br>
		</div>
</div>
<div class="row">
	<div class="col-sm-6" style="background-color:lavender; padding-left: 200px">
		<table>
			<tr>
				<td width="100">Nama Sekolah</td>
				<td><u>SMP Negeri 3 Susukan</u></td>
			</tr>

			<tr>
				<td width="100">Nama</td>
				<td> <u><?= $row['nama_siswa']?></u> </td>
			</tr>

			<tr>
				<td>NIS</td>
				<td> <u><?= $row['nis']?></u> </td>
			</tr>
		</table>
	</div>
	<div class="col-sm-6" style="background-color:lavender; padding-left: 200px">
		<table>
			<tr>
				<td width="150">Kelas</td>
				<td><u><?= $row['nama_kelas']?></u></td>
			</tr>

			<tr>
				<td width="100">Semester</td>
				<td> <u><?= $row['smt']?></u> </td>
			</tr>

			<tr>
				<td >Tahun Pelajaran</td>
				<td> <u><?= $row['tahun_ajar']?></u> </td>
			</tr>
		</table>
	</div>
	<div class="col-md-12" style="background-color:lavender;"><h4 align="center">CAPAIAN BELAJAR SISWA</h4>
	<p style="padding-left: 180px; padding-top: 50px"><b>A. Sikap</b></p>
	<div class="col-md-12" style="background-color:lavender; padding-left: 200px">
		<table width="700px">
		<tr>
			<td>Nama Sekolah</td>
			<td>SMP Negeri 3 Susukan</td>
		</tr>
	</table>
	</div>
</div>
</body>
</html>