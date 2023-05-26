<?php $menu = 'Add Fruits';
include 'backend/koneksi.php';
include 'partialsadmin/header.php';
include 'partialsadmin/navbar.php';
include 'partialsadmin/sidebar.php';


$query = mysqli_query($db, "SELECT max(kode) as kodeTerbesar FROM tb_buah");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "FR";
$kodeBuah = $huruf . sprintf("%03s", $urutan);?>

<!-- Content -->
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <form action="backend/cektambahbarang.php" method="post" enctype="multipart/form-data">
            <table>
                <tr height="50px">
                    <td width="100px">ID</td>
                    <td width="10px">: </td>
                    <td><input type="text" name="kode" id="kode" readonly value="<?= $kodeBuah ?>" class="form-control"></td>
                </tr>
                <tr height="50px">
                    <td width="100px">Fruits Name</td>
                    <td width="10px">: </td>
                    <td><input type="text" name="nama" id="nama" class="form-control"></td>
                </tr>
                <tr height="50px">
                    <td width="100px">Price</td>
                    <td width="10px">: </td>
                    <td><input type="text" name="harga" id="harga" class="form-control"></td>
                </tr>
                <tr height="50px">
                    <td width="100px">Picture</td>
                    <td width="10px">: </td>
                    <td><input type="file" name="foto" id="foto"class="form-control"></td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary mt-3"><i class="mdi mdi-plus"></i> Add Fruits</button>
        </div>
        </form>
    </div>
  </div>
</div>
<!-- End Content  -->
<?php include 'partialsadmin/footer.php' ?>
<script>
  $("#zero_config").DataTable();
</script>