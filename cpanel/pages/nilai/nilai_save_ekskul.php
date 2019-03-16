
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
				$nama = antiinjection($_POST['nama_ekskul'.$i]);
				$nilai = antiinjection($_POST['nilai_ekskul'.$i]);
				$desk = antiinjection($_POST['desk_ekskul'.$i]);


        // insert untuk sikap
        mysqli_query($connect, "INSERT INTO `ekskul`(
          `nama_ekskul`,
          `nilai_ekskul`,
          `desk_ekskul`,
          `id_siswa`,
          `id_kelas`,
					`id_guru`) VALUES (
            '$nama',
            '$nilai',
            '$desk',
            '$siswa',
            '$kelas',
            '$guru')");

            echo "<script>alert('Data Rapot sudah tersimpan.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=detailKlWl&tid=$guru'>";
					
          }

?>
