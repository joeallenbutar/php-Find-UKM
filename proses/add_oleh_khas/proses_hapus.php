<?php
// Load file koneksi.php
include "../../koneksi.php";
// Ambil data id yang dikirim oleh index.php melalui URL
$id = $_GET['id'];
// Query untuk menampilkan data siswa berdasarkan id yang dikirim
$query = "SELECT * FROM produk WHERE id='".$id."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

// Cek apakah file fotonya ada di folder images
if(is_file("../../img/".$data['foto'])) // Jika foto ada
  unlink("../../img/".$data['foto']); // Hapus foto yang telah diupload dari folder images
// Query untuk menghapus data siswa berdasarkan id yang dikirim
$query2 = "DELETE FROM produk WHERE id='".$id."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ../../olehkhas.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='../../olehkhas.php'>Kembali</a>";
}
?>