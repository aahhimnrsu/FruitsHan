<?php $menu = 'Question';
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
                            <th class="align-middle text-center">No.</th>
                            <th class="align-middle text-center">Full Name</th>
                            <th class="align-middle text-center">Address</th>
                            <th class="align-middle text-center">Phone</th>
                            <th class="align-middle text-center">Subject</th>
                            <th class="align-middle text-center">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $data = mysqli_query($db, "select * from tb_question");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td class="align-middle text-center"><?= $no ?></td>
                                <td class="align-middle text-center"><?= $d['nama'] ?></td>
                                <td class="align-middle text-center"><?= $d['email'] ?></td>
                                <td class="align-middle text-center"><?= $d['phone'] ?></td>
                                <td class="align-middle text-center"><?= $d['subject'] ?></td>
                                <td class="align-middle text-center"><?= $d['message'] ?></td>
                            </tr>
                        <?php
                        $no++;
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