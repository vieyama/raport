<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

		<!-- Main content -->
    <section class="content">
      <div class="row">
				<div class="col-md-4">
									<!-- Custom Tabs -->
									<div class="nav-tabs-custom">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1" data-toggle="tab">Kelas VII</a></li>
											<li><a href="#tab_2" data-toggle="tab">Kelas VIII</a></li>
											<li><a href="#tab_3" data-toggle="tab">Kelas IX</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1">
												<div class="box">
													<div class="box-header with-border">
														<h3 class="box-title">Tambah Kelas VII</h3>
													</div>
													<!-- /.box-header -->
													<div class="box-body">
														<!-- form start -->
														<form role="form" onsubmit="return validateForm()" action="?page=svKl" method="POST">
															<div class="box-body">
																<div class="form-group">
																<input type="hidden" name = "jenis" value="7">
																	<label for="exampleInputEmail1">Nama Kelas</label>
																	<select class="form-control" name="kelas">
																		<option>Pilih kelas</option>
																		<option value="VII A" name="kelas">VII A</option>
																		<option value="VII B" name="kelas">VII B</option>
																		<option value="VII C" name="kelas">VII C</option>
																		<option value="VII D" name="kelas">VII D</option>
																		<option value="VII E" name="kelas">VII E</option>
																	</select>
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Wali Kelas</label>
																	<select class="form-control" name="wali_kelas" required>
																		<option>Belum di Isi</option>
																		<?php
																		$w = mysqli_query($connect, "SELECT * FROM guru");
																		while ($a = mysqli_fetch_array($w)) { ?>
																		<option value="<?php echo $a['nik']?>" name="wali_kelas"><?php echo $a['nama_guru']; ?></option>
																	<?php } ?>
																	</select>
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail1">Tahun Ajar</label>
																	<select class="form-control" name="tahun_ajar" required>
																		<option>Belum di Isi</option>
																		<?php
																		$z = mysqli_query($connect, "SELECT * FROM tahun_ajar");
																		while ($b = mysqli_fetch_array($z)) { ?>
																		<option value="<?php echo $b['id_tahun']?>"><?php echo $b['tahun_ajar']; ?></option>
																	<?php } ?>
																	</select>
																</div>

															</div><!-- /.box-body -->

															<div class="box-footer">
																<button name="save" type="submit" class="btn btn-primary">Tambah Kelas</button>
															</div>
														</form>
													</div>
													<!-- /.box-body -->
												</div>
												<!-- /.box -->
											</div>
											<!-- /.tab-pane -->
											<div class="tab-pane" id="tab_2">
												<div class="box">
													<div class="box-header with-border">
														<h3 class="box-title">Tambah Kelas VIII</h3>
													</div>
													<!-- /.box-header -->
													<div class="box-body">
														<!-- form start -->
														<form role="form" action="?page=svKl" method="POST">
															<div class="box-body">
																<div class="form-group">
																<input type="hidden" name = "jenis" value="8">

																	<label for="exampleInputEmail1">Nama Kelas</label>
																	<select class="form-control" name="kelas">
																		<option>Pilih kelas</option>
																		<option value="VIII A" name="kelas">VIII A</option>
																		<option value="VIII B" name="kelas">VIII B</option>
																		<option value="VIII C" name="kelas">VIII C</option>
																		<option value="VIII D" name="kelas">VIII D</option>
																		<option value="VIII E" name="kelas">VIII E</option>
																	</select>
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Wali Kelas</label>
																	<select class="form-control" name="wali_kelas" required>
																		<option>Belum di Isi</option>
																		<?php
																		$w = mysqli_query($connect, "SELECT * FROM guru");
																		while ($a = mysqli_fetch_array($w)) { ?>
																		<option value="<?php echo $a['nik']?>" name="wali_kelas"><?php echo $a['nama_guru']; ?></option>
																	<?php } ?>
																	</select>
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail1">Tahun Ajar</label>
																	<select class="form-control" name="tahun_ajar" required>
																		<option>Belum di Isi</option>
																		<?php
																		$z = mysqli_query($connect, "SELECT * FROM tahun_ajar");
																		while ($b = mysqli_fetch_array($z)) { ?>
																		<option value="<?php echo $b['id_tahun']?>"><?php echo $b['tahun_ajar']; ?></option>
																	<?php } ?>
																	</select>
																</div>

															</div><!-- /.box-body -->

															<div class="box-footer">
																<button name="save" type="submit" class="btn btn-primary">Tambah Kelas</button>
															</div>
														</form>
													</div>
													<!-- /.box-body -->
												</div>
												<!-- /.box -->
											</div>
											<!-- /.tab-pane -->
											<div class="tab-pane" id="tab_3">
												<div class="box">
													<div class="box-header with-border">
														<h3 class="box-title">Tambah Kelas IX</h3>
													</div>
													<!-- /.box-header -->
													<div class="box-body">
														<!-- form start -->
														<form role="form" action="?page=svKl" method="POST">
															<div class="box-body">
																<div class="form-group">
																	<input type="hidden" name = "jenis" value="9">
																	<label for="exampleInputEmail1">Nama Kelas</label>
																	<select class="form-control" name="kelas">
																		<option>Pilih kelas</option>
																		<option value="IX A" name="kelas">IX A</option>
																		<option value="IX B" name="kelas">IX B</option>
																		<option value="IX C" name="kelas">IX C</option>
																		<option value="IX D" name="kelas">IX D</option>
																		<option value="IX E" name="kelas">IX E</option>
																	</select>
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail1">Nama Wali Kelas</label>
																	<select class="form-control" name="wali_kelas" required>
																		<option>Belum di Isi</option>
																		<?php
																		$w = mysqli_query($connect, "SELECT * FROM guru");
																		while ($a = mysqli_fetch_array($w)) { ?>
																		<option value="<?php echo $a['nik']?>" name="wali_kelas"><?php echo $a['nama_guru']; ?></option>
																	<?php } ?>
																	</select>
																</div>

																<div class="form-group">
																	<label for="exampleInputEmail1">Tahun Ajar</label>
																	<select class="form-control" name="tahun_ajar" required>
																		<option>Belum di Isi</option>
																		<?php
																		$z = mysqli_query($connect, "SELECT * FROM tahun_ajar");
																		while ($b = mysqli_fetch_array($z)) { ?>
																		<option value="<?php echo $b['id_tahun']?>"><?php echo $b['tahun_ajar']; ?></option>
																	<?php } ?>
																	</select>
																</div>

															</div><!-- /.box-body -->

															<div class="box-footer">
																<button name="save" type="submit" class="btn btn-primary">Tambah Kelas</button>
															</div>
														</form>
													</div>
													<!-- /.box-body -->
												</div>
												<!-- /.box -->
											</div>
											<!-- /.tab-pane -->
										</div>
										<!-- /.tab-content -->
									</div>
									<!-- nav-tabs-custom -->
				</div>

				<div class="col-md-8">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
								<table id="example1" class="table table-bordered">
									<thead>
									<tr>
										<th>No</th>
										<th>Nama Kelas</th>
										<th>Wali Kelas</th>
										<th>Tahun Ajaran</th>
										<th>Aksi</th>
									</tr>
									</thead>
									<tbody>
									<?php
										$vw = mysqli_query($connect, "SELECT * FROM kelas, tahun_ajar, guru WHERE tahun_ajar.id_tahun = kelas.id_tahun
										AND guru.nik = kelas.wali_kelas");
										$no = 1;
										while ($b = mysqli_fetch_array($vw)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $b['nama_kelas'];?></td>
										<td><?php echo $b['nama_guru'];?></td>
										<td><?php echo $b['tahun_ajar'];?></td>
										<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edKl&tid=<?php echo $b['id_kelas']; ?>' ">
										<input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=dlKl&tid=<?php echo $b['id_kelas']; ?>' ">
										<input type="button" class="btn btn-danger" name="reset" value="Lihat" onclick="window.location='?page=detailKl&tid=<?php echo $b['id_kelas']; ?>' "></td>
									</tr>
									<?php $no++; } ?>
								</tbody>
								</table>
								<br>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
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
