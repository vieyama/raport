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
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Tahun Ajaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
							<!-- form start -->
							<form role="form" action="?page=svTh" method="POST">
								<div class="box-body">
									<div class="form-group">
										<label for="exampleInputEmail1">Tahun Ajaran</label>
										<input name="tahun" type="text" class="form-control" placeholder="Tahun Ajaran">
									</div>
								</div><!-- /.box-body -->

								<div class="box-footer">
									<button name="save" type="submit" class="btn btn-primary">Tambah</button>
								</div>
							</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
				<div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
								<table class="table table-bordered">
									<tr>
										<th>No</th>
										<th>Tahun Ajaran</th>
										<th>Aksi</th>
									</tr>
									<?php
										$vw = mysqli_query($connect, "SELECT * FROM tahun_ajar");
										$no = 1;
										while ($b = mysqli_fetch_array($vw)){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $b['tahun_ajar'];?></td>
										<td><input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edTh&tid=<?php echo $b['id_kelas']; ?>' ">
										<input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=dlTh&tid=<?php echo $b['id_kelas']; ?>' ">
									</tr>
									<?php $no++; } ?>
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
