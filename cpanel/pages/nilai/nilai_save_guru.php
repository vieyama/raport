
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
				$smt = antiinjection($_POST['semester']);
				$mapel = antiinjection($_POST['mapel']);
        $kelas = antiinjection($_POST['kelas']);
        $siswa = antiinjection($_POST['siswa']);
        $harian = antiinjection($_POST['harian']);
        $uts = antiinjection($_POST['uts']);
        $uas = antiinjection($_POST['uas']);
        $ketrampilan = antiinjection($_POST['keterampilan']);
				$desk_peng = antiinjection($_POST['desk_peng']);
				$desk_ket = antiinjection($_POST['desk_ket']);

				$nilaipengetahuan = ((2*$harian)+(1*$uts)+(1*$uas))/4;

				if ($nilaipengetahuan >= 0 && $nilaipengetahuan <= 69) {
				     $grade_peng = "D";
				} else if ($nilaipengetahuan >= 70 && $nilaipengetahuan <= 79) {
				     $grade_peng = "C";
				} else if ($nilaipengetahuan >= 80 && $nilaipengetahuan <= 89) {
				     $grade_peng = "B";
				} else if ($nilaipengetahuan >= 90 && $nilaipengetahuan <= 100) {
				     $grade_peng = "A";
				} else {

				}


				if ($ketrampilan >= 0 && $ketrampilan <= 69) {
				     $grade_ket = "D";
				} else if ($ketrampilan >= 70 && $ketrampilan <= 79) {
				     $grade_ket = "C";
				} else if ($ketrampilan >= 80 && $ketrampilan <= 89) {
				     $grade_ket = "B";
				} else if ($ketrampilan >= 90 && $ketrampilan <= 100) {
				     $grade_ket = "A";
				} else {

				}


				// /*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "INSERT INTO `nilai`
          ( 			`id_guru`,
						`id_mapel`,
						`id_siswa`,
						`id_kelas`,
						`id_smt`,
						`nilai_harian`,
						`nilai_uts`,
						`nilai_uas`,
						`nilai_pengetahuan`,
						`grade_peng`,
						`desk_peng`,
						`nilai_ketrampilan`,
						`grade_ket`,
						`desk_ket`) VALUES
            ('$guru',
            '$mapel',
            '$siswa',
						'$kelas',
            '$smt',
            '$harian',
            '$uts',
            '$uas',
						'$nilaipengetahuan',
						'$grade_peng',
						'$desk_peng',
            '$ketrampilan',
						'$grade_ket',
						'$desk_ket')");

							echo "<script>alert('Data Mata Pelajaran sudah tersimpan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=detailKlGr&tid=$id'>";
?>
