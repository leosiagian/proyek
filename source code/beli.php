<?php 
	session_start();
	if($_SESSION['status'] != "masuk"){
        print "
            <script>
                alert('Anda harus melakukan login terlebih dahulu!!!');
                document.location.href = 'login.php'
            </script>
        ";
    }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php 
			if($_SESSION['admin']) { ?>
				Daftar Penjualan<?php
			}
			else{?> 
				Beli<?php
			}
		?>
	</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="img/favicon.png" rel="icon">
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Fonts -->
    <link href="lib/laser/laser.php">

	<!-- Bootstrap CSS File -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
	<link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/venobox/venobox.css" rel="stylesheet">

	<!-- Nivo Slider Theme -->
	<link href="css/nivo-slider-theme.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="css/style.css" rel="stylesheet">

	<!-- Responsive Stylesheet File -->
	<link href="css/responsive.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar-example" style="background: url('img/1.jpg') fixed center no-repeat; background-size: cover;">
	<div id="preloader"></div>
	<!-- header-area start -->
	<header>
		<div id="sticker" class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<!-- Navigation -->
						<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand page-scroll sticky-logo">
									<h1><span>E</span>-Commerce UMKM</h1>
								</a>
							</div>
							<div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
								<ul class="nav navbar-nav navbar-right">
									<li>
										<a class="page-scroll" href="dashboard.php">
											Dashboard
										</a>
									</li>
									<li class="active">
										<?php 
											if($_SESSION['admin']) { ?>
												<a class="page-scroll" href="beli.php">Daftar Penjualan</a><?php
											}
											else{?> 
												<a class="page-scroll" href="beli.php">Beli</a><?php
											}
										?>
									</li>
									<li>
										<?php 
											if($_SESSION['admin']) { ?>
												<a class="page-scroll" href="produk.php">Produk & Pesanan</a><?php
											}
											else{?> 
												<a class="page-scroll" href="keranjang.php">Keranjang</a><?php
											}
										?>
									</li>
									<li>
										<a class="page-scroll" href="pengumuman.php">Pengumuman</a>
									</li>
									<li>
                                    <a class="page-scroll" href="logout.php">
                                        Logout
                                        <?php $_SESSION['username'] ?>
                                    </a>
                                </li>
								</ul>
							</div>
						</nav>
						<!-- END: Navigation -->
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- header end -->

	<br>

	<!-- Start team Area -->
	<div id="team" class="our-team-area area-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="section-headline text-center">
						<h2>Sepatu Wanita</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="team-top">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/sepatu_wanita/1.jpg">
									<img src="img/sepatu_wanita/1.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Sneakers
								</h4>
								<p>
									White
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/sepatu_wanita/2.jpg">
									<img src="img/sepatu_wanita/2.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Emily
								</h4>
								<p>
									Pink
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/sepatu_wanita/3.jpg">
									<img src="img/sepatu_wanita/3.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Chrysant
								</h4>
								<p>
									White
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/sepatu_wanita/4.jpg">
									<img src="img/sepatu_wanita/4.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Pointed Sallie
								</h4>
								<p>
									Blue Navy
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->	
				</div>
			</div>
		</div>
	</div>
	<!-- End Team Area -->

	<!-- Start portfolio Area -->
	<div id="portfolio" class="portfolio-area area-padding fix">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="section-headline text-center">
						<h2>
							Baju
						</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single-awesome-project start -->
				<div class="col-md-4 col-sm-4 col-xs-12 design development">
					<div class="single-awesome-project">
						<div class="awesome-img">
							<img src="img/p_baju/1.jpg" alt="" /></a>
							<div class="add-actions text-center">
								<div class="project-dec">
									<a class="venobox" data-gall="myGallery" href="img/p_baju/1.jpg">
										<h4>
											Vintage
										</h4>
										<span>
											Orange
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="team-content text-center">
							<h4>
								Beli
							</h4>
						</div>
					</div>
				</div>
				<!-- single-awesome-project end -->
				
				<!-- single-awesome-project start -->
				<div class="col-md-4 col-sm-4 col-xs-12 photo">
					<div class="single-awesome-project">
						<div class="awesome-img">
							<a href="#">
								<img src="img/p_baju/2.jpg" alt=""/>
							</a>
							<div class="add-actions text-center">
								<div class="project-dec">
									<a class="venobox" data-gall="myGallery" href="img/p_baju/2.jpg">
										<h4>
											LS22111 Import Set
										</h4>
										<span>
											Red
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="team-content text-center">
							<h4>Beli</h4>
						</div>
					</div>
				</div>
				<!-- single-awesome-project end -->

				<!-- single-awesome-project start -->
				<div class="col-md-4 col-sm-4 col-xs-12 design">
					<div class="single-awesome-project">
						<div class="awesome-img">
							<a href="#"><img src="img/p_baju/3.jpg" alt="" /></a>
							<div class="add-actions text-center">
								<div class="project-dec">
									<a class="venobox" data-gall="myGallery" href="img/p_baju/3.jpg">
										<h4>
											Daster Sragen
										</h4>
										<span>
											Red White
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="team-content text-center">
							<h4>Beli</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End portfolio Area -->

	<!-- Start team Area -->
	<div id="team" class="our-team-area area-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="section-headline text-center">
						<h2>
							Handphone
						</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="team-top">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/p_hp/1.jpg">
									<img src="img/p_hp/1.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Vivo y12
								</h4>
								<p>
									Blue
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/p_hp/2.jpg">
									<img src="img/p_hp/2.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Xiaomi Note 8 Pro
								</h4>
								<p>
									Black
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/p_hp/3.jpg">
									<img src="img/p_hp/3.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Oppo A9 2020
								</h4>
								<p>
									Blue
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
					
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="single-team-member">
							<div class="team-img">
								<a class="venobox" data-gall="myGallery" href="img/p_hp/4.jpg">
									<img src="img/p_hp/4.jpg" alt="">
								</a>
							</div>
							<div class="team-content text-center">
								<h4>
									Samsung S20
								</h4>
								<p>
									Black
								</p>
							</div>
						</div>
					</div>
					<!-- End column -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Team Area -->

	<!-- Start Footer bottom Area -->
	<footer>
		<div class="footer-area-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="copyright text-center">
							<p>
								&copy; Copyright
								<strong>
									E-commerce UMKM
								</strong>
							</p>
						</div>
						<div class="credits">
							Designed by Kelompok PSW-IX
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

	<!-- JavaScript Libraries -->
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="lib/venobox/venobox.min.js"></script>
	<script src="lib/knob/jquery.knob.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	<script src="lib/parallax/parallax.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="lib/appear/jquery.appear.js"></script>
	<script src="lib/isotope/isotope.pkgd.min.js"></script>
	<script src="contactform/contactform.js"></script>
	<script src="js/main.js"></script>
</body>
</html>