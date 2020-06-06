<?php
    require_once 'koneksi.php';
    $kode_produk = $_POST['kode_produk'];
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $action = ubahproduk($kode_produk,$nama_produk,$kategori,$stok, $harga);

    if($action > 0 ){
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'produk.php'
        </script>
        ";
    }
    else{
        echo "
        <script>
                alert('Data gagal diubah!');
                document.location.href = 'produk.php'
        </script>

        ";
    }

?>