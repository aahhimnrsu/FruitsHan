<?php $menu = "Home";
include 'partials/header.php';
include 'partials/navbar.php';
include 'backend/koneksi.php';

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

<!-- home page slider -->
<div class="homepage-slider">
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-1">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh & Organic</p>
							<h1>Delicious Seasonal Fruits</h1>
							<div class="hero-btns">
								<a href="shop.php" class="boxed-btn">Fruit Collection</a>
								<a href="contact.php" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh Everyday</p>
							<h1>100% Organic Collection</h1>
							<div class="hero-btns">
								<a href="shop.php" class="boxed-btn">Visit Shop</a>
								<a href="contact.php" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- single home slider -->
	<div class="single-homepage-slider homepage-bg-3 mb-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-right">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Mega Sale Going On!</p>
							<h1>Get December Discount</h1>
							<div class="hero-btns">
								<a href="shop.php" class="boxed-btn">Visit Shop</a>
								<a href="contact.php" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end home page slider -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Free Shipping</h3>
						<p>When order over Rp. 300.000</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>24/7 Support</h3>
						<p>Get support all day</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Refund</h3>
						<p>Get refund within 3 days!</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-100 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Our</span> Products</h3>
					<p>We take immense pride in curating the finest selection of fruits sourced from trusted growers and farmers worldwide.</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
			$batas = 3;
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
							<input type="text" value="<?= $d['harga'] ?>" name="harga" hidden>
							<input type="text" value="<?= $d['kode'] ?>" name="kode" hidden>
							<input type="text" value="<?= $d['nama_buah'] ?>" name="nama" hidden>
							<input type="text" value="<?= $d['foto'] ?>" name="foto" hidden>
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
			<p><a href="shop.php" class="cart-btn btn-lg">View More</a></p>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- shop banner -->
	<section class="shop-banner mt-5">
		<div class="container">
			<h3>June sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
			<div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
			<a href="shop.php" class="cart-btn btn-lg">Shop Now</a>
		</div>
	</section>
	<!-- end shop banner -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									"Since I started offering fruits from FruitHan, my customers have been delighted with the exceptional quality. Their apples are always fresh, crisp, and bursting with natural sweetness. It's no surprise that they fly off the shelves!"
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									"The bursting berries from FruitHan are a true crowd-pleaser. The strawberries, blueberries, and raspberries are consistently juicy and full of flavor. My customers love incorporating them into their breakfast bowls, desserts, and even refreshing beverages."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
								"FruitHan's tropical fruits are a taste of paradise that my customers can't resist. The mangoes are heavenly, with their creamy texture and luscious taste. And the pineapples? They're the perfect balance of tangy and sweet. Thanks to FruitHan, I can offer my customers an exotic fruit experience."
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2023</p>
						<h2>We are <span class="orange-text">FruitHan</span></h2>
						<p>Welcome to FruitHan, a leading fruit company that has been delighting customers since its establishment in 2023. We are dedicated to providing you with the freshest, tastiest, and highest-quality fruits available in the market.</p>
						<p>At FruitHan, we understand the importance of offering fruits that not only satisfy your cravings but also contribute to your overall well-being. That's why we have carefully curated a wide range of fruits, sourced from trusted local farmers and growers who share our commitment to excellence.</p>
						<a href="about.php" class="boxed-btn mt-4">Know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

	<?php include 'partials/footer.php' ?>