<?php $menu = 'Customer';
include 'backend/koneksi.php';
include 'partialsadmin/header.php';
include 'partialsadmin/navbar.php';
include 'partialsadmin/sidebar.php'; ?>

<!-- Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle text-center">Full Name</th>
                            <th class="align-middle text-center">Address</th>
                            <th class="align-middle text-center">Phone</th>
                            <th class="align-middle text-center">Total</th>
                            <th class="align-middle text-center">Payment Bills</th>
                            <th class="align-middle text-center">Status</th>
                            <th class="align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($db, "select * from tb_customer");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="align-middle text-center"><?= $d['kode_pembelian'] ?></td>
                                <td class="align-middle text-center"><?= $d['nama_pembeli'] ?></td>
                                <td class="align-middle text-center"><?= $d['alamat'] ?></td>
                                <td class="align-middle text-center"><?= $d['hp'] ?></td>
                                <td class="align-middle text-center">Rp. <?= $d['total'] ?></td>
                                <td class="align-middle text-center"><a href="backend/<?= $d['bukti_bayar'] ?>">View</a></td>
                                <td class="align-middle text-center">
                                    <?php if($d['status'] == "Delivered"){
                                        echo '<span class="badge bg-success">Delivered</span>';
                                    }else{
                                        echo '<span class="badge bg-danger">Not Delivered Yet</span>';
                                    }
                                    ?>
                                </td>
                                <td><a href="backend/delivered.php?kode=<?php echo $d['kode_pembelian']; ?>" class="btn btn-success btn-sm text-white"><i class="mdi mdi-truck"></i> Send</a></td>
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