-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2021 pada 07.52
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `jenis_kamar` varchar(100) NOT NULL,
  `stok_kamar` varchar(100) NOT NULL,
  `harga_sewa` varchar(100) NOT NULL,
  `maksimal_penghuni` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `nama_kamar`, `jenis_kamar`, `stok_kamar`, `harga_sewa`, `maksimal_penghuni`, `gambar`) VALUES
(2, 'Kamar 1', 'Luxury', '0', '200000', '3', 'foto_kamar_5.jpg'),
(3, 'Luxury One', 'Luxury', '0', '200000', '3', 'foto_kamar_6.jpg'),
(4, 'Kamar 1', 'Luxury', '0', '200000', '3', 'foto_kamar_8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nik` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nik`, `password`, `nama_pegawai`) VALUES
('19062013', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` varchar(100) NOT NULL,
  `tgl_pembayaran` varchar(100) NOT NULL,
  `total_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `tgl_pembayaran`, `total_bayar`) VALUES
(1, '1', '2021-04-21', ''),
(2, '3', '2021-04-21', ''),
(3, '4', '2021-04-21', '2000000'),
(4, '2', '2021-04-25', '200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tgl_pemesanan` varchar(100) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nik_pemesan` varchar(100) NOT NULL,
  `no_kontak` varchar(100) NOT NULL,
  `list_pemesanan` varchar(100) NOT NULL,
  `total_biaya` varchar(100) NOT NULL,
  `status_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tgl_pemesanan`, `nama_pemesan`, `nik_pemesan`, `no_kontak`, `list_pemesanan`, `total_biaya`, `status_bayar`) VALUES
(1, '22-03-2021', '123', '1231231', '1231231', 'Kamar 1 1 200000,', '200000', 'Sudah dibayar'),
(2, '21-04-2021', 'Coba', '123', '123', 'Kamar 1 1 kamar,', '200000', 'Sudah dibayar'),
(3, '21-04-2021', 'Testing', '123', '123', 'Luxury One 1 kamar,Kamar 1 1 kamar,', '400000', 'Sudah dibayar'),
(4, '21-04-2021', '123', '123', '123', 'Luxury One 1 kamar,', '200000', 'Sudah dibayar'),
(5, '21-04-2021', 'Testing', '123', '123', 'Luxury One 1 kamar,Kamar 1 1 kamar,', '400000', 'Belum dibayar'),
(6, '21-04-2021', 'Testing', '1231231', '1231231', 'Luxury One 1 kamar,Kamar 1 2 kamar,', '600000', 'Belum dibayar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
