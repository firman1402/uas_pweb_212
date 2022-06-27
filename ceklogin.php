<?php
require 'koneksi.php';
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT *  FROM guest WHERE username = '$user' AND password = '$pass'");

$result = mysqli_num_rows($query);

if ($result > 0) {
   $data = mysqli_fetch_assoc($query);
   // cek level user(admin/user)
   if ($data['hak_akses'] == "admin") {
      $_SESSION['user'] = $data['username'];
      $_SESSION['hak_akses'] = "admin";
      // tentukan halaman yg di ases admin
      header("Location:admin.php");
   } elseif ($data['hak_akses'] == "user") {
      $_SESSION['user'] = $data['username'];
      $_SESSION['hak_akses'] = "user";
      // tentukan halaman yg di ases admin
      header("Location:user/guest.php");
   } else {
      header("location:index.php?pesan=gagal");
   }
}
