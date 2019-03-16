<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";


			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/

			$no = antiinjection($_POST['tid']);
			$jenis = antiinjection($_POST['jenis']);
			$nama = antiinjection($_POST['kelas']);
			$wali = antiinjection($_POST['wali_kelas']);
			$tahun = antiinjection($_POST['tahun_ajar']);
			$publish = "Tidak";

			mysqli_query($connect, "UPDATE `kelas` SET `nama_kelas`='$nama',`jenis`='$jenis',`id_tahun`='$tahun',`wali_kelas`='$wali',`publish`='$publish' WHERE `id_kelas` = '$no'");
								 echo "<script>alert('Data kelas sudah terupdate.');</script>";
								 echo "<meta http-equiv='refresh' content='0;url=?page=vwKl'>";


?>
