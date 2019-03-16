<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";


			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/
			// baca current date

			$nama = antiinjection($_POST['kelas']);
			$wali = antiinjection($_POST['wali_kelas']);
			$tahun = antiinjection($_POST['tahun_ajar']);

			$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM kelas WHERE nama_kelas='$_POST[kelas]'"));
				if ($cek_user > 0) {
				        echo "<script>alert('kelas sudah ada!');</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=vwKl'>";
			} else {

				mysqli_query($connect, "INSERT INTO kelas
									(nama_kelas,id_tahun,wali_kelas) VALUES ('$nama','$tahun','$wali')");
								echo "<script>alert('Data kelas sudah tersimpan.');</script>";
								echo "<meta http-equiv='refresh' content='0;url=?page=vwKl'>";
			}

?>
