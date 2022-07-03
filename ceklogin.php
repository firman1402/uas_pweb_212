<?php
require 'koneksi.php';
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$query = mysqli_query($koneksi, "SELECT *  FROM guest WHERE username = '$user' AND password = '$pass'");
// menghitung jumlah data yang ditemukan
$result = mysqli_num_rows($query);

// cek apakah username dan password di temukan pada database
if ($result > 0) {

   $data = mysqli_fetch_assoc($query);

   // cek jika user login sebagai admin
   if ($data['hak_akses'] == "admin") {

      // buat session login dan username
      $_SESSION['username'] = $user;
      $_SESSION['hak_akses'] = "admin";
      // alihkan ke halaman dashboard admin
      header("location:admin.php");

      // cek jika user login sebagai pegawai
   } else if ($data['hak_akses'] == "user") {
      // buat session login dan username
      $_SESSION['username'] = $user;
      $_SESSION['hak_akses'] = "user";
      // alihkan ke halaman dashboard pegawai
      header("location:user/guest.php");
   } else {
      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
   }
} else {
   header("location:index.php?pesan=gagal");
}
