<?php
include 'header.php';
?>
<header class="hero">
	<div class="hero-overlay"></div>
	<div class="container">
		<div class="hero-content text-center">
			<h1 class="hero-title">Selamat Datang di LiVi Skincare Store</h1>
			<p class="hero-subtitle">Temukan Kecantikan Alami dengan Produk Perawatan Kulit Premium Kami</p>
			<a href="#products" class="btn btn-primary btn-lg hero-btn">
				Jelajahi Koleksi Kami
			</a>
		</div>
	</div>
</header>

<!-- Tentang Kami Section -->
<section class="about-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="about-content text-center">
					<h2 class="section-title">Tentang LiVi Skincare</h2>
					<p class="about-text">
						Didirikan pada tahun 2010, LiVi Skincare Store adalah pelopor dalam solusi perawatan kulit modern. Kami berkomitmen untuk menyediakan produk alami berkualitas tinggi yang efektif dan aman. Dari pembersih wajah hingga serum dan lainnya, pilihan kami yang dipilih dengan cermat melayani semua jenis kulit dan masalah.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Fitur Section -->
<section class="features-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="feature-box text-center">
					<i class="fa fa-leaf fa-3x feature-icon"></i>
					<h3>Bahan Alami</h3>
					<p>Bahan alami yang dipilih dengan hati-hati untuk perawatan kulit yang lembut namun efektif</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-box text-center">
					<i class="fa fa-certificate fa-3x feature-icon"></i>
					<h3>Kualitas Terjamin</h3>
					<p>Semua produk menjalani pengujian kualitas yang ketat untuk keamanan Anda</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-box text-center">
					<i class="fa fa-heart fa-3x feature-icon"></i>
					<h3>Bebas Kekejaman</h3>
					<p>Kami tidak pernah menguji produk kami pada hewan</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Products Section -->
<section id="products" class="products-section">
	<div class="container">
		<h2 class="section-title text-center">Produk Kami</h2>
		<div class="row product-grid">
			<?php
			$result = mysqli_query($conn, "SELECT * FROM produk");
			while ($row = mysqli_fetch_assoc($result)) {
			?>
				<div class="col-md-3 col-sm-6">
					<div class="product-card">
						<div class="product-image">
							<img src="image/produk/<?= $row['image']; ?>" alt="<?= $row['nama']; ?>" class="img-responsive">
							<div class="product-overlay">
								<div class="product-actions">
									<a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-info btn-sm">
										<i class="fa fa-info-circle"></i> Details
									</a>
									<?php if (isset($_SESSION['kd_cs'])) { ?>
										<a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-sm">
											<i class="fa fa-shopping-cart"></i> Add to Cart
										</a>
									<?php } else { ?>
										<a href="keranjang.php" class="btn btn-success btn-sm">
											<i class="fa fa-shopping-cart"></i> Add to Cart
										</a>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="product-info">
							<h3 class="product-title"><?= $row['nama']; ?></h3>
							<div class="product-price">Rp <?= number_format($row['harga']); ?></div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php
include 'footer.php';
?>