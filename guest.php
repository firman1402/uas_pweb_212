<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
   <title>FORM guest</title>
</head>

<body>
   <h2>Halaman tamu</h2>

   <br />

   <!-- cek apakah sudah login -->
   <?php
   session_start();
   if ($_SESSION['status'] != "login") {
      header("location:index.php?pesan=belum_login");
   }
   ?>

   <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>

   <br />
   <br />
   <a href="logout.php" type="submit" class="tombol_login">
      <center>LOG OUT</center>
   </a>


</body>

</html>