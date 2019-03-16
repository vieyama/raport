<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	$data=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM sikap WHERE id_sikap = '$_GET[tid]'"));
	$guru = $data['id_guru'];

    	mysqli_query($connect, "DELETE FROM sikap WHERE id_sikap = '$_GET[tid]'");

	echo "<script>alert('Data nilai sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru''>";
?>
