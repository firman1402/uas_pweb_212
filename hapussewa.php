<?php
include 'koneksi.php';
$kode_pinjam = $_GET["kode_pinjam"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM penyewaan WHERE kode_pinjam='$kode_pinjam' ";
$hasil_query = mysqli_query($koneksi, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
   die("Gagal menghapus data: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
} else {
   echo "<script>alert('Data berhasil dihapus.');window.location='admin.php';</script>";
}
