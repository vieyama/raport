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
		
		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
	</head>
	<body>
		<!-- Membuat Menu Header / Navbar -->
<!-- 		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="color: white;"><b>Import Data Excel dengan PHP</b></a>
				</div>
				<p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
					FOLLOW US ON &nbsp;
					<a target="_blank" style="background: #3b5998; padding: 0 5px; border-radius: 4px; color: #f7f7f7; text-decoration: none;" href="https://www.facebook.com/mynotescode">Facebook</a> 
					<a target="_blank" style="background: #00aced; padding: 0 5px; border-radius: 4px; color: #ffffff; text-decoration: none;" href="https://twitter.com/code_notes">Twitter</a> 
					<a target="_blank" style="background: #d34836; padding: 0 5px; border-radius: 4px; color: #ffffff; text-decoration: none;" href="https://plus.google.com/118319575543333993544">Google+</a>
				</p>
			</div>
		</nav>
 -->		
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<button class="btn btn-danger pull-right" onclick="self.history.back()">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</button>
			
			<h3>Form Import Data</h3>
			<hr>
			
			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="Format.xlsx" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>
				
				<!-- 
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left">
				
				<button type="submit" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> Preview
				</button>
			</form>
			
			<hr>
			
			<!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';
				
				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
				
				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];
				
				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
					
					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';
					
					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
					
					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import.php'>";
					
					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";
					
					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='5' class='text-center'>Preview Data</th>
					</tr>
					<tr>
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
					</tr>";
					
					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
						$nip = $row['A']; // Ambil data NIS
						$mapel = $row['B']; // Ambil data nama
						$nis = $row['C']; // Ambil data jenis kelamin
						$kelas = $row['D']; // Ambil data telepon
						$smt = $row['E']; // Ambil data alamat
						$harian = $row['F']; // Ambil data alamat
						$uts = $row['G']; // Ambil data alamat
						$uas = $row['H']; // Ambil data alamat
						$peng = $row['I']; // Ambil data alamat
						$grade_peng = $row['J']; // Ambil data alamat
						$ket_peng = $row['K']; // Ambil data alamat
						$ket = $row['L']; // Ambil data alamat
						$grade_ket = $row['M']; // Ambil data alamat
						$desk_ket = $row['N']; // Ambil data alamat
						
						// Cek jika semua data tidak diisi
						if(empty($nip) && empty($mapel) && empty($nis) && empty($kelas) && empty($smt) && empty($harian) && empty($uts) && empty($uas) && empty($peng) && empty($grade_peng) && empty($ket_peng) && empty($ket) && empty($grade_ket) && empty($desk_ket))
							continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
						
						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
							$nip_td = ( ! empty($nip))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$mapel_td = ( ! empty($mapel))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							$nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							$kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
							$smt_td = ( ! empty($smt))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$harian_td = ( ! empty($harian))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$uts_td = ( ! empty($uts))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$uas_td = ( ! empty($uas))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$peng_td = ( ! empty($peng))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$grade_peng_td = ( ! empty($grade_peng))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$ket_peng_td = ( ! empty($ket_peng))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$ket_td = ( ! empty($ket))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$grade_ket_td = ( ! empty($grade_ket))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							$desk_ket_td = ( ! empty($desk_ket))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
							
							// Jika salah satu data ada yang kosong
							if(empty($nip) or empty($mapel) or empty($nis) or empty($kelas) or empty($smt) or empty($harian) or empty($uts) or empty($uas) or empty($peng) or empty($grade_peng) or empty($ket_peng) or empty($ket) or empty($grade_ket) or empty($desk_ket)){
								$kosong++; // Tambah 1 variabel $kosong
							}
							
							echo "<tr>";
							echo "<td".$nip_td.">".$nip."</td>";
							echo "<td".$mapel_td.">".$mapel."</td>";
							echo "<td".$nis_td.">".$nis."</td>";
							echo "<td".$kelas_td.">".$kelas."</td>";
							echo "<td".$smt_td.">".$smt."</td>";
							echo "<td".$harian_td.">".$harian."</td>";
							echo "<td".$uts_td.">".$uts."</td>";
							echo "<td".$uas_td.">".$uas."</td>";
							echo "<td".$peng_td.">".$peng."</td>";
							echo "<td".$grade_peng_td.">".$grade_peng."</td>";
							echo "<td".$ket_peng_td.">".$ket_peng."</td>";
							echo "<td".$ket_td.">".$ket."</td>";
							echo "<td".$grade_ket_td.">".$grade_ket."</td>";
							echo "<td".$desk_ket_td.">".$desk_ket."</td>";
							echo "</tr>";
						}
						
						$numrow++; // Tambah 1 setiap kali looping
					}
					
					echo "</table>";
					
					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					if($kosong > 1){
					?>	
						<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');
							
							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";
						
						// Buat sebuah tombol untuk mengimport data ke database
						echo "<input type='hidden' name='tid' value='$_GET[tid]'>
						<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
					}
					
					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
		</div>
	</body>
</html>

