
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

		$guru = antiinjection($_POST['guru']);
		$ekskul = antiinjection($_POST['id_ekskul']);
		$kelas = antiinjection($_POST['kelas']);
		$siswa = antiinjection($_POST['siswa']);

		$nama = antiinjection($_POST['nama']);
		$nilai = antiinjection($_POST['nilai']);
		$desk = antiinjection($_POST['desk']);

				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "UPDATE `ekskul` SET
						`nama_ekskul`= '$nama',
						`nilai_ekskul`= '$nilai',
						`desk_ekskul`= '$desk',
						`id_siswa`= '$siswa',
						`id_guru`= '$guru',
						`id_kelas`= '$kelas' WHERE
						`id_ekskul` = '$ekskul'");
		echo "<script>alert('Data Rapot telah terubah.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";
?>
