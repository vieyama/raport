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
							<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Tambah Mata Pelajaran" onclick="window.location='?page=adKlsv&tid=<?php echo $_GET['tid']; ?>'">
						</div>
						<div class="col-xs-12">
							<div class="box">
											<div class="box-header">
												<h3 class="box-title">Data Guru</h3>
											</div><!-- /.box-header -->
											<div class="box-body">
												<table id="example1" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>No</th>
															<th>Mata Pelajaran</th>
															<th>Nama Guru</th>
															<th>Aksi</th>
														</tr>
													</thead>

								<tbody>
									<?php
										$vw = mysqli_query($connect, "SELECT * FROM kelas_guru, guru, mapel, kelas WHERE kelas_guru.id_guru= guru.nik
										AND kelas_guru.id_mapel = mapel.id_mapel
										AND kelas_guru.id_kelas = kelas.id_kelas
										AND kelas.id_kelas = '$_GET[tid]'");
										$no = 1;
										while ($b = mysqli_fetch_array($vw)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $b['nama_mapel'];?></td>
										<td><?php echo $b['nama_guru'];?></td>
										<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edKlsv&tid=<?php echo $b['id_kelas_guru']; ?>' ">
										<input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=dlKlsv&tid=<?php echo $b['id_kelas_guru']; ?>' ">
										</td>
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
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
  </body>
</html>
