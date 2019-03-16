<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
	$sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
	$r = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

		<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>Nama Kelas</th>
									<th>Nama Mata Pelajaran</th>
									<th>Tahun Ajaran</th>
									<th>Semester</th>
									<th>Aksi</th>
								</tr>
								<?php
								$guru = $r['idu'];
								$vw = mysqli_query($connect, "SELECT * FROM `kelas_guru`,`guru`,`mapel`,`kelas`,`tahun_ajar`, `semester`
									WHERE kelas_guru.id_guru = guru.nik
									AND kelas_guru.id_mapel = mapel.id_mapel
									AND kelas_guru.id_kelas = kelas.id_kelas
									AND kelas_guru.semester = semester.id_smt
									AND kelas_guru.tahun_ajar = tahun_ajar.id_tahun AND guru.nik = '$guru'");
									$no = 1;
									while ($b = mysqli_fetch_array($vw)){
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $b['nama_kelas'];?></td>
									<td><?php echo $b['nama_mapel'];?></td>
									<td><?php echo $b['tahun_ajar'];?></td>
									<td><?php echo $b['smt'];?></td>
									<td>
										<input type="button" class="btn btn-danger" name="reset" value="Lihat" onclick="window.location='?page=detailKlGr&tid=<?php echo $b['id_kelas']; ?>' ">
									</td>
								</tr>
								<?php $no++; } ?>
							</table>
							<br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

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
