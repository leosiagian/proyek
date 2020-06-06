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
    <title>Produk dan Pesanan</title>
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
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

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

<body data-spy="scroll" data-target="#navbar-example" style="background : url(img/bg1.jpeg) ;background-repeat: relative;">
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

    <br><br><br><br><br>

    <?php
        $DaftarProduk = getAllProduk();
        if (isset($_GET['carikan'])) {
            $DaftarProduk = getSearchingProduk($_GET['pencari']);
        }

    ?>

    <!-- Start Button Area -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
                <h2 style="margin-bottom: 50px">Daftar Produk</h2>
            </div>
        </div>
    </div>
    <!-- End Button Area -->

    <!-- Start Section Area -->
    <section class="blog-page-section spad ">    
        <div class="container">
            <div class="col-lg-13">
                <div style="float: left; margin-bottom: -38px">
                    <form action="" method="get" class="col-md-2" style="margin-left: -15px;">
                        <?php if(isset($_GET['carikan'])) : ?>
                            <div class="input-group" style="margin-top: -5px;">
                                <span class="input-group-addon" id="basic-addon1">
                                <i class="glyphicon glyphicon-search"></i>
                                </span>
                                <input type="text" class="form-control" name="pencari" value="<?= $_GET['pencari'] ?>" required="required">
                            </div>
                        <?php else : ?>
                            <div class="input-group" style="margin-top: -5px;">
                                <span class="input-group-addon" id="basic-addon1">
                                <i class="glyphicon glyphicon-search"></i>
                                </span>
                                <input type="text" class="form-control" name="pencari" placeholder="Nama Produk..." required="required">
                            </div>
                        <?php endif; ?>
                        <input style="margin-top: 5px; margin-bottom: 5px" class="btn btn-success" type="submit" name="carikan" value="Cari">
                    </form>
                </div>
            </div>
            <div class="col-lg-13">
                <div style="float: right; margin-bottom: 20px">
                    <a href="tambahproduk.php" class="btn btn-success">
                        Tambah Produk
                    </a>
                </div>
            </div>
            <br>
            <table style="width:100%;text-align:center; color:black; background: url('img/footer.jpg') fixed center no-repeat; background-size: cover" border="1" class="table table-responsive table-bordered table-striped table-hover">
                <tr>
                    <thead>
                        <td><strong>Kode Produk</strong></td>
                        <td><strong>Nama Produk</strong></td>
                        <td><strong>Kategori</strong></td>
                        <td><strong>Stok</strong></td>
                        <td><strong>Harga</strong></td>
                        <td><strong>Pilih</strong></td>
                    </thead>
                </tr>
                <?php foreach($DaftarProduk as $produk){ ?>
                <tr>
                    <tbody>
                        <td><?= $produk['kode_produk']; ?></td>
                        <td><?= $produk['nama_produk'] ?></td>
                        <td><?= $produk['kategori'] ?></td>
                        <td><?= $produk['stok'] ?></td>
                        <td><?= $produk['harga'] ?></td>
                        <td>
                            <a href="ubahproduk.php?id=<?= $produk['kode_produk']; ?>" class="badge badge-success float-right ml-1" onclick="return confirm('Ubah produk anda??')" style="background-color: blue; width: 30px"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="hapusproduk.php?id=<?= $produk['kode_produk']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah anda yakin menghapus produk anda??')" style="background-color: blue; width: 30px"><i class="glyphicon glyphicon-trash"></i></a>
                            <a href="detailproduk.php?id=<?= $produk['kode_produk']; ?>" class="badge badge-danger float-right ml-1" style="background-color: blue; width: 30px"><i class="fa fa-eye"></i></a>
                        </td>
                    </tbody>
                </tr>
                <?php
                    } 
                ?>
            </table>
        </div>
    </section>
    <!-- End Section Area -->

    <br><br>

    <?php
        $DaftarPesanan = getAllpesanan();
    ?>

    <!-- Start Button Area -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
                <h2 style="margin-bottom: 80px">
                    Daftar Pesanan
                </h2>
            </div>
        </div>
    </div>
    <!-- End Section Area -->

    <!-- Start Section Area -->
    <?php $awal = 1; ?>
    <section class="blog-page-section spad" style="margin-top: -100px">    
        <div class="container">
            <br>
                <strong style="color: blue">Unduh dalam Excel :</strong>
                &nbsp
                <a href="exportexcel.php" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-export">Export</span></a>
            </p>
            <div class="table-responsive">
                <table style="width:100%;text-align:center; color:black; background: url('img/footer.jpg') fixed center no-repeat; background-size: cover" border="1" class="table table-bordered table-striped table-hover">
                    <tr>
                        <thead>
                            <td><strong>No</strong></td>
                            <td><strong>Username</strong></td>
                            <td><strong>Nomor Telp</strong></td>
                            <td><strong>Kode Produk</strong></td>
                            <td><strong>Nama Produk</strong></td>
                            <td><strong>Jumlah Pesanan</strong></td>
                            <td><strong>Tanggal Pengiriman</strong></td>
                            <td><strong>Harga</strong></td>
                            <td><strong>Status</strong></td>
                        </thead>
                    </tr>
                    <?php foreach($DaftarPesanan as $pesanan){ ?>
                    <tr>
                        <tbody>
                            <td><?= ($pesanan['id_daftar_pesanan']-$pesanan['id_daftar_pesanan']) + ($awal++) ?></td>
                            <td><?= $pesanan['username'] ?></td>
                            <td><?= $pesanan['nomor_telepon'] ?></td>
                            <td><?= $pesanan['kode_produk'] ?></td>
                            <td><?= $pesanan['nama_produk'] ?></td>
                            <td><?= $pesanan['jlh_barang_pesanan'] ?></td>
                            <td><?= $pesanan['tgl_pengiriman'] ?></td>
                            <td><?= $pesanan['harga'] ?></td>
                            <td>
                                <?php 
                                    if ($pesanan['status'] == 'menunggu'){?>
                                        <a href="prosesbeli.php?id=<?= $pesanan['id_daftar_pesanan'] ?>"><span class="btn btn-warning" style="height: 35px; font-size: 15px">Menunggu</span></a>
                                    <?php } 
                                    elseif ($pesanan['status'] == 'setuju') {  
                                        echo '<span style="color: green; font-weight: bold" >Disetujui</span>';
                                    } else {
                                        echo '<span style="color: #ff4136; font-weight: bold">Ditolak</span>';
                                    }
                                ?>
                            </td>
                        </tbody>
                    </tr>
                    <?php
                        } 
                    ?>
                </table><br>
            </div>  
        </div>
    </section>
    <!-- End Section Area -->

    <br><br>

    <?php
        $DaftarKomen = getAllKomentar();
    ?>

    <!-- Start Button Area -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
                <h2>
                    Daftar Komentar
                </h2>
            </div>
        </div>
    </div>
    <!-- End Button Area -->

    <!-- Start Komentar Area -->
    <?php $no = 0 ?>
    <section class="blog-page-section spad ">    
        <div class="container">
            <div class="table-responsive">
                <table style="width:100%;text-align:center; color:black; background: url('img/footer.jpg') fixed center no-repeat; background-size: cover" border="1" class="table table-bordered table-striped table-hover">
                    <tr>
                        <thead>
                            <td><strong>No</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Topik</strong></td>
                            <td><strong>Komentar</strong></td>
                            <td><strong>Aksi</strong></td>
                        </thead>
                    </tr>
                    <?php  foreach($DaftarKomen as $komentar){ ?>
                    <tr>
                        <tbody>
                            <td><?= ++$no ?></td>
                            <td><?= $komentar['nama'] ?></td>
                            <td><?= $komentar['email'] ?></td>
                            <td><?= $komentar['topik'] ?></td>
                            <td><?= $komentar['komentar'] ?></td>
                            <td>
                                <a href="hapuskomen.php?id=<?= $komentar['id_komentar'] ?>" onclick="return confirm('Hapus Komentar??')"><span class="btn btn-danger">Hapus</span></a>
                            </td>
                        </tbody>
                    </tr>
                    <?php
                        } 
                    ?>
                </table><br>
            </div>  
        </div>
    </section>
    <!-- End Komentar Area -->

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
    <!-- Ende Footer bottom Area -->

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