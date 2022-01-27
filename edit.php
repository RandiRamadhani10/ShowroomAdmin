<?php
include "config/config.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: page-login.php");
    exit;
}
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM master WHERE id = '$id'");
$rows = mysqli_fetch_assoc($result);
function edit($data)
{
    global $conn;
    
    $nama = htmlspecialchars(stripslashes($data["nama"]));
    $id = htmlspecialchars(stripslashes($data["id"]));
    $nim = htmlspecialchars(stripslashes($data["nim"]));
    $kelas = htmlspecialchars(stripslashes($data["kelas"]));
    $prodi = htmlspecialchars(stripslashes($data["prodi"]));
    $res = mysqli_query($conn, "UPDATE master
    SET
       id = '$id',
       nama = '$nama',
       nim = '$nim',
       kelas = '$kelas',
       prodi = '$prodi'
       WHERE id = $id
    ");
    
    header("location: halaman-master.php");
}
if (isset($_POST["submit"])) {
   edit($_POST);
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
  <!--<![endif]-->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png" />
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  </head>
    <style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
  <body>
 
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <!-- /.menu-title -->
            <li class="menu-title">Menu</li>
            <!-- /.menu-title -->

            <li class="active">
              <a href="halaman-master.php"> <i class="menu-icon ti-home"></i>Master</a>
            </li>
            <li class="">
              <a href="halaman-transaksi.php"> <i class="menu-icon ti-pie-chart"></i>Transaksi</a>
            </li>
            <li class="">
              <a href="halaman-laporan.php"> <i class="menu-icon fa fa-line-chart"></i>Laporan</a>
            </li>
            <li class="">
              <a href="list-mobil.php"> <i class="menu-icon fa fa-car "></i>List Mobil</a>
            </li>
            <li class="menu-title">Extras</li>
            <!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.php">Login</a></li>
                <!-- <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li> -->
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
        <div class="top-left">
          <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo" /></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo" /></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
        <div class="top-right">
          <div class="header-menu">
            <div class="header-left">
              <button class="search-trigger"><i class="fa fa-search"></i></button>
              <div class="form-inline">
                <form class="search-form">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search" />
                  <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                </form>
              </div>

              <div class="dropdown for-notification">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell"></i>
                  <span class="count bg-danger">3</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="notification">
                  <p class="red">You have 3 Notification</p>
                  <a class="dropdown-item media" href="#">
                    <i class="fa fa-check"></i>
                    <p>Server #1 overloaded.</p>
                  </a>
                  <a class="dropdown-item media" href="#">
                    <i class="fa fa-info"></i>
                    <p>Server #2 overloaded.</p>
                  </a>
                  <a class="dropdown-item media" href="#">
                    <i class="fa fa-warning"></i>
                    <p>Server #3 overloaded.</p>
                  </a>
                </div>
              </div>

              <div class="dropdown for-message">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-envelope"></i>
                  <span class="count bg-primary">4</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="message">
                  <p class="red">You have 4 Mails</p>
                  <a class="dropdown-item media" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg" /></span>
                    <div class="message media-body">
                      <span class="name float-left">Jonathan Smith</span>
                      <span class="time float-right">Just now</span>
                      <p>Hello, this is an example msg</p>
                    </div>
                  </a>
                  <a class="dropdown-item media" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg" /></span>
                    <div class="message media-body">
                      <span class="name float-left">Jack Sanders</span>
                      <span class="time float-right">5 minutes ago</span>
                      <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                  </a>
                  <a class="dropdown-item media" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg" /></span>
                    <div class="message media-body">
                      <span class="name float-left">Cheryl Wheeler</span>
                      <span class="time float-right">10 minutes ago</span>
                      <p>Hello, this is an example msg</p>
                    </div>
                  </a>
                  <a class="dropdown-item media" href="#">
                    <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg" /></span>
                    <div class="message media-body">
                      <span class="name float-left">Rachel Santos</span>
                      <span class="time float-right">15 minutes ago</span>
                      <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar" />
              </a>

              <div class="user-menu dropdown-menu">
                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                <a class="nav-link" href="models/logout.php"><i class="fa fa-power -off"></i>Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- /#header -->
      <!-- Breadcrumbs-->
      <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
          <div class="row m-0">
            <div class="col-sm-4">
              <div class="page-header float-left">
                <div class="page-title">
                  <h1>edit</h1>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Master</li>
                    <li class="active">Edit</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.breadcrumbs-->
      <!-- Content -->
      <div class="content">
        <form method="POST" >
            <div class="form-group">
            <input type="hidden" name="id" value="<?= $rows["id"]; ?>">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $rows["nama"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIM</label>
                <input type="text" name="nim" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="<?= $rows["nim"]; ?> " required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas</label>
                <input type="text" name="kelas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $rows["kelas"]; ?>"required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prodi</label>
                <input type="text" name="prodi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $rows["prodi"]; ?>"required>
            </div>
            <button  name="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- .animated -->
      </div>
      <!-- /.content -->
      <div class="clearfix">
      </div>
      <!-- Footer -->
      <footer class="site-footer">
        <div class="footer-inner bg-white">
          <div class="row">
            <div class="col-sm-6">Copyright &copy; 2018 Ela Admin</div>
            <div class="col-sm-6 text-right">Designed by <a href="https://colorlib.com">Colorlib</a></div>
          </div>
        </div>
      </footer>
      <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <!--Flot Chart-->
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <!-- local -->
    <script src="assets/js/widgets.js"></script>
  </body>
</html>
