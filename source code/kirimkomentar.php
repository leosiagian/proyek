<?php
    require_once 'koneksi.php';

    if (isset($_POST["kirim"])) { 

        if(TambahKomentar($_POST) > 0 ){
            echo "
                <script>
                    alert('Komentar berhasil dikirimkan');
                    document.location.href = 'keranjang.php'
                </script>
    
            ";
        }
        else {
            echo "
            <script>
                    alert('Gagal Mengirimkan Komentar');
                    document.location.href = 'keranjang.php'
            </script>
    
            ";
        }
    }
?>