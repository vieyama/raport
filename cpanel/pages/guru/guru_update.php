
<?php
	include "../conf/koneksi.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.php";

	/*--------------- script cegah upload file shell.php via *.jpg -------------*/
	if(isset($_FILES['fupload'])){
		$errors = array();
	/*--------------------------------------------------------------------------*/

		$lokasi_file = $_FILES['fupload']['tmp_name'];
		$tipe_file = $_FILES['fupload']['type'];
		$nama_file = $_FILES['fupload']['name'];

		/*--------------- script cegah upload file shell.php via *.jpg --------------
		setiap file gambar atau foto memiliki size.
		deklarasi var untuk size gambar/foto.
		----------------------------------------------------------------------------*/
		$file_size      = $_FILES['fupload']['size'];
		/*--------------------------------------------------------------------------*/

		$acak           = rand(1,999999);
		$nama_file_unik = "Guru-".$acak.$nama_file;

		/*--------------- script cegah upload file shell.php via *.jpg --------------
		explode tipe file dari sebuah file name utuh.
		biasanya file shell.php direname menjadi shell.php.jpg.
		file shell.php.jpg tsb akan di bypass dgn berbagai macam cara untuk
		dapat masuk sebagai file shell.php.
		ekstensi *.php ini akan di filter dgn perintah dibawah ini sehingga
		tidak dapat masuk.
		----------------------------------------------------------------------------*/
		$arr = explode('.',$nama_file);
		$file_ext=strtolower(end($arr));
		/*--------------------------------------------------------------------------*/

		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

		$no_induk = antiinjection($_POST['no_induk']);
		$nama = antiinjection($_POST['nama']);
		$email = antiinjection($_POST['email']);
		$username = antiinjection($_POST['username']);
		$pass = antiinjection($_POST['password']);
		$tempat_lahir = antiinjection($_POST['tempat_lahir']);
		$tgl_lahir = antiinjection($_POST['tgl_lahir']);
		$jk = antiinjection($_POST['jk']);
		$agama = antiinjection($_POST['agama']);
		$alamat = antiinjection($_POST['alamat']);
		$notelp = antiinjection($_POST['no_telp']);
		$hak = antiinjection($_POST['hak']);

		$salt ='indikost';
		$hash = md5($salt . $pass);
		/*--------------------------------------------------------------------------------------*/
    $sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]' AND idu = '$no_induk'");
    $r = mysqli_fetch_array($sql);
    if($_SESSION['username'] AND $r['hak_akses']=='guru'){

		if (empty($lokasi_file)){

				/*-- jika gambar pengguna tidak diganti --*/
				mysqli_query($connect, "UPDATE `pengguna` SET
										`idu`='$no_induk',
										`nama`='$nama',
										`email`='$email',
										`username`='$username',
										`password`='$hash',
										`hak_akses`='$hak'
									WHERE idu = '$_POST[no_induk]'");

									/*-- jika gambar pengguna tidak diganti --*/
									mysqli_query($connect, "UPDATE `guru` SET
															`nik`='$no_induk',
															`nama_guru`='$nama',
															`tempat_lahir`='$tempat_lahir',
															`tgl_lahir`='$tgl_lahir',
															`jenis_kelamin`='$jk',
															`agama`='$agama',
															`alamat`='$alamat',
															`no_telp`='$notelp',
															`idu` = '$no_induk'
														WHERE idu = '$_POST[no_induk]'");
                            echo "<script>alert('Data pengguna sudah di update.');</script>";
                            session_unset();
                            session_destroy();
                            echo "<script>alert('Anda menuju halaman login'); window.location = 'index.php?page=auth'</script>";

		}	else {

				/*------------------ script cegah upload file shell.php via *.jpg ------------------
				mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
				-----------------------------------------------------------------------------------*/
				$expensions = array("jpeg","jpg","pjpeg","png","gif","pdf");
				/*----------------------------------------------------------------------------------*/
				if(in_array($file_ext,$expensions)== false){
					echo "<script>window.alert('Upload foto pengguna gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
						</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=vwPd'>";
				}

				else {
					$data_gbr = mysqli_query($connect, "SELECT img_pengguna FROM pengguna WHERE idu = '$_POST[tid]'");
					$r    	= mysqli_fetch_array($data_gbr);
					@unlink('img_user/'.$r['img_pengguna']);
					@unlink('img_user/'.'small_'.$r['img_pengguna']);

					/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
					if(empty($errors)==true){
					/*----------------------------------------------------------------------------------*/

						UploadUser($nama_file_unik);
						/*-- jika gambar pengguna tidak diganti --*/
						mysqli_query($connect, "UPDATE `pengguna` SET
												`idu`='$no_induk',
												`nama`='$nama',
												`email`='$email',
												`username`='$username',
												`password`='$hash',
												`hak_akses`='$hak',
												`img_pengguna` = '$nama_file_unik'
											WHERE idu = '$_POST[tid]'");

											/*-- jika gambar pengguna tidak diganti --*/
											mysqli_query($connect, "UPDATE `guru` SET
																	`nik`='$no_induk',
																	`nama_guru`='$nama',
																	`tempat_lahir`='$tempat_lahir',
																	`tgl_lahir`='$tgl_lahir',
																	`jenis_kelamin`='$jk',
																	`agama`='$agama',
																	`alamat`='$alamat',
																	`no_telp`='$notelp',
																	`idu` = '$no_induk'
																WHERE idu = '$_POST[tid]'");
                                echo "<script>alert('Data pengguna sudah di update.');</script>";
                    						session_unset();
                    						session_destroy();
                    						echo "<script>alert('Anda menuju halaman login'); window.location = 'index.php?page=auth'</script>";
					}
				}
		}
  }else{
    if (empty($lokasi_file)){

        /*-- jika gambar pengguna tidak diganti --*/
        mysqli_query($connect, "UPDATE `pengguna` SET
                    `idu`='$no_induk',
                    `nama`='$nama',
                    `email`='$email',
                    `username`='$username',
                    `password`='$hash',
                    `hak_akses`='$hak'
                  WHERE idu = '$_POST[no_induk]'");

                  /*-- jika gambar pengguna tidak diganti --*/
                  mysqli_query($connect, "UPDATE `guru` SET
                              `nik`='$no_induk',
                              `nama_guru`='$nama',
                              `tempat_lahir`='$tempat_lahir',
                              `tgl_lahir`='$tgl_lahir',
                              `jenis_kelamin`='$jk',
                              `agama`='$agama',
                              `alamat`='$alamat',
                              `no_telp`='$notelp',
                              `idu` = '$no_induk'
                            WHERE idu = '$_POST[no_induk]'");

        echo "<script>alert('Data pengguna sudah di update.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=vwGr'>";

    }	else {

        /*------------------ script cegah upload file shell.php via *.jpg ------------------
        mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
        -----------------------------------------------------------------------------------*/
        $expensions = array("jpeg","jpg","pjpeg","png","gif","pdf");
        /*----------------------------------------------------------------------------------*/
        if(in_array($file_ext,$expensions)== false){
          echo "<script>window.alert('Upload foto pengguna gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
            </script>";
          echo "<meta http-equiv='refresh' content='0;url=?page=edGr'>";
        }

        else {
          $data_gbr = mysqli_query($connect, "SELECT img_pengguna FROM pengguna WHERE idu = '$_POST[tid]'");
          $r    	= mysqli_fetch_array($data_gbr);
          @unlink('img_user/'.$r['img_pengguna']);
          @unlink('img_user/'.'small_'.$r['img_pengguna']);

          /*------------------ script cegah upload file shell.php via *.jpg ------------------*/
          if(empty($errors)==true){
          /*----------------------------------------------------------------------------------*/

            UploadUser($nama_file_unik);
            /*-- jika gambar pengguna tidak diganti --*/
            mysqli_query($connect, "UPDATE `pengguna` SET
                        `idu`='$no_induk',
                        `nama`='$nama',
                        `email`='$email',
                        `username`='$username',
                        `password`='$hash',
                        `hak_akses`='$hak',
                        `img_pengguna` = '$nama_file_unik'
                      WHERE idu = '$_POST[tid]'");

                      /*-- jika gambar pengguna tidak diganti --*/
                      mysqli_query($connect, "UPDATE `guru` SET
                                  `nik`='$no_induk',
                                  `nama_guru`='$nama',
                                  `tempat_lahir`='$tempat_lahir',
                                  `tgl_lahir`='$tgl_lahir',
                                  `jenis_kelamin`='$jk',
                                  `agama`='$agama',
                                  `alamat`='$alamat',
                                  `no_telp`='$notelp',
                                  `idu` = '$no_induk'
                                WHERE idu = '$_POST[tid]'");
            echo "<script>alert('Data pengguna sudah di update.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=?page=vwGr'>";
          }
        }
    }
  }
	}
?>
