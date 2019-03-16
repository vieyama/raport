<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	include "../cpanel/format_tanggal.php";
	$ed = mysqli_query($connect, "SELECT * FROM admin, pengguna where admin.idu = pengguna.idu AND pengguna.idu = '$_GET[tid]'");
	while ($r = mysqli_fetch_array($ed)){
?>

<!-- Main content -->
		<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Profil Admin <small>SMAN 3 Susukan</small></h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div><!-- /. tools -->
				</div><!-- /.box-header -->
				<?php $sql = mysqli_query($connect, "select * from admin,pengguna where admin.idu = pengguna.idu and pengguna.username = '$_SESSION[username]'");
				$k = mysqli_fetch_array($sql);
				$s = $_SESSION['username'];
				$id = $k['id_admin'];
				if($r['id_admin'] != $id) { ?>

			<?php }else{ ?>
				<div class="col-md-12">
							<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edt_profUsr&tid=<?php echo $r['idu']; ?>' ">
				</div>
			<?php } ?>

				<div class="box-body">
					<p>
						<div class="form-group">
							<label for="exampleInputNoReg1">No. Induk</label>
							<input type="text" class="form-control" name="noreg" id="exampleInputNoReg1" placeholder="No. registrasi." value="<?php echo $r['id_admin']; ?>" disabled>
						</div>
					</p>

					<p>
						<div class="form-group">
							<label for="exampleInputNmSmnr1">Nama Admin</label>
							<input type="text" class="form-control" name="nm_seminar" id="exampleInputNmSmnr1" placeholder="Nama seminar." value="<?php echo $r['nama']; ?>" disabled>
						</div>
					</p>

					<p>
						<div class="form-group">
							<label for="exampleInputId1">Email Admin</label>
							<input type="text" class="form-control" name="jns_id" id="exampleInputId1" placeholder="Email Belum diisi" value="<?= $r['email']; ?>" disabled>
						</div>
					</p>

					<p>
						<div class="form-group">
							<label for="exampleInputNoId1">Tempat Lahir</label>
							<input type="text" class="form-control" name="no_id" id="exampleInputNoId1" placeholder="Tempat Lahir Belum diisi" value="<?php echo $r['tempat_lahir']; ?>" disabled>
						</div>
					</p>
					<p>
						<div class="form-group">
							<label for="exampleInputTglDaftar1">Tanggal Lahir</label>
							<input type="text" class="form-control" name="tgl_daftar" id="exampleInputTglDaftar1" placeholder="Tanggal Belum diisi" value="<?php echo indonesian_date($r['tgl_lahir']); ?>" disabled>
						</div>
					</p>

					<p>
						<div class="form-group">
							<label for="exampleInputTglDaftar1">Jenis Kelamin</label>
							<input type="text" class="form-control" name="tgl_daftar" id="exampleInputTglDaftar1" placeholder="Tanggal Belum diisi" value="<?php echo $r['jenis_kelamin']; ?>" disabled>
						</div>
					</p>

					<p>
						<div class="form-group">
							<label for="exampleInputEmailPst1">Agama</label>
							<input type="text" class="form-control" name="email" id="exampleInputEmailPst1" placeholder="Email Belum diisi" value="<?php echo $r['agama']; ?>" readonly>
						</div>
					</p>
					<p>
						<div class="box-body pad">
							<label>Alamat</label>
							<textarea class="textarea" name="alamat" placeholder="Alamat Belum diisi" disabled style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat']; ?></textarea>
						</div>
					</p>

					<p>
						<div class="form-group">
							<label for="exampleInputNoHp1">No. HP</label>
							<input type="text" class="form-control" name="nohp" id="exampleInputNoHp1" placeholder="No. HP Belum diisi" value="<?php echo $r['no_telp']; ?>" disabled>
						</div>
					</p>
					
					<p>
						<div class="form-group">
							<label for="exampleInputKodePos1">Foto</label><br>
							<?php if($r['img_pengguna']==""){ ?>
								<img src="img_user/small_default.jpg" class="user-image" alt="User Image">
							<?php }else{ ?>
							<img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="user-image" alt="User Image" width="25%">
							<?php } ?>
						</div>
					</p>

				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Kembali</button>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- ./row -->
		</section><!-- /.content -->

<script src="jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>
	$('#datetimepicker1').datetimepicker({
		datepicker:false,
		format:'H:i',
		step:5
	});
	$('#datetimepicker2').datetimepicker({
		yearOffset:10,
		lang:'ch',
		timepicker:false,
		/*-- format:'d/m/Y', format tanggal indonesia --*/
		format:'Y/m/d',
		formatDate:'Y/m/d',
		minDate:'-2010/01/02', // yesterday is minimum date
		maxDate:'+2010/01/02' // and tommorow is maximum date calendar
	});
</script>

<?php } ?>
