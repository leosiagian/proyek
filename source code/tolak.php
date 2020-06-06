<?php  
	require_once 'koneksi.php';
	TolakPembelian($_GET['id']);
	echo "
        <script>
            document.location.href = 'produk.php'
        </script>
    ";
?>