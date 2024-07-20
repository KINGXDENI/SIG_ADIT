<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
  $statusPsn = $sesiData['status']['msg'];
  $jenisStatusPsn = $sesiData['status']['type'];
  unset($_SESSION['sesiData']['status']);
}
?>
<?php
require_once('bdd.php');


$sql = "SELECT id, title, keterangan, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PRINGGASELA RAYA</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/jquery.fancybox.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/font-icon.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/pringgaselatourism.png">
  <style>
    .btn {
      background-color: gray;
      color: #FA4;
      font-size: 13px;
      font-weight: 600;
      border: 0;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      display: inline-block;
      text-transform: uppercase;
      opacity: 0.8;
    }

  </style>
</head>

<body>
  <!-- header  -->
  <section class="banner" role="banner">
    <header id="header">
      <div class="header-content clearfix"> <a class="logo" href="index.php">PRINGGASELA RAYA</a>
        <nav class="navigation" role="navigation">
          <ul class="primary-nav">
            <li><a href="index.php">Beranda</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Wisata <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                  <a style="color:grey" href="wisataalam.php">Wisata Alam</a>
                </li>
                <li>
                  <a style="color:grey" href="wisatabudaya.php">Wisata Budaya</a>
                </li>
                <li>
                  <a style="color:grey" href="wisatakuliner.php">Wisata Kuliner</a>
                </li>
              </ul>
            </li>
            <li><a href="artikel.php">Artikel</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="testimonial.php">Testimonial</a></li>
            <li><a href="tentang.php">Tentang Kami</a></li>
            <?php
            if (!isset($_SESSION['is_login'])) {
            ?>
              <li>
                <a href="login.php">Login</a>
              </li>
            <?php } else { ?>
              <li>
                <a href="akunuser.php?logoutSubmit=1" class="logout">Logout (<?= $_SESSION['namauser']; ?>)</a>
              </li><?php } ?>
          </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a>
      </div>
    </header>
    <!-- banner text -->
    <div class="container">
      <div class="col-md-3 col-md-offset-1">
        <div class="banner-text text-center">
        <header class="header-container">
    <a class="navbar-brand">
    <img src="images/pringgaselatourism.png" class="img-responsive pringe" alt="Pringgasela Tourism Logo" style="margin-left: -100px;">
    </a>
</header>

          <!-- banner text -->
        </div>
      </div>
  </section>
  <!-- header  -->
  <!-- intro  -->
  <section id="intro" class="section ">
    <div class="container bg-light">
      <div class="col-md-8 col-md-offset-2 text-center fw-bold">
        <h1>WELCOME TO PRINGGASELA TOURISM</h1>
      </div>
    </div>
  </section>
  <!-- JS FILES -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript" src="js/jquery.contact.js"></script>
</body>

</html>