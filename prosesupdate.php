<?php

include 'koneksi.php';
$no = $_POST['no'];
$nama_mobil = $_POST['nama_mobil'];
$harga = $_POST['harga'];
$tahun_mobil = $_POST['tahun_mobil'];
$query = mysqli_query($koneksi, "update jenis_mobil set nama_mobil='$nama_mobil', harga='$harga', tahun_mobil = '$tahun_mobil' where no = '$no'");
if ($query) {
   echo '<script type="text/javascript">
                    alert("Data tersimpan");
                    window.location.href = "admin.php";
                </script>';
} else {
   echo '<script type="text/javascript">
                    alert("Data gagal tersimpan");
                    window.location.href = "admin.php";
                </script>';
}
