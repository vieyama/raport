<?php
	include "../lib/inc.session.php";
	include "../conf/koneksi.php";
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

		    <section class="content">
					<div class="row">
						<?php
								$query = mysqli_query($connect, "SELECT * FROM siswa where nis = '$_GET[tid]'");
								$dat = mysqli_num_rows($query);

								if ($dat > 0) {
									}else{
							 ?>
							 <form action="pages/nilai/pdf_nilai.php" method="post" name="postform">
						<div class="col-xs-3">
							<input type="hidden" name="tid" value="<?php echo $_GET['tid']; ?>">
							<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Cetak ke pdf">
						</div>
						</form>
						<?php } ?>
					</div>
		      <!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Data Siswa</h3>
		        </div>
		        <div class="box-body">
							<?php
								$query1 = mysqli_query($connect, "SELECT * FROM nilai, siswa, kelas, semester, tahun_ajar WHERE nilai.id_siswa = siswa.nis AND nilai.id_kelas = kelas.id_kelas AND nilai.id_smt = semester.id_smt AND kelas.id_tahun = tahun_ajar.id_tahun AND siswa.nis = '$_GET[tid]'");
								$data = mysqli_fetch_array($query1);
							 ?>
		          <table class="table">
								<thead>
									<tr>
										<td width="300px">Nama </td>
										<td><?php echo $data['nama_siswa'] ?></td>
									</tr>
									<tr>
										<td width="300px">NIS </td>
										<td><?php echo $data['id_siswa'] ?></td>
									</tr>
									<tr>
										<td>Kelas </td>
										<td><?php echo $data['nama_kelas'] ?></td>
									</tr>
									<tr>
										<td>Semester </td>
										<td><?php echo $data['smt'] ?></td>
									</tr>
									<tr>
										<td>Tahun ajar </td>
										<td><?php echo $data['tahun_ajar'] ?></td>
									</tr>
								</thead>
		          </table>
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

					<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Sikap Sosial</h3>
		        </div>
		        <div class="box-body">
							<?php
								$query = mysqli_query($connect, "SELECT * FROM sikap, siswa WHERE sikap.id_siswa = siswa.nis AND siswa.nis = '$_GET[tid]'");
								if (mysqli_num_rows($query) > 0) {
								$data = mysqli_fetch_array($query);
							 ?>
							 <table class="table">
							 	<thead>
							 		<tr>
							 			<th>Predikat</th>
							 			<th>Keterangan</th>
							 		</tr>
							 	</thead>
							 	<tbody>
							 		<tr>
							 			<td><?php echo $data['nilai_sikap_sosial'] ?></td>
							 			<td><?php echo $data['desk_sikap_sosial'] ?></td>
							 		</tr>
							 <?php }else{ ?>
							 	<tr>
							 		<td style="color : red;" >Data kosong</td>
							 	</tr>
							 <?php } ?>
							 	</tbody>
							 </table>		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

					<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Sikap Spiritual</h3>
		        </div>
		        <div class="box-body">
							<?php
								$query = mysqli_query($connect, "SELECT * FROM sikap, siswa WHERE sikap.id_siswa = siswa.nis AND siswa.nis = '$_GET[tid]'");
								if (mysqli_num_rows($query) > 0) {
								$data = mysqli_fetch_array($query);
							 ?>
							 <table class="table">
							 	<thead>
							 		<tr>
							 			<th>Predikat</th>
							 			<th>Keterangan</th>
							 		</tr>
							 	</thead>
							 	<tbody>
							 		<tr>
							 			<td><?php echo $data['nilai_sikap_spiritual'] ?></td>
							 			<td><?php echo $data['desk_sikap_spiritual'] ?></td>
							 		</tr>
							 <?php }else{ ?>
							 	<tr>
							 		<td style="color : red;" >Data kosong</td>
							 	</tr>
							 <?php } ?>
							 	</tbody>
							 </table>		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

					<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Nilai Pengetahuan</h3>
		        </div>
		        <div class="box-body">
		          <table class="table table-bordered">
								<thead>
									<tr>
					            <th rowspan="2">No</th>
											<th rowspan="2">Nama Mata Pelajaran</th>
					            <th rowspan="2">KKM</th>
											<th colspan="3" align="center">Pengetahuan</th>
					            <th colspan="3" align="center">Keterampilan</th>
					        </tr>
									<tr>
					            <th>Angka</th>
											<th>Predikat</th>
					            <th>Keterangan</th>
											<th>Angka</th>
											<th>Predikat</th>
					            <th>Keterangan</th>
					        </tr>

								</thead>
								<tbody>
									<?php
										$query2 = mysqli_query($connect, "SELECT * FROM siswa, nilai, kelas, mapel WHERE siswa.nis = nilai.id_siswa AND nilai.id_mapel = mapel.id_mapel and nilai.id_kelas = kelas.id_kelas and siswa.nis = '$_GET[tid]'");
											$no = 1;
										while ($data1 = mysqli_fetch_array($query2)) {
									 ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data1['nama_mapel'] ?></td>
										<td>75</td>
										<td><?php echo $data1['nilai_pengetahuan'] ?></td>
										<td><?php echo $data1['grade_peng'] ?></td>
										<td><?php echo $data1['desk_peng'] ?></td>
										<td><?php echo $data1['nilai_ketrampilan'] ?></td>
										<td><?php echo $data1['grade_ket'] ?></td>
										<td><?php echo $data1['desk_ket'] ?></td>
									</tr>
								<?php } ?>
								</tbody>
		          </table>
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

					<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Nilai Ekstrakulikuler</h3>
		        </div>
		        <div class="box-body">
		          <table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Ekstrakulikuler</th>
										<th>Predikat</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query3 = mysqli_query($connect, "SELECT * FROM ekskul, siswa
											WHERE ekskul.id_siswa = siswa.nis
											AND siswa.nis = '$_GET[tid]'");
											$no = 1;
											if (mysqli_num_rows($query3) > 0) {
										while ($data3 = mysqli_fetch_array($query3)) {
									 ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data3['nama_ekskul'] ?></td>
										<td><?php echo $data3['nilai_ekskul'] ?></td>
										<td><?php echo $data3['desk_ekskul'] ?></td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<tr>
									<td style="color : red;" >Data kosong</td>
								</tr>
							<?php } ?>
								</tbody>
		          </table>
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

					<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Nilai Prestasi</h3>
		        </div>
		        <div class="box-body">
		          <table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Prestasi</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$query4 = mysqli_query($connect, "SELECT * FROM prestasi, siswa
											WHERE prestasi.id_siswa = siswa.nis
											AND siswa.nis = '$_GET[tid]'");
											$no = 1;
											if (mysqli_num_rows($query4) > 0) {
												while ($data4 = mysqli_fetch_array($query4)) {
									 ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data4['nama_prestasi'] ?></td>
										<td><?php echo $data4['deskripsi'] ?></td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<tr>
									<td style="color : red;" >Data kosong</td>
								</tr>
							<?php } ?>
								</tbody>
		          </table>
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->

					<!-- Default box -->
		      <div class="box">
		        <div class="box-header with-border">
		          <h3 class="box-title">Ketidakhadiran</h3>
		        </div>
		        <div class="box-body">
		          <table class="table">
								<thead>
									<?php
										$query5 = mysqli_query($connect, "SELECT * FROM ketidakhadiran, siswa
											WHERE ketidakhadiran.id_siswa = siswa.nis
											AND siswa.nis = '$_GET[tid]'");
											$no = 1;
											if (mysqli_num_rows($query5) > 0) {
												$data5 = mysqli_fetch_array($query5);
									 ?>
									<tr>
										<td width="300px">Sakit </td>
										<td> <?php echo $data5['sakit'] ;?> kali</td>
									</tr>
									<tr>
										<td width="300px">Izin </td>
										<td> <?php echo $data5['izin'] ;?> kali</td>
									</tr>
									<tr>
										<td>Tanpa Keterangan </td>
										<td> <?php echo $data5['alfa'] ;?> kali</td>
									</tr>
								<?php }else{ ?>
									<tr>
										<td width="300px">Sakit </td>
										<td> - kali</td>
									</tr>
									<tr>
										<td width="300px">Izin </td>
										<td> - kali</td>
									</tr>
									<tr>
										<td>Alfa </td>
										<td> - kali</td>
									</tr>
								<?php } ?>
								</thead>
		          </table>
		        </div>
		        <!-- /.box-footer-->
		      </div>
		      <!-- /.box -->


		    </section>


    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- script datatables -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
  </body>
</html>
