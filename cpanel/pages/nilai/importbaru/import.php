<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/code_notes
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';
	
	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO nilai VALUES(:id,:nip,:mapel,:nis,:kelas,:smt,:harian,:uts,:uas,:peng,:grade_peng,:ket_peng,:ket,:grade_ket,:desk_ket)");

	
	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id = $row[NULL]; // Ambil data NIS
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
			// Proses simpan ke Database
			$sql->bindParam(':id', $id);
			$sql->bindParam(':nip', $nip);
			$sql->bindParam(':mapel', $mapel);
			$sql->bindParam(':nis', $nis);
			$sql->bindParam(':kelas', $kelas);
			$sql->bindParam(':smt', $smt);
			$sql->bindParam(':harian', $harian);
			$sql->bindParam(':uts', $uts);
			$sql->bindParam(':uas', $uas);
			$sql->bindParam(':peng', $peng);
			$sql->bindParam(':grade_peng', $grade_peng);
			$sql->bindParam(':ket_peng', $ket_peng);
			$sql->bindParam(':ket', $ket);
			$sql->bindParam(':grade_ket', $grade_ket);
			$sql->bindParam(':desk_ket', $desk_ket);
			$sql->execute(); // Eksekusi query insert
		}
		
		$numrow++; // Tambah 1 setiap kali looping
	}
}
$tid = $_POST['tid'];
header('location: index.php?tid='.$tid); // Redirect ke halaman awal
?>
