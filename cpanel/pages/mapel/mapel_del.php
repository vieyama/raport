<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	$data=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM mapel WHERE id_mapel = '$_GET[tid]'"));

    	mysqli_query($connect, "DELETE FROM mapel WHERE id_mapel = '$_GET[tid]'");

	echo "<script>alert('Data mapel sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwMp'>";
?>
