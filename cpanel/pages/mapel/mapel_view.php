<?php
	include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-xs-3">
				<input type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal" value="Tambah Mata Pelajaran">
			</div>
			<!-- <form action="pages/admin/pdf_mapel.php" method="post" target="_blank" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Export to PDF">
			</div>
			</form> -->
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Mata Pelajaran</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
									<th>#</th>
									<th>Nama Mata Pelajaran</th>
									<th>Kode Mata Pelajaran</th>
          				<th>Deskripsi</th>
          				<th>Opsi</th>
                      </tr>
                    </thead>

					<tbody>

					<?php
						include "../conf/koneksi.php";

						$vw = mysqli_query($connect, "SELECT * FROM mapel ORDER BY id_mapel DESC");
						$no = 1;
						while ($b = mysqli_fetch_array($vw)){
					?><!--
					<img src='img_user/default.jpg'> -->
                      <tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $b['nama_mapel'] ?></td>
						<td><?php echo $b['kode_mapel'] ?></td>
						<td><?php echo $b['desk'] ?></td>
						<td>
							<div class="btn-group">

								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edMp&tid=<?php echo $b['id_mapel']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlMp&tid=<?php echo $b['id_mapel']; ?>' ">
							</div>
						</td>
                      </tr>

					  <?php $no++; } ?>
                    </tbody>

				  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

	<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Mata Pelajaran</h4>
        </div>
        <div class="modal-body">
          <form action="?page=svMp" method="post">
						<div class="box">
							<!-- /.box-header -->
							<div class="box-body">
								<!-- form start -->

									<div class="box-body">
										<div class="form-group">
											<label>Kode Mata Pelajaran</label>
											<input name="kode" type="text" class="form-control" placeholder="Masukan Kode Mata Pelajaran">
										</div>
									</div>
									<div class="box-body">
										<div class="form-group">
											<label>Nama Mata Pelajaran</label>
											<input name="mapel" type="text" class="form-control" placeholder="Masukan Nama Mata Pelajaran">
										</div>
									</div>
									<div class="box-body">
										<div class="form-group">
											<label>Deskripsi</label>
											<input name="desk" type="text" class="form-control" placeholder="Masukan Deskripsi Mata Pelajaran">
										</div>
									</div>

									<div class="box-footer">
										<button name="save" type="submit" class="btn btn-primary">Simpan</button>
									</div>
							</div>
							<!-- /.box-body -->
						</div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

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
