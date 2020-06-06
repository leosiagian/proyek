<?php
    require_once 'koneksi.php';
    $id = $_POST['id'];
    $telepon = $_POST['telepon'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $action = ubahpesanan($id,$telepon,$jumlah,$tanggal);

    if($action > 0 ){
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'keranjang.php'
        </script>
        ";
    }
    else{
        echo "
        <script>
                alert('Data gagal diubah!');
                document.location.href = 'keranjang.php'
        </script>

        ";
    }

?>