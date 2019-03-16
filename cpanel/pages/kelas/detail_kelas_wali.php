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
												<?php $ex = mysqli_query($connect, "SELECT * FROM `kelas`, `guru` WHERE kelas.wali_kelas = guru.nik AND guru.nik = '$_GET[tid]'");
												$x = mysqli_fetch_array($ex); ?>
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
													<?php $ed = mysqli_query($connect, "SELECT * FROM siswa, kelas, guru WHERE siswa.kelas = kelas.id_kelas AND kelas.id_kelas = $x[id_kelas] AND kelas.wali_kelas = guru.nik AND guru.nik = '$_GET[tid]'");
													?>
													<?php while ($r = mysqli_fetch_array($ed)){ ?>
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
													<?php }  ?>
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
						<div class="col-md-12">
						          <!-- Custom Tabs -->
						          <div class="nav-tabs-custom">
						            <ul class="nav nav-tabs">
						              <li class="active"><a href="#tab_1" data-toggle="tab">Siswa</a></li>
						              <li><a href="#tab_2" data-toggle="tab">Nilai</a></li>
									  <li><a href="#tab_3" data-toggle="tab">Sikap</a></li>
						              <li><a href="#tab_4" data-toggle="tab">Ekstrakulikuler</a></li>
									  <li><a href="#tab_5" data-toggle="tab">Prestasi</a></li>
						              <li><a href="#tab_6" data-toggle="tab">Ketidakhadiran</a></li>
						            </ul>
						            <div class="tab-content">
						              <div class="tab-pane active" id="tab_1">
														<div class="box">
															<div class="box-body">

																				<table id="example1" class="table table-bordered table-striped">
																					<thead>
																						<tr>
																							<th>No</th>
																							<th>Nama Siswa</th>
																							<th></th>
																							<th></th>
																						</tr>
																					</thead>
															<tbody>
																<?php
																	$vwj = mysqli_query($connect, "SELECT DISTINCT * FROM siswa, guru, kelas WHERE EXISTS (SELECT * FROM nilai WHERE nilai.id_siswa = siswa.nis) AND siswa.kelas = kelas.id_kelas AND kelas.id_kelas = '$x[id_kelas]' AND kelas.wali_kelas = guru.nik AND guru.nik = '$_GET[tid]'");
								      							$no = 0;
								      							while ($l = mysqli_fetch_array($vwj)) {
								      							
																?>
																<tr>
																	<td><?php echo $no; ?></td>
																	<td><?php echo $l['nama_siswa'] ?></td>
																	<td><form action="pages/nilai/pdf_nilai.php" method="post" name="postform">
																		<input type="hidden" name="tid" value="<?php echo $l['nis']; ?>">
																		<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Cetak">
																	</form></td>
																	<td>
																	<input type="button" class="btn btn-block btn-danger" name="Lihat" value="Lihat" onclick="window.location='?page=vwRpSw&tid=<?php echo $l['nis']; ?>' "></td>
																</tr>
																<?php $no++; } ?>
																				</tbody>

															</table>
														</div><!-- /.box-body -->
													  </div><!-- /.box -->
						              </div>
						              <div class="tab-pane" id="tab_2">
														<div class="box">
															<div class="box-header">
																        <?php
								      								$vwx = mysqli_query($connect, "SELECT * FROM nilai, guru, mapel, kelas, siswa WHERE nilai.id_guru = guru.nik AND nilai.id_mapel = mapel.id_mapel AND nilai.id_kelas = kelas.id_kelas AND nilai.id_siswa = siswa.nis AND nilai.id_guru = '$_GET[tid];'");
								      							$c = mysqli_fetch_array($vwx);
								      						?>
																	<h3 class="box-title"><?php echo $c['nama_mapel'] ?></h3>

															</div><!-- /.box-header -->
															<div class="box-body">

																				<table id="example1" class="table table-bordered table-striped">
																					<thead>
																						<tr>
																							<th>No</th>
																							<th>Nama Siswa</th>
																							<th>Mata Pelajaran</th>
																							<th>Nilai Harian</th>
																							<th>Nilai UTS</th>
																							<th>Nilai UAS</th>
																							<th>Nilai Pengetahuan</th>
																							<th>Predikat Nilai Pengetahuan</th>
																							<th>Nilai Keterampilan</th>
																							<th>Predikat Nilai Keterampilan</th>
																							<th>Aksi</th>
																						</tr>
																					</thead>
															<tbody>
																<?php
																	$vw = mysqli_query($connect, "SELECT * FROM nilai, guru, mapel, kelas, siswa WHERE nilai.id_guru = guru.nik AND nilai.id_mapel = mapel.id_mapel AND nilai.id_kelas = kelas.id_kelas AND nilai.id_siswa = siswa.nis AND nilai.id_kelas = '$x[id_kelas]'");
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
																	<td><?php echo $b['nilai_ketrampilan'] ?></td>
																	<td><?php echo $b['grade_ket'] ?></td>
																	<td><form action="pages/nilai/pdf_nilai.php" method="post" name="postform">
																		<input type="hidden" name="tid" value="<?php echo $b['nis']; ?>">
																		<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Cetak">
																	</form>
																	<input type="button" class="btn btn-danger" name="Lihat" value="Lihat" onclick="window.location='?page=vwRpSw&tid=<?php echo $b['nis']; ?>' "></td>
																</tr>
																<?php $no++; } ?>
																				</tbody>

															</table>
														</div><!-- /.box-body -->
													  </div><!-- /.box -->
						              </div>
						              <!-- /.tab-pane -->
						              <div class="tab-pane" id="tab_3">
														<div class="box">
															<div class="box-header">
																<div class="col-xs-3">
																		<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Isi Raport Sikap" onclick="window.location='?page=adSk&tid=<?php echo $_GET['tid']; ?>'">
																</div>
															</div><!-- /.box-header -->
															<div class="box-body">
															<table id="example2" class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Nama Siswa</th>
																	<td>Sikap Sosial</td>
																	<td>Deskripsi Sikap Sosial</td>
																	<td>Sikap Spiritual</td>
																	<td>Deskripsi Sikap Spiritual</td>
																	<th>Aksi</th>
																</tr>
															</thead>

															<tbody>
																<?php
																	$sikap = mysqli_query($connect, "SELECT * FROM sikap, guru, kelas, siswa WHERE sikap.id_guru = guru.nik AND sikap.id_kelas = kelas.id_kelas AND sikap.id_siswa = siswa.nis AND sikap.id_kelas = '$x[id_kelas]'");
																	$no = 1;
																	while ($s = mysqli_fetch_array($sikap)){
																?>
																<tr>
																	<td><?php echo $no; ?></td>
																	<td><?php echo $s['nama_siswa'] ?></td>
																	<td><?php echo $s['nilai_sikap_sosial'] ?></td>
																	<td><?php echo $s['desk_sikap_sosial'] ?></td>
																	<td><?php echo $s['nilai_sikap_spiritual'] ?></td>
																	<td><?php echo $s['desk_sikap_spiritual'] ?></td>
																	<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edSk&tid=<?php echo $s['id_siswa']; ?>' ">
																	<input type="button" class="btn btn-danger" name="reset" value="Hapus" onclick="window.location='?page=dlSk&tid=<?php echo $s['id_sikap']; ?>' "></td>
																</tr>
																<?php $no++; } ?>
																				</tbody>

															</table>
														</div><!-- /.box-body -->
													  </div><!-- /.box -->
						              </div>
						              <!-- /.tab-pane -->
						              <div class="tab-pane" id="tab_4">
														<div class="box">
															<div class="box-header">
																<div class="col-xs-3">
																	<form method="post" action="?page=adEk&tid=<?php echo $_GET['tid']; ?>">
																	<input class="form-control" type="text" placeholder="Jumlah Ekskul yang diikuti siswa" name="angka"/>
																	<input class="btn btn-default pull-center" type="submit" value="Tambah"/>
																	</form>
																</div>
															</div><!-- /.box-header -->
															<div class="box-body">
															<table id="example3" class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Nama Siswa</th>
																	<td>Nama Ekstrakulikuler</td>
																	<td>Nilai Ekstrakulikuler</td>
																	<td>Deskripsi</td>
																	<th>Aksi</th>
																</tr>
															</thead>

															<tbody>
																<?php
																	$sikap = mysqli_query($connect, "SELECT * FROM ekskul, guru, kelas, siswa WHERE ekskul.id_guru = guru.nik AND ekskul.id_kelas = kelas.id_kelas AND ekskul.id_siswa = siswa.nis AND ekskul.id_kelas = '$x[id_kelas]'");
																	$no = 1;
																	while ($s = mysqli_fetch_array($sikap)){
																?>
																<tr>
																	<td><?php echo $no; ?></td>
																	<td><?php echo $s['nama_siswa'] ?></td>
																	<td><?php echo $s['nama_ekskul'] ?></td>
																	<td><?php echo $s['nilai_ekskul'] ?></td>
																	<td><?php echo $s['desk_ekskul'] ?></td>
																	<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edEk&tid=<?php echo $s['id_ekskul']; ?>' ">
																	<input type="button" class="btn btn-danger" name="reset" value="Hapus" onclick="window.location='?page=dlEk&tid=<?php echo $s['id_ekskul']; ?>' "></td>
																</tr>
																<?php $no++; } ?>
																				</tbody>

															</table>
														</div><!-- /.box-body -->
													  </div><!-- /.box -->
						              </div>
						              <!-- /.tab-pane -->
													<div class="tab-pane" id="tab_5">
														<div class="box">
															<div class="box-header">
																<div class="col-xs-3">
																	<form method="post" action="?page=adPr&tid=<?php echo $_GET['tid']; ?>">
																	<input class="form-control" type="text" placeholder="Jumlah Prestasi yang diikuti siswa" name="angka"/>
																	<input class="btn btn-default pull-center" type="submit" value="Tambah"/>
																	</form>
																</div>
															</div><!-- /.box-header -->
															<div class="box-body">
															<table id="example4" class="table table-bordered table-striped">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Nama Siswa</th>
																	<td>Nama Prestasi</td>
																	<td>Deskripsi</td>
																	<th>Aksi</th>
																</tr>
															</thead>

															<tbody>
																<?php
																	$pres = mysqli_query($connect, "SELECT * FROM prestasi, guru, kelas, siswa WHERE prestasi.id_guru = guru.nik AND prestasi.id_kelas = kelas.id_kelas AND prestasi.id_siswa = siswa.nis AND prestasi.id_kelas = '$x[id_kelas]'");
																	$no = 1;
																	while ($s = mysqli_fetch_array($pres)){
																?>
																<tr>
																	<td><?php echo $no; ?></td>
																	<td><?php echo $s['nama_siswa'] ?></td>
																	<td><?php echo $s['nama_prestasi'] ?></td>
																	<td><?php echo $s['deskripsi'] ?></td>
																	<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edPr&tid=<?php echo $s['id_prestasi']; ?>' ">
																	<input type="button" class="btn btn-danger" name="reset" value="Hapus" onclick="window.location='?page=dlPr&tid=<?php echo $s['id_prestasi']; ?>' "></td>
																</tr>
																<?php $no++; } ?>
																				</tbody>

															</table>
														</div><!-- /.box-body -->
														</div><!-- /.box -->
													</div>
						              <!-- /.tab-pane -->
													<div class="tab-pane" id="tab_6">
														<div class="box">
															<div class="box-header">
																<div class="col-xs-3">
																		<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Isi Raport Ketidakhadiran" onclick="window.location='?page=adHr&tid=<?php echo $_GET['tid']; ?>'">
																</div>

															</div><!-- /.box-header -->
															<div class="box-body">
																				<table id="example5" class="table table-bordered table-striped">
																					<thead>
																						<tr>
																							<th>No</th>
																							<th>Nama Siswa</th>
																							<td>Jumlah Sakit</td>
																							<td>Jumlah Izin</td>
																							<td>Jumlah Tanpa Keterangan</td>
																							<th>Aksi</th>
																						</tr>
																					</thead>

															<tbody>
																<?php
																	$hadir = mysqli_query($connect, "SELECT * FROM ketidakhadiran, guru, kelas, siswa WHERE ketidakhadiran.id_guru = guru.nik
																		AND ketidakhadiran.id_kelas = kelas.id_kelas
																		AND ketidakhadiran.id_siswa = siswa.nis
																		AND ketidakhadiran.id_kelas = '$x[id_kelas]'");
																	$no = 1;
																	while ($z = mysqli_fetch_array($hadir)){
																?>
																<tr>
																	<td><?php echo $no; ?></td>
																	<td><?php echo $z['nama_siswa'] ?></td>
																	<td><?php echo $z['sakit'] ?></td>
																	<td><?php echo $z['izin'] ?></td>
																	<td><?php echo $z['alfa'] ?></td>
																	<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edHr&tid=<?php echo $z['id_hadir']; ?>' ">
																	<input type="button" class="btn btn-danger" name="reset" value="Hapus" onclick="window.location='?page=dlHr&tid=<?php echo $z['id_hadir']; ?>' "></td>
																</tr>
																<?php $no++; } ?>
																				</tbody>

															</table>
														</div><!-- /.box-body -->
														</div><!-- /.box -->
													</div>

						            </div>
						            <!-- /.tab-content -->
						          </div>
						          <!-- nav-tabs-custom -->
						</div>
					</div>
					<!-- /.box-header -->

				</section>

	<!-- script datatables -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>

	<!-- script datatables -->
	   <script>
	    $(function () {
	      $("#example2").DataTable();
	    });
	  </script>

		<!-- script datatables -->
		   <script>
		    $(function () {
		      $("#example3").DataTable();
		    });
		  </script>

			<!-- script datatables -->
			   <script>
			    $(function () {
			      $("#example4").DataTable();
			    });
			  </script>
				<!-- script datatables -->
				   <script>
				    $(function () {
				      $("#example5").DataTable();
				    });
				  </script>

  </body>
</html>
