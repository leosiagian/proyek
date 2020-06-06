<?php
require 'koneksi.php';

$id = $_GET["id"];

if(hapuskomentar($id) > 0){

    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'produk.php'
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'produk.php'
        </script>
    ";
}

?>