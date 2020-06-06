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
    $data = GetDaftarProduk($ubah);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ubah Produk</title>
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
            <form action="ubahprodukprocess.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="kode_produk" name="kode_produk" value="<?= $data['kode_produk']  ?>">
                <div class="form-group">
                    <label for="nama">
                        Nama Produk
                    </label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $data['nama_produk']  ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Kategori
                    </label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $data['kategori']  ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Stok
                    </label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['stok']  ?>" >
                </div>
                <div class="form-group">
                    <label for="">
                        Harga
                    </label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga']  ?>" >
                </div>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="produk.php" style="color:white;">Close</a></button>
                <button type="submit" name="submit" class="btn btn-primary">
                    Ubah Data
                </button>
            </form>
        </div>
    </section>
    <!-- End section Area -->

    <br><br>

    <!-- Start faq-area -->
    <div class="faq-area area-padding">
        <div class="container">

            <!-- Start col-md-12 -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>
                            Pengiriman
                        </h2>
                    </div>
                </div>
            </div>
            <!-- End col-md-12 -->

            <!-- Start col-md-6 -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="faq-details">
                        <div class="panel-group" id="accordion">

                            <!-- Start panel-default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check1">
                                            <span class="acc-icons"></span>Consectetur adipisicing elit.
                                        </a>
                                    </h4>
                                </div>
                                <!-- End panel-default -->

                                <div id="check1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero
                                        </p>
                                    </div>
                                </div>
                                <!-- End panel-collapse -->
                            </div>
                            <!-- End panel Area -->

                            <!-- Start panel-default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h4 class="check-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                                <span class="acc-icons"></span> Dolore magnam quidem repellat.
                                            </a>
                                        </h4>
                                </div>
                                <!-- End panel-heading -->

                                <div id="check2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                                        </p>
                                    </div>
                                </div>
                                <!-- End panel-collapse -->
                            </div>
                            <!-- End panel-default -->

                            <!-- Start panel-default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                            <span class="acc-icons"></span>Redug Lefes dolor sit.
                                        </a>
                                    </h4>
                                </div>
                                <!-- End panel-heading -->

                                <div id="check3" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                                        </p>
                                    </div>
                                </div>
                                <!-- End panel-collapse -->
                            </div>
                            <!-- End panel-default -->

                            <!-- Start panel-default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                                            <span class="acc-icons"></span>Maiores alias accusamus
                                        </a>
                                    </h4>
                                </div>
                                <!-- End panel-heading -->

                                <div id="check4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                                        </p>
                                    </div>
                                </div>
                                <!-- End panel-collapse -->
                            </div>
                            <!-- End panel-default -->
                        </div>
                    </div>
                </div>
                <!-- End col-md-6 -->

                <!-- Start col-md-6 -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="tab-menu">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a href="#p-view-1" role="tab" data-toggle="tab">Pemrosesan</a>
                            </li>
                            <li>
                                <a href="#p-view-2" role="tab" data-toggle="tab">Pengiriman</a>
                            </li>
                            <li>
                                <a href="#p-view-3" role="tab" data-toggle="tab">Sampai</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End tab-menu -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="p-view-1">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                    <h4>
                                        Leonardo
                                    </h4>
                                    <p>
                                        Pemesanan atas nama Leonardo Siagian sedang di proses untuk dapat dikirim sesuai alamat yang telah diinformasikan dari nomor wa yang telah dikirim melalui form pembelian
                                    </p>
                                    <p>
                                        Nomor wa yang diberikan 081397330035 dengan pesanan barang kategori sepatu Emily dengan kuantitas 4 dan total harga 320.000,00 dengan metode pembayaran COD
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End tab-content -->

                        <div class="tab-pane" id="p-view-2">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                    <h4>
                                        Pengiriman
                                    </h4>
                                    <p>
                                        Pemesanan barang atas nama Leonardo Siagian telah dikirimkan oleh kurir sesuai alamat yang telah diberikan melalui nomor wa yang telah dikirimkan, melalui form pembelian yang telah di isi.
                                    </p>
                                    <p>
                                        Pengiriman dilakukan melalui JNE degan alamat Sianipar Tangga, ongkos kirim 28.000,00 dengan total harga yang dibayarkan adalah 348.000,00, dan akan dibayarkan setelah barang sampai ditempat tujuan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End tab-pane -->

                        <div class="tab-pane" id="p-view-3">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                <h4>
                                    Berhasil
                                </h4>
                                <p>
                                    Pengiriman barang atas nama Adinda Rahmadani telah sampai ditempat tujuan, pembeli telah menerima barang dan juga telah melakukan pembayaran sesuai tagihan yang telah dilakukan.
                                </p>
                                <p>
                                    Kurir yang mengantar telah melakukan testimoni terhadap pelanggan, bahwa pelanggan puas terhadap produk yang telah dikirimkan, dan pembayaran yang telah selesai dilaksanakan. 
                                </p>
                                </div>
                            </div>
                        </div>
                        <!-- End tab-pane -->
                    </div>
                </div>
                <!-- End col-md-6 -->
            </div>
        </div>
    </div>
    <!-- End faq-area -->

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