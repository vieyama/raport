<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	$ed = mysqli_query($connect, "SELECT * FROM mapel where id_mapel = '$_GET[tid]'");
	while ($r = mysqli_fetch_array($ed)){
?>

<!-- Main content -->
		<section class="content">
	<div class="row">

		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Mata Pelajaran</h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
					</div><!-- /. tools -->
				</div><!-- /.box-header -->

				<form role="form" name="form1" action="?page=upMp" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
					<div class="box-body">

						<p>
							<div class="form-group">
								<input type='hidden' name='tid' value="<?php echo $r['id_mapel']; ?>" >
							</div>
						</p>

						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Nama Mata Pelajaran</label>
								<input type="text" class="form-control" name="mapel" placeholder="Masukkan nama Mapel" value="<?php echo $r['nama_mapel']; ?>" required="required">
							</div>
						</p>

						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Kode Mata Pelajaran</label>
								<input type="text" class="form-control" name="kode" placeholder="Masukkan kode Mapel" value="<?php echo $r['kode_mapel']; ?>" required="required">
							</div>
						</p>

						<p>
							<div class="form-group">
								<label for="exampleInputPengguna1">Deskripsi</label>
								<input type="text" class="form-control" name="desk" placeholder="Masukkan Deskripsi Mapel" value="<?php echo $r['desk']; ?>" required="required">
							</div>
						</p>

					<div class="box-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
						<button type="submit" class="btn btn-primary pull-right" name="submit">Simpan</button>
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
