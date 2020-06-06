-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Mei 2020 pada 04.24
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psw2_proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_akun`
--

CREATE TABLE `t_akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_akun`
--

INSERT INTO `t_akun` (`id_akun`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'leonardo', '123', 'leonardosiagian2001@gmail.com', 'pengguna'),
(3, 'adinda', '12345', 'adinda@gmail.com', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_daftar_pesanan`
--

CREATE TABLE `t_daftar_pesanan` (
  `id_daftar_pesanan` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nomor_telepon` varchar(30) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jlh_barang_pesanan` int(11) NOT NULL,
  `tgl_pengiriman` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_daftar_pesanan`
--

INSERT INTO `t_daftar_pesanan` (`id_daftar_pesanan`, `username`, `nomor_telepon`, `kode_produk`, `nama_produk`, `jlh_barang_pesanan`, `tgl_pengiriman`, `harga`, `status`) VALUES
(1, 'leonardo', '081397330035', '0002', 'Emily', 2, '2028-03-29', 80000, 'menunggu'),
(2, 'adinda', '083124969527', '0007', 'Zanzea', 2, '2020-05-28', 110000, 'menunggu'),
(3, 'adinda', '083124969527', '0001', 'sneakers', 1, '2020-05-30', 90000, 'menunggu'),
(4, 'leonardo', '081397330035', '0006', 'Gaun Anak-Anak', 2, '2020-06-16', 100000, 'menunggu'),
(5, 'adinda', '083124969527', '0004', 'Pointed Sallie', 1, '2020-05-09', 95000, 'menunggu'),
(6, 'leonardo', '081397330035', '0004', 'Pointed Sallie', 2, '2020-05-27', 95000, 'menunggu'),
(7, 'leonardo', '081397330035', '0009', 'Xiaomi Note 8 Pro', 2000, '2020-05-28', 4000000, 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komentar`
--

CREATE TABLE `t_komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `komentar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_komentar`
--

INSERT INTO `t_komentar` (`id_komentar`, `nama`, `email`, `topik`, `komentar`) VALUES
(1, 'Leonardo Siagian', 'leonardosiagian2001@gmail.com', 'Barang ', 'Tidak sesuai'),
(2, 'adinda', 'adinda@gmail.com', 'Kulaitas Barang', 'Tidak sesuai dengan yang di gambar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengumuman`
--

CREATE TABLE `t_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengumuman`
--

INSERT INTO `t_pengumuman` (`id_pengumuman`, `judul_pengumuman`, `deskripsi`) VALUES
(1, 'Doorprize', 'Pelanggan dengan username leonardo mendapat hadiah cashback sebesar 80%, ayo buruan dicheck, tunggu apalagi, Raih keberuntunganmu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE `t_produk` (
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`kode_produk`, `nama_produk`, `kategori`, `stok`, `harga`) VALUES
('0001', 'Sneakers', 'sepatu', 10, 85000),
('0002', 'Emily', 'sepatu', 31, 75000),
('0003', 'Chrysant', 'sepatu', 43, 65000),
('0004', 'Pointed Sallie', 'sepatu', 13, 95000),
('0005', 'VINTAGE', 'baju', 23, 120000),
('0006', 'LS22111 IMPORT SET', 'baju', 2, 100000),
('0007', 'DASTER SRAGEN', 'baju', 40, 110000),
('0008', 'Vivo y12', 'handphone', 15, 3200000),
('0009', 'Xiaomi Note 8 Pro', 'handphone', 10, 4000000),
('0010', 'Oppo A9 2020', 'handphone', 12, 3750000),
('0011', 'Samsung S20', 'handphone', 22, 4500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_akun`
--
ALTER TABLE `t_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `t_daftar_pesanan`
--
ALTER TABLE `t_daftar_pesanan`
  ADD PRIMARY KEY (`id_daftar_pesanan`);

--
-- Indexes for table `t_komentar`
--
ALTER TABLE `t_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `t_pengumuman`
--
ALTER TABLE `t_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akun`
--
ALTER TABLE `t_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_daftar_pesanan`
--
ALTER TABLE `t_daftar_pesanan`
  MODIFY `id_daftar_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_komentar`
--
ALTER TABLE `t_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_pengumuman`
--
ALTER TABLE `t_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
