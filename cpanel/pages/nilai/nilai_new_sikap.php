<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
	$sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
	$r = mysqli_fetch_array($sql);
?>
<?php $ex = mysqli_query($connect, "SELECT kelas.*, guru.* FROM kelas RIGHT JOIN guru ON kelas.wali_kelas = guru.nik AND kelas.id_kelas = '$_GET[tid]'");
$x = mysqli_fetch_array($ex)?>
<?php
$guru = $r['idu'];
	$vwx = mysqli_query($connect, "SELECT * FROM `kelas_guru`,`guru`,`mapel`,`kelas`,`tahun_ajar`, `semester`
		WHERE kelas_guru.id_guru = guru.nik
		AND kelas_guru.id_mapel = mapel.id_mapel
		AND kelas_guru.id_kelas = kelas.id_kelas
		AND kelas_guru.semester = semester.id_smt
		AND kelas_guru.tahun_ajar = tahun_ajar.id_tahun AND guru.nik = '$guru'");
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
									 <h3 class="box-title">Nilai Sikap</h3>
								 </div>
								 <!-- /.box-header -->
								 <!-- form start -->
								 <form class="form-horizontal" action="?page=svSk" method="post">
									 <div class="box-body">
										 <div class="form-group">
											 <label for="inputEmail3" class="col-sm-3 control-label">Siswa</label>

											 <div class="col-sm-7">
											 <input type="hidden" name="guru" value="<?php echo $c['nik'] ?>">
											 <input type="hidden" name="mapel" value="<?php echo $c['id_mapel'] ?>">
											 <input type="hidden" name="kelas" value="<?php echo $c['id_kelas']; ?>">
												 <select class="form-control" name="siswa">
	 												<option value="">Pilih Siswa</option>
	 												<?php
	 												$f = mysqli_query($connect, "SELECT DISTINCT * FROM siswa WHERE kelas = '$c[id_kelas];' AND NOT EXISTS (SELECT * FROM sikap WHERE sikap.id_siswa = siswa.nis)");
	 												while ($a = mysqli_fetch_array($f)) {
	 												?>
	 												<option value="<?php echo $a['nis']?>"><?php echo $a['nama_siswa']?></option>
	 											<?php } ?>
	 										</select>
											 </div>

										 </div>

										 <!-- nilai sikap sosial -->
										 <div class="form-group">
											 <label class="col-sm-7 control-label">Nilai Sikap</label>
										 </div>

										 <!-- nilai sikap sosial -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai Sikap Sosial</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="sikap_sosial" placeholder="Masukan Nilai Sikap Sosial (A/B/C/D)">
											 </div>
										 </div>
										 <!-- Deskripsi sikap sosial -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi Sikap Sosial</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk_sikap_sosial" placeholder="Masukan Deskripsi Sikap Sosial">
											 </div>
										 </div>
										 <!-- nilai sikap sosial -->
										 <div class="form-group">
										 	<label for="inputPassword3" class="col-sm-3 control-label">Nilai Sikap Spiritual</label>
										 	<div class="col-sm-7">
										 		<input type="text" class="form-control" name="sikap_spiritual" placeholder="Masukan Nilai Sikap Spiritual (A/B/C/D)">
										 	</div>
										 </div>
										 <!-- Deskripsi sikap sosial -->
										 <div class="form-group">
										 	<label for="inputPassword3" class="col-sm-3 control-label">Deskripsi Sikap Spiritual</label>
										 	<div class="col-sm-7">
										 		<input type="text" class="form-control" name="desk_sikap_spiritual" placeholder="Masukan Deskripsi Sikap Spiritual">
										 	</div>
										 </div>

										 <center>
											 <button type="button" class="btn btn-default pull-center" onclick="self.history.back()">Kembali</button>&nbsp; &nbsp; &nbsp; &nbsp;
											 <button type="submit" class="btn btn-info">Tambah</button>
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
