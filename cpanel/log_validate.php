<?php
include ('../conf/koneksi.php');

//------ANTI XSS & SQL INJECTION-------//
function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}


$uname = antiinjection($_POST['user']);
$pass = antiinjection($_POST['pswd']);


	# hash dengan md5
	$salt ='indikost';
	$password = md5($salt . $pass);
//------ANTI XSS & SQL INJECTION-------//

$sql=mysqli_query($connect, "select * from pengguna where username='$uname' and password='$password'");

$r=mysqli_fetch_array($sql);
if ($r['username']==$uname and $r['password']==$password)

{
  session_start();
  $_SESSION['username']=$r['username'];
  $_SESSION['password']=$r['password'];

  echo "<script>alert('Anda berhasil login, silahkan masuk.');
  window.location = 'media.php?page=dashboard'</script>";
}
else
{
  echo "<script>alert('Maaf! Login gagal. Silahkan cek lagi username dan password anda!.');
  window.location = 'index.php?page=auth'</script>";
}
?>
