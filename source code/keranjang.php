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
<html lang="en">
<head>
<title>keranjang</title>

    <meta charset="utf-8">
    <title>Dashboard</title>
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

<body data-spy="scroll" data-target="#navbar-example" style="background: url('img/footer.jpg') fixed center no-repeat;">
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
                                    <span>E</span>-Commerce UMKM
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

    <?php
        $DaftarPesanan = getAllpesanan();
    ?>

    <!-- Start Section -->
    <section class="blog-page-section spad " >    
        <div class="container">
            <div class="row ">
                <div class="col-lg-6" style="color: white;">
                    <a href="tambahkeranjang.php" class="btn btn-primary">Tambah Data Pesanan </a>
                </div>
            </div><br>
            <div class="table-responsive">
                <?php $nomor = 0 ?>
                <table style="width:100%;text-align:center; background-color:white; color:black; background: url('img/2.jpg') fixed center no-repeat; background-size: cover;" border="1" class="table table-bordered table-striped table-hover">
                    <tr>
                        <thead>
                            <td><strong>No</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>Nomor Telepon</strong></td>
                            <td><strong>Kode Produk</strong></td>
                            <td><strong>Nama Produk</strong></td>
                            <td><strong>Jumlah Pesanan</strong></td>
                            <td><strong>Tanggal Pengiriman</strong></td>
                            <td><strong>Harga</strong></td>
                            <td><strong>Pilihan</strong></td>
                            <td><strong>Status</strong></td>
                        </thead>
                    </tr>
                    <?php  foreach($DaftarPesanan as $pesanan){ ?>
                            <?php  
                                if($_SESSION['username'] === $pesanan['username']) { ?>
                                    <tr>
                                        <tbody>
                                            <td><?= ++$nomor ?></td>
                                            <td><?= $pesanan['username'] ?></td>
                                            <td><?= $pesanan['nomor_telepon'] ?></td>
                                            <td><?= $pesanan['kode_produk'] ?></td>
                                            <td><?= $pesanan['nama_produk'] ?></td>
                                            <td><?= $pesanan['jlh_barang_pesanan'] ?></td>
                                            <td><?= $pesanan['tgl_pengiriman'] ?></td>
                                            <td>Rp.<?= $pesanan['harga'] * $pesanan['jlh_barang_pesanan'] ?>,-</td>
                                            <td>
                                                <?php if ($pesanan['status'] == 'menunggu'){ ?>
                                                <a href="ubahkeranjang.php?id=<?= $pesanan['id_daftar_pesanan']; ?>" class="badge badge-success float-right ml-1" onclick="return confirm('Ubah keranjang anda??')" style="background-color: blue; width: 30px"><i class="glyphicon glyphicon-pencil"></i></a>
                                                <?php } ?>
                                                <a href="hapuskeranjang.php?id=<?= $pesanan['id_daftar_pesanan']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah anda yakin menghapus belanja anda??')" style="background-color: blue; width: 30px"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($pesanan['status'] == 'menunggu'){
                                                        echo '<span style="color: yellow; font-weight: bold">Menunggu Persetujuan</span>';
                                                    } elseif ($pesanan['status'] == 'setuju') {  
                                                        echo '<span style="color: #0074d9; font-weight: bold">Disetujui</span>';
                                                    } else {
                                                        echo '<span style="color: #ff4136; font-weight: bold">Ditolak</span>';
                                                    }
                                                ?>
                                            </td>
                                        </tbody>
                                    </tr>
                                    <?php
                        }
                    }
                                    ?>
                </table><br>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <br><br>
  
    <!-- Start Suscrive Area -->
    <div class="suscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>
                            Welcome to our Online Shopping
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Suscrive Area -->
  
    <!-- Start contact Area -->
    <div id="contact" class="contact-area">
        <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>
                                Kolom Komentar
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Google Map -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.360205557821!2d99.14584461445655!3d2.3856797580371993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sDel%20Institute%20of%20Technology!5e0!3m2!1sen!2sid!4v1589805240982!5m2!1sen!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!-- End Google Map -->

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form contact-form">
                            <form action="kirimkomentar.php" method="post" enctype="multipart/form-data">
                                <div class="form-group" style="background-color: white;">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" required="required">
                                </div>
                                <div class="form-group" style="background-color: white;">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required="required">
                                </div>
                                <div class="form-group" style="background-color: white;">
                                    <input type="text" class="form-control" name="topik" id="topik" placeholder="Topik" required="required">
                                </div>
                                <div class="form-group" style="background-color: white;">
                                    <textarea class="form-control" name="komentar" id="komentar" style="height: 160px" required="required"></textarea>
                                </div>
                                <div class="text-center"><input type="submit" name="kirim" class="btn" style="background: url('img/keranjang2.jpg') fixed center no-repeat; background-size: cover; color: white"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

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
                                E-commerce UKKM
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