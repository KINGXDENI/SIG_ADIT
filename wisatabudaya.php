<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
  $statusPsn = $sesiData['status']['msg'];
  $jenisStatusPsn = $sesiData['status']['type'];
  unset($_SESSION['sesiData']['status']);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="">
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
            <?php if (!isset($_SESSION['is_login'])) { ?>
              <li><a href="login.php">Login</a></li>
            <?php } else { ?>
              <li><a href="akunuser.php?logoutSubmit=1" class="logout">Logout (<?= $_SESSION['namauser']; ?>)</a></li>
            <?php } ?>
          </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a>
      </div>
    </header>
  </section>

  <section id="intro" class="section intro">
    <div class="container">
      <div class="col-md-8 col-md-offset-2 text-center">
        <br>
        <h6>WISATA BUDAYA</h6>
      </div>
    </div>
  </section><br>

  <section id="services" class="services service-section">
    <div class="container">
      <div class="row">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM wisatabudaya";
        $sql = mysqli_query($connect, $query);
        while ($data = mysqli_fetch_array($sql)) {
        ?>
        <div class="col-md-6">
          <section id="testimonials" class="section testimonials no-padding">
            <div class="container-fluid">
              <div class="row no-gutter">
                <div class="flexslider">
                  <ul class="slides">
                    <li>
                      <img src="images/foto/<?php echo $data['foto']; ?>">
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-6">
          <h2><?php echo $data['nama_budaya']; ?></h2>
          <p><?php echo $data['deskripsi']; ?></p>
        </div>
        <div class="col-md-6">
          <iframe src="<?php echo $data['maps']; ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <section id="services" class="services service-section">
            <div class="container">
              <div class="row">
                <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-map" style="color:#F60"></span>
                  <div class="services-content">
                    <p><?php echo $data['alamat']; ?></p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-phone" style="color:#F60"></span>
                  <div class="services-content">
                    <p><?php echo $data['notelp_pengelola']; ?></p>
                  </div>
                </div>
              </div>
            </div>
      </section>
        <?php } ?>
      </div>

      <?php 
                        if(!isset($_SESSION['admin'])){
                    ?>
                    <br>
                    </li>
                    <?php }else{?>
                    <br><br>  <br><br>  <br><br>  <br><br>
                      <h6 align="center">Data Gambar</h6>
                      <br>
                      <br>
                      <a href="form_simpan_budaya.php"><input type="submit" class="btn btn-large" value="Tambah Data"  ></a>
                      <br>
                      <br>
              <table border="2" width="100%">
                    <tr>
                    <th>Gambar</th>
                    <th>Nama Wisata</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>NoTelp_Pengelola</th>
                    <th colspan="2">Aksi</th>
                    </tr>
                <?php
                // Load file koneksi.php
                include "koneksi.php";
  
                      $query = "SELECT * FROM wisatabudaya"; // Query untuk menampilkan semua data galeri
                      $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
  
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                      echo "<tr>";
                      echo "<td align='center'><img src='images/foto/".$data['foto']."' width='400' height='200' ></td>";
                      echo "<td>".$data['nama_budaya']."</td>";
                      echo "<td>".$data['deskripsi']."</td>";
                      echo "<td>".$data['alamat']."</td>";
                      echo "<td>".$data['notelp_pengelola']."</td>";
                      echo "<td><a href='form_ubah_budaya.php?id_budaya=".$data['id_budaya']."'>Ubah</a></td>";
                      echo "<td><a href='proses_hapus_budaya.php?id_budaya=".$data['id_budaya']."'>Hapus</a></td>";
                      echo "</tr>";
                  }
                ?>
              </table>                    
      <?php }?>
    </div>
  </section>

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
