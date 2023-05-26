<?php
include 'koneksi.php';

$kode = $_GET['kode'];
  
mysqli_query($db, "update tb_customer set status='Delivered' where kode_pembelian='$kode'");
header('location:../Customer.php');
?>