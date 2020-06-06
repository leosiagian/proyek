<?php
    require_once 'koneksi.php';
    if($_SESSION['status'] != "masuk"){
        print "
            <script>
                alert('Anda harus melakukan login terlebih dahulu!!!');
                document.location.href = 'login.php'
            </script>
        ";
    }
    $ubah = $_GET["id"];
    $data = GetDaftarPesanan($ubah);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ubah Keranjang</title>
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

<body data-spy="scroll" data-target="#navbar-example">
    <div id="preloader"></div>
    <!-- header-area start -->
    <header>
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand page-scroll sticky-logo">
                                <h1>
                                    <span>
                                        E
                                    </span>
                                    -Commerce UMKM
                                </h1>
                            </a>
                        </div>
                        <!-- Brand -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="page-scroll" href="dashboard.php">Dashboard</a>
                                </li>
                                <li>
                                    <?php 
                                        if($_SESSION['admin']) { ?>
                                            <a class="page-scroll" href="beli.php">Daftar Penjualan</a><?php
                                        }
                                        else{?> 
                                            <a class="page-scroll" href="beli.php">Beli</a><?php
                                        }
                                    ?>
                                </li>
                                <li class="active">
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
    <!-- header-area end -->

    <br><br><br><br>

    <!-- Start section Area -->
    <section class="blog-page-section spad ">    
        <div class="container">
            <div class="row ">
                <div class="col-lg-6">
                    <a href="keranjang.php" class="btn btn-primary">
                        Kembali lihat data
                    </a>
                </div>
            </div><br>
            <form action="ubahkeranjangproses.php" method="POST">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id_daftar_pesanan']  ?>">
                <div class="form-group">
                    <label for="nama">
                        Nomor Telepon
                    </label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $data['nomor_telepon']  ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Jumlah Pesanan
                    </label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jlh_barang_pesanan']  ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Tanggal Pengiriman
                    </label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tgl_pengiriman']  ?>" >
                </div>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="keranjang.php" style="color:white;">Close</a></button>
                <button type="submit" name="submit" class="btn btn-primary">
                    Ubah Data
                </button>
            </form>
        </div>
    </section>
    <!-- End section Area -->

    <br><br>

    <!-- Start Suscrive Area -->
    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>
                            Selamat Datang di Jual Beli Online LASER
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Suscrive Area -->


    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline services-head text-center">
                        <h2>
                            Our Services
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="services-contents">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-code"></i>
                                    </a>
                                    <h4>
                                        Expert Coder
                                    </h4>
                                    <p>
                                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-4 -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-camera-retro"></i>
                                    </a>
                                    <h4>
                                        Creative Designer
                                    </h4>
                                    <p>
                                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-4 -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class=" about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-wordpress"></i>
                                    </a>
                                    <h4>
                                        Wordpress Developer
                                    </h4>
                                    <p>
                                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-4 -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class=" about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-camera-retro"></i>
                                    </a>
                                    <h4>
                                        Social Marketer 
                                    </h4>
                                    <p>
                                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-4 -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class=" about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-bar-chart"></i>
                                    </a>
                                    <h4>
                                        Seo Expart
                                    </h4>
                                    <p>
                                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-4 -->

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class=" about-move">
                            <div class="services-details">
                                <div class="single-services">
                                    <a class="services-icon" href="#">
                                        <i class="fa fa-ticket"></i>
                                    </a>
                                    <h4>
                                        24/7 Support
                                    </h4>
                                    <p>
                                        will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-4 -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service area -->

    <br><br>

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
                            Designed by Kelompok PSW-IX</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer bottom Area -->

    <!-- Start Top Menu -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- End Top Menu -->

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