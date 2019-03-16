<?php
	
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "raport");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	$sql = "SELECT * FROM siswa 
			WHERE nama_siswa LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result = $mysqli->query($sql);
	
	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['nama_siswa'];
	}

	echo json_encode($json);