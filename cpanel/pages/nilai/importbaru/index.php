<!--
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/code_notes
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Excel dengan PHP</title>


		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
	</head>
	<body>
		
		
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- 
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
			<?php $id =  $_GET['tid']; ?>

			<a href="../../../media.php?page=detailKlGr&tid=<?= $id; ?>" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Kembali
			</a>
			<a href="form.php" class="btn btn-warning pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data

			</a>
			
			<h3>Data Hasil Import</h3>
			
			<hr>
	
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Mapel</th>
						<th>Siswa</th>
						<th>Kelas</th>
						<th>Semester</th>
						<th>Harian</th>
						<th>UTS</th>
						<th>UAS</th>
						<th>Nilai Pengetahuan</th>
						<th>Grade Pengetahuan</th>
						<th>Desk Pengetahuan</th>
						<th>Nilai Keterampilan</th>
						<th>Grade Keterampilan</th>
						<th>Desk Keterampilan</th>
					</tr>
					<?php
					// Load file koneksi.php
					include "koneksi.php";
					
					// Buat query untuk menampilkan semua data siswa
					$sql = $pdo->prepare("SELECT * FROM nilai");
					$sql->execute(); // Eksekusi querynya
					
					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['id_guru']."</td>";
						echo "<td>".$data['id_mapel']."</td>";
						echo "<td>".$data['id_siswa']."</td>";
						echo "<td>".$data['id_kelas']."</td>";
						echo "<td>".$data['id_smt']."</td>";
						echo "<td>".$data['nilai_harian']."</td>";
						echo "<td>".$data['nilai_uts']."</td>";
						echo "<td>".$data['nilai_uas']."</td>";
						echo "<td>".$data['nilai_pengetahuan']."</td>";
						echo "<td>".$data['grade_peng']."</td>";
						echo "<td>".$data['desk_peng']."</td>";
						echo "<td>".$data['nilai_ketrampilan']."</td>";
						echo "<td>".$data['grade_ket']."</td>";
						echo "<td>".$data['desk_ket']."</td>";
						echo "</tr>";
						
						$no++; // Tambah 1 setiap kali looping
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
