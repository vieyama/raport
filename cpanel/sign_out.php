<?php
	session_unset();
	session_destroy();
	echo "<script>alert('Anda menuju halaman login'); window.location = 'index.php?page=auth'</script>";
	exit;
?>