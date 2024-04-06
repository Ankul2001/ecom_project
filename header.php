<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>The Web Gallery</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<!-- other -->

	<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" > -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>


	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all India orders over ₹1000 </div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

								<li class="currency">
									<a href="#">
										inr
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">usd</a></li>
										<!-- <li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li> -->
									</ul>
								</li>
								<li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">Hindi</a></li>
										<!-- <li><a href="#">Italian</a></li> -->
										<!-- <li><a href="#">German</a></li> -->
										<!-- <li><a href="#">Spanish</a></li> -->
									</ul>
								</li>
								<li class="account">
									<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<?php
										if (!isset($_SESSION['username'])) {
										?>
											<li><a href="user_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Log In</a></li>
											<li><a href="user_register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Sign Up</a></li>
										<?php
										} else {
										?>
											<li><a href="code.php?logout_do=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
										<?php
										}


										?>

									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="index.php">web<span>gallery</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php">home</a></li>
								<li><a href="products.php">shop</a></li>
								<li><a href="#">promotion</a></li>
								<li><a href="#">pages</a></li>
								<li><a href="#">blog</a></li>
								<li><a href="contact.html">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li><a href="user-page.php"><i class="fa fa-user" aria-hidden="true"></i></a>

								</li>

								<li class="checkout">
									<a <?php if (isset($_SESSION['username'])) { ?>href="user_cart.php" <?php } else { ?>href="user_login.php" <?php } ?>>
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<?php if (isset($_SESSION['username'])) {
											$uid = $_SESSION['user_id'];
											$cart_res = $object->cartlistcount($uid);
											$cart = mysqli_fetch_assoc($cart_res);



										?>
											<span id="checkout_items" class="checkout_items"><?php echo $cart['total']; ?></span>
										<?php } ?>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>