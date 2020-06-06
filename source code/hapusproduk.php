<?php
require 'koneksi.php';

$id = $_GET["id"];

if(hapusproduk($id) > 0){

    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'produk.php'
        </script>
    ";
    redirect('produk.php');
}
else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'produk.php'
        </script>
    ";
}

?>