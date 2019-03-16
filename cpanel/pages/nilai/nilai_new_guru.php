<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
?>
<?php $ex = mysqli_query($connect, "SELECT * FROM kelas, guru WHERE kelas.wali_kelas = guru.nik AND kelas.id_kelas = '$_GET[tid]'");
$x = mysqli_fetch_array($ex); ?>
<?php $eq = mysqli_query($connect, "SELECT * FROM pengguna WHERE username = '$_SESSION[username]'");
$z = mysqli_fetch_array($eq); 
$wali_kelas = $z['idu'];
?>
<?php
 $guru = $x['nik'];
	$vwx = mysqli_query($connect, "SELECT * FROM `kelas_guru`,`guru`,`mapel`,`kelas`,`tahun_ajar`, `semester`
		WHERE kelas_guru.id_guru = guru.nik
		AND kelas_guru.id_mapel = mapel.id_mapel
		AND kelas_guru.id_kelas = kelas.id_kelas
		AND kelas_guru.semester = semester.id_smt
		AND kelas_guru.tahun_ajar = tahun_ajar.id_tahun AND guru.nik = '$wali_kelas'");
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
									 <h3 class="box-title">Nilai = <?php echo $c['nama_mapel'] ?></h3> <!-- manggil nama pelajaran -->
								 </div>
								 <!-- /.box-header -->
								 <!-- form start -->
								 <form class="form-horizontal" action="?page=svNl" method="post">
									 <div class="box-body">
										 <div class="form-group">
											<div class="col-sm-7">
											<input type="text" name='tid' value="<?php echo $_GET['tid']; ?>" >
											<input type="text" name="guru" value="<?php echo $wali_kelas ?>">
											<input type="text" name="mapel" value="<?php echo $c['id_mapel'] ?>">
											<input type="text" name="semester" value="<?php echo $c['id_smt'] ?>">
											<input type="text" name="kelas" value="<?php echo $_GET['tid']; ?>">

											 </div>

										 </div>

										 <div class="form-group">
										 	<label for="inputPassword3" class="col-sm-3 control-label">Nama Siswa</label>
										 	<div class="col-sm-7">
										 		<select class="form-control" name="siswa" required>
	 												<option value="">Pilih Siswa</option>
	 												<?php
	 												$f = mysqli_query($connect, "SELECT DISTINCT * FROM siswa WHERE kelas = '$_GET[tid]' AND NOT EXISTS (SELECT * FROM nilai WHERE nilai.id_siswa = siswa.nis AND nilai.id_mapel = '$c[id_mapel]')");
	 												while ($a = mysqli_fetch_array($f)) {
	 												?>
	 												<option value="<?php echo $a['nis']?>"><?php echo $a['nama_siswa']?></option>
	 											<?php } ?>
	 										</select>
										 	</div>
										 </div>

										 <!-- nilai Harian -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai Harian</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="harian" placeholder="Masukan Nilai Harian" required>
											 </div>
										 </div>
										 <!-- nilai UTS -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai UTS</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="uts" placeholder="Masukan Nilai UTS" required>
											 </div>
										 </div>

										 <!-- nilai UAS -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai UAS</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="uas" placeholder="Masukan Nilai UAS" required>
											 </div>
										 </div>
										 <!-- desk Pengetahuan -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi Pengetahuan</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk_peng" placeholder="Masukan Deskripsi Pengetahuan" required>
											 </div>
										 </div>
										 <!-- nilai Keterampilan -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nilai Keterampilan</label>
											 <div class="col-sm-7">
												 <input type="number" class="form-control" name="keterampilan" placeholder="Masukan Nilai Keterampilan" required>
											 </div>
										 </div>
										 <!-- desk keterampilan -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi Keterampilan	</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk_ket" placeholder="Masukan Deskripsi keterampilan" required>
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
	<script src="jQuery/jQuery-2.1.4.min.js"></script>
	<script src="jQuery/typeahead.js"></script>

	<script type="text/javascript">
	$(document).ready(function () {
		$('#txtCountry').typeahead({
			source: function (query, result) {
				$.ajax({
					url: "server.php",
					data: 'query=' + query,
					dataType : "json",
					type: "POST",
					success: function (data) {
						result($.map(data, function (item) {
							return item;
						}));
					}
				});
			}
		});
	});
</script>

	<!-- script datatables -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>

  </body>
</html>
