<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
	$sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
	$r = mysqli_fetch_array($sql);
?>
<!-- untuk mengambil id siswa -->
<?php $ex = mysqli_query($connect, "SELECT * FROM prestasi, siswa, guru, kelas WHERE prestasi.id_siswa = siswa.nis AND prestasi.id_guru = guru.nik AND prestasi.id_kelas = kelas.id_kelas AND prestasi.id_prestasi = '$_GET[tid]'");
$x = mysqli_fetch_array($ex)?>
<?php
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
									 <h3 class="box-title">Nilai</h3>
								 </div>
								 <!-- /.box-header -->
								 <!-- form start -->
								 <form class="form-horizontal" action="?page=upPr" method="post">
									 <div class="box-body">
										 <div class="form-group">
											 <input type="hidden" name="guru" value="<?php echo $x['nik'] ?>">
											 <input type="hidden" name="kelas" value="<?php echo $x['id_kelas']; ?>">
											 <input type="hidden" name="id_prestasi" value="<?php echo $x['id_prestasi']; ?>">
											 <label for="inputEmail3" class="col-sm-3 control-label"></label>
											 <div class="col-sm-7">

											<label for="">Nama siswa : <?php echo $x['nama_siswa']; ?></label>
												 <input type="hidden" name="siswa" value="<?php echo $x['nis']; ?>">
											 </div>

										 </div>
										 <!-- nilai Harian -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nama Prestasi</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Prestasi" value="<?php echo $x['nama_prestasi']; ?>">
											 </div>
										 </div>

										 <!-- Deskripsi spiritual -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk" placeholder="Masukan Deskripsi" value="<?php echo $x['deskripsi']; ?>">
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
