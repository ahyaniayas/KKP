-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2019 pada 07.51
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
(1, 'TES1', 'dfsdfa', 'DFA', 'admin', '2019-12-11 10:15:32', 'admin', '2019-12-15 21:05:40');

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
(2, '00002', 3, '2019'),
(3, '00003', 4, '2019'),
(4, '00004', 5, '2019'),
(5, '00005', 6, '2019'),
(6, '00006', 7, '2019');

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
(1, 1, 'KELUAR', '12345', '2019-12-11', '0000-00-00', 'FDASDF', 'FDWFASDF', 'ASDFSADF', 'sdfasd', '12345.JPG', 'admin', '2019-12-11 18:29:05', 'admin', '2019-12-12 06:28:18'),
(2, 1, 'MASUK', '0002', '2019-12-12', '2019-12-12', 'DSFDFSd', 'FSDFASDF', 'DSFASDF', 'asdfasdf', '0002-000012019.JPG', 'admin', '2019-12-12 06:05:35', 'admin', '2019-12-12 06:27:57'),
(4, 1, 'MASUK', '0002', '2019-12-13', '2019-12-13', 'DFASEFSd', 'FSADFSDf', 'SDFSADF', 'sdfasdfasdfs', '0002-000032019.JPG', 'admin', '2019-12-12 06:22:20', 'admin', '2019-12-12 06:28:08'),
(6, 1, 'MASUK', '0002', '2019-12-14', '2019-12-14', 'AGAGAGDSAGAGAGDSAGAGAGDSAGAGAGDSAGAGAGDS', 'GADSGADS', 'FDASGDSDG', 'sdgsdfgsdag', '0002-000052019.pptm', 'admin', '2019-12-12 06:30:22', 'admin', '2019-12-15 21:05:40'),
(7, 1, 'MASUK', 'dsfasf', '2019-12-12', '2019-12-12', 'FASDFSD', 'FSDFSDAF', 'FSASFS', 'fadsfas', 'dsfasf-000062019.JPG', 'admin', '2019-12-12 06:30:59', 'admin', '2019-12-12 06:32:43'),
(8, 1, 'KELUAR', '01/XII/201911', '2019-12-12', '0000-00-00', 'DSFDS', 'FDSF', 'FDSAFAS', 'sfasfdasdf', '01-XII-201911.JPG', 'admin', '2019-12-12 06:31:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `no_induk` varchar(25) DEFAULT NULL,
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
(1, '999999999', 'ADMIN PDM', '021', 'bekasi', 'admin', 'c56d0e9a7ccec67b4ea131655038d604', '123456', 'system', '2019-12-02 14:21:20', 'admin', '2019-12-11 17:54:49'),
(4, '123456', 'AHYANI', NULL, NULL, 'ahyani', 'c56d0e9a7ccec67b4ea131655038d604', '123456', 'admin', '2019-12-11 17:55:35', 'admin', '2019-12-11 20:38:08');

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
  MODIFY `no_agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `surat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
