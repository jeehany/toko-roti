<?php
include 'header.php';
$kode = mysqli_real_escape_string($conn, $_GET['produk']);
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
$row = mysqli_fetch_assoc($result);

?>
<div class="product-detail-wrapper">
	<div class="container">
		<nav aria-label="breadcrumb" class="product-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Product Details</li>
			</ol>
		</nav>

		<div class="product-detail-container">
			<div class="row">
				<!-- Product Image Section -->
				<div class="col-md-6">
					<div class="product-image-container">
						<div class="product-main-image">
							<img src="image/produk/<?= $row['image']; ?>" alt="<?= $row['nama']; ?>" class="img-responsive">
						</div>
					</div>
				</div>

				<!-- Product Info Section -->
				<div class="col-md-6">
					<div class="product-info">
						<h1 class="product-title"><?= $row['nama']; ?></h1>
						<div class="product-price">
							<span class="currency">Rp</span>
							<span class="amount"><?= number_format($row['harga']); ?></span>
						</div>

						<div class="product-description">
							<h3>Description</h3>
							<p><?= $row['deskripsi']; ?></p>
						</div>

						<form action="proses/add.php" method="GET" class="product-form">
							<input type="hidden" name="produk" value="<?= $kode; ?>">
							<input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
							<input type="hidden" name="hal" value="1">

							<div class="form-group quantity-selector">
								<label for="quantity">Quantity</label>
								<div class="quantity-input-group">
									<button type="button" class="btn-quantity" onclick="decrementQuantity()">-</button>
									<input type="number" id="quantity" name="jmlh" value="1" min="1" class="form-control quantity-input">
									<button type="button" class="btn-quantity" onclick="incrementQuantity()">+</button>
								</div>
							</div>

							<div class="detail-product-actions">
								<?php if (isset($_SESSION['user'])) { ?>
									<button type="submit" class="btn btn-primary btn-add-to-cart">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</button>
								<?php } else { ?>
									<a href="keranjang.php" class="btn btn-primary btn-add-to-cart">
										<i class="fa fa-shopping-cart"></i> Add to Cart
									</a>
								<?php } ?>
								<a href="index.php" class="btn btn-outline btn-continue-shopping">
									<i class="fa fa-arrow-left"></i> Continue Shopping
								</a>
							</div>
						</form>

						<div class="product-features">
							<div class="feature-item">
								<i class="fa fa-truck"></i>
								<span>Free shipping on orders over Rp500.000</span>
							</div>
							<div class="feature-item">
								<i class="fa fa-shield"></i>
								<span>100% authentic products</span>
							</div>
							<div class="feature-item">
								<i class="fa fa-refresh"></i>
								<span>30-day return policy</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>