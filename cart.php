<?php
require 'config.php';
if ($_SESSION['login'] != true) {
	header("Location: login.php");
}
$page = "Cart";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bangunanku - Build your building.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">
	<div class="py-1 bg-primary">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text">081234567890</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text">bangunanku2019@gmail.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">3-5 Business days delivery &amp; Free Returns</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'navbar.php'; ?>
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('images/ruangkeluarga.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread">My Cart</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="cart-list">
						<table class="table">
							<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM cart INNER JOIN (products INNER JOIN product_images ON products.product_id = product_images.product_id) ON cart.product_id = products.product_id WHERE cart.user_id=$id";
								$rs_result = mysqli_query($conn, $query);
								$jumlahBarang = mysqli_num_rows($rs_result);
								$barang = array();
								if ($jumlahBarang == 0) {
									echo '<tr class="text-center">
									<td colspan="6">
									Belum ada Produk di Kerajang anda</td></tr>';
								} else {
									while ($row = mysqli_fetch_assoc($rs_result)) {
								?>
										<tr class="text-center">
											<td class="product-remove"><a href="#" id="deleteCart" data-id="<?php echo $row['product_id']; ?>"><span class="ion-ios-close"></span></a></td>

											<td class="image-prod">
												<div class="img" style="background-image:url(<?php echo $row['image_url']; ?>);"></div>
											</td>

											<td class="product-name">
												<h3><?php echo $row['product_name']; ?></h3>
												<p><?php echo $row['description']; ?></p>
											</td>

											<td class="price"><?php echo rupiah($row["price"]) ?></td>

											<td class="quantity">
												<div class="input-group mb-3">
													<input onkeyup="Hitunghbarang()" value="<?php echo $row["quantity"] ?>" data-id="<?php echo $row["product_id"] ?>" id="quantity<?php echo $row["product_id"] ?>" data-price="<?php echo $row["price"] ?>" type="text" name="quantity" class="quantity form-control input-number" min="1" max="100">
												</div>
											</td>

											<td class="total" id="totalhpro<?php echo $row["product_id"] ?>"></td>
										</tr><!-- END TR-->
								<?php
										$barang[] = array(
											'id_barang' => $row['product_id'],
											'quantity' => $row['quantity']
										);
									}
								}
								// print_r($barang);
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col-lg-6 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>Coupon Code</h3>
						<p>Enter your coupon code if you have one</p>
						<form action="#" class="info">
							<div class="form-group">
								<label for="">Coupon code</label>
								<input type="text" class="form-control text-left px-3" placeholder="" id="coupon_code">
							</div>
						</form>
					</div>
					<p><a href="#" id="submitCoupon" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
				</div>
				<div class="col-lg-6 mt-5 cart-wrap ftco-animate">
					<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
						<p class="d-flex">
							<span>Subtotal</span>
							<span id="subtotal"></span>
						</p>
						<p class="d-flex">
							<span>Delivery</span>
							<span id="delivery"></span>
						</p>
						<p class="d-flex">
							<span id="htax"></span>
							<span id="tax"></span>
						</p>
						<p class="d-flex">
							<span id="hdiscount"></span>
							<span id="discount"></span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<span id="totalAll"></span>
						</p>
					</div>
					<p>
						<!-- <a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a> -->
						<a href="#" id="checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
					<span>Get e-mail updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<input type="text" class="form-control" placeholder="Enter email address">
							<input type="submit" value="Subscribe" class="submit px-3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer class="ftco-footer ftco-section">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">bangunanku</h2>
						<p>Build your building.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Menu</h2>
						<ul class="list-unstyled">
							<li><a href="shop.html" class="py-2 d-block">Shop</a></li>
							<li><a href="about.html" class="py-2 d-block">About</a></li>
							<li><a href="login.html" class="py-2 d-block">Login</a></li>
							<li><a href="index.html" class="py-2 d-block">Home</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">FAQs</a></li>
								<li><a href="#" class="py-2 d-block">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">14.5 Kaliurang St. Sleman, DIY Yogyakarta, Indonesia</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">081234567890</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text">bangunanku2019@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script>
		let delivery = 0;
		let discount = 0;
		let discountm = 0;
		let tax = 10;
		let taxm = 0;
		let id_disc = 0;
		let total_items = <?php echo json_encode($barang); ?>;
		let htotal = [];
		let data_barang = [];
		let id_user = "<?php echo base64_encode($id); ?>";
		let total_amount = 0;
		let sub_amount = 0;


		$(document).ready(function() {
			$(document).on("click", "#submitCoupon", function(e) {
				e.preventDefault();
				let code = $("#coupon_code").val();
				$.ajax({
					url: 'backend/get_coupon.php',
					type: 'POST',
					dataType: 'JSON',
					data: {
						kode: code,
					},
					success: function(data) {
						discount = data.percent
						id_disc = data.id
						Hitunghbarang();
					}
				});
			});

			$(document).on("keyup", "input[name=quantity]", function(e) {
				e.preventDefault();
				let id = $(this).data('id');
				let qty = $(this).val();
				$.ajax({
					url: 'backend/update_quantity.php',
					type: 'POST',
					dataType: 'JSON',
					data: {
						id: id,
						id_user: id_user,
						qty: qty
					},
					success: function(data) {}
				});
			});

			$(document).on("click", "#deleteCart", function(e) {
				e.preventDefault();
				let id = $(this).data('id');
				// console.log(id)
				$.ajax({
					url: "backend/delete_cart.php",
					type: "POST",
					dataType: 'JSON',
					data: {
						iddelete: id,
						id_user: id_user
					},
					success: function(data) {
						alert(data)
						window.location.href = "cart.php";
					},
				});
				location.reload();
			});

			$(document).on("click", "#checkout", function(e) {
				e.preventDefault();
				data_barang = [];
				for (i = 0; i < total_items.length; i++) {
					let idne = total_items[i]['id_barang'];
					itemID = document.getElementById("quantity" + idne);
					data_barang.push({
						id_barang: idne,
						quantity: itemID.value,
						price_per_unit: itemID.getAttribute('data-price'),
					});
				}
				$.ajax({
					url: "backend/data_from_cart.php",
					type: "POST",
					dataType: 'JSON',
					data: {
						total_amount: total_amount,
						id_user: id_user,
						data_barang: data_barang,
						id_disc: id_disc,
						discount: discount,
						subtotal: sub_amount,
						delivery: delivery,
						tax: tax
					},
					success: function(data) {
						window.location.href = "checkout.php";
					},
				});
			});

		});

		Hitunghbarang();

		function Hitunghbarang() {
			let subtotal = 0;
			let totalAll = 0;
			for (i = 0; i < total_items.length; i++) {
				let idne = total_items[i]['id_barang'];
				itemID = document.getElementById("quantity" + idne);
				if (typeof itemID == 'undefined' || itemID == null) {
					alert("No such item - " + "quantity" + idne);
				} else {
					htotal[idne] = parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
					subtotal = subtotal + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
				}
				document.getElementById("totalhpro" + idne).innerHTML = formatRupiah(parseInt(htotal[idne]), 'Rp ');
			}
			discountm = discount / 100 * subtotal;
			taxm = tax / 100 * subtotal;
			document.getElementById("htax").innerHTML = "Tax (" + tax + "%)";
			document.getElementById("hdiscount").innerHTML = "Discount (" + discount + "%)";
			document.getElementById("tax").innerHTML = formatRupiah(parseInt(taxm), 'Rp ');
			document.getElementById("discount").innerHTML = formatRupiah(parseInt(discountm), 'Rp ');
			document.getElementById("subtotal").innerHTML = formatRupiah(parseInt(subtotal), 'Rp ');
			totalAll = subtotal + taxm + delivery - discountm;
			total_amount = totalAll;
			sub_amount = subtotal;
			document.getElementById("totalAll").innerHTML = formatRupiah(parseInt(totalAll), 'Rp ');
			document.getElementById("delivery").innerHTML = formatRupiah(parseInt(delivery), 'Rp ');

		}
	</script>

</body>

</html>