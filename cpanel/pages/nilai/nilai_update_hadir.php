
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}


		$ekskul = antiinjection($_POST['id_hadir']);
		$guru = antiinjection($_POST['guru']);
		$kelas = antiinjection($_POST['kelas']);
		$siswa = antiinjection($_POST['siswa']);

		// sikap
		$sakit = antiinjection($_POST['sakit']);
		$izin = antiinjection($_POST['izin']);
		$alfa = antiinjection($_POST['alfa']);

				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "UPDATE `ketidakhadiran` SET
						`sakit`= '$sakit',
						`izin`= '$izin',
						`alfa`= '$alfa',
						`id_siswa`= '$siswa',
						`id_guru`= '$guru',
						`id_kelas`= '$kelas' WHERE
						`id_hadir` = '$ekskul'");
		echo "<script>alert('Data Rapot telah terubah.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";
?>
