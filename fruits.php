<?php $menu = 'Fruits';
include 'backend/koneksi.php';
include 'partialsadmin/header.php';
include 'partialsadmin/navbar.php';
include 'partialsadmin/sidebar.php';

$databuah = mysqli_query($db, "SELECT count(*) FROM tb_buah");
$jumlahbuah = $databuah->fetch_assoc();
$datacust = mysqli_query($db, "SELECT count(*) FROM tb_customer");
$customer = $datacust->fetch_assoc(); ?>

<!-- Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="addfruits.php" class="btn btn-primary btn-sm"><i class="mdi mdi-plus"></i> Add Fruits</a>
            <hr>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Fruit Name</th>
                            <th class="align-middle text-center">Price</th>
                            <th class="align-middle text-center">Picture</th>
                            <th class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($db, "select * from tb_buah");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="align-middle text-center"><?= $d['kode'] ?></td>
                                <td class="align-middle text-center"><?= $d['nama_buah'] ?></td>
                                <td class="align-middle text-center"><?= $d['harga'] ?></td>
                                <td class="align-middle text-center"><img src="backend/<?= $d['foto'] ?>" style="width: 50px;"></td>
                                <td class="align-middle text-center">
                                <a href="backend/editfruits.php?kode=<?php echo $d['kode']; ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i> Edit</a>
                                <a href="backend/hapusbarang.php?kode=<?php echo $d['kode']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Content  -->
<?php include 'partialsadmin/footer.php' ?>
<script>
    $("#zero_config").DataTable();
</script>