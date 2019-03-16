
<?php
	include "../conf/koneksi.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.php";

		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

		$mapel = antiinjection($_POST['mapel']);
		$kode = antiinjection($_POST['kode']);
		$desk = antiinjection($_POST['desk']);
	/*--------------------------------------------------------------------------------------*/
		mysqli_query($connect, "UPDATE `mapel` SET
			`nama_mapel`='$mapel',
			`kode_mapel`='$kode',
			`desk`='$desk'
		WHERE `id_mapel` = '$_POST[tid]'");
    echo "<script>alert('Data mapel sudah di update.');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?page=vwMp'>";
?>
