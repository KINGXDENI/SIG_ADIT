<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$id_alam = $_POST['id_alam'];
$nama_alam = $_POST['nama_alam'];
$deskripsi = $_POST['deskripsi'];
$alamat = $_POST['alamat'];
$notelp_pengelola = $_POST['notelp_pengelola'];
$maps = $_POST['maps'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis') . $foto;
// Set path folder tempat menyimpan fotonya
$path = "images/foto/" . $fotobaru;
// Proses upload
if (move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
    // Proses simpan ke Database
    $query = "INSERT INTO wisataalam VALUES('" . $id_alam . "','" . $nama_alam . "', '" . $deskripsi . "', '" . $alamat . "','" . $notelp_pengelola . "','" . $maps . "','" . $fotobaru . "')";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
    if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: wisataalam.php"); // Redirect ke halaman galeri.php
    } else {
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_simpan_alam.php'>Kembali Ke Form</a>";
    }
} else {
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_simpan_alam.php'>Kembali Ke Form</a>";
}
