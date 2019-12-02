-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2019 pada 10.58
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsippdm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `judul` varchar(25) DEFAULT NULL,
  `keterangan` text,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `surat_id` int(11) NOT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `judul` text,
  `perihal` varchar(50) DEFAULT NULL,
  `jenissurat` varchar(10) DEFAULT NULL,
  `tujuandari` varchar(50) DEFAULT NULL,
  `file` varchar(15) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `no_induk` varchar(15) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `password_text` varchar(6) DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `no_induk`, `nama`, `no_tlp`, `alamat`, `password`, `password_text`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '111', 'ahyani', '021', 'bekasi', 'c56d0e9a7ccec67b4ea131655038d604', '123456', 'system', '2019-12-02 14:21:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`surat_id`),
  ADD UNIQUE KEY `nomor` (`nomor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `surat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
