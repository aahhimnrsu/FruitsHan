<?php $menu = 'Dashboard';
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
  <div class="row">
    <div class="col-md-6">
      <div class="card card-hover">
        <div class="box bg-danger text-center">
          <h1 class="font-light text-white">
            <i class="mdi mdi-food-apple"></i>
          </h1>
          <h6 class="text-white"><?php foreach ($jumlahbuah as $jumlahbuah) {
                                    print_r($jumlahbuah);
                                  } ?> Fruits</h6>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-hover">
        <div class="box bg-primary text-center">
          <h1 class="font-light text-white">
            <i class="mdi mdi-shopping"></i>
          </h1>
          <h6 class="text-white"><?php foreach ($customer as $customer) {
                                    print_r($customer);
                                  } ?> Customer</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Customer</h5>
      <hr>
      <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Full Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Total</th>
              <th>Payment Bills</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = mysqli_query($db, "select * from tb_customer");
            while ($d = mysqli_fetch_array($data)) {
            ?>
              <tr>
                <td><?= $d['kode_pembelian'] ?></td>
                <td><?= $d['nama_pembeli'] ?></td>
                <td><?= $d['alamat'] ?></td>
                <td><?= $d['hp'] ?></td>
                <td>Rp. <?= $d['total'] ?></td>
                <td><a href="backend/<?= $d['bukti_bayar'] ?>" target="_blank">View</a></td>
                <td>
                  <?php if ($d['status'] == "Delivered") {
                    echo '<span class="badge bg-success">Delivered</span>';
                  } else {
                    echo '<span class="badge bg-danger">Not Delivered Yet</span>';
                  }
                  ?></td>
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