<?php
if(empty($_SESSION['username'])) { //jika session berupa username kosong, makan baris dibawah akan muncul
	echo "<script>alert('Maaf akses ditolak! Anda telah melakukan pelanggaran dengan mencoba mengakses halaman administrator via URL. Silahkan login dengan username dan password Anda untuk dapat mengakses halaman administrator.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=home.php?page=auth'>"; //jika session berjalan maka akan terlembar ke alamat link berikut
	exit;
	//baris ke 3 ada <script>alert('');</script> yg merupakan sintax dari javascript untuk mengeluarkan alert berupa notifikasi popup yg muncul berupa kotak dialog
} 
?>