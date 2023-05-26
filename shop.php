<?php $menu = "Shop" ?>
<?php include 'partials/header.php' ?>
<?php include 'partials/navbar.php';
$data_barang = mysqli_query($db, "SELECT SUM(jumlah) as total FROM tb_cart");

$jumlah_barang = mysqli_fetch_array($data_barang);

$query = mysqli_query($db, "SELECT max(kode_buah) as kodeTerbesar FROM tb_cart");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRN";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row product-lists">
			<?php
			$batas = 12;
			$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
			$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

			$previous = $halaman - 1;
			$next = $halaman + 1;

			$data = mysqli_query($db, "SELECT * from tb_buah");
			$jumlah_data = mysqli_num_rows($data);
			$total_halaman = ceil($jumlah_data / $batas);

			$dataBuah = mysqli_query($db, "SELECT * from tb_buah limit $halaman_awal, $batas");
			$nomor = $halaman_awal + 1;
			while ($d = mysqli_fetch_array($dataBuah)) {
			?>
				<div class="col-lg-4 col-md-6 text-center">
					<form class="mt-5" method="POST" action="backend/cekcart.php" enctype="multipart/form-data">
						<div class="single-product-item">
							<div class="product-image">
								<img src="<?= "backend/" . $d['foto']; ?>" alt="">
							</div>
							<h3><?= $d['nama_buah']; ?></h3>
							<p class="product-price"><span>Per Kg</span> <?= "Rp." . $d['harga']; ?> </p>
							<input type="text" value="<?= $d['harga']?>" name="harga" hidden>
							<input type="text" value="<?= $d['kode']?>" name="kode" hidden>
							<input type="text" value="<?= $d['nama_buah']?>" name="nama" hidden>
							<input type="text" value="<?= $d['foto']?>" name="foto" hidden>
							<input type="hidden" class="form-control" id="total" name="total" value="0">
							<div class="d-flex justify-content-center">
								<input type="number" class="form-control w-50 border border-warning font-weight-bold text-center" id="jumlah" name="jumlah" min="0" max="30" placeholder="Quantity" required>
							</div>
							<input type="submit" id="add" name="add" class="cart-btn text-white" value="+ Add to cart">
						</div>
					</form>
				</div>
			<?php
			}
			?>
		</div>

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="pagination-wrap">
					<ul>
						<li><a <?php if ($halaman > 1) {
									echo "href='?halaman=$Previous'";
								} ?>>Prev</a></li>
						<?php for ($x = 1; $x <= $total_halaman; $x++) { ?>
							<li><a href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
						<?php } ?>
						<li><a <?php if ($halaman < $total_halaman) {
									echo "href='?halaman=$next'";
								} ?>>Next</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end products -->

<?php include 'partials/footer.php' ?>