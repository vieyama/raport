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
				<input type="button" class="btn btn-block btn-primary" name="addBtnUser" value="Tambah Guru" onclick="window.location='?page=adGr'">
			</div>
			<form action="pages/guru/pdf_guru.php" method="post" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Export to PDF">
			</div>
			</form>
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Guru</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
									<th>#</th>
									<th>No Induk</th>
									<th>Nama Guru</th>
									<th>Jenis Kelamin</th>
									<th>Username</th>
          				<th>Password</th>
          				<th>Alamat</th>
          				<th>No Telf</th>
          				<th>Foto</th>
          				<th>Opsi</th>
                      </tr>
                    </thead>

					<tbody>

					<?php
						include "../conf/koneksi.php";
						$sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE username = '$_SESSION[username]'");
						$r = mysqli_fetch_array($sql);

						$vw = mysqli_query($connect, "SELECT * from pengguna,guru
													 WHERE pengguna.idu = guru.idu AND pengguna.hak_akses = 'Guru' Order By guru.nik");
						$no = 1;
						while ($b = mysqli_fetch_array($vw)){
					?><!--
					<img src='img_user/default.jpg'> -->
                      <tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $b['nik'] ?></td>
                  		<td><?php echo $b['nama'] ?></td>
											<td><?php echo $b['jenis_kelamin'] ?></td>
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
	                  	<?php if($b['img_pengguna']==""){ ?>
	                  	<td><img src='img_user/default.jpg' width=50 oncontextmenu='return false;'></td>
	                  	<?php }else{ ?>
	                  	<td><?php echo "<img src='img_user/small_$b[img_pengguna]' width=50 oncontextmenu='return false;'>"; ?></td>
            			<?php } ?>
						<td>
							<div class="btn-group">

								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edGr&tid=<?php echo $b['idu']; ?>' ">
								<input type="button" class="btn btn-default" name="submit" value="Hapus" onclick="window.location='?page=dlGr&tid=<?php echo $b['idu']; ?>' ">
								<input type="button" class="btn btn-default" name="submit" value="Detail" onclick="window.location='?page=profileGr&tid=<?php echo $b['idu']; ?>' ">
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
