<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id_alam = $_GET['id_alam'];
$nama_alam = $_POST['nama_alam'];
$deskripsi = $_POST['deskripsi'];
$alamat = $_POST['alamat'];
$notelp_pengelola = $_POST['notelp_pengelola'];
$maps = $_POST['maps'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "images/foto/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data galeri berdasarkan id yang dikirim
    $query = "SELECT * FROM wisataalam WHERE id_alam='".$id_alam."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("images/foto/".$data['foto'])) // Jika foto ada
      unlink("images/foto/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE wisataalam SET  nama_alam='".$nama_alam."', deskripsi='".$deskripsi."', alamat='".$alamat."', notelp_pengelola='".$notelp_pengelola."', maps='".$maps."', foto='".$fotobaru."' WHERE id_alam='".$id_alam."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: wisataalam.php"); // Redirect ke halaman galeri.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_ubah_alam.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_ubah_alam.php'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE wisataalam SET nama_alam='".$nama_alam."', deskripsi='".$deskripsi."', alamat='".$alamat."', notelp_pengelola='".$notelp_pengelola."', maps='".$maps."', foto='".$fotobaru."' WHERE id_alam='".$id_alam."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: wisataalam.php"); // Redirect ke halaman galeri.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_ubah_alam.php'>Kembali Ke Form</a>";
  }
}
?>