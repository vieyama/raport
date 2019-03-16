<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	$data=mysqli_fetch_array(mysqli_query($connect, "SELECT img_pengguna FROM pengguna WHERE idu = '$_GET[tid]'"));
  	if ($data['img_pengguna']!=''){
			mysqli_query($connect, "DELETE FROM pengguna WHERE idu = '$_GET[tid]'");
			mysqli_query($connect, "DELETE FROM siswa WHERE idu = '$_GET[tid]'");
     	unlink("../cpanel/img_user/$data[img_pengguna]");
     	unlink("../cpanel/img_user/small_$data[img_pengguna]");
	}else{
mysqli_query($connect, "DELETE FROM pengguna WHERE idu = '$_GET[tid]'");

  	}

	echo "<script>alert('Data pengguna sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwSs'>";
?>
