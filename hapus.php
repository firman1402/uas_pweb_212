<?php
include 'koneksi.php';
$no = $_GET["no"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM jenis_mobil WHERE no='$no' ";
$hasil_query = mysqli_query($koneksi, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
   die("Gagal menghapus data: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
} else {
   echo "<script>alert('Data berhasil dihapus.');window.location='admin.php';</script>";
}
