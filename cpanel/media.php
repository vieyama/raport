<?php
  session_start();
  include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMP N 3 Susukan | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/red.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- modal style -->
  <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent !important;
      }
    </style>
  <!-- end of modal style -->

  <!-- date picker -->
  <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/>
  <style type="text/css">

    .custom-date-style {
      background-color: red !important;
    }

    .input{
    }
    .input-wide{
      width: 500px;
    }

  </style>
  <!-- end of date picker -->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="?page=dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">SMP N 3 Susukan</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <?php
                include "../conf/koneksi.php";

                $sql = mysqli_query($connect, "select * from pengguna where username = '$_SESSION[username]'");
                $r = mysqli_fetch_array($sql);
              ?>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if($r['img_pengguna']==""){ ?>
                  <img src="img_user/small_default.jpg" class="user-image" alt="User Image">
                <?php }else{ ?>
                <img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="user-image" alt="User Image">
                <?php } ?>
                  <span class="hidden-xs"><?php echo $r['nama']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
				          <li class="user-header">
                  <?php if($r['img_pengguna']==""){ ?>
                    <img src="img_user/small_default.jpg" class="img-circle" alt="User Image">
                    <?php }else{ ?>
                    <img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="user-image" alt="User Image">
                    <?php } ?>
                    <p>
                      <?php echo $r['nama']; ?>
                      <small><?php echo $r['email']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
				  <!-- Menu Footer-->
                  <li class="user-footer">
					          <div class="pull-right">
                      <a href="?page=sign-out" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                    <div class="pull-left">
                      <?php
                        if($_SESSION['username'] AND $r['hak_akses']=='Admin'){
                      ?>
                      <input type="button" class="btn btn-default" name="submit" value="Profile" onclick="window.location='?page=profileUsr&tid=<?php echo $r['idu']; ?>' ">
                    <?php }elseif($_SESSION['username'] AND $r['hak_akses']=='Guru'){ ?>
                    <input type="button" class="btn btn-default" name="submit" value="Profile" onclick="window.location='?page=profileGr&tid=<?php echo $r['idu']; ?>' ">
                  <?php }elseif($_SESSION['username'] AND $r['hak_akses']=='Siswa'){ ?>
                    <input type="button" class="btn btn-default" name="submit" value="Profile" onclick="window.location='?page=profileSv&tid=<?php echo $r['idu']; ?>' ">
                  <?php } ?>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <?php if($r['img_pengguna']==""){?>
              <img src="img_user/small_default.jpg" class="img-circle" alt="User Image">
              <?php }else {?>
              <img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="img-circle" alt="User Image">
              <?php } ?>
            </div>
            <div class="pull-left info">
              <p><?php echo $r['nama']; ?></p>
              <i class="fa fa-circle text-success"></i> <?php echo $r['hak_akses']; ?>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="?page=dashboard">
                <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
              </a>
            </li>
            <?php
              if($_SESSION['username'] AND $r['hak_akses']=='Guru'){
            ?>
            <?php
            $idu = $r['idu'];
            $query = mysqli_query($connect, "SELECT COUNT(*) AS total FROM kelas_guru WHERE id_guru = '$idu' ");
            $row = mysqli_fetch_assoc($query);
              $total = $row['total'];
              if($total==1) {
             ?>

            <li><a href="?page=vwKlGr&tid=<?php echo $r['idu'] ?>"><i class="fa fa-institution"></i> Kelas </a></li>
            <li><a href="?page=detailKlWl&tid=<?php echo $r['idu'] ?>"><i class="fa fa-institution"></i> Kelas (Wali Kelas) </a></li>
          <?php }else{?>
            <li><a href="?page=vwKlGr&tid=<?php echo $r['idu'] ?>"><i class="fa fa-institution"></i> Kelas </a></li>
          <?php
          } }
            if($_SESSION['username'] AND $r['hak_akses']=='Siswa'){
          ?>
            <li><a href="?page=vwKlSs&tid=<?php echo $r['idu'] ?>"><i class="fa fa-institution"></i> Kelas </a></li>
        <?php } ?>
            <?php
              if($_SESSION['username'] AND $r['hak_akses']=='Admin'){
            ?>
            <li><a href="?page=vwUs"><i class="fa fa-user-secret"></i> Admin </a></li>
            <li><a href="?page=vwGr"><i class="fa  fa-group"></i> Guru </a></li>
            <li><a href="?page=vwSs"><i class="fa fa-user"></i> Siswa </a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Akademik</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=vwKl"><i class="fa fa-institution"></i><span> Kelas</span> </a></li>
                <li><a href="?page=vwMp"><i class="fa fa-book"></i><span> Mata Pelajaran</span> </a></li>
                <li><a href="?page=vwRp"><i class="fa fa-bar-chart-o"></i><span> Nilai</span> </a></li>
                <li><a href="?page=vwTh"><i class="fa fa-bar-chart-o"></i><span> Tahun Ajaran</span> </a></li>

              </ul>
            </li>
            <?php } ?>
			<!-- pengguna hanya dapat di akses oleh pengguna level Admin -->


          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

			<?php include "../cpanel/akses_file.php"; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b>1..0.0
        </div>
        <strong>Copyright &copy; 2018 <a href="#">SMA N 3 Susukan</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
		  <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>

			<!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
          </div><!-- /.tab-pane -->

          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>

            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="plugins/jQuery/bootstrap3-typeahead.js"></script>
    <script src="plugins/jQuery/bootstrap3-typeahead.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-2.1.4.min.js"></script> -->
    <!-- <script type="text/javascript" src="plugins/jQuery/typeahead.js"></script> -->
    <!-- <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script> -->
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>

  </body>
</html>
