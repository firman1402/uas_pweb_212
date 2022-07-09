<?php
require 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="Javascript">
   function deleteask() {
      if (confirm('Anda yakin akan logout?')) {
         return true;
      } else {
         return false;
      }
   }
</script>

<head>
   <title>Form user</title>
</head>

<body>
   <!-- navbar -->
   <section id="halamanawal">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark position:absolute">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">Penyewaan Mobiel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="#halamanawal">Halaman Awal</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#spesifikasimobil">Spesifikasi Mobil</a>
                  </li>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#sewamobil">Sewa mobil</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#tentang">Tentang Kami</a>
                  </li>
               </ul>
               <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     <?php echo $_SESSION['username']; ?>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                     <li><a class="dropdown-item" href="logout.php" onClick="return deleteask();">Sign Out</a></li>
                  </ul>
               </div>
               </form>
            </div>
         </div>
         <style>
            section {
               background: lightskyblue;
            }
         </style>
      </nav>
   </section>
   <div style="padding-top:20px">
      <center>
         <h1>Halaman Tamu</h1>
      </center>
   </div>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-7">
               <div class="ms-5 mt-5">
                  <h1>Rental Mobilel</h1>
                  <h4><strong>Baskoro Rent Car</strong> | 0816-7832-1234 | Lepas Kunci | Nikmati Perjalanan Liburan bersama kami.</h4>
                  <p>Tarif Harga Sewa Murah, Armada Lengkap dan Bersih, Transportasi Aman dan Nyaman.</p>
                  <a class="" href="tel:+6281678321234" data-icon="">TELP : 0816-7832-1234</a>
               </div>
            </div>
            <div class="col-5  mt-5">
               <img style="width: 350px;" src="../asset/mobil3.png" alt="gambar mobil" />

            </div>
         </div>
      </div>

   </section>

   <section id="spesifikasimobil">
      <div class="row justify-content-center ">
         <div class="col-10">
            <h2>Spesifikasi mobil</h2>
            <div class="card-group mt-5 gap-5">
               <div class="card">
                  <img src="../asset/avanza.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Avanza 2019</h5>
                     <p class="card-text">300.000 / Hari</p>
                     <p>Avanza tahun 2019 memiliki kelebihan dan kekurangan...</p>
                     <a href="https://www.ortizaku.com/index.php/Otomotif/review-spesifikasi-harga-kelebihan-dan-kekurangan-avanza-2019" class="btn btn-primary">Baca lebih lanjut..</a>
                  </div>
               </div>
               <div class="card">
                  <img src="../asset/innova.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Innova 2019</h5>
                     <p class="card-text">450.000 / Hari</p>
                     <p>Innova tahun 2019 memiliki kelebihan dan kekurangan...</p>
                     <a href="https://www.carmudi.co.id/journal/spesifikasi-dan-harga-toyota-kijang-innova-reborn-bekas-di-jakarta/" class="btn btn-primary">Baca lebih lanjut..</a>
                  </div>
               </div>
               <div class="card">
                  <img src="../asset/xenia.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Xenia 2019</h5>
                     <p class="card-text">250.000 / Hari</p>
                     <p>Xenia tahun 2019 memiliki kelebihan dan kekurangan...</p>
                     <a href="https://www.semisena.com/mobil/daihatsu-xenia" class="btn btn-primary">Baca lebih lanjut..</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </section>
   <section id="sewamobil">
      <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
         <form action="guest.php" method="get">
            <label>Cari :</label>
            <input type="text" name="cari" autocomplete="off">
            <input type="submit" value="Cari">
         </form>

         <?php
         if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : " . $cari . "</b>";
         }
         ?>
      </div>
      <div class="col-sm-11" style="padding-bottom: 20px; padding-left: 40px;">
         <h2>Jenis Mobil</h2>
         <table class="table table-striped table-hover dtabel">
            <tr>
               <th>KODE MOBIL</th>
               <th>NAMA MOBIL</th>
               <th>HARGA PENYEWAAN</th>
               <th>PLAT NOMOR</th>
               <th>TAHUN MOBIL</th>
               <th>STATUS</th>
               <th>AKSI</th>
            </tr>
            <?php
            if (empty($mobil)) {
            }
            ?>

            <?php
            if (isset($_GET['cari'])) {
               $cari = $_GET['cari'];
               $query = mysqli_query($koneksi, "select * from jenis_mobil where nama_mobil like '%" . $cari . "%'");
            } else {
               $query = mysqli_query($koneksi, "select * from jenis_mobil ");
            }
            $i = 1;
            while ($row = mysqli_fetch_array($query)) {
            ?>
               <tr>
                  <td><?php echo $row['no']; ?></td>
                  <td><?php echo $row['nama_mobil']; ?></td>
                  <td><?php echo number_format($row['harga']); ?></td>
                  <td><?php echo $row['plat_nomor']; ?></td>
                  <td><?php echo $row['tahun_mobil']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                     <a href="sewa.php?no=<?php echo $row['no']; ?>" class="btn btn-success">Sewa</a>
                  </td>
               </tr>
            <?php
            }
            ?>
         </table>
      </div>
   </section>
   <br />
   <br />
   <section id="tentang">
      <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
         <center>
            <h1>Tentang Kami</h1>
            <h3>Aplikasi tentang penyewaan mobil yang berada di sekitaran surabaya dan sekitarnya</h3>
            <h4>berminat hubungi nomor<strong> 0816-7832-1234</strong></h4>
         </center>

         <br />
         <h2 style="text-align:center">Our Team</h2>
         <div class="container">
            <div class="row">
               <div class="col">
                  <img src="../asset/DSC_4086.jpg" class="card-img-top" alt="...">
                  <h5 class="card-title">Akbar Bintang Izzulhaq</h5>
                  <p class="card-text">NIM 20410100055</p>
                  <a href="https://www.instagram.com/akbarrroi/" class="btn btn-primary">@Akbarrroi</a>
               </div>
               <div class="col">
               </div>
               <div class="col">
                  <img src="../asset/20410100061.jpg" class="card-img-top" alt="...">
                  <h5 class="card-title">Dzikri Firman Rabani</h5>
                  <p class="card-text">NIM 20410100061</p>
                  <a href="https://www.instagram.com/man.firman__/" class="btn btn-primary">@man.firman__</a>
               </div>
            </div>
         </div>
      </div>
   </section>


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