<?php
session_start();
$sesiData = !empty($_SESSION['sesiData'])?$_SESSION['sesiData']:'';
if(!empty($sesiData['status']['msg'])){
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
</head>

<body>
<!-- header section -->
<section>
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
                        if(!isset($_SESSION['is_login'])){
                    ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <?php }else{?>
                    <li>
                    <a href="akunuser.php?logoutSubmit=1" class="logout">Logout (<?= $_SESSION['namauser'];?>)</a>
                    </li><?php }?>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
</section>
<!-- header section --> 
<!-- intro section -->
<section id="intro" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
    <?php 
                        if(!isset($_SESSION['admin'])){
                    ?>
                    <h6>TENTANG KAMI</h6>
                    <p>Sebuah website yang menyajikan objek - objek wisata sekitar Kecamatan Pringgasela yang cocok bagi Anda yang ingin mencari tempat wisata di sekitar Kecamatan Pringgasela</p>
                    <br>
                    </li>
                    <?php }else{?>
                    <h6>TENTANG KAMI</h6>
                    <br>
                    </li>
      <?php }?>   
    </div>
  </div>
</section>
<!-- intro section --> 
<!-- services section -->
<section id="services" class="services service-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-map-pin" style="color:#F60"></span>
        <div class="services-content">
          <h5>OUR OFFICE LOCATION</h5>
          <p>Jl. Kartini No.2 Kampung Baru, Masbagik Selatan, Kec.Masbagik, Kab.Lombok Timur, Prov.Nusa Tenggara Barat. ID 83661</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-envelope" style="color:#F60"></span>
        <div class="services-content">
          <h5>EMAIL</h5>
          <p>azzamanimujaddid4@gmail.com</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-phone" style="color:#F60"></span>
        <div class="services-content">
          <h5>PHONE NUMBER</h5>
          <p>087810849414</p>
        </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.7220983899147!2d116.4723034285464!3d-8.62265605384837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcc4b9ed51997af%3A0xc9d85cbaa0f03df0!2sJl.%20Kartini%20No.2%2C%20Masbagik%20Sel.%2C%20Kec.%20Masbagik%2C%20Kabupaten%20Lombok%20Timur%2C%20Nusa%20Tenggara%20Bar.%2083661!5e0!3m2!1sen!2sid!4v1719379645000!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>
<!-- services section --> 
<!-- work section -->
<!-- work section --> 
<!-- our team section -->
<!-- our team section --> 
<!-- Testimonials section -->
<!-- Testimonials section --> 
<!-- contact section -->
<!-- contact section --> 
<!-- Footer section -->
<footer class="footer">
  <div class="footer-top section">
    <div class="container" align="center">
      <div class="row">
        <br>
        <br>
<p>Copyright © 2024 SIG WISATA PRINGGASELA All Rights Reserved. Made by Azzamani</p>
      </div>
    </div>
  </div>
</footer>
<!-- Footer section --> 
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