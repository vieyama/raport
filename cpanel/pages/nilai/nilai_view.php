<?php
	include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Nilai</h3>
                </div><!-- /.box-header -->
								<div class="box-body">
									<form action="" method="POST" name="postform">
									<div class="col-xs-3">
										<div class="form-group">
											<label>Kelas</label>
											<select class="form-control" name="kelas">
												<option value="">Pilih Kelas</option>
												<?php
												$f = mysqli_query($connect, "SELECT * FROM kelas");
												while ($a = mysqli_fetch_array($f)) {
												?>
												<option value="<?php echo $a['id_kelas']?>"><?php echo $a['nama_kelas']?></option>
											<?php } ?>
										</select>
										</div>
										<div class="form-group">
											<label>Mata Pelajaran</label>
											<select class="form-control" name="mapel">
												<option value="">Pilih Mata Pelajaran</option>
												<?php
												$f = mysqli_query($connect, "SELECT * FROM mapel");
												while ($a = mysqli_fetch_array($f)) {
												?>
												<option value="<?php echo $a['id_mapel']?>"><?php echo $a['nama_mapel']?></option>
											<?php } ?>
											</select>
										</div>
										<button type="submit" name="pilih" id="search-btn" class="btn btn-flat">Pilih
									</button>
									</div>
									</form>
								</div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
									<th>#</th>
									<th>Nama Siswa</th>
									<td>Nilai Harian</td>
									<td>Nilai UTS</td>
									<td>Nilai UAS</td>
									<td>Nilai Pengetahuan</td>
									<td>Predikat Nilai Pengetahuan</td>
									<td>Nilai Keterampilan</td>
									<td>Predikat Nilai Keterampilan</td>
									<th>Opsi</th>
                      </tr>
                    </thead>

					<tbody>

					<?php
						include "../conf/koneksi.php";
						if((isset($_POST['kelas'])) && (isset($_POST['mapel']))){
						$vw = mysqli_query($connect, "SELECT * FROM nilai, guru, kelas, mapel, siswa WHERE nilai.id_guru = guru.nik AND nilai.id_kelas = kelas.id_kelas AND nilai.id_mapel = mapel.id_mapel AND nilai.id_siswa = siswa.nis AND nilai.id_kelas = '$_POST[kelas]' AND nilai.id_mapel =  '$_POST[mapel]'");
						$no = 1;
						while ($b = mysqli_fetch_array($vw)){
					?><!--
					<img src='img_user/default.jpg'> -->
                      <tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $b['nama_siswa'] ?></td>
						<td><?php echo $b['nilai_harian'] ?></td>
						<td><?php echo $b['nilai_uts'] ?></td>
						<td><?php echo $b['nilai_uas'] ?></td>
						<td><?php echo $b['nilai_pengetahuan'] ?></td>
						<td><?php echo $b['grade_peng'] ?></td>
						<td><?php echo $b['nilai_ketrampilan'] ?></td>
						<td><?php echo $b['grade_ket'] ?></td>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edRp&tid=<?php echo $b['nis']; ?>' ">
								<input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=dlRp&tid=<?php echo $b['id_nilai']; ?>' ">
							</div>
						</td>
                      </tr>

					  <?php $no++; } } ?>
                    </tbody>

				  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

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
