<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	$ed = mysqli_query($connect, "SELECT * FROM pengguna, guru WHERE pengguna.idu = guru.idu AND pengguna.idu = '$_GET[tid]'");
	while ($r = mysqli_fetch_array($ed)){
?>

<!-- Main content -->
		<section class="content">
	<div class="row">

		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Guru</h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div><!-- /. tools -->
				</div><!-- /.box-header -->

				<form role="form" name="form1" action="?page=upProfGru" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
					<div class="box-body">

						<p>
							<div class="form-group">
								<input type='hidden' name='tid' value="<?php echo $r['idu']; ?>" >
								<label for="exampleInputPasswd1">NIP</label>
								<input type="text" class="form-control" name="no_induk" id="exampleInputPasswd1" placeholder="Masukkan No Induk" value="<?php echo $r['nik']; ?>" required>
							</div>
						</p>

						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Nama Guru</label>
								<input type="text" class="form-control" name="nama" id="exampleInputPengguna1" placeholder="Masukkan nama Pegawai" value="<?php echo $r['nama']; ?>" required="required">
							</div>
						</p>
						<?php if ($r['email'] == ""){?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Email</label>
								<br><i>Email Belum di Isi</i>
								<input type="email" class="form-control" name="email" id="exampleInputPengguna1" placeholder="Masukkan Email Pegawai" value="<?php echo $r['email']; ?>" required="required">
							</div>
						</p>
						<?php }else{?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Email</label>
								<input type="email" class="form-control" name="email" id="exampleInputPengguna1" placeholder="Masukkan Email Pegawai" value="<?php echo $r['email']; ?>" required="required">
							</div>
						</p>
						<?php } ?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Username</label>
								<input type="text" class="form-control" name="username" id="exampleInputPengguna1" placeholder="Masukkan nama Pegawai" value="<?php echo $r['username']; ?>" required="required">
							</div>
						</p>

						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Password</label>
								<input type="password" class="form-control" name="password" id="exampleInputPengguna1" placeholder="Masukkan Password" required="required">
							</div>
						</p>


							<div class="form-group">
								<input type="hidden" name="hak" value="Guru">
							</div>

						<?php if($r['tempat_lahir']==""){ ?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Tempat Lahir</label>
								<br><i>Tempat Lahir Belum di Isi</i>
								<input type="text" class="form-control" name="tempat_lahir" id="exampleInputPengguna1" placeholder="Masukkan Tempat Lahir" value="<?php echo $r['tempat_lahir']; ?>" required="required">
							</div>
						</p>
						<?php }else{ ?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" id="exampleInputPengguna1" placeholder="Masukkan Tempat Lahir" value="<?php echo $r['tempat_lahir']; ?>" required="required">
							</div>
						</p>
						<?php } ?>

						<?php if($r['tgl_lahir']==""){ ?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Tanggal Lahir</label>
								<br><i>Tanggal Lahir Belum di Isi</i>
								<input type="text" name="tgl_lahir" class="form-control" id="datetimepicker2" placeholder="Pilih tanggal." value="<?php echo $r['tgl_lahir']?>" required="required">
							</div>
						</p>
						<?php }else{?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Tanggal Lahir</label>
								<input type="text" name="tgl_lahir" class="form-control" id="datetimepicker2" placeholder="Pilih tanggal." value="<?php echo $r['tgl_lahir']?>" required="required">
							</div>
						</p>
						<?php } ?>

						<?php if ($r['jenis_kelamin'] == ""){?>
						<p>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<br><i>Jenis Kelamin Belum di Isi</i>
							</div>

							<div class="form-group">
								<input type="radio" name="jk" id="optionsRadios1" value="Laki-laki" > Laki - Laki &nbsp;
								<input type="radio" name="jk" id="optionsRadios1" value="Perempuan" > Perempuan
							</div>
						</p>
					<?php }elseif($r['jenis_kelamin']=="Laki-laki"){?>
						<p>
							<div class="form-group">
								<label>Jenis Kelamin</label>
							</div>
							<div class="form-group">
								<input type="radio" name="jk" id="optionsRadios1" value="Laki-laki" checked> Laki - Laki &nbsp;
								<input type="radio" name="jk" id="optionsRadios1" value="Perempuan" > Perempuan
							</div>
						</p>
						<?php }else{?>
						<p>
							<div class="form-group">
								<label>Jenis Kelamin</label>
							</div>
							<div class="form-group">
								<input type="radio" name="jk" id="optionsRadios1" value="Laki-laki" checked> Laki - Laki &nbsp;
								<input type="radio" name="jk" id="optionsRadios1" value="Perempuan" checked> Perempuan
							</div>
						</p>
						<?php } ?>

						<?php if ($r['agama'] == ""){?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Agama</label>
								<select class="form-control" name="agama" id="agama" required>
													<option>Belum di Isi</option>
													<option value="Islam" name="islam">Islam</option>
													<option value="Kristen" name="kristen">Kristen</option>
													<option value="Katolik" name="katolik">Katolik</option>
													<option value="Hindu" name="hindu">Hindu</option>
													<option value="Budha" name="budha">Budha</option>
												</select>
							</div>
						</p>
						<?php }else{ ?>
						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Agama</label><br>
								<p>Agama Terpilih : <?php echo $r['agama']?></p>
								<select class="form-control" name="agama" id="agama" required>
													<option>Pilih Agama</option>
													<option value="Islam" name="islam">Islam</option>
													<option value="Kristen" name="kristen">Kristen</option>
													<option value="Katolik" name="katolik">Katolik</option>
													<option value="Hindu" name="hindu">Hindu</option>
													<option value="Budha" name="budha">Budha</option>
												</select>
							</div>
						</p>
						<?php } ?>

						<?php if($r['alamat']==""){ ?>
						<p>
							<div class="form-group">
								<label>Alamat Lengkap</label>
								<br><i>Belum di Isi</i>
								<input class="form-control" type="text" name="alamat" value="<?php echo $r['alamat']; ?>">
							</div>
						</p>
						<?php }else{?>
						<p>
							<div class="form-group">
								<label>Alamat Lengkap</label>
								<input class="form-control" type="text" name="alamat" value="<?php echo $r['alamat']; ?>">
							</div>
						</p>
						<?php }?>

						<?php if($r['no_telp']==""){?>
						<p>
							<div class="form-group">
								<label for="exampleInputKotaKab1">No Telp</label>
								<br><i>Belum di Isi</i>
								<input type="text" class="form-control" name="no_telp" id="exampleInputKotaKab1" placeholder="Masukkan Nomor Telefon/Handphone" value="<?php echo $r['no_telp']; ?>" required="required">
							</div>
						</p>
						<?php }else{?>
						<p>
							<div class="form-group">
								<label for="exampleInputKotaKab1">No Telp</label>
								<input type="text" class="form-control" name="no_telp" id="exampleInputKotaKab1" placeholder="Masukkan Nomor Telefon/Handphone" value="<?php echo $r['no_telp']; ?>" required="required">
							</div>
						</p>
						<?php }?>

						<p>
							<div class="form-group">
								<label for="exampleInputKodePos1">Foto</label><br>
								<?php if($r['img_pengguna']==""){ ?>
									<img src="img_user/small_default.jpg" class="user-image" alt="User Image">
								<?php }else{ ?>
								<img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="user-image" alt="User Image">
								<?php } ?>
							</div>
						</p>

						<p>
							<div class="form-group">
								<label for="exampleInputFile">Ubah Foto Pengguna</label>
								<input type="file" id="exampleInputFile" name="fupload">
								<p class="help-block">File foto harus bertipe *.jpeg, *.jpg, atau *.png</p>
							</div>
						</p>
					</div>
					<div class="box-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
						<button type="submit" class="btn btn-primary pull-right" name="submit">Save changes</button>
					</div>
				</form>
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
		yearOffset:0,
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
