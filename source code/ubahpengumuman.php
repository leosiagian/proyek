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
    $data = GetDaftarPengumuman($ubah);
?>
<?php
    require_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ubah Pengumuman</title>
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

<body data-spy="scroll" data-target="#navbar-example" style="background: url('img/keranjang3.jpg') fixed center no-repeat; background-size: cover;">
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
                                <li class="active">
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
    <section class="blog-page-section spad">    
        <div class="panel panel-primary" style="margin-top: -17.6px">
            <div class="panel-heading">
                <b>
                    Ubah Pengumuman
                </b>
            </div>
            <form action="ubahpengumumanprocess.php" method="POST" enctype="multipart/form-data" style="background: url('img/keranjang3.jpg') fixed center no-repeat; background-size: cover;">
                <div class="panel-body">
                <input type="hidden" class="form-control" id="id_pengumuman" name="id_pengumuman" value="<?= $data['id_pengumuman']  ?>">
                <div class="form-group">
                    <label for="nama">
                        Judul Pengumuman
                    </label>
                    <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="<?= $data['judul_pengumuman'] ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Deskripsi
                    </label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $data['deskripsi'] ?>">
                </div>
                <div style="margin-bottom: 15px">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="pengumuman.php" style="color:white;">Kembali</a></button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Ubah Data
                    </button>
                </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End section Area -->

    <br><br>

    <!-- Start container Area-->
    <div class="container">
        <div class="col-lg-6 col-md- col-xs-12 thumb">
            <div class="recent-single-post">
                <div class="post-img">
                    <a href="#">
                        <img src="img/blog/sale.png" alt="">
                    </a>
                </div>  
                <div class="pst-content">
                    <h5>
                        <b>
                            <a href="keranjang.php">
                                PROMO LEBARAN!!!
                            </a>
                        </b>
                    </h5>
                    <p>
                        Keberkahan Ramadhan belanja online special dari E-COMMERCE-UMKM
                    </p>
                    <p>
                        <b>
                            Jangan sampai ketinggalan!!!
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <!-- End col-lg-6 -->
      
        <div class="col-lg-6 col-md- col-xs-12 thumb">
            <div class="recent-single-post">
                <div class="post-img">
                    <a href="#">
                        <img src="img/blog/sepatu.png" alt="">
                    </a>
                </div>
                <div class="pst-content">
                    <h5>
                        <b>
                            <a href="keranjang.php">
                                SNEAKERS DISKON 80%
                            </a>
                        </b>
                    </h5>
                    <p>
                        Beli sekarang SNEAKERS gila diskon!!!!Jangan sampai ketinggalan di promo LEBARAN kali ini !
                    </p>
                    <p>
                        <b>
                            Khusus hari ini
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <!-- End col-lg-6 -->

        <div class="col-lg-6 col-md- col-xs-12 thumb">
            <div class="recent-single-post">
                <div class="post-img">
                    <a href="#">
                        <img src="img/blog/samsung.png" alt="">
                    </a>
                </div>
                <div class="pst-content">
                    <h6>
                        <b>
                            <a href="keranjang.php">
                                New Produk SAMSUNG S20
                            </a>
                        </b>
                    </h6>
                    <p>
                        SAMSUNG S20 kini hadir menyapa kita semua hanya di E-COMMERCE UKMNikmati produk-produk terbarunya.Beli SAMSUNG PASTI UNTUNG !!!
                    </p>
                    <p>
                        <b>
                            Segera miliki SAMSUNG Galaxy favoritmu!!!
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <!-- End col-lg-6 -->

        <div class="col-lg-6 col-md- col-xs-12 thumb">
            <div class="recent-single-post">
                <div class="post-img">
                    <a href="#">
                        <img src="img/blog/baju.png" alt="">
                    </a>
                </div>
                <div class="pst-content">
                    <h5>
                        <b>
                            <a href="keranjang.php">
                                SALE 70%
                            </a>
                        </b>
                    </h5>
                    <p>
                        Lebaran?Belum punya baju???Ayoo buruan beli hanya di E-COMMMERCE UMKM. Dapatkan VOUCHER yang tak terduga untuk pembelian baju kali ini
                    </p>
                    <p>
                        <b>
                            CASHBACK
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <!-- End col-lg-6 -->
    </div>
    <!-- End container Area-->


    <!-- Start container Area-->
    <div class="container">
        <div class="col-lg-6 col-md- col-xs-12 thumb">
            <div class="recent-single-post">
                <div class="post-img">
                    <a href="#">
                        <img src="img/blog/sale.png" alt="">
                    </a>
                </div>  
                <div class="pst-content">
                    <h5>
                        <b>
                            <a href="keranjang.php">
                                PROMO LEBARAN!!!
                            </a>
                        </b>
                    </h5>
                    <p>
                        Keberkahan Ramadhan belanja online special dari E-COMMERCE-UMKM
                    </p>
                    <p>
                        <b>
                            Jangan sampai ketinggalan!!!
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <!-- End col-lg-6-->
      
        <div class="col-lg-6 col-md- col-xs-12 thumb">
            <div class="recent-single-post">
                <div class="post-img">
                    <a href="#">
                        <img src="img/blog/sepatu.png" alt="">
                    </a>
                </div>
                <div class="pst-content">
                    <h5>
                        <b>
                            <a href="keranjang.php">
                                SNEAKERS DISKON 80%
                            </a>
                        </b>
                    </h5>
                    <p>
                        Beli sekarang SNEAKERS gila diskon!!!!Jangan sampai ketinggalan di promo LEBARAN kali ini !
                    </p>
                    <p>
                        <b>
                            Khusus hari ini
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <!-- End col-lg-6-->
    </div>
    <!-- End container Area-->

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
    <!-- End Footer bottom Area -->

    <!-- Start Top Menu -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Start Top Menu -->

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