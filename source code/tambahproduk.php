<?php
    require_once 'koneksi.php';
    if (isset($_POST["submit"])) { 
        $Daftar_produk = getAllProduk();
        foreach($Daftar_produk as $produk){
            if($_POST['kode_produk'] === $produk['kode_produk']){
                echo
                    "
                        <script>
                            alert('Kode produk tidak bisa sama');
                            document.location.href = 'produk.php'
                        </script>
                    "
                ;
            }
        }
        $check = true;
        if($check){
            if(TambahProduk($_POST) > 0 ){
                echo 
                    "
                        <script>
                            alert('Produk telah ditambah');
                            document.location.href = 'produk.php'
                        </script>
                    "
                ;
                exit;   
            }
        else{
            echo
                "
                    <script>
                        alert('Penambahan produk gagal');
                        document.location.href = 'produk.php'
                    </script>
                "
            ;
            exit;
            }
        }
    }
?>
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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tambah Produk</title>
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

  <br><br><br>
    
    <!-- Start Tambah Produk -->
    <div style="margin-top: 4px" id="wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>Tambah Produk</b>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Kode Produk
                                </label>
                                <input type="text" class="form-control" name="kode_produk" id="kode_produk" required="required">
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-8 -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Nama Produk
                                </label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk" required="required">
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-8 -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Kategori
                                </label>
                                <input type="text" class="form-control" name="kategori" id="kategori" required="required">
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-8 -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Stok
                                </label>
                                <input type="number" class="form-control" id="stok" name="stok" required="required">
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-8 -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Harga
                                </label>
                                <input type="number" class="form-control" id="harga" name="harga">
                            </div>
                        </div>
                    </div>
                    <!-- End col-md-8 -->
                    <div style="margin-bottom: 10px">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="produk.php" style="color:white;">Close</a></button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Tambah Produk -->

    <!-- Start Faq Area -->
    <div class="faq-area area-padding">
        <div class="container">

             <!-- Start Faq Question Area -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>
                            Pengiriman
                        </h2>
                    </div>
                </div>
            </div>
            <!-- End Faq Question Area -->

            <!-- Start col-mg-6 -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="faq-details">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check1">
                                            <span class="acc-icons"></span>Consectetur adipisicing elit.
                                        </a>
                                    </h4>
                                </div>
                                <div id="check1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End panel default -->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check2">
                                            <span class="acc-icons"></span> Dolore magnam quidem repellat.
                                        </a>
                                    </h4>
                                </div>
                                <div id="check2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End panel default -->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check3">
                                            <span class="acc-icons"></span>Redug Lefes dolor sit.
                                        </a>
                                    </h4>
                                </div>
                                <div id="check3" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End panel default -->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#check4">
                                            <span class="acc-icons"></span>Maiores alias accusamus
                                        </a>
                                    </h4>
                                </div>
                                <div id="check4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero aperiam sint nulla beatae eos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End panel default -->
                        </div>
                    </div>
                </div>
                <!-- End col-md-6 -->

                <!-- Start col-mg-6 -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start tab-menu -->
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

                    <!-- Start tab-content -->
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
                        <!-- End tab-pane -->

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
                    <!-- End tab-content -->
                </div>
                <!-- End col-mg-6 -->
            </div>
        </div>
    </div>
    <!-- End Faq Area -->


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