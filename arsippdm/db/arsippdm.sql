-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2020 at 02:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

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
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `keterangan`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(8, 'Menambahkan Arsip TES ACTIVITY', 'admin', '2020-02-13 07:42:32', NULL, NULL),
(9, 'Merubah Arsip TES ACTIVITY', 'admin', '2020-02-13 07:42:54', NULL, NULL),
(10, 'Menghapus Arsip TES ACTIVITY', 'admin', '2020-02-13 07:43:06', NULL, NULL),
(11, 'Menambahkan Surat 00002 - dfa', 'admin', '2020-02-13 07:49:56', NULL, NULL),
(12, 'Menambahkan Surat 123', 'admin', '2020-02-13 07:50:53', NULL, NULL),
(13, 'Menambahkan Surat 00002 - 110-20120/II', 'admin', '2020-02-13 07:52:21', NULL, NULL),
(14, 'Menambahkan Surat 01-II-KKP-2020', 'admin', '2020-02-13 07:52:42', NULL, NULL),
(15, 'Menghapus Surat 123', 'admin', '2020-02-13 07:59:51', NULL, NULL),
(16, 'Menghapus Surat 00001 - dfsdfasdf', 'admin', '2020-02-13 08:00:00', NULL, NULL),
(17, 'Merubah Surat 00002 - 110-20120/II', 'admin', '2020-03-13 08:00:16', NULL, NULL),
(18, 'Menghapus Surat 00002 - 110-20120/II', 'ahyani', '2020-02-13 08:26:57', NULL, NULL),
(19, 'Merubah Surat 01-II-KKP-2020', 'ahyani', '2020-02-13 08:27:05', NULL, NULL),
(20, 'Merubah Tampilan', 'admin', '2020-02-13 08:31:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `arsip_id` int(11) NOT NULL,
  `nama_arsip` varchar(25) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `progress` varchar(150) NOT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`arsip_id`, `nama_arsip`, `keterangan`, `progress`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'SURAT SMKN 1 JAKARTA', 'Kumpulan surat menyurat dengan SMKN1 Jakarta untuk rekomendasi penerimaan siswa didik baru', 'ON PROSES', 'ahyani', '2020-01-22 13:58:13', 'ahyani', '2020-01-22 13:58:38'),
(2, 'SURAT MASUK', 'undangan', 'SELESAI', 'admin', '2020-02-10 11:30:22', 'ahyani', '2020-02-13 08:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `no_agenda`
--

CREATE TABLE `no_agenda` (
  `no_agenda_id` int(11) NOT NULL,
  `no_agenda` varchar(5) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_agenda`
--

INSERT INTO `no_agenda` (`no_agenda_id`, `no_agenda`, `surat_id`, `tahun`) VALUES
(1, '00001', 2, '2020'),
(2, '00002', 3, '2020');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `surat_id` int(11) NOT NULL,
  `arsip_id` int(11) NOT NULL,
  `jenissurat` varchar(10) DEFAULT NULL,
  `nomor` varchar(100) NOT NULL,
  `tglsurat` date DEFAULT NULL,
  `tglditerima` date DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `pengirim` varchar(150) DEFAULT NULL,
  `penerima` varchar(150) DEFAULT NULL,
  `disposisi` text DEFAULT NULL,
  `file` varchar(120) DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(25) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`surat_id`, `arsip_id`, `jenissurat`, `nomor`, `tglsurat`, `tglditerima`, `perihal`, `pengirim`, `penerima`, `disposisi`, `file`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 2, 'KELUAR', '01-II-KKP-2020', '2020-02-10', '0000-00-00', 'UNDANGAN SIDANG KKP', 'PDM BEKASI', 'STMIK MJ', '', '01-II-KKP-2020.txt', 'admin', '2020-02-10 11:35:15', 'ahyani', '2020-02-13 08:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `no_induk`, `nama`, `no_tlp`, `alamat`, `username`, `password`, `password_text`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, '999999999', 'ADMIN PDM', '021', 'bekasi', 'admin', 'c56d0e9a7ccec67b4ea131655038d604', '123456', 'system', '2019-12-02 14:21:20', 'admin', '2020-02-13 07:31:00'),
(4, '123456', 'AHYANI', NULL, NULL, 'ahyani', 'c56d0e9a7ccec67b4ea131655038d604', '123456', 'admin', '2019-12-11 17:55:35', 'admin', '2019-12-11 20:38:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`arsip_id`),
  ADD UNIQUE KEY `nama_arsip` (`nama_arsip`);

--
-- Indexes for table `no_agenda`
--
ALTER TABLE `no_agenda`
  ADD PRIMARY KEY (`no_agenda_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`surat_id`),
  ADD KEY `arsip_id` (`arsip_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `no_induk` (`no_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `arsip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `no_agenda`
--
ALTER TABLE `no_agenda`
  MODIFY `no_agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `surat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`arsip_id`) REFERENCES `arsip` (`arsip_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
