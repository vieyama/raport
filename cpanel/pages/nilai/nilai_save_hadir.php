
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
        $kelas = antiinjection($_POST['kelas']);
        $siswa = antiinjection($_POST['siswa']);

        // sikap
				$sakit = antiinjection($_POST['sakit']);
				$izin = antiinjection($_POST['izin']);
				$alfa = antiinjection($_POST['alfa']);

        // insert untuk sikap
        $cek = mysqli_query($connect, "SELECT * FROM ketidakhadiran WHERE id_siswa = '$siswa'");
        if (mysqli_num_rows($cek)>0) {
          echo "<script>alert('Data Sudah Ada!');</script>";
          echo "<meta http-equiv='refresh' content='0;url=?page=adHr&tid=$guru'>";
        }else{
        mysqli_query($connect, "INSERT INTO `ketidakhadiran`(
          `sakit`,
          `izin`,
          `alfa`,
          `id_siswa`,
          `id_guru`,
          `id_kelas`) VALUES (
            '$sakit',
            '$izin',
            '$alfa',
            '$siswa',
            '$guru',
            '$kelas')");

            echo "<script>alert('Data Rapot sudah tersimpan.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";

          }

?>
