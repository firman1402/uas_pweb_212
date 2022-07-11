<?php 
include('koneksi.php');
    $kode_mobil= $_GET['kode_mobil'];
    $kuery = mysqli_query($koneksi, "Update penyewaan set status= 'telah dikembalikan' where kode_mobil='$kode_mobil'");
    $kuery1 = mysqli_query($koneksi, "Update jenis_mobil set status= 'Tersedia' where no='$kode_mobil'");    
    echo "<script> alert('Data Berhasil Di Ubah')</script>";
    header("location:admin.php");
