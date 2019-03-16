<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
	$sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
	$r = mysqli_fetch_array($sql);
?>

<?php
$guru = $_GET['tid'];
	$vwx = mysqli_query($connect, "SELECT * FROM kelas, guru WHERE kelas.wali_kelas = guru.nik AND guru.nik = '$guru'");
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
								 <form class="form-horizontal" action="?page=svPr" method="post">
									 <div class="box-body">
										 <div class="form-group">
											 <label for="inputEmail3" class="col-sm-3 control-label">Siswa</label>
											 <div class="col-sm-7">
											 <input type="hidden" name="guru" value="<?php echo $c['nik'] ?>">
											 <input type="hidden" name="kelas" value="<?php echo $c['id_kelas']; ?>">
												 <select class="form-control" name="siswa">
	 												<option value="">Pilih Siswa</option>
	 												<?php
	 												$f = mysqli_query($connect, "SELECT DISTINCT * FROM siswa WHERE kelas = '$c[id_kelas];' AND NOT EXISTS (SELECT * FROM prestasi WHERE prestasi.id_siswa = siswa.nis)");
	 												while ($a = mysqli_fetch_array($f)) {
	 												?>
	 												<option value="<?php echo $a['nis']?>"><?php echo $a['nama_siswa']?></option>
	 											<?php } ?>
	 										</select>
											 </div>
											<?php
										  $angka = $_POST['angka'];
										   for($i=0; $i < $angka; $i++){
										  ?>
										 </div>
										 <!-- nilai sikap sosial -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Nama Prestasi</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="nama_prestasi<?php echo $i?>" placeholder="Masukan Nama Prestasi">
											 </div>
										 </div>
										 <!-- Deskripsi sikap sosial -->
										 <div class="form-group">
											 <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi</label>
											 <div class="col-sm-7">
												 <input type="text" class="form-control" name="desk<?php echo $i?>" placeholder="Deskripsi">
											 </div>
										 </div>

										 <?php
										   }
										  ?>
											<input type="hidden" name="jumlah" value="<?php echo $_POST['angka']?>"/>

										 <center>
											 <button type="button" class="btn btn-default pull-center" onclick="self.history.back()">Kembali</button>&nbsp; &nbsp; &nbsp; &nbsp;
											 <button type="submit" class="btn btn-info">Tambah</button>
										 </center>
									 </div>
									 <!-- /.box-body -->
								 </form>
								 <!-- Kita buat textbox untuk menampung jumlah data form -->
								 <input type="hidden" id="jumlah-form" value="1">

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
