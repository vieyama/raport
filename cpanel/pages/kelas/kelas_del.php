<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

    	mysqli_query($connect, "DELETE FROM kelas WHERE id_kelas = '$_GET[tid]'");
    	echo "<script>alert('Data pengguna sudah terhapus.');</script>";
    	echo "<meta http-equiv='refresh' content='0;url=?page=vwKl'>";

?>
