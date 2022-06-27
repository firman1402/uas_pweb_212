<?php
require 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
   <title>Form admin</title>
</head>

<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Penyewaan Mobiel</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="admin.php">Halaman Awal</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="jenis_mobil.php">Jenis Mobil</a>
               </li>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Penyewaan</a>
               </li>
            </ul>
            <div class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['user']; ?>
               </button>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
               </ul>
            </div>
            </form>
         </div>
      </div>
   </nav>
   <div style="padding-top:20px">
      <h1>Halaman Admin Awal</h1>
   </div>
   <section>
      <div class="card-group ms-5 mt-5" style="width: 700px">
         <div class="card">
            <img src="asset/avanza.jpg" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">Avanza 2019</h5>
               <p class="card-text">300.000 / Hari</p>
               <p>Avanza tahun 2019 memiliki kelebihan dan kekurangan...</p>
               <a href="https://www.ortizaku.com/index.php/Otomotif/review-spesifikasi-harga-kelebihan-dan-kekurangan-avanza-2019" class="btn btn-primary">Baca lebih lanjut..</a>
            </div>
         </div>
         <div class="card ms-4">
            <img src="asset/innova.png" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">Innova 2019</h5>
               <p class="card-text">450.000 / Hari</p>
               <p>Innova tahun 2019 memiliki kelebihan dan kekurangan...</p>
               <a href="https://www.carmudi.co.id/journal/spesifikasi-dan-harga-toyota-kijang-innova-reborn-bekas-di-jakarta/" class="btn btn-primary">Baca lebih lanjut..</a>
            </div>
         </div>
   </section>




   <br />
   <br />
   <footer class="bg-light text-center text-lg-start mt-5">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
         © 2022 Copyright:
         <a class="text-dark" href="https://mdbootstrap.com/">Mobiel.com</a>
      </div>
      <!-- Copyright -->
   </footer>

</body>

</html>