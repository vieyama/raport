<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login page with blur background</title>



      <link rel="stylesheet" href="dist/login/css/style.css">


</head>

<body>


<div class="content">
  <center><img src="img_user/logo_smp.png" width="40%"></center>
  <div class="title">SMP N 3 Susukan</div>
  <form action="log_validate.php" method="post">
    <input type="text" placeholder="Username" name="user" />
    <input type="password" placeholder="Password" name="pswd" />
    <input type="checkbox" id="rememberMe"/>
    <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="dist/login/js/index.js"></script>
</body>

</html>
