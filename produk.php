<?php
include 'header.php';
?>

<!-- PRODUK TERBARU -->
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

</div>

<?php
include 'footer.php';
?>