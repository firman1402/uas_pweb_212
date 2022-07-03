<?php

include 'koneksi.php';
$no = $_POST['no'];
$nama_mobil = $_POST['nama_mobil'];
$harga = $_POST['harga'];
$plat_nomor = $_POST['plat_nomor'];
$tahun_mobil = $_POST['tahun_mobil'];
$status = $_POST['status'];
$query = mysqli_query($koneksi, "update jenis_mobil set nama_mobil='$nama_mobil', harga='$harga',plat_nomor='$plat_nomor', tahun_mobil = '$tahun_mobil',status = '$status' where no = '$no'");
if ($query) {
    echo '<script type="text/javascript">
                    alert("Data tersimpan");
                    window.location.href = "jenis_mobil.php";
                </script>';
} else {
    echo '<script type="text/javascript">
                    alert("Data gagal tersimpan");
                    window.location.href = "jenis_mobil.php";
                </script>';
}
