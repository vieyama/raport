
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$nama = antiinjection($_POST['mapel']);
				$kode = antiinjection($_POST['kode']);
				$desk = antiinjection($_POST['desk']);
				$desk = antiinjection($_POST['smt']);

				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "INSERT INTO mapel(nama_mapel, kode_mapel, desk) VALUES ('$nama','$kode','$desk')");

							echo "<script>alert('Data Mata Pelajaran sudah tersimpan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=vwMp'>";
?>
