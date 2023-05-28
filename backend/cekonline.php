<?php
include 'koneksi.php';

$kode = $_POST['kode'];
$nama = $_POST['nama_pembeli'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$total = $_POST['total'];
$target_dir = "buktibayar/";
$target_file = $target_dir . basename($_FILES["bukti_bayar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["Pesan"])) {
  $check = getimagesize($_FILES["bukti_bayar"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
  
// Check file size
if ($_FILES["bukti_bayar"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "webp") {
  echo "Sorry, only JPG, JPEG, PNG & WEBP files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["bukti_bayar"]["tmp_name"], $target_file)) {

    mysqli_query($db,"insert into tb_customer values('$kode', '$nama', '$alamat', '$hp', '$total', '$target_file', 'Not Delivered Yet')");
    mysqli_query($db,"delete from tb_cart");
    // header('location:invoiceonline.php');
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>Tanda Terima</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
    body {
        margin-top: 20px;
    }
</style>

<body>
    <div bgcolor="#f6f6f6" class="p-3" style="color: #333; height: 100%; width: 100%;" height="auto" width="auto">
        <div class="d-flex justify-content-between">
            <a href="../index.php" class="btn btn-primary btn-sm"><i class="fas fa-angle-left"></i> Back </a>
            <button class="btn btn-success btn-sm" onclick="print()"> Print </button>
        </div>
        <table class="p-5" cellspacing="0" style="border-collapse: collapse; padding: 100px; width: auto;" width="auto" align="center">
            <tbody class="p-5">
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;">
                                        <h1>FruitsHan</h1>
                                    </td>
                                    <td style="color: #999; font-size: 12px; padding: 0; text-align: right;" align="right">
                                        FruitHan<br />
                                        Invoice #<?= $kode ?> <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>

                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                            <tbody>
                                <tr>
                                    <td width="50%" style="padding: 20px;"><strong style="color: #333; font-size: 24px;"><?="Rp.". $total ;?></strong> Total</td>
                                    <td align="right" width="50%" style="padding: 20px;">Thank you for shopping</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="padding: 0;"></td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding: 20px;">
                                        <h3 style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        ">
                                            Summary
                                        </h3>
                                        <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 5px 0;">Name</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $nama ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Address</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $alamat ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Phone</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $hp ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Total</td>
                                                    <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;"><?= "Rp.". $total ;?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>

                <tr style="color: #666; font-size: 12px;">
                    <td width="5px" style="padding: 10px 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;">Have you any question?</h4>
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            <a href="../contact.php" style="color: #666;" target="_blank">
                                                Contact us
                                            </a>
                                        </p>
                                    </td>
                                    <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;">FruitHan</h4>
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">Anwar Arsyad Street, Palembang. 30138</p>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>