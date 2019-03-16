
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
				$mapel = antiinjection($_POST['mapel']);
        $kelas = antiinjection($_POST['kelas']);
        $siswa = antiinjection($_POST['siswa']);

        // sikap
				$sikap_spiritual = antiinjection($_POST['sikap_spiritual']);
				$desk_sikap_spiritual = antiinjection($_POST['desk_sikap_spiritual']);
				$sikap_sosial = antiinjection($_POST['sikap_sosial']);
				$desk_sikap_sosial = antiinjection($_POST['desk_sikap_sosial']);


        // insert untuk sikap
        $cek = mysqli_query($connect, "SELECT * FROM sikap WHERE id_siswa = '$siswa'");
        if (mysqli_num_rows($cek)>0) {
          echo "<script>alert('Data Sudah Ada!');</script>";
          echo "<meta http-equiv='refresh' content='0;url=?page=adRp&tid=$guru'>";
        }else{
        mysqli_query($connect, "INSERT INTO `sikap`(
          `nilai_sikap_sosial`,
          `desk_sikap_sosial`,
          `nilai_sikap_spiritual`,
          `desk_sikap_spiritual`,
          `id_siswa`,
          `id_guru`,
          `id_kelas`) VALUES (
            '$sikap_sosial',
            '$desk_sikap_sosial',
            '$sikap_spiritual',
            '$desk_sikap_spiritual',
            '$siswa',
            '$guru',
            '$kelas')");

            echo "<script>alert('Data Rapot sudah tersimpan.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";

          }

?>
