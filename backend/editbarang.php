<?php
include 'koneksi.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
  
mysqli_query($db, "update tb_buah set kode='$kode', nama_buah='$nama', harga='$harga' where kode='$kode'");
header('location:../fruits.php');
?>