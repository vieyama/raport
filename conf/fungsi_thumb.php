<?php
/*---------------- UNTUK FOTO USER ------------------------------------------------*/
function UploadUser($fupload_name){ //nama function yg akan digunakan untuk upload gambar
  //direktori gambar
  $vdir_upload = "img_user/"; //nama folder penyimpanan images yg terupload
  $vfile_upload = $vdir_upload . $fupload_name; //menggabungkan nama folder dgn nama file
  $imageType = $_FILES["fupload"]["type"]; //inisialisasi variable tipe gambar

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif": //untuk tipe gambar gif
			$im_src=imagecreatefromgif($vfile_upload);
			break;
		case "image/jpeg": //untuk tipe gambar jpeg
		case "image/jpg":  //untuk tipe gambar jpg
			$im_src=imagecreatefromjpeg($vfile_upload);
			break;
	  case "image/png": //untuk tipe gambar png
			$im_src=imagecreatefrompng($vfile_upload);
			break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 196 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=2000){
  $dst_width = 2000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 110;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im2,$vdir_upload . "small_" . $fupload_name); //simpan file dalam ukuran kecil, "small_" adalah 
                                                                //penambahan nama file di depan nama file asli
			break;
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
			break;
	    case "image/png":
  			imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

?>
