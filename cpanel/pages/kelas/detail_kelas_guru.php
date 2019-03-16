<?php
	include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="../cpanel/plugins/iCheck/flat/blue.css">
  <body class="hold-transition skin-blue sidebar-mini">

        <!-- Main content -->
        <section class="content">

					<div class="row">
						<div class="col-md-12">
										<!-- USERS LIST -->
										<div class="box box-danger">
											<div class="box-header with-border">
												<?php $ex = mysqli_query($connect, "SELECT * FROM kelas, guru WHERE kelas.wali_kelas = guru.nik AND kelas.id_kelas = '$_GET[tid]'");
												$x = mysqli_fetch_array($ex) ;?>
												<h3 class="box-title"><?php echo $x['nama_kelas'] ?></h3>
												<small>Wali Kelas = <?php echo $x['nama_guru'] ?></small>
												<div class="box-tools pull-right">
													<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
													</button>
													<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
													</button>
												</div>
											</div>
											<!-- /.box-header -->
											<div class="box-body no-padding">

												<ul class="users-list clearfix">
													<?php $ed = mysqli_query($connect, "SELECT * FROM siswa WHERE kelas = '$_GET[tid]'");
													while ($r = mysqli_fetch_array($ed)){ ?>
													<li>

														<?php if($r['img_pengguna']==""){ ?>
														<img src='img_user/small_default.jpg' alt="User Image">
														<?php }else{ ?>
														<img src="img_user/small_<?php echo $r['img_pengguna']; ?>" alt="User Image">
													<?php } ?>
														<br>
														<br>
														<b><?php echo $r['nama_siswa'] ?></b>
													</li>
													<?php } ?>
												</ul>


												<!-- /.users-list -->
											</div>
											<!-- /.box-body -->
											<div class="box-footer text-center">
											</div>
											<!-- /.box-footer -->
										</div>
										<!--/.box -->
									</div>
									<!-- /.col -->
					</div>
					<!-- /.box-header -->

					<div class="row">
						<div class="col-xs-3">
							<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Isi Nilai Siswa" onclick="window.location='?page=adNl&tid=<?php echo $_GET['tid']; ?>'">
							<?php
                include "../conf/koneksi.php";

                $sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
                $r = mysqli_fetch_array($sql);
              ?>
							<?php $guru = $r['idu'] ?>
						</div>
						<div class="col-xs-3">
							<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Download Data Siswa" onclick="window.location='pages/kelas/export.php?tid=<?php echo $_GET['tid']; ?>'">
						</div>
						<div class="col-xs-3">
							<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Import Nilai Siswa" onclick="window.location='pages/nilai/importbaru/dashboard-import?tid=<?php echo $_GET['tid']; ?>'">
						</div>
						<div class="col-xs-12">
							<div class="box">
											<div class="box-header">
                        <?php
      										$vwx = mysqli_query($connect, "SELECT * FROM nilai, guru, mapel, kelas, siswa WHERE nilai.id_guru = guru.nik AND nilai.id_mapel = mapel.id_mapel AND nilai.id_kelas = kelas.id_kelas AND nilai.id_siswa = siswa.nis AND nilai.id_guru = '$guru'");
      										$c = mysqli_fetch_array($vwx);
      									?>

											</div><!-- /.box-header -->
											<div class="box-body">
												<table id="example1" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama Siswa</th>
															<th>Mapel</th>
															<td>Nilai Harian</td>
															<td>Nilai UTS</td>
															<td>Nilai UAS</td>
															<td>Nilai Pengetahuan</td>
															<td>Predikat Nilai Pengetahuan</td>
															<td>Deskripsi Pengetahuan</td>
															<td>Nilai Keterampilan</td>
															<td>Predikat Nilai Keterampilan</td>
															<td>Deskrisi Keterampilan</td>
															<th>Aksi</th>
														</tr>
													</thead>

								<tbody>
									<?php
										$vw = mysqli_query($connect, "SELECT * FROM nilai, guru, mapel, kelas, siswa WHERE nilai.id_guru = guru.nik AND nilai.id_mapel = mapel.id_mapel AND nilai.id_kelas = kelas.id_kelas AND nilai.id_siswa = siswa.nis AND nilai.id_guru = '$guru' AND kelas.id_kelas = '$_GET[tid]'");
										$no = 1;
										while ($b = mysqli_fetch_array($vw)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $b['nama_siswa'] ?></td>
										<td><?php echo $b['nama_mapel'] ?></td>
										<td><?php echo $b['nilai_harian'] ?></td>
										<td><?php echo $b['nilai_uts'] ?></td>
										<td><?php echo $b['nilai_uas'] ?></td>
										<td><?php echo $b['nilai_pengetahuan'] ?></td>
										<td><?php echo $b['grade_peng'] ?></td>
										<td><?php echo $b['desk_peng'] ?></td>
										<td><?php echo $b['nilai_ketrampilan'] ?></td>
										<td><?php echo $b['grade_ket'] ?></td>
										<td><?php echo $b['desk_ket'] ?></td>
										<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edRp&tid=<?php echo $b['nis']; ?>' ">
										<input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=dlRp&tid=<?php echo $b['id_nilai']; ?>' "></td>
									</tr>
									<?php $no++; } ?>
													</tbody>

								</table>
											</div><!-- /.box-body -->
										</div><!-- /.box -->

									</div><!-- /.col -->
								</div><!-- /.row -->
	<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>


	<!-- script datatables -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
		<script src="../cpanel/plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->
  </body>
</html>
