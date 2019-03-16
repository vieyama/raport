<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
		$id = $_GET['tid'];
		$s = mysqli_query($connect, "SELECT * FROM kelas_guru WHERE id_kelas_guru = '$id'");
		$r = mysqli_fetch_array($s);
		$kelas = $r['id_kelas'];


    	mysqli_query($connect, "DELETE FROM kelas_guru WHERE id_kelas_guru = '$id'");
    	echo "<script>alert('Data mapel sudah terhapus.');</script>";
    	echo "<meta http-equiv='refresh' content='0;url=?page=detailKl&tid=$kelas'>";

?>
