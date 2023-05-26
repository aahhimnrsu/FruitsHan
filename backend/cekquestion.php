<?php
include 'koneksi.php';

$nama = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

    mysqli_query($db,"insert into tb_question values('$id','$nama','$email', '$phone', '$subject','$message')");
    header('location:../contact.php');
?>