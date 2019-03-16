<?php 
$conn = mysqli_connect('localhost','root','','rapot');
$ex = mysqli_query($conn, "SELECT * FROM kelas_guru WHERE id_kelas = '$_GET[tid]'");
$x = mysqli_fetch_array($ex);
$mapel = $x['id_mapel'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1" width="100%">
	<tr>
		<th>ID Nilai</th>
		<th>NIP</th>
		<th>Mapel</th>
		<th>NIS</th>
		<th>Kelas</th>
		<th>Semester</th>
		<th>Nilai Harian</th>
		<th>Nilai UTS</th>
		<th>Nilai UAS</th>
		<th>Nilai Pengetahuan</th>
		<th>Grade Pengetahuan</th>
		<th>Desk Pengetahuan</th>
		<th>Nilai Keterampilan</th>
		<th>Grade Keterampilan</th>
		<th>Desk Keterampilan</th>

	</tr>
	<?php
		
		$no = 1;
		$sql = mysqli_query($conn, "SELECT * FROM siswa, kelas, kelas_guru WHERE siswa.kelas = kelas.id_kelas AND kelas_guru.id_kelas = kelas.id_kelas AND kelas_guru.id_mapel = '$mapel' AND kelas_guru.id_kelas = '$_GET[tid]'");
		while($data = mysqli_fetch_array($sql)) {
	?>
	<tr>
		<td><?= $no; ?></td>
		<td>'<?= $data['id_guru']; ?></td>
		<td><?= $data['id_mapel']; ?></td>
		<td>'<?= $data['nis']; ?></td>
		<td><?= $data['id_kelas']; ?></td>
		<td><?= $data['semester']; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php $no++; } ?>
</table>
</body>
</html>