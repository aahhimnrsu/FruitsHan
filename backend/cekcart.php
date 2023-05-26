<?php
include 'koneksi.php';

$kode_buah = $_POST['kode'];
$foto_buah = $_POST['foto'];
$nama_buah = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$total = $harga * $jumlah;

    mysqli_query($db,"insert into tb_cart values('$id','$kode_buah', '$foto_buah', '$nama_buah','$harga', '$jumlah', '$total')");
    header('location:../cart.php');
?>