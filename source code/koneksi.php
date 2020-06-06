<?php
    session_start();
    
    global $db;
    $db = mysqli_connect('localhost','root','','psw2_proyek'); 
    if(!$db){
        die("Database anda salah!!");
    }

    function EksekusiQuery($query){
        global $db;
        $result = mysqli_query($db,$query);

        return $result;
    }

    function query($query){
        global $db;
        $result = mysqli_query($db, "SELECT * FROM $query");
        $rows = [];
        while($row = mysqli_fetch_array($result)){
            $rows[]= $row;
        }
        return $rows;
    }

    function TambahKomentar($data){
        global $db;
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $topik = htmlspecialchars($data['topik']);
        $komentar = htmlspecialchars($data['komentar']);
        $query = "INSERT INTO t_komentar VALUES ('','$nama','$email', '$topik', '$komentar')";
        mysqli_query($db,$query);
        return mysqli_affected_rows($db);
    }

    function TambahProduk($data){
        global $db;
        $kode_produk = htmlspecialchars($data['kode_produk']);
        $nama_produk = htmlspecialchars($data['nama_produk']);
        $kategori = htmlspecialchars($data['kategori']);
        $stok = htmlspecialchars($data['stok']);
        $harga = htmlspecialchars($data['harga']);
        mysqli_query($db, "INSERT INTO t_produk VALUES ('$kode_produk','$nama_produk', '$kategori', '$stok', '$harga')");
        return mysqli_affected_rows($db);
    }

    function TambahPengumuman($data){
        global $db;
        $judul_pengumuman = htmlspecialchars($data['judul_pengumuman']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        mysqli_query($db, "INSERT INTO t_pengumuman VALUES ('','$judul_pengumuman','$deskripsi')");
        return mysqli_affected_rows($db);
    }

    function hapuskeranjang($id){
        global $db;
        mysqli_query($db, "DELETE FROM t_daftar_pesanan WHERE id_daftar_pesanan = $id");
        return mysqli_affected_rows($db);
    }

    function hapuskomentar($id){
        global $db;
        mysqli_query($db, "DELETE FROM t_komentar WHERE id_komentar = $id");
        return mysqli_affected_rows($db);
    }

    function hapuspengumuman($id){
        global $db;
        mysqli_query($db, "DELETE FROM t_pengumuman WHERE id_pengumuman = $id");
        return mysqli_affected_rows($db);
    }

    function hapusproduk($id){
        global $db;
        mysqli_query($db, "DELETE FROM t_produk WHERE kode_produk = $id");
        return mysqli_affected_rows($db);
    }

    function ubahpesanan($id, $telepon,$jumlah,$tanggal){
        global $db;
        mysqli_query($db, "UPDATE t_daftar_pesanan SET nomor_telepon = '$telepon',
                        jlh_barang_pesanan = '$jumlah' ,tgl_pengiriman = '$tanggal' WHERE id_daftar_pesanan = '$id'");

        return mysqli_affected_rows($db);
    }

    function ubahpengumuman($id, $judul_pengumuman,$deskripsi){
        global $db;
        mysqli_query($db, "UPDATE t_pengumuman SET judul_pengumuman = '$judul_pengumuman',
                        deskripsi = '$deskripsi' WHERE id_pengumuman = '$id'");
        return mysqli_affected_rows($db);
    }

    function ubahproduk($kode_produk, $nama_produk,$kategori,$stok,$harga){
        global $db;
        mysqli_query($db, "UPDATE t_produk SET nama_produk = '$nama_produk',
                        kategori = '$kategori' ,stok = '$stok', harga = '$harga' WHERE kode_produk = '$kode_produk'");

        return mysqli_affected_rows($db);
    }

    function getAllpesanan(){
        $query = "SELECT * FROM t_daftar_pesanan";
        $result = EksekusiQuery($query);
        $data = [];
        while($pesanan = mysqli_fetch_assoc($result)){
            $data[] = $pesanan;
        }
        return $data;
    }   
    
    function getAllakun(){
        $query = "SELECT * FROM t_akun";

        $result = EksekusiQuery($query);
        $data = [];
        while($akun = mysqli_fetch_assoc($result)){
            $data[] = $akun;
        }
        return $data;
    }

    function getAllpengumuman(){
        $query = "SELECT * FROM t_pengumuman";
        $result = EksekusiQuery($query);
        $data = [];
        while($pengumuman = mysqli_fetch_assoc($result)){
            $data[] = $pengumuman;
        }
        return $data;
    }

    function getAllProduk(){
        $query = "SELECT * FROM t_produk";
        $result = EksekusiQuery($query);
        $data = [];
        while($produk = mysqli_fetch_assoc($result)){
            $data[] = $produk;
        }
        return $data;
    }

    function getAllKomentar(){
        $query = "SELECT * FROM t_komentar";
        $result = EksekusiQuery($query);
        $data = [];
        while($produk = mysqli_fetch_assoc($result)){
            $data[] = $produk;
        }
        return $data;
    }

    function GetDaftarPesanan($id){
        $query = "SELECT * FROM t_daftar_pesanan WHERE id_daftar_pesanan = '$id'";
        $result = EksekusiQuery($query);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    function GetDaftarProduk($id){
        $query = "SELECT * FROM t_produk WHERE kode_produk = '$id'";
        $result = EksekusiQuery($query);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    function GetDaftarPengumuman($id){
        $query = "SELECT * FROM t_pengumuman WHERE id_pengumuman = '$id'";
        $result = EksekusiQuery($query);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    function getSearchingProduk($cari){
        $query = "SELECT * FROM t_produk WHERE nama_produk LIKE '%".$cari."%'";
        $result = EksekusiQuery($query);
        $data = [];
        while($produk = mysqli_fetch_assoc($result)){
            $data[] = $produk;
        }
        return $data;
    }

    function SetujuPembelian($id){
        global $db;
        $query = "UPDATE t_daftar_pesanan SET status = 'setuju' WHERE id_daftar_pesanan = '$id'";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function TolakPembelian($id){
        global $db;
        $query = "UPDATE t_daftar_pesanan SET status = 'tolak' WHERE id_daftar_pesanan = '$id'";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function PaggingProduk($jumlah, $first){
        $query = "SELECT * FROM t_produk LIMIT $first, $jumlah";
        $result = EksekusiQuery($query);
        $data = [];
        while($produk = mysqli_fetch_assoc($result)){
            $data[] = $produk;
        }
        return $data;
    }
?>