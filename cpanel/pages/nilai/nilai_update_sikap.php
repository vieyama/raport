
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
		$nilai = antiinjection($_POST['id_sikap']);
		$kelas = antiinjection($_POST['kelas']);
		$siswa = antiinjection($_POST['siswa']);

		$sikap_spiritual = antiinjection($_POST['spiritual']);
		$desk_sikap_spiritual = antiinjection($_POST['desk_spiritual']);
		$sikap_sosial = antiinjection($_POST['sosial']);
		$desk_sikap_sosial = antiinjection($_POST['desk_sosial']);

				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "UPDATE `sikap` SET
						`nilai_sikap_sosial`= '$sikap_sosial',
						`desk_sikap_sosial`= '$desk_sikap_sosial',
						`nilai_sikap_spiritual`= '$sikap_spiritual',
						`desk_sikap_spiritual`= '$desk_sikap_spiritual',
						`id_siswa`= '$siswa',
						`id_guru`= '$guru',
						`id_kelas`= '$kelas' WHERE
						`id_sikap` = '$nilai'");
		echo "<script>alert('Data Rapot telah terubah.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";
?>
