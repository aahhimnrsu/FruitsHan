<?php $menu = "Cart";
include 'partials/header.php';
include 'partials/navbar.php';
include 'backend/koneksi.php';

$data_barang = mysqli_query($db, "SELECT SUM(jumlah) as total FROM tb_cart");
$jumlah_barang = mysqli_fetch_array($data_barang);

$query = mysqli_query($db, "SELECT max(kode_pembelian) as kodeTerbesar FROM tb_customer");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "TB";
$kodePembelian = $huruf . sprintf("%03s", $urutan);
?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Cart</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-remove"></th>
								<th class="product-image">Product Image</th>
								<th class="product-name">Name</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$data = mysqli_query($db, "select * from tb_cart");
							while ($d = mysqli_fetch_array($data)) {
							?>
								<tr class="table-body-row">
									<td class="product-remove"><a href="backend/hapuscart.php?kode=<?php echo $d['kode_buah']; ?>"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="backend/<?= $d['foto_buah'] ?>" alt=""></td>
									<td class="product-name"><?= $d['nama_buah'] ?></td>
									<td class="product-price">Rp.<?= $d['harga'] ?></td>
									<td class="product-quantity"><?= $d['jumlah'] ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="accordion mb-4" id="accordionExample">
					<div class="card single-accordion">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Billing Detail
								</button>
							</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
								<div class="billing-address-form">
							<?php
							include 'backend/koneksi.php';
							$data = mysqli_query($db, "select sum(total) as total from tb_cart");
							$d = mysqli_fetch_array($data);
							?>
									<form method="POST" action="backend/cekonline.php" enctype="multipart/form-data">
										<p>Name :<input type="text" name="nama_pembeli"></p>
										<p>Phone :<input type="text" name="hp"></p>
										<p>Address :<textarea name="alamat" cols="30" rows="10"></textarea></p>
										<p>Bill Payment Picture :<input type="file" name="bukti_bayar"></p>
										<p><input type="hidden" name="total" value="<?= $d['total']+12000?>"></p>
										<p><input type="hidden" name="kode" value="<?= $kodePembelian?>"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Total</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Subtotal: </strong></td>
								<td>Rp. <?php if ($d['total'] == NULL) {
											echo '0';
										} else {
											echo $d['total'];
										} ?></td>
							</tr>
							<tr class="total-data">
								<td><strong>Shipping: </strong></td>
								<td>Rp. 12000</td>
							</tr>
							<tr class="total-data">
								<td><strong>Total: </strong></td>
								<td>Rp. <?= $d['total'] + 12000 ?></td>
							</tr>
						</tbody>
					</table>
					<div class="cart-buttons">
						<input type="submit" class="boxed-btn black text-white" value="Check Out">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end cart -->
<script src="backend/online.js"></script>
<?php include 'partials/footer.php' ?>