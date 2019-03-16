<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
?>


		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Tambah Data Siswa</h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  <?php
              function passAcak($panjang)
              {
               $karakter = '';
               $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
               $karakter .= '1234567890'; // karakter numerik
                // karakter simbol

               $string = '';
               for ($i=0; $i < $panjang; $i++) {
                $pos = rand(0, strlen($karakter)-1);
                $string .= $karakter{$pos};
               }
               return $string;
              }
              ?>

						<form role="form" name="form1" action="?page=svSs" method="post" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
						<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">NIS</label>
										<input type="number" class="form-control" name="nis" id="exampleInputPengguna1" placeholder="Masukkan NIS Siswa" required="required">
									</div>
								</p>
							</div>
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">Nama Siswa</label>
										<input type="text" class="form-control" name="nama_pengguna" id="exampleInputPengguna1" placeholder="Masukkan nama pengguna" required="required">
									</div>
								</p>
							</div>
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">Username</label>
										<input type="text" class="form-control" name="username" id="exampleInputPengguna1" value="<?php echo passAcak(8);?>" required="required" readonly>
									</div>
								</p>
							</div>
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">Password</label>
										<input type="text" class="form-control" name="password" id="exampleInputPengguna1" value="<?php echo passAcak(8);?>" required="required" readonly>
									</div>
								</p>
							</div>
							<div class="box-body">
								<p>
									<div class="form-group">
										<input type="hidden" name="hak" value="Siswa">
									</div>
								</p>
							</div>
							<div class="box-body">
				<script type="text/javascript">
				function validasi_input(form){
				 if (form.kelas.value =="pilih"){
				    alert("Anda belum memilih kelas!");
				    return (false);
				 }
				return (true);
				}
				</script>
								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">Kelas</label>
											<select class="form-control" name="kelas" required="required">
												<option value="pilih" selected>Pilih kelas</option>
												<?php
												$qk = mysqli_query($connect, "SELECT * FROM kelas");
												while ($kl = mysqli_fetch_array($qk)) {
											  ?>
												<option value="<?php echo $kl['id_kelas']?>" name="kelas"><?php echo $kl['nama_kelas']?></option>
											<?php } ?>
												</select>
									</div>
								</p>
							</div>
							<div class="box-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
								<button type="submit" class="btn btn-primary pull-right" name="submit">Save</button>
							</div>
						</form>
					</div>
				</div><!-- /.col-->
			</div><!-- ./row -->
        </section><!-- /.content -->
