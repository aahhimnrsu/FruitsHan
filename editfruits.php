<?php $menu = 'Edit Fruits';
include 'backend/koneksi.php';
include 'partialsadmin/header.php';
include 'partialsadmin/navbar.php';
include 'partialsadmin/sidebar.php';?>

<!-- Content -->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <form action="backend/editbarang.php" method="post" enctype="multipart/form-data">
            <?php $kode = $_GET['kode'];
            $data = mysqli_query($db, "SELECT * FROM tb_buah WHERE kode='$kode'");
            while ($d = mysqli_fetch_array($data)) {?>
            <table>
                <tr height="50px">
                    <td width="100px">ID</td>
                    <td width="10px">: </td>
                    <td><input type="text" name="kode" id="kode" readonly value="<?= $d['kode']?>" class="form-control"></td>
                </tr>
                <tr height="50px">
                    <td width="100px">Fruits Name</td>
                    <td width="10px">: </td>
                    <td><input type="text" name="nama" id="nama" value="<?= $d['nama_buah']?>" class="form-control"></td>
                </tr>
                <tr height="50px">
                    <td width="100px">Price</td>
                    <td width="10px">: </td>
                    <td><input type="text" name="harga" id="harga" value="<?= $d['harga']?>" class="form-control"></td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-warning mt-3"><i class="fas fa-edit"></i> Edit Fruits</button>
        </div>
        <?php } ?>
        </form>
    </div>
  </div>
</div>
<!-- End Content  -->
<?php include 'partialsadmin/footer.php' ?>
<script>
  $("#zero_config").DataTable();
</script>