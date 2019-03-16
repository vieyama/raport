		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";

			$ed = mysqli_query($connect, "SELECT * FROM pengguna,admin
			                   WHERE pengguna.idu = admin.idu AND pengguna.idu = '$_GET[tid]'");
			while ($r = mysqli_fetch_array($ed)){
		?>

		<!-- Main content -->
        <section class="content">
			<div class="row">

			<div class="col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<i class="fa fa-bullhorn"></i>
						<h3 class="box-title">Kolom Informasi</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="callout callout-info">
							<h4>Perhatian!</h4>
							<p align="justify">Silahkan ganti password untuk keamanan dan kenyamanan Anda.</p>
							<p align="justify">Hindari penggunaan password dengan tanggal lahir, atau karakter yang mudah diingat oleh orang lain.</p>
							<p align="justify">Selalu gunakan kombinasi huruf dan angka.</p>
							<p align="justify">Ubah password Anda secara berkala.</p>
						</div>
					</div>
				</div>
			</div>

				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Admin</h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->

						<form role="form" name="form1" action="?page=upProfUsr" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
							<input type='hidden' name='tid' value="<?php echo $r['idu']; ?>" >
							<div class="box-body">

								<p>
									<div class="form-group">
										<label for="exampleInputPasswd1">No. Induk</label>
										<input type="text" class="form-control" name="no_induk" id="exampleInputPasswd1" placeholder="Masukkan No Induk" value="<?php echo $r['idu']; ?>" readonly>
									</div>
								</p>

								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">Nama Pegawai</label>
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
										<input type="text" class="form-control" name="password" id="exampleInputPengguna1" placeholder="Masukkan nama Pegawai" value="<?php echo $r['pass_asli']; ?>" required="required">
									</div>
								</p>
								<p>
									<div class="form-group">
										<input type="hidden" class="form-control" name="hak_akses" id="exampleInputPengguna1" placeholder="Masukkan nama Pegawai" value="<?php echo $r['hak_akses']; ?>" readonly>
									</div>
								</p>

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
										<input class="form-control" placeholder="Masukkan alamat pengguna (nama jalan, nama daerah/komplek/cluster, blok, no. rumah, rt, rw, desa/kelurahan, kecamatan)" type="text" name="alamat" value="<?php echo $r['alamat']; ?>" required>
									</div>
								</p>
								<?php }else{?>
								<p>
									<div class="form-group">
										<label>Alamat Lengkap</label>
										<input class="form-control" placeholder="Masukkan alamat pengguna (nama jalan, nama daerah/komplek/cluster, blok, no. rumah, rt, rw, desa/kelurahan, kecamatan)" type="text" name="alamat" value="<?php echo $r['alamat']; ?>" required>
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
										<?php echo "<img src='img_user/$r[img_pengguna]' oncontextmenu='return false;'>"; ?>
										<!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
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
