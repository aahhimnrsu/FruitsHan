<?php
//koneksi database include 'koneksi.php';
include 'koneksi.php';
//menangkap data id yang di kirim dari url
$kode= $_GET['kode'];

//menghapus data dari database
mysqli_query($db,"delete from tb_cart where kode_buah='$kode'");

//mengalihkan halaman kembali ke tampil_data.php header("location:index.php");
header("location:../cart.php")

?>