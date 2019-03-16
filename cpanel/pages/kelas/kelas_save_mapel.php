
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}
				$id = $_POST['tid'];
				$guru = antiinjection($_POST['guru']);
				$mapel = antiinjection($_POST['mapel']);
        		$kelas = antiinjection($_POST['kelas']);
				$tahun = antiinjection($_POST['tahun']);
       			$smt = antiinjection($_POST['smt']);

       			$cek_guru=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM kelas_guru WHERE id_guru='$_POST[guru]'"));
       			$cek_mapel=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM kelas_guru WHERE id_mapel='$_POST[mapel]'"));
				if ($cek_guru > 0) {
				        echo "<script>alert('guru sudah ada!');</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=adKlsv&tid=$id'>";
				}else if ($cek_mapel > 0) {
						echo "<script>alert('mapel sudah ada!');</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=adKlsv&tid=$id'>";

				}else{
				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "INSERT INTO kelas_guru(id_guru, id_mapel, id_kelas, tahun_ajar, semester) VALUES ('$guru','$mapel','$kelas','$tahun','$smt')");

							echo "<script>alert('Data Mata Pelajaran sudah tersimpan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=detailKl&tid=$id'>";

				}
?>
