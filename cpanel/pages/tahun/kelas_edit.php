		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";

			$ed = mysqli_query($connect, "SELECT kelas.*, tahun_ajar.*, guru.* FROM
				kelas RIGHT JOIN tahun_ajar on tahun_ajar.id_tahun = kelas.id_tahun
				RIGHT JOIN guru on guru.nik = kelas.wali_kelas WHERE kelas.id_kelas = '$_GET[tid]'");
			while ($r = mysqli_fetch_array($ed)){
		?>

    <!-- Main content -->
        <section class="content">
		      <div class="row">
		        <div class="col-md-12">
		          <div class="box">
		            <div class="box-header with-border">
		              <h3 class="box-title">Edit Surat Keluar</h3>
		              <!-- tools box -->
		              <div class="pull-right box-tools">
		                <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
		                <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		              </div><!-- /. tools -->
		            </div><!-- /.box-header -->
								<form role="form" action="?page=upKl" method="POST">
									<div class="box-body">
										<div class="form-group">
											<input type='hidden' name='tid' value="<?php echo $r['id_kelas']; ?>" >
											<label for="exampleInputEmail1">Nama Kelas</label>
											<input name="kelas" type="text" class="form-control" value="<?php echo $r['nama_kelas']; ?>" placeholder="Nama Kelas">
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Nama Wali Kelas</label>
											<p>Pilihan saat ini : <b><?php echo $r['nama_guru']?></b></p>
											<select class="form-control" name="wali_kelas" required>
												<option>Pilihan Wali Kelas</option>
												<?php
												$w = mysqli_query($connect, "SELECT * FROM guru");
												while ($a = mysqli_fetch_array($w)) { ?>
												<option value="<?php echo $a['nik']?>" name="wali_kelas"><?php echo $a['nama_guru']; ?></option>
											<?php } ?>
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Tahun Ajar</label>
											<p>Pilihan saat ini : <b><?php echo $r['tahun_ajar']?></b></p>

											<select class="form-control" name="tahun_ajar" required>
												<option>Belum di Isi</option>
												<?php
												$z = mysqli_query($connect, "SELECT * FROM tahun_ajar");
												while ($b = mysqli_fetch_array($z)) { ?>
												<option value="<?php echo $b['id_tahun']?>"><?php echo $b['tahun_ajar']; ?></option>
											<?php } ?>
											</select>
										</div>

									</div><!-- /.box-body -->

									<div class="box-footer">
										<button name="save" type="submit" class="btn btn-primary">Edit Kelas</button>
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
      $('#datetimepicker3').datetimepicker({
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
