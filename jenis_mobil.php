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
<script language="Javascript">
   function deletecar() {
      if (confirm('Apakah anda yakin akan menghapus?')) {
         return true;
      } else {
         return false;
      }
   }
</script>
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
         <a class="navbar-brand" href="Penyewaan.php">Penyewaan Mobiel</a>
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
                     <input type="text" name="nama_mobil" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                     <label>Harga Penyewaan</label>
                     <input type="text" name="harga" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                     <label>Plat nomor</label>
                     <input type="text" name="plat_nomor" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                     <label>Tahun Mobil</label>
                     <input type="text" name="tahun_mobil" class="form-control" autocomplete="off" required>
                  </div>
                  <label>Status</label>
                  <select class="form-select" name="status">
                     <option selected value="Tersedia" name="status">Tersedia</option>
                     <option value="Tidak Tersedia" name="status">Tidak Tersedia</option>
                  </select>
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
        '" . $_POST['nama_mobil'] . "','" . $_POST['harga'] . "','" . $_POST['plat_nomor'] . "','" . $_POST['tahun_mobil'] . "','" . $_POST['status'] . "');");
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
   <div style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
      <form action="jenis_mobil.php" method="get">
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
   <div class="col-sm-11" style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
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
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahmodal<?php echo $row['no'] ?>">
                     Ubah
                  </button>
                  <a href="hapus.php?no=<?php echo $row['no']; ?>" class="btn btn-danger" onClick="return deletecar();">Hapus</a>

                  <!-- Modal -->
                  <div class="modal fade" id="ubahModal<?php echo $row['no'] ?>" tabindex="-1">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title">Form Ubah Data Jenis Mobil</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <form method="post" action="prosesupdate.php">
                                 <label class="form-group">Kode Mobil</label><br />
                                 <input class="form-control" readonly name="no" value="<?php echo $row['no']; ?>">

                                 <br>

                                 <label class="form-group">Nama Mobil</label><br />
                                 <input class="form-control" type="text" name="nama_mobil" value="<?php echo $row['nama_mobil']; ?>">

                                 <br>

                                 <label class="form-group">Harga</label><br />
                                 <input class="form-control" type="text" name="harga" value="<?php echo $row['harga']; ?>">

                                 <br>

                                 <label class="form-group">Plat Nomor</label><br />
                                 <input class="form-control" type="text" name="plat_nomor" value="<?php echo $row['plat_nomor']; ?>">

                                 <br>

                                 <label class="form-group">Tahun Mobil</label><br />
                                 <input class="form-control" type="text" name="tahun_mobil" value="<?php echo $row['tahun_mobil']; ?>">

                                 <br>

                                 <select class="form-select" name="status">
                                    <option selected value="Tersedia" name="status">Tersedia</option>
                                    <option value="Tidak Tersedia" name="status">Tidak Tersedia</option>
                                    <!-- <input type="text" name="status" value="<?php echo $row['status']; ?>"> -->
                                 </select>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                 </div>
                              </form>

                           </div>

                        </div>
                     </div>
                  </div>
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