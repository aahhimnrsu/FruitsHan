<?php include 'backend/koneksi.php';
$data_barang = mysqli_query($db, "SELECT SUM(jumlah) as total FROM tb_cart");

$jumlah_barang = mysqli_fetch_array($data_barang);
?>
<!-- header -->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="<?php if($menu=="Home"){ echo 'current-list-item'; } ?>"><a href="index.php">Home</a></li>
								<li class="<?php if($menu=="About"){ echo 'current-list-item'; } ?>"><a href="about.php">About</a></li>
								<li class="<?php if($menu=="Contact"){ echo 'current-list-item'; } ?>"><a href="contact.php">Contact</a></li>
								<li class="<?php if($menu=="Shop"){ echo 'current-list-item'; } ?>"><a href="shop.php">Shop</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart <?php if($menu=='Cart'){ echo 'current-list-item'; } ?>" href="cart.php"><i class="fas fa-shopping-cart"></i><p class="badge badge-warning text-wrap ml-1"><?= $jumlah_barang['total']; ?></p></a>
										<a href="login.php"><i class="fas fa-user mr-2"></i>Login</a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->