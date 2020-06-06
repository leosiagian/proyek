<?php
    require_once 'koneksi.php';

    $id_pengumuman = $_POST['id_pengumuman'];
    $judul_pengumuman = $_POST['judul_pengumuman'];
    $deskripsi = $_POST['deskripsi'];

    $action = ubahpengumuman($id_pengumuman,$judul_pengumuman,$deskripsi);

    if($action > 0 ){
        echo "
        <script>
            alert('Pengumuman telah diubah');
            document.location.href = 'pengumuman.php'
        </script>
        ";
    }
    else{
        echo "
        <script>
                alert('Gagal mengubah Pengumuman');
                document.location.href = 'pengumuman.php'
        </script>

        ";
    }

?>