
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				for($i=0;$i<$_POST['jumlah'];$i++){
				$guru = antiinjection($_POST['guru']);
        $kelas = antiinjection($_POST['kelas']);
        $siswa = antiinjection($_POST['siswa']);

        // ekskul
				$nama = antiinjection($_POST['nama_prestasi'.$i]);
				$desk = antiinjection($_POST['desk'.$i]);


        // insert untuk sikap
        mysqli_query($connect, "INSERT INTO `prestasi`(
          `nama_prestasi`,
          `deskripsi`,
          `id_siswa`,
          `id_kelas`,
					`id_guru`) VALUES (
            '$nama',
            '$desk',
            '$siswa',
            '$kelas',
            '$guru')");

            echo "<script>alert('Data Rapot sudah tersimpan.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";

          }

?>
