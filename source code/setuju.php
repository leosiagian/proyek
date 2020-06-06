<?php  
	require_once 'koneksi.php';
	SetujuPembelian($_GET['id']);
	echo "
        <script>
            document.location.href = 'produk.php'
        </script>
    ";
?>