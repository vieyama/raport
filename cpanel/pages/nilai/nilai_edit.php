<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
	$sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
	$r = mysqli_fetch_array($sql);
?>
<!-- untuk mengambil id siswa -->
<?php $ex = mysqli_query($connect, "SELECT * FROM nilai, siswa, guru WHERE nilai.id_siswa = siswa.nis AND nilai.id_guru = guru.nik AND nilai.id_siswa = '$_GET[tid]'");
$x = mysqli_fetch_array($ex)?>
<?php
$guru = $x['nik'];
$kelas = $x['id_kelas'];
	$vwx = mysqli_query($connect, "SELECT * FROM `kelas_guru`,`guru`,`mapel`,`kelas`
		WHERE kelas_guru.id_guru = guru.nik
		AND kelas_guru.id_mapel = mapel.id_mapel
		AND kelas_guru.id_kelas = kelas.id_kelas
		AND guru.nik = '$guru'");
	$c = mysqli_fetch_array($vwx);
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

        <!-- Main content -->
        <section class="content">
          <div class="row">
						<div class="col-md-12">
							 <!-- Horizontal Form -->
							 <div class="box box-info">
								 <div class="box-header with-border">
									 <h3 class="box-title">Nilai = <?php echo $c['nama_mapel'] ?></h3> <!-- menampilkan mapel -->
								 </div>
								 <!-- /.box-header -->
								 <!-- form start -->
								 <form class="form-horizontal" action="?page=upRp" method="post">
									 <div class="box-body">
										 <div class="form-group">
											 <input type="hidden" name='tid' value="<?php echo $_GET['tid']; ?>" >
											 <input type="hidden" name="guru" value="<?php echo $c['nik'] ?>">
											 <input type="hidden" name="mapel" value="<?php echo $c['id_mapel'] ?>">
											 <input type="hidden" name="kelas" value="<?php echo $c['id_kelas']; ?>">
											 <input type="hidden" name="semester" value="<?php echo $c['id_smt'] ?>">
											 <input type="hidden" name="id_nilai" value="<?php echo $x['id_nilai']; ?>">
											 <label for="inputEmail3" class="col-sm-3 control-label"></label>
											 <div class="col-sm-7">

											<label for="">Nama siswa : <?php echo $x['nama_siswa']; ?></label>
												 <input type="hidden" name="siswa" value="<?php echo $x['nis']; ?>">
											 </div>

										 </div>
										 <!-- nilai Harian -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai Harian</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="harian" placeholder="Masukan Nilai Harian" value="<?php echo $x['nilai_harian']; ?>" required>
											 </div>
										 </div>
										 <!-- nilai UTS -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai UTS</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="uts" placeholder="Masukan Nilai UTS" value="<?php echo $x['nilai_uts']; ?>" required>
											 </div>
										 </div>

										 <!-- nilai UAS -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai UAS</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="uas" placeholder="Masukan Nilai UAS" value="<?php echo $x['nilai_uas']; ?>" required>
											 </div>
										 </div>

										 <!-- desk Pengetahuan -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi Pengetahuan</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk_peng" placeholder="Masukan Deskripsi Pengetahuan" value="<?php echo $x['desk_peng']; ?>" required>
											 </div>
										 </div>

										 <!-- nilai Keterampilan -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai Keterampilan</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="keterampilan" placeholder="Masukan Nilai Keterampilan" value="<?php echo $x['nilai_ketrampilan']; ?>" required
											 </div>
										 </div>

										 <!-- desk keterampilan -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi Keterampilan	</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk_ket" placeholder="Masukan Deskripsi keterampilan" value="<?php echo $x['desk_ket']; ?>" required>
											 </div>
										 </div>

										 <center>
											 <button type="button" class="btn btn-default pull-center" onclick="self.history.back()">Kembali</button>&nbsp; &nbsp; &nbsp; &nbsp;
											 <button type="submit" class="btn btn-info">Ubah</button>
										 </center>
									 </div>
									 <!-- /.box-body -->
								 </form>
							 </div>
							 <!-- /.box -->
						 </div>
					</div>
				</section>

	<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>


	<!-- script datatables -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>

  </body>
</html>
