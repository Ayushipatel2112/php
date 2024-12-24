<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Juiceysip</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/jpg" href="assets/img/fevicon.jpg">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
						
							
							<ul>
								<li class="current-list-item"><a href="index.php">Home</a>
									<ul class="sub-menu">
										<li><a href="index.php">Static Home</a></li>
										<li><a href="index_2.php">Slider Home</a></li>
									</ul>
								</li>
								
								
								<li><a href="about.php">About</a></li>

								<li><a href="contact.php">Contact</a></li>
								
								<li><a href="product.php">Product</a></li>

								<li><a href="category.php">Category</a></li>
								
								
								<li><a href="cart.php">Shop</a>
									<ul class="sub-menu">
										<li><a href="checkout.php">Check Out</a></li>
										<li><a href="cart.php">Cart</a></li>
									</ul>
								</li>
								
								<?php
										if(isset($_SESSION['login_user_name']))
										{
										?>
										<li>
										<a href="logout.php"><span class="icon-lock"></span>logout</a>
										</li>
										<?php
										}
										else
										{
										?>
									 <li><a href="register.php">registration</a></li>
									 <li>
										<a href="login.php"><span class="icon-lock"></span>login</a>
										</li>
										<li><a href="logout.php">Logout</a></li>
										<?php
										}
										?>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
										
										<a class="admin" href="admin"><i class="fas fa-solid fa-user"></i></a>
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