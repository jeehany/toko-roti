<?php
include 'header.php';
?>

<div class="manual-container">
	<div class="container">
		<!-- Header Section -->
		<div class="manual-header">
			<h1>Manual Aplikasi</h1>
			<p class="lead">Pelajari cara menggunakan aplikasi kami dengan mudah</p>
		</div>

		<!-- FAQ Accordion Section -->
		<div class="faq-section">
			<div class="panel-group" id="accordion">
				<!-- Shopping Guide -->
				<div class="faq-item">
					<div class="faq-header" data-toggle="collapse" data-target="#shopping-guide">
						<div class="faq-icon">
							<i class="glyphicon glyphicon-shopping-cart"></i>
						</div>
						<h4>Bagaimana Cara Berbelanja di LiVi Skincare Store?</h4>
						<div class="toggle-icon">
							<i class="glyphicon glyphicon-chevron-down"></i>
						</div>
					</div>
					<div id="shopping-guide" class="collapse in">
						<div class="faq-content">
							<div class="step-guide">
								<div class="step">
									<div class="step-number">1</div>
									<div class="step-info">
										<h5>Daftar Akun</h5>
										<p>Pastikan Anda sudah Daftar/Register terlebih dahulu untuk memulai berbelanja</p>
									</div>
								</div>
								<div class="step">
									<div class="step-number">2</div>
									<div class="step-info">
										<h5>Pilih Produk</h5>
										<p>Pilih produk yang ingin Anda beli dari katalog kami</p>
									</div>
								</div>
								<div class="step">
									<div class="step-number">3</div>
									<div class="step-info">
										<h5>Checkout</h5>
										<p>Lakukan checkout dan pembayaran untuk pesanan Anda</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Additional FAQ Items -->
				<div class="faq-item">
					<div class="faq-header collapsed" data-toggle="collapse" data-target="#payment-guide">
						<div class="faq-icon">
							<i class="glyphicon glyphicon-credit-card"></i>
						</div>
						<h4>Metode Pembayaran</h4>
						<div class="toggle-icon">
							<i class="glyphicon glyphicon-chevron-down"></i>
						</div>
					</div>
					<div id="payment-guide" class="collapse">
						<div class="faq-content">
							<p>Kami menerima berbagai metode pembayaran untuk kemudahan Anda:</p>
							<ul>
								<li>Transfer Bank</li>
								<li>E-Wallet</li>
								<li>Virtual Account</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="faq-item">
					<div class="faq-header collapsed" data-toggle="collapse" data-target="#shipping-guide">
						<div class="faq-icon">
							<i class="glyphicon glyphicon-send"></i>
						</div>
						<h4>Informasi Pengiriman</h4>
						<div class="toggle-icon">
							<i class="glyphicon glyphicon-chevron-down"></i>
						</div>
					</div>
					<div id="shipping-guide" class="collapse">
						<div class="faq-content">
							<p>Pengiriman dilakukan melalui jasa ekspedisi terpercaya dengan estimasi waktu 2-3 hari kerja.</p>
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