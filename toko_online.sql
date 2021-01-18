-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 08 Jan 2021 pada 03.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `id_penjual` int(50) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `id_penjual`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(5, 0, 'Baju', 'Baju distro', 'Baju', 5000000, 32, 'baju.jpg'),
(6, 0, 'Jaket', 'Jaket levis', 'Jaket', 5000000, 38, 'jaket.jpg'),
(7, 0, 'Celana', 'Celana chinos', 'Celana', 1000000, 34, 'celana.jpg'),
(8, 0, 'Sepatu', 'Sepatu sneakers', 'Sepatu', 250000, 18, 'sepatu.jpg'),
(11, 30, 'Sepatu', 'Sepatu sneakers', 'Sepatu', 250000, 31, 'katak.jpg'),
(18, 34, 'Kaos', 'Kaos katun no juts', 'Baju', 150000, 37, 'baju2.jpg'),
(19, 34, 'Baju Batik', 'Batik khas Mojokerto', 'Batik', 175000, 50, 'batik.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bukti`
--

CREATE TABLE `tb_bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_invoice` int(50) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `buktibayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bukti`
--

INSERT INTO `tb_bukti` (`id_bukti`, `id_invoice`, `catatan`, `buktibayar`) VALUES
(1, 0, 'xccdg', 'baju22.jpg'),
(3, 25, 'xccdgas', 'katak2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `id_pembeli` int(20) NOT NULL,
  `id_penjual` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `konfirmasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `id_pembeli`, `id_penjual`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`, `konfirmasi`) VALUES
(7, 0, 0, 'Hussein Isron', 'Jetis Kulon gg X No. 16 A, Wonokromo', '2020-10-15 10:23:08', '2020-10-16 10:23:08', 0),
(10, 0, 0, 'Paroke', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-10-22 10:38:50', '2020-10-23 10:38:50', 0),
(11, 0, 27, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-10-22 15:00:25', '2020-10-23 15:00:25', 0),
(12, 0, 0, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-10-23 10:16:06', '2020-10-24 10:16:06', 0),
(13, 0, 0, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-10-26 15:11:16', '2020-10-27 15:11:16', 0),
(14, 0, 7, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-10-29 21:21:31', '2020-10-30 21:21:31', 0),
(15, 0, 5, 'beli', 'Mojokerto', '2020-10-29 22:41:41', '2020-10-30 22:41:41', 0),
(16, 0, 6, 'beli', 'Mojokerto', '2020-10-29 22:41:41', '2020-10-30 22:41:41', 0),
(17, 0, 30, 'beli', 'Mojokerto', '2020-10-30 10:58:19', '2020-10-31 10:58:19', 0),
(19, 0, 0, 'sgrs', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-05 09:58:13', '2020-11-06 09:58:13', 0),
(20, 0, 30, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-05 13:47:33', '2020-11-06 13:47:33', 0),
(21, 0, 0, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-05 13:59:50', '2020-11-06 13:59:50', 0),
(22, 0, 0, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-05 14:30:34', '2020-11-06 14:30:34', 0),
(23, 25, 0, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-06 09:33:36', '2020-11-07 09:33:36', 0),
(24, 25, 0, 'atiirtr gvtddsd', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-06 09:58:19', '2020-11-07 09:58:19', 0),
(25, 35, 34, 'Muhammad Hussein Isron', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-06 14:46:09', '2020-11-07 14:46:09', 0),
(26, 35, 0, 'Muhammad Hussein Isron', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-14 12:43:29', '2020-11-15 12:43:29', 0),
(27, 35, 0, 'Muhammad Hussein Isron', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2020-11-14 12:45:52', '2020-11-15 12:45:52', 0),
(28, 35, 0, 'Muhammad Hussein Isron', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2021-01-02 13:06:34', '2021-01-03 13:06:34', 0),
(29, 35, 0, 'Muhammad Hussein Isron', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', '2021-01-02 13:06:35', '2021-01-03 13:06:35', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kas`
--

INSERT INTO `tb_kas` (`id_kas`, `tanggal`, `keterangan`, `saldo`) VALUES
(2, '2020-01-12', 'Penjualan lemari', 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kat_id` int(30) NOT NULL,
  `kat_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kat_id`, `kat_nama`) VALUES
(1, 'Baju'),
(2, 'Jaket'),
(3, 'Celana'),
(4, 'Sepatu'),
(5, 'Batik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_pembeli` int(20) NOT NULL,
  `id_penjual` int(20) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `id_pembeli`, `id_penjual`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(9, 6, 7, 0, 0, 'Lemari ', 1, 1000000, ''),
(10, 7, 8, 0, 0, 'Sepatu', 1, 5000000, ''),
(13, 10, 6, 0, 0, 'Jaket', 1, 5000000, ''),
(14, 10, 5, 0, 0, 'Baju', 1, 5000000, ''),
(15, 11, 6, 0, 0, 'Jaket', 1, 5000000, ''),
(16, 11, 12, 0, 27, 'sdfsf', 1, 250000, ''),
(17, 12, 7, 0, 0, 'Celana', 1, 1000000, ''),
(18, 12, 11, 0, 30, 'Sepatu', 1, 250000, ''),
(19, 13, 5, 0, 0, 'Baju', 2, 5000000, ''),
(20, 13, 8, 0, 0, 'Sepatu', 3, 250000, ''),
(21, 13, 7, 0, 0, 'Celana', 1, 1000000, ''),
(22, 14, 7, 0, 0, 'Celana', 1, 1000000, ''),
(23, 16, 5, 0, 0, 'Baju', 1, 5000000, ''),
(24, 16, 6, 0, 0, 'Jaket', 1, 5000000, ''),
(25, 17, 11, 0, 30, 'Sepatu', 1, 250000, ''),
(26, 18, 11, 0, 30, 'Sepatu', 1, 250000, ''),
(27, 19, 7, 0, 0, 'Celana', 1, 1000000, ''),
(28, 20, 11, 0, 30, 'Sepatu', 2, 250000, ''),
(29, 21, 7, 0, 0, 'Celana', 1, 1000000, ''),
(30, 22, 5, 0, 0, 'Baju', 1, 5000000, ''),
(31, 23, 7, 0, 0, 'Celana', 1, 1000000, ''),
(32, 24, 5, 25, 0, 'Baju', 1, 5000000, ''),
(33, 25, 18, 35, 34, 'Kaos', 1, 150000, ''),
(34, 26, 8, 35, 0, 'Sepatu', 1, 250000, ''),
(35, 27, 8, 35, 0, 'Sepatu', 1, 250000, ''),
(36, 29, 7, 35, 0, 'Celana', 1, 1000000, ''),
(37, 29, 8, 35, 0, 'Sepatu', 2, 250000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
	WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `user_alamat` varchar(50) NOT NULL,
  `user_no_hp` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `user_last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_photo` varchar(50) NOT NULL,
  `user_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nama`, `nik`, `user_alamat`, `user_no_hp`, `email`, `username`, `password`, `role_id`, `user_last_login`, `user_photo`, `user_create`, `user_aktif`) VALUES
(25, 'atiirtr gvtddsd', '0', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', 2147483647, 'atiir@trt.co.id', 'akui', 'cfcd208495d565ef66e7dff9f98764da', 2, '2021-01-06 18:19:03', '', '2021-01-06 18:19:03', 0),
(26, 'Muhammad Hussein Isron', '0', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', 2147483647, '', 'suadmin', 'a43fc3d27915b373b163da088684d4a9', 1, '2021-01-07 14:17:11', '', '2020-10-21 14:14:52', 1),
(27, 'akui', '358767269836892', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', 2147483647, 'akui@gmail.com', 'jual', 'cfcd208495d565ef66e7dff9f98764da', 3, '2021-01-07 14:18:14', '', '2021-01-07 14:18:14', 0),
(30, 'coba', '359871893721893', 'Jetis Kulon gg X No. 16 A, Wonokromo', 2147483647, 'coba@gmail.com', 'coba', 'cfcd208495d565ef66e7dff9f98764da', 3, '2021-01-07 14:18:27', '', '2021-01-07 14:18:27', 0),
(31, 'beli', '3582176921632', 'Mojokerto', 2147483647, 'belibeli@gmail.com', 'beli', 'cfcd208495d565ef66e7dff9f98764da', 2, '2021-01-06 18:18:28', '', '2021-01-06 18:18:28', 0),
(34, 'Hussein Isron', '3516123008990001', 'Jetis Kulon gg X No. 16 A, Wonokromo', 2147483647, 'jual2@gmail.com', 'jual2', 'a43fc3d27915b373b163da088684d4a9', 3, '2021-01-06 06:20:01', '', '2020-11-06 07:00:30', 1),
(35, 'Muhammad Hussein Isron', '3542671282763', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', 2147483647, 'beli2@gmail.com', 'beli2', 'a43fc3d27915b373b163da088684d4a9', 2, '2021-01-02 05:36:26', '', '2020-11-06 07:44:54', 1),
(36, 'Paroke', '3576020305930002', 'Mojokerto', 2147483647, 'paroke@gmail.com', 'cobaa', 'cfcd208495d565ef66e7dff9f98764da', 3, '2021-01-07 14:17:54', '', '2021-01-07 14:17:54', 1),
(37, 'dfddf', '', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabayasd', 2147483647, 'dfdf@gmail.com', 'sdsd', 'cfcd208495d565ef66e7dff9f98764da', 2, '2021-01-02 05:35:30', '', '2020-11-11 07:27:44', 0),
(38, 'sdsd', '358767269836892', 'Jetis Kulon Gang X No. 16 A, Wonokromo, Surabaya', 2147483647, 'sdsdsd@sds.com', 'akuisd', 'd8eeb248c981a26503338046dc9c9f2f', 3, '2021-01-02 05:35:01', '', '2020-11-11 08:06:25', 0),
(62, 'paroke', '', 'Mojokerto', 2147483647, 'paroke@gmail.com', 'sdsda', 'cfcd208495d565ef66e7dff9f98764da', 2, '2021-01-06 18:14:33', '', '2021-01-06 18:14:33', 0),
(63, 'Muhammad Hussein Isron', '', 'Mojokerto', 2147483647, 'isrongans21@gmail.com', 'cobabaa', 'a43fc3d27915b373b163da088684d4a9', 2, '2020-11-12 03:22:08', '', '2020-11-12 03:22:08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(12) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Pembeli'),
(3, 'Penjual');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_bukti`
--
ALTER TABLE `tb_bukti`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_bukti`
--
ALTER TABLE `tb_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kat_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
