<?php
    require_once 'koneksi.php';
    if(isset($_POST['submit']))
    {  
        $username = mysql_real_escape_string($_POST['username']);
        $telepon = mysql_real_escape_string($_POST['telepon']);
        $kdproduk = mysql_real_escape_string($_POST['kdproduk']);
        $jumlah = mysql_real_escape_string($_POST['jumlah']);
        $tanggal = mysql_real_escape_string($_POST['tanggal']);
        $bool = true;
        mysql_connect("localhost", "root", "");
        mysql_select_db("psw2_proyek");
        $querys = mysql_query("SELECT * FROM t_produk");
        while($row = mysql_fetch_array($querys)){
            if ($row['kode_produk'] === $kdproduk) {
                $harga = $row['harga'];
                $nama_produk = $row['nama_produk'];
            }  
        }
        if($username === $_SESSION['username']){
            mysql_query("INSERT INTO t_daftar_pesanan (username, nomor_telepon, kode_produk, nama_produk, jlh_barang_pesanan, tgl_pengiriman, harga, status) VALUES ('$username', '$telepon', '$kdproduk', '$nama_produk', '$jumlah', '$tanggal', '$harga', 'menunggu')");
            Print '<script>alert("Berhasil mengirim pembelian")</script>';
            Print '<script>window.location.assign("keranjang.php");</script>';
            exit;
        }
        if($bool)
        {
            Print '<script>alert("username anda salah!!")</script>';
            Print '<script>window.location.assign("keranjang.php");</script>';
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
    <title>Tambah Keranjang</title>
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

<body data-spy="scroll" data-target="#navbar-example" style="background: url('img/footer.jpg') fixed center no-repeat; background-size: cover">
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

    <br><br><br>

    <?php $jumlah = 4; ?>
    <!-- Start Data Produk -->
    <div style="margin-top: 4px" id="wrapper">
        <div class="panel panel-primary" style="background: url('img/footer.jpg') fixed center no-repeat;">
            <div class="panel-heading">
                <b>
                    Daftar Produk
                </b>
            </div><br>
            <section class="blog-page-section spad">    
                <div class="container">
                    <form action="" method="get" class="col-md-2" style="margin-left: -15px">
                        <?php if(isset($_GET['carikan'])) : ?>
                            <input type="text" name="pencari" required="required" value="<?= $_GET['pencari'] ?>" class="form-control">
                        <?php else : ?>
                            <input type="text" name="pencari" placeholder="Nama Produk..." required="required" class="form-control">
                        <?php endif; ?>
                        <input style="margin-top: 5px; margin-bottom: 5px" class="btn btn-success" type="submit" name="carikan" value="Cari">
                    </form>
                    <?php  
                        $jumlah_hal = count(getAllProduk());
                        $jumlah_hal_data = ceil($jumlah_hal / $jumlah);
                        $hal_aktif = (isset($_GET['halaman']) ) ? $_GET["halaman"] : 1;
                        $awaldata = ($jumlah * $hal_aktif) - $jumlah;
                        $DaftarProduk = PaggingProduk($jumlah, $awaldata);  
                        if (isset($_GET['carikan'])) {
                            $DaftarProduk = getSearchingProduk($_GET['pencari']);
                        }
                    ?>
                    <table style="width:100%;text-align:center; color:black; background: url('img/haaa.jpg') fixed center no-repeat; background-size: cover;" border="1" class="table table-bordered table-striped table-hover">
                        <tr>
                            <thead>
                                <td><strong>Kode Produk</strong></td>
                                <td><strong>Nama Produk</strong></td>
                                <td><strong>Kategori</strong></td>
                                <td><strong>Stok</strong></td>
                                <td><strong>Harga</strong></td>
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
                            </tbody>
                        </tr>
                        <?php
                            }
                        ?>
                    </table><br>
                    <!-- Start Navigasi -->
                    <?php if (isset($_GET['pencari'])): ?>
                    <?php else : ?>
                    <div style="margin-top: -40px">
                        <?php if($hal_aktif > 1) : ?>
                            <a href="?halaman= <?= $hal_aktif - 1 ?>" style="color: black"><i class="glyphicon glyphicon-backward" s></i></a>
                        <?php endif ; ?>
                        <?php for($i = 1 ; $i <= $jumlah_hal_data ; $i++) : ?>
                            <?php if($i == $hal_aktif) : ?>
                                <a href="?halaman= <?= $i ?>" style="font-weight: bold; color: blue"><?= $i ?></a>
                            <?php else : ?>
                                <a href="?halaman= <?= $i ?>" style="font-weight: bold; color: black"><?= $i ?></a>
                            <?php endif ; ?>
                        <?php endfor ; ?>
                        <?php if($hal_aktif < $jumlah_hal_data) : ?>
                            <a href="?halaman= <?= $hal_aktif + 1 ?>" style="color: black"><i class="glyphicon glyphicon-forward" s></i></a>
                        <?php endif ; ?>
                    </div>
                    <?php endif ; ?>
                    <!-- End Navigasi -->
                </div>
            </section>
        </div>
    </div>
    <!-- End Data Produk -->

    <br><br><br>
    
    <!-- Start form tambah keranjang -->
    <?php $TambahProduk = getAllProduk() ?>
    <div style="margin-top: 4px" id="wrapper">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>Tambah Pesanan</b>
            </div>
            <form action="" method="post" enctype="multipart/form-data" style="background: url('img/footer.jpg') fixed center no-repeat;">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Username
                                </label>
                                <input type="text" class="form-control" name="username" id="username" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Nomor Telepon
                                </label>
                                <input type="text" class="form-control" name="telepon" id="telepon" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Kode Produk
                                </label>
                                <select class="form-control" name="kdproduk" id="kdproduk">
                                    <?php  foreach($TambahProduk as $produk){ ?>
                                    <option><?= $produk['kode_produk'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Jumlah Pesanan
                                </label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="control-label">
                                    Tanggal Pengiriman
                                </label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required="required">
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 15px">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="keranjang.php" style="color:white;">Close</a></button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Beli">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End form tambah keranjang -->

    <br><br><br>

    <!-- Start Suscrive Area -->
    <div class="suscribe-area" style="background: url('img/keranjang2.jpg') fixed center no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
                    <div class="suscribe-text text-center">
                        <h3>Grafik Produk</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Suscrive Area -->

    <!-- Start contact Area -->
    <div id="contact" class="contact-area" style="background: url('img/footer.jpg') fixed center no-repeat;">
        <div class="contact-inner area-padding">
            <div class="contact-overly"></div>
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="grafik"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <?php
        $DataProduk = getAllProduk();
        $nama_barang = array();
        $stok_barang = array();
        foreach ($DataProduk as $produk) {
            $nama_barang[] = $produk["nama_produk"];
            $stok_barang[] = intval($produk["stok"]);
        }
    ?>

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

    <!-- Start script Grafik -->
    <script src="js/1.js"></script>
    <script src="js/2.js"></script>
    <script type="text/javascript">
        Highcharts.chart('grafik', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'Data Nama Barang dan Jumlah Stok Barang'
            },
            subtitle: {
                text: 'LASER Shopping'
            },
            xAxis: {
                categories: <?= json_encode($nama_barang) ?>,
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Satuan Barang'
                },
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                }
            },
            tooltip: {
                split: true,
                valueSuffix: ''
            },
            plotOptions: {
                area: {
                    stacking: 'normal',
                    lineColor: '#666666',
                    lineWidth: 1,
                    marker: {
                        lineWidth: 1,
                        lineColor: '#666666'
                    }
                }
            },
            series: [{
                name: 'Jumlah Stok Produk',
                data: <?= json_encode($stok_barang) ?>
            }]
        });
    </script>
    <!-- End script Grafik -->

    <!-- JavaScript Libraries -->
    <script src="js/paging1.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#produktable').DataTable();
        });
    </script>
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