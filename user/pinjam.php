<?php
include('koneksi.php');

$kd_pinjam = $_POST['kd_pinjam'];
$nama_peminjam = $_POST['nama_peminjam'];
$nomer_telepon = $_POST['nomer_telepon'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$lama = $_POST['lama'];
$kd_mobil = $_POST['kd_mobil'];
$nm_mobil = $_POST['nm_mobil'];
$harga_sewa = $_POST['harga_sewa'];
$harga = $_POST['totalHarga'];

mysqli_query($koneksi, "update jenis_mobil set status='Tidak Tersedia' where no = '$kd_mobil'");
$query = mysqli_query($koneksi, "insert into penyewaan values ('$kd_pinjam','$nama_peminjam','$nomer_telepon','$tgl_pinjam','$lama','$kd_mobil','$nm_mobil','$harga_sewa','$harga','disewa')");
if ($query == 1) {
   echo '<script type="text/javascript">
      alert("Data Penyewaan Tersimpan");
      window.location.href = "guest.php";
      </script>';
} else {
   echo '<script type="text/javascript">
      alert("Data Penyewaan Gagal Tersimpan, harap ulangi!");
      window.location.href = "guest.php";
      </script>';
}
