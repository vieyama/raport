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
												<?php $ex = mysqli_query($connect, "SELECT * FROM `siswa`, `kelas`, guru WHERE siswa.kelas = kelas.id_kelas AND kelas.wali_kelas = guru.nik AND siswa.nis = '$_GET[tid]'");
												$x = mysqli_fetch_array($ex) ;?>
												<h3 class="box-title"><?php echo $x['nama_kelas'] ?></h3>
												<small><?php echo $x['nama_guru'] ?></small>
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
													<?php $ed = mysqli_query($connect, "SELECT * FROM `siswa`, `kelas`, guru WHERE siswa.kelas = kelas.id_kelas AND kelas.wali_kelas = guru.nik AND kelas.id_kelas = '$x[id_kelas]'");
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
							<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Detail Nilai" onclick="window.location='?page=vwRpSw&tid=<?php echo $_GET['tid']; ?>'">
						</div>
						<div class="col-xs-12">
							<div class="box">
											<div class="box-header">
											</div><!-- /.box-header -->
											<div class="box-body">
												<table id="example1" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama Mata Pelajaran</th>
															<th>Nilai Harian</th>
															<th>Nilai UTS</th>
															<th>Nilai UAS</th>
															<th>Nilai Pengetahuan</th>
															<th>Predikat Nilai Pengetahuan</th>
															<th>Deskripsi Nilai Pengetahuan</th>
															<th>Nilai Keterampilan</th>
															<th>Predikat Nilai Keterampilan</th>
															<th>Deskripsi Nilai Keterampilan</th>
														</tr>
													</thead>

								<tbody>
									<?php
										$vw = mysqli_query($connect, "SELECT * FROM nilai, guru, mapel, kelas, siswa WHERE nilai.id_guru = guru.nik AND nilai.id_mapel = mapel.id_mapel AND nilai.id_kelas = kelas.id_kelas AND nilai.id_siswa = siswa.nis AND nilai.id_siswa = '$_GET[tid]'");
										$no = 1;
										while ($b = mysqli_fetch_array($vw)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
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
  </body>
</html>
