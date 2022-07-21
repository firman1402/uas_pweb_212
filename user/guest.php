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
            body {
               background: paleturquoise;
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
               <div class="ms-3 mt-5">
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
      <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 120px;">
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
      <div class="col-sm-11" style="padding-top: 20px; padding-bottom: 20px; padding-left: 120px;">
         <h2>Pilihan Mobil</h2>
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
            $query = mysqli_query($koneksi, "select max(kode_pinjam) as kodeTerbesar from penyewaan");
            $data = mysqli_fetch_array($query);
            $kdPinjam = $data['kodeTerbesar'];
            $urutan = (int) substr($kdPinjam, 3, 3);
            $urutan++;
            $huruf = "PJ";
            $kdPinjam = $huruf . sprintf("%03s", $urutan);
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
                     <?php if ($row['status'] != 'Tidak Tersedia') : ?>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalSewa<?php echo $row['no']; ?>">
                           Sewa
                        </button>
                     <?php else : ?>
                        <button type="button" class="btn btn-secondary">
                           Sewa
                        </button>
                     <?php endif; ?>
                  </td>
               </tr>
               <!-- Modal -->
               <div class="modal fade" id="modalSewa<?php echo $row['no']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="staticBackdropLabel">Form Penyewaan Mobil</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="pinjam.php">
                              <label class="form-group">Kode Pinjam</label><br />
                              <input class="form-control" type="text" name="kd_pinjam" required value="<?php echo $kdPinjam ?>" readonly>

                              <br>
                              <label class="form-group">Nama Pinjam</label><br />
                              <input class="form-control" type="text" name="nama_peminjam" required value="<?php echo  $_SESSION['username']; ?>" readonly>

                              <br>
                              <label class="form-group">Nomer Telepon</label><br />
                              <input class="form-control" type="text" name="nomer_telepon" required value="" autocomplete="off">

                              <br>
                              <label class="form-group">Tanggal Pinjam</label><br />
                              <input class="form-control" type="date" name="tgl_pinjam" required value="">

                              <br>
                              <label class="form-group">Lama Pinjam</label><br />
                              <div class="row">
                                 <div class="col-4">
                                    <input class="form-control lama_pinjam" data-item="<?= $row['no']; ?>" id="lama" type="number" name="lama" required>
                                 </div>
                                 <div class="col-2">
                                    <h3 class="text-start">hari</h3>
                                 </div>
                              </div>

                              <br>
                              <label class="form-group">Kode Mobil</label><br />
                              <input class="form-control" type="text" name="kd_mobil" required value="<?php echo $row['no']; ?>" readonly>

                              <br>
                              <label class="form-group">Nama Mobil</label><br />
                              <input class="form-control" type="text" name="nm_mobil" required value="<?php echo $row['nama_mobil']; ?>" readonly>

                              <br>

                              <label class="form-group">Harga Sewa Mobil</label><br />
                              <input class="form-control harga_sewa" data-item="<?= $row['no']; ?>" type="text" id="hargaSewa" name="harga_sewa" required value="<?php echo $row['harga']; ?>" readonly>

                              <br>

                              <label class="form-group">Total Harga Sewa</label><br />
                              <input class="form-control total_harga" data-item="<?= $row['no']; ?>" type="text" name="totalHarga" id="totalHarga" required value="" readonly>


                              <br>

                              <label class="form-group">Pilih Jenis Pembayaran</label><br />
                              <select class="form-select" aria-label="Default select example">
                                 <option value="1">Bayar Tunai</option>
                                 <option value="2">Bayar E - Wallet/M-Banking</option>
                              </select>

                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-success">Bayar</button>
                              </div>
                           </form>
                        </div>


                     </div>
                  </div>
               </div>
            <?php

            }
            ?>
         </table>

      </div>
   </section>
   <section id="tentang">
      <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
         <center>
            <h1>Tentang Kami</h1>
            <h3>Aplikasi tentang penyewaan mobil yang berada di sekitaran surabaya dan sekitarnya</h3>
            <h4>berminat hubungi nomor<strong> 0816-7832-1234</strong></h4>
         </center>

         <br />
         <h2 style="text-align:center">Daftar Anggota</h2>
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

   <script>
      const allDate = document.querySelectorAll('.lama_pinjam');

      allDate.forEach(function(event) {
         event.addEventListener('change', function(e) {
            const item = e.target.getAttribute('data-item');
            const hargaSewa = document.querySelector(`.harga_sewa[data-item=${item}]`).value;
            const totalHarga = document.querySelector(`.total_harga[data-item=${item}]`);

            totalHarga.value = hargaSewa * e.target.value;
            console.log(item, hargaSewa);
         });
      });
   </script>

</body>

</html>