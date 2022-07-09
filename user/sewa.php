<?php
require 'koneksi.php';
session_start();
// menampilkan data tersimpan
$id = $_GET['no'];
$query = mysqli_query($koneksi, "select * from jenis_mobil where no = '" . $_GET['no'] . "';");
$data = mysqli_fetch_array($query);
?>
<?php
$query = mysqli_query($koneksi, "SELECT max(kode_pinjam) as kodeTerbesar FROM penyewaan");
$data = mysqli_fetch_array($query);
$kodePinjam = $data['kodeTerbesar'];
$urutan = (int) substr($kodePinjam, 3, 3);

$urutan++;
$huruf = "PN";
$kodePinjam = $huruf . sprintf("%03s", $urutan);
?>

<div style="padding-top: 20px; padding-bottom: 20px; padding-left: 40px;">
   <h1>Jenis Mobil</h1>
   <form action="" method="POST">
      <table>
         <div class="col-sm-4">
            <h3>Form Tambah Jenis Mobil</h3>
            <form role="form" method="post">
               <div class="form-group">
                  <label>Kode Penyewaan</label>
                  <input type="text" name="kode_pinjam" value="<?php echo $kodePinjam ?>" readonly class="form-control">
               </div>
               <?php
               $list = mysqli_query($koneksi, "select * from guest where id = 2");
               while ($row = mysqli_fetch_array($list)) {
               ?>
                  <div class="form-group">
                     <label>Nama Peminjam</label>
                     <input type="text" name="nama_peminjam" value="<?php echo $_SESSION['username']; ?>" readonly class="form-control" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                     <label>No Telpon</label>
                     <input type="text" name="no_telp" value="<?php echo $row['no_telp']; ?>" readonly class="form-control" autocomplete="off" required>
                  </div>
               <?php
               }
               ?>
               <div class="form-group">
                  <label>Tanggal Peminjaman</label>
                  <input type="date" name="tanggal_pinjam" class="form-control" autocomplete="off" required>
               </div>
               <div class="form-group">
                  <label>Lama Pinjam</label>
                  <input type="text" name="lama_pinjam" class="form-control" autocomplete="off" required>
               </div>
               <?php
               $list = mysqli_query($koneksi, "select * from jenis_mobil");
               while ($row = mysqli_fetch_array($list)) {
               ?>
                  <div class="form-group">
                     <label>Kode Mobil</label>
                     <input type="text" name="no" value="<?php echo $row['no']; ?>" readonly class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Nama Mobil</label>
                     <input type="text" name="status" value="<?php echo $row['nama_mobil']; ?>" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                     <label>Harga Sewa</label>
                     <input type="text" name="no" value="HAA? KOSONG?" readonly class="form-control">
                  </div>

               <?php
               }
               ?>
            </form>
         </div>
         <br />
         <tr>
            <td>
               <input type="submit" value="Simpan" class="btn btn-success" name="btnSimpan">
               <input type="reset" value="Batal" class="btn btn-danger" name="btnBatal">
               <a type="button" href="guest.php">Kembali</a>
            </td>
         </tr>
      </table>
   </form>


   <?php
   if (isset($_POST['btnSimpan'])) {
      include 'Koneksi.php';

      $simpan = mysqli_query($koneksi, "insert into penyewaan values ('" . $_POST['no'] . "',
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