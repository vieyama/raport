
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$no = antiinjection($_POST['nis']);
				$nama = antiinjection($_POST['nama_pengguna']);
				$username = antiinjection($_POST['username']);
				$pass = antiinjection($_POST['password']);
				$hak = antiinjection($_POST['hak']);


				$salt ='indikost';
				$hash = md5($salt . $pass);

				$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM admin WHERE id_admin='$_POST[nis]'"));
					if ($cek_user > 0) {
					        echo "<script>alert('Id admin sudah ada!');</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=adUs'>";

					}else {
				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "INSERT INTO pengguna(idu,nama,username,password,pass_asli,hak_akses) VALUES ('$no','$nama','$username','$hash','$pass','$hak')");
				mysqli_query($connect, "INSERT INTO admin(id_admin,nama_admin,idu) VALUES ('$no','$nama','$no')");

							echo "<script>alert('Data pengguna sudah tersimpan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=vwUs'>";
				}
?>
