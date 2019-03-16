<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";


			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/

			$id = $_POST['tid'];
			$guru = antiinjection($_POST['guru']);
			$mapel = antiinjection($_POST['mapel']);
			$kelas = antiinjection($_POST['kelas']);
			$tahun = antiinjection($_POST['tahun']);
			$smt = antiinjection($_POST['smt']);

			mysqli_query($connect, "UPDATE `kelas_guru` SET `id_guru`='$guru',`id_mapel`='$mapel',`id_kelas`='$kelas',`tahun_ajar`='$tahun',`semester`='$smt' WHERE id_kelas_guru = '$id'");
								 echo "<script>alert('Data mapel sudah terupdate.');</script>";
								 echo "<meta http-equiv='refresh' content='0;url=?page=detailKl&tid=$kelas'>";


?>
