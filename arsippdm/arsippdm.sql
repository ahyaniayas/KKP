-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2019 pada 02.21
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
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `nama_arsip`, `keterangan`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'KKP STMIK MJ BEKASI', 'KKP STMIK MJ BEKASI KETERANGAN', 'system', '2019-12-03 17:28:01', 'admin', '2019-12-04 16:11:12'),
(9, 'RENCANA PEMBANGUNAN', 'RENCANA PEMBANGUNAN GEDUNG BARU BERLANTAI 6 DI CABANG', 'admin', '2019-12-04 23:54:41', NULL, NULL),
(10, 'PEROMBAKAN STRUKTUR', 'PERUBAHAN STRUKTUR KEPENGURUSAN PDM BEKASI TAHUN 2020', 'admin', '2019-12-05 00:30:59', NULL, NULL),
(11, 'RECRUITMENT', 'RECRUITMENT PEGAWAI DI AUM PDM BEKASI ', 'admin', '2019-12-05 00:31:27', NULL, NULL),
(12, 'SELEKSI KEPSEK', 'SELEKSI KEPALA SEKOLAH SMP 28 BEKASI', 'admin', '2019-12-05 00:32:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `surat_id` int(11) NOT NULL,
  `arsip_id` int(11) NOT NULL,
  `nomor` varchar(10) DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `perihal` text,
  `jenissurat` varchar(10) DEFAULT NULL,
  `tujuandari` varchar(50) DEFAULT NULL,
  `file` varchar(15) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`surat_id`, `arsip_id`, `nomor`, `tglsurat`, `perihal`, `jenissurat`, `tujuandari`, `file`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 1, '01/V/22', '2019-12-04', 'PENGAJUAN KKP STMIK MJ', 'MASUK', 'STMIK MJ', '01-V2-2.pdf', 'system', '2019-12-04 21:00:07', 'admin', '2019-12-04 23:32:57'),
(2, 1, '02/V/22', '2018-12-05', 'PENERIMAAN KKP STMIK MJ', 'MASUK', 'STMIK MJ', '02-V2-2.pdf', 'system', '2019-12-04 21:01:08', 'admin', '2019-12-04 23:38:54'),
(5, 9, '01-VV-19', '2019-12-05', 'PENGAJUAN KEPADA PP MUHAMMADIYAH', 'KELUAR', 'SEKRETARIAT PP MUHAMMADIYAH', '01-VV-19.xlsx', 'admin', '2019-12-05 00:05:30', 'admin', '2019-12-05 00:20:01'),
(6, 10, '01-ST-19', '2019-12-05', 'SURAT UNDANGAN PERNIKAHAN', 'KELUAR', 'ORANG ORANG', '01-ST-19.pdf', 'admin', '2019-12-05 08:17:13', NULL, NULL);

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
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `surat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
