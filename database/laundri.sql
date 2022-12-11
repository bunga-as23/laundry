-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2022 pada 13.45
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `judul_about` varchar(50) NOT NULL,
  `deskripsi_about` text NOT NULL,
  `gambar_about` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `judul_about`, `deskripsi_about`, `gambar_about`) VALUES
(3, 'Laundry Online', 'Selamat Datang', '2105_i203_006_F_m004_c9_laundry_cartoon.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kode_konsumen` varchar(12) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat_konsumen` text NOT NULL,
  `no_telp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kode_konsumen`, `nama_konsumen`, `alamat_konsumen`, `no_telp`) VALUES
('K001', 'Adinda', 'Jember', '082xxxxxxxxx'),
('K002', 'Bunga', 'Sidomulyo', '085xxxxxxxxx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(20) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `harga_paket`) VALUES
('P001', 'Cuci Basah', '5000'),
('P002', 'Cuci Kering', '7000'),
('P003', 'Cuci + Seterika', '7000'),
('P004', 'Seterika + Pewangi', '9000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul_slider` varchar(50) NOT NULL,
  `deskripsi_slider` text NOT NULL,
  `status_slider` varchar(20) NOT NULL,
  `gambar_slider` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `deskripsi_slider`, `status_slider`, `gambar_slider`) VALUES
(3, 'Contoh', 'Deskripsi Slider', 'Aktif', '1912_i505_013__laundry_infographics.jpg'),
(4, 'Promo November', 'Diskon besar-besaran bulan November', 'Aktif', '2105_i203_006_F_m004_c9_laundry_cartoon.jpg'),
(5, 'Slider 3', 'Ini contoh slider yang ke-3', 'Aktif', '2009_i602_002_laundry_illustration_flat.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_konsumen` varchar(12) NOT NULL,
  `kode_paket` varchar(12) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ambil` datetime NOT NULL,
  `berat` int(10) NOT NULL,
  `grand_total` int(12) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_konsumen`, `kode_paket`, `tgl_masuk`, `tgl_ambil`, `berat`, `grand_total`, `bayar`, `status`) VALUES
('TR20221031001', 'K001', 'P003', '2022-10-31 08:39:26', '0000-00-00 00:00:00', 2, 14000, 'Belum Lunas', 'Selesai'),
('TR20221031002', 'K001', 'P004', '2022-10-31 08:39:36', '2022-11-05 00:00:00', 2, 18000, 'Lunas', 'Selesai'),
('TR20221105003', 'K001', 'P001', '2022-11-05 08:31:04', '2022-11-05 02:35:55', 5, 25000, 'Lunas', 'Selesai'),
('TR20221105004', 'K001', 'P001', '2022-11-05 08:42:58', '2022-11-05 02:46:32', 4, 20000, 'Lunas', 'Selesai'),
('TR20221105005', 'K001', 'P001', '2022-11-06 05:41:47', '2022-11-06 11:46:39', 3, 15000, 'Lunas', 'Selesai'),
('TR20221106006', 'K002', 'P001', '2022-11-07 07:15:28', '2022-11-27 01:38:37', 8, 40000, 'Lunas', 'Selesai'),
('TR20221107007', 'K002', 'P003', '2022-11-07 07:15:35', '2022-11-27 01:44:05', 2, 14000, 'Lunas', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '123456');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kode_konsumen`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
