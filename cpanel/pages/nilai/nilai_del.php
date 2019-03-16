<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	$data=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM nilai WHERE id_nilai = '$_GET[tid]'"));
	$kelas = $data['id_kelas'];
	
    	mysqli_query($connect, "DELETE FROM nilai WHERE id_nilai = '$_GET[tid]'");

	echo "<script>alert('Data nilai sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=detailKlGr&tid=$kelas''>";
?>
