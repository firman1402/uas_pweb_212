<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
   <title>FORM Admin</title>
</head>

<body>
   <h2>Halaman Admin</h2>

   <br />

   <!-- cek apakah sudah login -->
   <?php
   session_start();
   if ($_SESSION['status'] != "login") {
      header("location:index.php?pesan=belum_login");
   }
   ?>



   <h4>Selamat datang, <?php echo $_SESSION['username']; ?>! anda telah login.</h4>

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

   <form action="" method="POST">
      <table>
         <tr>
            <td><b>KODE MOBIL</b></td>
            <td><input type="text" name="no" value="<?php echo $kodeMobil ?>" readonly></td>
         </tr>
         <tr>
            <td><b>NAMA MOBIL</b></td>
            <td><input type="text" name="nama_mobil" required="required"></td>
         </tr>
         <tr>
            <td><b>HARGA PENYEWAAN</b></td>
            <td><input type="text" name="harga" required="required"></td>
         </tr>
         <tr>
            <td><b>TAHUN MOBIL</b></td>
            <td><input type="text" name="tahun_mobil" required="required"></td>
         </tr>
         <tr>
            <td>
               <input type="submit" value="Simpan" name="btnSimpan">
               <input type="reset" value="Batal" name="btnBatal">
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
            window.location.href = "admin.php";
            </script>';
      } else {
         echo '<script type="text/javascript">
            alert("Data Gagal Tersimpan");
            window.location.href = "admin.php";
            </script>';
      }
   }
   ?>
   <br />
   <br />

   <?php
   include 'Koneksi.php';
   ?>
   <br />
   <br />

   <table border="4" cellpadding="10">
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

   <br />
   <br />
   <a href="logout.php" type="submit" class="btn btn-secondary btn-block">
      LOG OUT
   </a>


</body>

</html>