<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
include 'Koneksi.php';
?>
<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT max(no) as kodeTerbesar FROM jenis_mobil");
$data = mysqli_fetch_array($query);
$kodeMobil = $data['kodeTerbesar'];
$urutan = (int) substr($kodeMobil, 3, 3);

$urutan++;
$huruf = "MB";
$kodeMobil = $huruf . sprintf("%03s", $urutan);
?>

<body>
   <?php session_start(); ?>
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
                  <a class="nav-link" href="">Tempat Jualan</a>
               </li>
            </ul>
            <div class="dropdown pb-4">
               <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                  <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']; ?></span>
               </a>
               <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

                  <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
               </ul>
            </div>
            </form>
         </div>
      </div>
   </nav>
   <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
      <h1>Jenis Mobil</h1>
      <form action="" method="POST">
         <table>
            <div class="col-sm-4">
               <h3>Form Tambah Jenis Mobil</h3>
               <form role="form" method="post">
                  <div class="form-group">
                     <label>Kode Mobil</label>
                     <input type="text" name="no" value="<?php echo $kodeMobil ?>" readonly class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Nama Mobil</label>
                     <input type="text" name="nama_mobil" class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Harga Penyewaan</label>
                     <input type="text" name="harga" class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Tahun Mobil</label>
                     <input type="text" name="tahun_mobil" class="form-control">
                  </div>
               </form>

            </div>
            <br />
            <tr>
               <td>
                  <input type="submit" value="Simpan" class="btn btn-success" name="btnSimpan">
                  <input type="reset" value="Batal" class="btn btn-danger" name="btnBatal">
               </td>
            </tr>
         </table>
      </form>

      <?php
      if (isset($_POST['btnSimpan'])) {
         include 'Koneksi.php';

         $simpan = mysqli_query($koneksi, "insert into jenis_mobil values ('" . $_POST['no'] . "',
        '" . $_POST['nama_mobil'] . "','" . $_POST['harga'] . "','" . $_POST['tahun_mobil'] . "');");
         if ($simpan == 1) {
            echo '<script type="text/javascript">
            alert("Data Tersimpan");
            window.location.href = "jenis_mobil.php";
            </script>';
         } else {
            echo '<script type="text/javascript">
            alert("Data Gagal Tersimpan");
            window.location.href = "jenis_mobil.php";
            </script>';
         }
      }
      ?>
   </div>

   <div class="col-sm-8" style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
      <h2>Jenis Mobil</h2>
      <table class="table table-striped table-hover dtabel">
         <tr>
            <th>KODE MOBIL</th>
            <th>NAMA MOBIL</th>
            <th>HARGA PENYEWAAN</th>
            <th>TAHUN MOBIL</th>
            <th>AKSI</th>
         </tr>
         <?php
         $list = mysqli_query($koneksi, "select * from jenis_mobil");
         while ($row = mysqli_fetch_array($list)) {
         ?>
            <tr>
               <td><?php echo $row['no']; ?></td>
               <td><?php echo $row['nama_mobil']; ?></td>
               <td><?php echo number_format($row['harga']); ?></td>
               <td><?php echo $row['tahun_mobil']; ?></td>
               <td>
                  <a href="update.php?no=<?php echo $row['no']; ?>" class="btn btn-success">Ubah</a> &nbsp;&nbsp; <a href="hapus.php?no=<?php echo $row['no']; ?>" class="btn btn-outline-danger">Hapus</a>
               </td>
            </tr>
         <?php
         }
         ?>
      </table>
   </div>
   <footer class="bg-light text-center text-lg-start mt-5">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
         © 2022 Copyright:
         <a class="text-dark" href="https://mdbootstrap.com/">Mobiel.com</a>
      </div>
      <!-- Copyright -->
   </footer>
   </div>
</body>