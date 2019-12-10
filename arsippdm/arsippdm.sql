-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2019 pada 16.14
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
  `nama_arsip` varchar(25) DEFAULT NULL,
  `keterangan` text,
  `progress` varchar(150) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `nama_arsip`, `keterangan`, `progress`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'TES1', 'TES 1', 'AWAL', 'admin', '2019-12-10 21:28:39', 'admin', '2019-12-10 22:08:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `no_agenda`
--

CREATE TABLE `no_agenda` (
  `no_agenda_id` int(11) NOT NULL,
  `no_agenda` varchar(5) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `no_agenda`
--

INSERT INTO `no_agenda` (`no_agenda_id`, `no_agenda`, `surat_id`, `tahun`) VALUES
(1, '00001', 2, '2019'),
(2, '00002', 3, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `surat_id` int(11) NOT NULL,
  `arsip_id` int(11) NOT NULL,
  `jenissurat` varchar(10) DEFAULT NULL,
  `nomor` varchar(100) NOT NULL,
  `tglsurat` date DEFAULT NULL,
  `tglditerima` date DEFAULT NULL,
  `perihal` text,
  `pengirim` varchar(150) DEFAULT NULL,
  `penerima` varchar(150) DEFAULT NULL,
  `disposisi` text,
  `file` varchar(120) DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`surat_id`, `arsip_id`, `jenissurat`, `nomor`, `tglsurat`, `tglditerima`, `perihal`, `pengirim`, `penerima`, `disposisi`, `file`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(3, 1, 'MASUK', '01/XII/2019', '2019-12-01', '2019-12-03', 'TERIMA TGL 1 MASUK TGL 3', 'TANGGAL 1', 'TANGGAL 3', 'ini catatan disposisinya', '01-XII-2019.png', 'admin', '2019-12-10 21:58:42', NULL, NULL),
(7, 1, 'KELUAR', '10/XII/2019.03', '2019-12-10', '1970-01-01', 'SURAT KE 3', 'PENGIRIM KE 3', 'PENERIMA KE 3', 'ini itu', '10-XII-2019-03.xlsx', 'admin', '2019-12-10 22:08:34', NULL, NULL);

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
  `username` varchar(15) NOT NULL,
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

INSERT INTO `user` (`user_id`, `no_induk`, `nama`, `no_tlp`, `alamat`, `username`, `password`, `password_text`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '', 'admin pdm', '021', 'bekasi', 'admin', 'c56d0e9a7ccec67b4ea131655038d604', '123456', 'system', '2019-12-02 14:21:20', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`),
  ADD UNIQUE KEY `nama_arsip` (`nama_arsip`);

--
-- Indeks untuk tabel `no_agenda`
--
ALTER TABLE `no_agenda`
  ADD PRIMARY KEY (`no_agenda_id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`surat_id`),
  ADD UNIQUE KEY `nomor` (`nomor`),
  ADD KEY `arsip_id` (`arsip_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `no_agenda`
--
ALTER TABLE `no_agenda`
  MODIFY `no_agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `surat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`arsip_id`) REFERENCES `arsip` (`arsip_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
