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
				<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Tambah Admin" onclick="window.location='?page=adUs'">
			</div>
			<form action="pages/admin/pdf_admin.php" method="post" target="_blank" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Export to PDF">
			</div>
			</form>
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Admin</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>No Induk</th>
						<th>Nama Pegawai</th>
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

						$sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE username = '$_SESSION[username]'");
						$r = mysqli_fetch_array($sql);

						$vw = mysqli_query($connect, "SELECT pengguna.*, admin.* from pengguna RIGHT JOIN admin on pengguna.idu = admin.idu Order By admin.id_admin DESC");
						$no = 1;
						while ($b = mysqli_fetch_array($vw)){
					?><!--
					<img src='img_user/default.jpg'> -->
                      <tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $b['id_admin'] ?></td>
                  		<td><?php echo $b['nama'] ?></td>
	                  	<td><?php echo $b['username'] ?></td>
	                  	<td><?php echo $b['pass_asli'] ?></td>
	                  	<?php if($b['alamat']==""){?>
	                  	<td><i>Data Belum di Isi</i></td>
	                  	<?php }else{ ?>
	                  	<td><?php
											$str = $b['alamat'] ;
											echo strip_tags($str);
											?></td>
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

								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edUs&tid=<?php echo $b['idu']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlUs&tid=<?php echo $b['idu']; ?>' ">
								<input type="button" class="btn btn-default" name="submit" value="Detail" onclick="window.location='?page=profileUsr&tid=<?php echo $b['idu']; ?>' ">
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
