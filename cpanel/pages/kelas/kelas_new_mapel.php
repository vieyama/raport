<?php
  include "../conf/koneksi.php";
  include "../lib/inc.session.php";
  $ed = mysqli_query($connect, "SELECT * FROM kelas, guru WHERE kelas.wali_kelas = guru.nik AND kelas.id_kelas = '$_GET[tid]'");
  while ($r = mysqli_fetch_array($ed)){
?>

<!-- Main content -->
    <section class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Mata Pelajaran di kelas ~ <?php echo $r['nama_kelas'] ?> ~</h3>

          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->

        <form role="form" name="form1" action="?page=svKlMp" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
          <div class="box-body">

            <p>
              <div class="form-group">
                <input type='hidden' name='tid' value="<?php echo $_GET['tid']; ?>" >
                <input type='hidden' name='kelas' value="<?php echo $r['id_kelas']; ?>" >
                <input type='hidden' name='tahun' value="<?php echo $r['id_tahun']; ?>" >
              </div>
            </p>

            <p>
              <div class="form-group">
                <label for="exampleInputPengguna1">Nama Guru</label>
                  <select class="form-control" name="guru" required>
                    <option>Belum di Isi</option>
                    <?php
                    $qk = mysqli_query($connect, "SELECT * FROM guru");
                    while ($kl = mysqli_fetch_array($qk)) {
                    ?>
                    <option value="<?php echo $kl['nik']?>" name="guru"><?php echo $kl['nama_guru']?></option>
                  <?php } ?>
                    </select>
              </div>
            </p>

            <p>
              <div class="form-group">
                <label for="exampleInputPengguna1">Semester</label>
                  <select class="form-control" name="smt" required>
                    <option>Belum di Isi</option>
                    <?php
                    $qk = mysqli_query($connect, "SELECT * FROM semester");
                    while ($kl = mysqli_fetch_array($qk)) {
                    ?>
                    <option value="<?php echo $kl['id_smt']?>" name="smt"><?php echo $kl['smt']?></option>
                  <?php } ?>
                    </select>
              </div>
            </p>

            <p>
              <div class="form-group">
                <label for="exampleInputPengguna1">Mata Pelajaran</label>
                  <select class="form-control" name="mapel" required>
                    <option>Belum di Isi</option>
                    <?php
                    $qk = mysqli_query($connect, "SELECT * FROM mapel");
                    while ($kl = mysqli_fetch_array($qk)) {
                    ?>
                    <option value="<?php echo $kl['id_mapel']?>" name="mapel"><?php echo $kl['nama_mapel']?></option>
                  <?php } ?>
                    </select>
              </div>
            </p>


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
