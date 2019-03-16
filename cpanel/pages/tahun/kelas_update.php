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
			$nama = antiinjection($_POST['kelas']);
			$wali = antiinjection($_POST['wali_kelas']);
			$tahun = antiinjection($_POST['tahun_ajar']);

			mysqli_query($connect, "UPDATE kelas
									set
									nama_kelas = '$nama',
									id_tahun = '$tahun',
									wali_kelas = '$wali'
									WHERE id_kelas = '$no'");
								 echo "<script>alert('Data Surat Keluar sudah terupdate.');</script>";
								 echo "<meta http-equiv='refresh' content='0;url=?page=vwKl'>";


?>
