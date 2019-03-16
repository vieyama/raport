		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";

			/*-------- menghitung total jumlah guru -----------*/
			$sql1 = mysqli_query($connect, "select *, count(guru.nik) as jml_guru from guru");
			$r = mysqli_fetch_array($sql1);
			$jmlguru = $r['jml_guru'];


			/*-------- menghitung total jumlah kelas -----------*/
			$sql1 = mysqli_query($connect, "select *, count(kelas.id_kelas) as jml_kelas7 from kelas where jenis = '7'");
			$r = mysqli_fetch_array($sql1);
			$jmlkelas7 = $r['jml_kelas7'];

			/*-------- menghitung total jumlah kelas -----------*/
			$sql1 = mysqli_query($connect, "select *, count(kelas.id_kelas) as jml_kelas8 from kelas where jenis = '8'");
			$r = mysqli_fetch_array($sql1);
			$jmlkelas8 = $r['jml_kelas8'];

			/*-------- menghitung total jumlah kelas -----------*/
			$sql1 = mysqli_query($connect, "select *, count(kelas.id_kelas) as jml_kelas9 from kelas where jenis = '9'");
			$r = mysqli_fetch_array($sql1);
			$jmlkelas9 = $r['jml_kelas9'];

			/*-------- menghitung total jumlah siswa -----------*/
			$sql1 = mysqli_query($connect, "select *, count(siswa.nis) as jml_siswa from siswa");
			$r = mysqli_fetch_array($sql1);
			$jmlsiswa = $r['jml_siswa'];

			/*-------- menghitung total jumlah siswa -----------*/
			$sql1 = mysqli_query($connect, "select *, count(tahun_ajar.id_tahun) as jml_tahun from tahun_ajar");
			$r = mysqli_fetch_array($sql1);
			$jmltahun = $r['jml_tahun'];

			/*-------- menghitung total jumlah pengguna aktif -----------*/
			$sql6 = mysqli_query($connect, "select *, count(admin.id_admin) as jml_pengguna from admin");
			$w = mysqli_fetch_array($sql6);
			$jml_user = $w['jml_pengguna'];


			$sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
					$r = mysqli_fetch_array($sql);
					$id_guru = $r['idu'];

			/*-------- menghitung total kelas guru -----------*/
			$sql7 = mysqli_query($connect, "select *, count(kelas_guru.id_guru) as jml_wali from kelas_guru WHERE id_guru = '$id_guru'");
			$z = mysqli_fetch_array($sql7);
			$jml_wali = $z['jml_wali'];

		?>
		<div class="row">
		<?php if($r['email'] == "" && $r['img_pengguna'] == "")	{
		?>
		<div class="box-body">
		  <div class="callout callout-warning">
		    <h4>Perhatian!</h4>
		    <p align="justify">Silahkan lengkapi data diri anda terlebih dahulu sebelum menggunakan website ini.</p>
		    <p align="justify">Rubahlah username dan password agar lebih mudah di ingat.</p>
		    <div class="btn-group">
		      <div class="col-md-12">
		        <?php
		          if($_SESSION['username'] AND $r['hak_akses']=='Admin'){
		        ?>
		        <input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edt_profUsr&tid=<?php echo $r['idu']; ?>' ">
		      <?php }elseif($_SESSION['username'] AND $r['hak_akses']=='Guru'){ ?>
		      <input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edt_profGru&tid=<?php echo $r['idu']; ?>' ">
		    <?php }elseif($_SESSION['username'] AND $r['hak_akses']=='Siswa'){ ?>
		      <input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edt_profSv&tid=<?php echo $r['idu']; ?>' ">
		    <?php } ?>
		      </div>
		    </div>
		  </div>
		</div>

		<?php }else{ ?>
		<?php if($_SESSION['username'] AND $r['hak_akses']=='Admin'){ ?>
		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-aqua">
		      <div class="inner">
		        <h3><?php echo $jmlguru; ?></h3>
		        <p>Jumlah Guru</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->

		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-red">
		      <div class="inner">
		        <h3><?php echo $jmlkelas7; ?></h3>
		        <p>Jumlah Kelas VII</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->
		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-red">
		      <div class="inner">
		        <h3><?php echo $jmlkelas8; ?></h3>
		        <p>Jumlah Kelas VIII</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->
		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-red">
		      <div class="inner">
		        <h3><?php echo $jmlkelas9; ?></h3>
		        <p>Jumlah Kelas IX</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->

		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-orange">
		      <div class="inner">
		        <h3><?php echo $jmlsiswa; ?></h3>
		        <p>Jumlah Siswa</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->

		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-orange">
		      <div class="inner">
		        <h3><?php echo $jmltahun; ?></h3>
		        <p>Jumlah Tahun Ajar</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->


		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-green">
		      <div class="inner">
		        <h3><?php echo $jml_user; ?></h3>
		        <p>Jumlah Admin (Aktif)</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-person-add"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->
		<?php }elseif ($_SESSION['username'] AND $r['hak_akses']=='Guru') { ?>

		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-red">
		      <div class="inner">
		        <h3><?php echo $jml_wali; ?></h3>
		        <p>Jumlah Kelas</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-stats-bars"></i>
		      </div>
		    </div>
		  </div><!-- ./col -->

		<?php } ?>
		<?php } ?>
		</div><!-- /.row -->
     <div class="box box-primary">
	             <div class="box-header with-border">
	               <div class="box-tools pull-right">
	                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                 </button>
	                 <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	               </div>
	             </div>
	             <!-- /.box-header -->
	             <div class="box-body">
								 <center>
								 <h2>Visi dan Misi</h2>
								 <h3>VISI</h3>
								 <p>“ LANTIP ING PIKIR, LUHUR ING PAMBUDI, LEBDA ING AGAMI ”
									( Berfikir cerdas, Berperilaku luhur, Bertaqwa sesuai agama )</p>
								</center>
									<br>

								<center>
									<h3>MISI</h3>
									<ol>
										<li>Mengembangkan kemampuan akademis siswa secara optimal melalui proses pembelajarandanbimbingan yang efektif dan menyenangkan</li>
										<li>Menyelenggarakan pelatihan dan bimbingan untuk berprestasi di bidang olah raga</li>
										<li>Mengembangkan budaya tertib, disiplin untuk mentaati tata tertib sekolah</li>
										<li>Menumbuhkan penghayatan terhadap ajaran agama melalui kegiatan - kegiatan keagamaan secara terprogram dan terarah.</li>
										<li>Membantu siswa mengenali potensi dirinya dan mendorong agar berkembang  secara optimal.</li>
										<li>Mengembangkan potensi dan lingkungan sekolah untuk peningkatan layanan pendidikan.</li>
										<li>Menyelenggarakan pendidikan dan pelatihan yang mengarah pada penguasaan teknologi informatika</li>
									</ol>
								</center>
							 </div>
	             <!-- /.box-body -->
	             <div class="box-footer text-center">
	             </div>
	             <!-- /.box-footer -->
	           </div>
