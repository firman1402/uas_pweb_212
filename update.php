<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
include 'koneksi.php';
// menampilkan data tersimpan
$id = $_GET['no'];
$query = mysqli_query($koneksi, "select * from jenis_mobil where no = '" . $_GET['no'] . "';");
$data = mysqli_fetch_array($query);
?>
<form action="prosesupdate.php" method="POST">
   <table>
      <tr>
         <td><b>KODE MOBIL</b></td>
         <td><input type="text" name="no" value="<?php echo $data['no']; ?>" readonly></td>
      </tr>
      <tr>
         <td><b>NAMA MOBIL</b></td>
         <td><input type="text" name="nama_mobil" value="<?php echo $data['nama_mobil']; ?>"></td>
      </tr>
      <tr>
         <td><b>HARGA PENYEWAAN</b></td>
         <td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></td>
      </tr>
      <tr>
         <td><b>TAHUN MOBIL</b></td>
         <td><input type="text" name="tahun_mobil" value="<?php echo $data['tahun_mobil']; ?>"></td>
      </tr>
      <tr>
         <td>
            <input type="submit" name="tambah" value="Ganti" class="btn btn-success">
            <a href="admin.php" class="btn btn-outline-danger">Kembali</a>
         </td>
      </tr>
   </table>
</form>