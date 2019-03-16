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
				<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Tambah Siswa" onclick="window.location='?page=adSs'">
			</div>
			<div class="col-xs-3">
				<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Export to pdf" data-toggle="modal" data-target=".bs-example-modal-sm">
			</div>

			<!-- <form action="pages/siswa/pdf_user.php" method="post" target="_blank" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Export to PDF">
			</div>
			</form> -->
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			      <div class="modal-body">
	                <form action="pages/siswa/pdf_siswa.php" method="post" name="postform">
	                	<select class="form-control" name="kelas" required>
	                    <option>Pilih kelas</option>
	                    <?php
	                    $qk = mysqli_query($connect, "SELECT * FROM kelas");
	                    while ($kl = mysqli_fetch_array($qk)) {
	                    ?>
	                    <option value="<?php echo $kl['id_kelas']?>" name="kelas"><?php echo $kl['nama_kelas']?></option>
	                  <?php } ?>
	                    </select>
	              </div>
	              <div class="modal-footer">
	              	<button type="submit" class="btn btn-primary" name="getPdf">Save changes</button>
	                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	              </div>
	                </form>
			    </div>
			  </div>
			</div>
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Siswa</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
									<th>#</th>
									<th>No Induk Siswa</th>
									<th>Nama Siswa</th>
          				<th>Username</th>
          				<th>Password</th>
          				<th>Alamat</th>
          				<th>No Telf</th>
          				<th>Akses</th>
          				<th>Foto</th>
          				<th>Opsi</th>
                      </tr>
                    </thead>

					<tbody>

					<?php
						include "../conf/koneksi.php";

						$vw = mysqli_query($connect, "SELECT * from pengguna,siswa
													 WHERE pengguna.idu = siswa.idu AND pengguna.hak_akses = 'Siswa' Order By siswa.nis");
						$no = 1;
						while ($b = mysqli_fetch_array($vw)){
					?><!--
					<img src='img_user/default.jpg'> -->
                      <tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $b['nis'] ?></td>
                  		<td><?php echo $b['nama_siswa'] ?></td>
	                  	<td><?php echo $b['username'] ?></td>
	                  	<td><?php echo $b['pass_asli'] ?></td>
	                  	<?php if($b['alamat']==""){?>
	                  	<td><i>Data Belum di Isi</i></td>
	                  	<?php }else{ ?>
	                  	<td><?php echo $b['alamat'] ?></td>
	                  	<?php } ?>
	                  	<?php if($b['no_telp']==""){?>
	                  	<td><i>Data Belum di Isi</i></td>
	                  	<?php }else{ ?>
	                  	<td><?php echo $b['no_telp'] ?></td>
	                  	<?php } ?>
	                  	<td><?php echo $b['hak_akses'] ?></td>
	                  	<?php if($b['img_pengguna']==""){ ?>
	                  	<td><img src='img_user/default.jpg' width=50 oncontextmenu='return false;'></td>
	                  	<?php }else{ ?>
	                  	<td><?php echo "<img src='img_user/small_$b[img_pengguna]' width=50 oncontextmenu='return false;'>"; ?></td>
            			<?php } ?>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edSs&tid=<?php echo $b['idu']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlSs&tid=<?php echo $b['idu']; ?>' ">
								<input type="button" class="btn btn-default" name="submit" value="Detail" onclick="window.location='?page=profileSv&tid=<?php echo $b['idu']; ?>' ">
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
