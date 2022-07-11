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
   </nav>
   <div style="padding-top:20px">
      <h1>Halaman Admin Awal</h1>
   </div>
   <div class="alert alert-success" role="alert">
      selamat datang,
      <?php echo $_SESSION['username']; ?> !
   </div>
   <div class="col-sm-10" style="padding-top: 20px; padding-bottom: 20px; padding-left: 50px;">
      <h2>Daftar User yang mendaftar</h2>
      <table class="table table-striped table-hover dtabel">
         <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>PASSWORD</th>
            <th>NO TELPON</th>
            <th>HAK AKSES</th>
            <th>AKSI</th>
         </tr>
         <?php
         $list = mysqli_query($koneksi, "select * from guest");
         while ($row = mysqli_fetch_array($list)) {
         ?>
            <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['username']; ?></td>
               <td><?php echo $row['password']; ?></td>
               <td><?php echo $row['no_telp']; ?></td>
               <td><?php echo $row['hak_akses']; ?></td>
               <td>
                  <a href="hapususer.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">HAPUS</a>
               </td>
            </tr>
         <?php
         }
         ?>
      </table>
   </div>

   <div class="col-sm-10" style="padding-top: 20px; padding-bottom: 20px; padding-left: 50px;">
      <h2>Data Sewa</h2>
      <table class="table table-striped table-hover dtabel">
         <tr>
            <th>KODE PINJAM</th>
            <th>NAMA PEMINJAM</th>
            <th>NOMER TELEPON</th>
            <th>TANGGAL PINJAM</th>
            <th>LAMA PINJAM</th>
            <th>KODE MOBIL</th>
            <th>NAMA MOBIL</th>
            <th>HARGA SEWA MOBIL</th>
            <th>TOTAL HARGA SEWA</th>
            <th>STATUS</th>
            <th>AKSI</th>

         </tr>
         <?php
         $list = mysqli_query($koneksi, "select * from penyewaan");
         while ($row = mysqli_fetch_array($list)) {
         ?>
            <tr>
               <td><?php echo $row['kode_pinjam']; ?></td>
               <td><?php echo $row['nama_peminjam']; ?></td>
               <td><?php echo $row['no_telpon']; ?></td>
               <td><?php echo $row['tanggal_pinjam']; ?></td>
               <td><?php echo $row['lama_pinjam']; ?></td>
               <td><?php echo $row['kode_mobil']; ?></td>
               <td><?php echo $row['nama_mobil']; ?></td>
               <td><?php echo number_format($row['harga_mobil']); ?></td>
               <td><?php echo number_format($row['total_harga_sewa']); ?></td>
               <td><?php echo $row['status']; ?></td>
               <td>
                  <a href="kembalikan.php?kode_mobil=<?= $row['kode_mobil']; ?>" class="btn btn-success">Sudah Dikembalikan</a>
               </td>
            </tr>
         <?php
         }
         ?>
      </table>
   </div>




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