-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Sep 2019 pada 15.44
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
-- Database: `ahyaniayas_acara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_d`
--

CREATE TABLE `jadwal_d` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `bayar` bigint(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_d`
--

INSERT INTO `jadwal_d` (`id`, `id_jadwal`, `id_user`, `bayar`, `keterangan`) VALUES
(2, 4, NULL, 10000, 'AHYANI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_h`
--

CREATE TABLE `jadwal_h` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` text NOT NULL,
  `iuran` bigint(20) NOT NULL,
  `id_pj` int(11) NOT NULL,
  `link` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_h`
--

INSERT INTO `jadwal_h` (`id`, `tanggal`, `deskripsi`, `lokasi`, `iuran`, `id_pj`, `link`, `status`) VALUES
(4, '2019-09-30 00:00:00', 'Jalan Jalan Santai', 'Monas', 10000, 1, '4304', 1),
(6, '2019-09-01 00:00:00', 'Jadwal Aktif', 'Jadwal Aktif', 1000, 4, '6016', 1),
(7, '2019-09-23 00:00:00', 'Jadwal Mati', 'Jadwal Mati', 2000, 4, '7237', 1),
(8, '2019-09-25 00:00:00', 'ahyani tes', 'tes', 1230, 1, '8258', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `rekening` varchar(25) DEFAULT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `kontak`, `rekening`, `token`) VALUES
(1, 'AHYANI', '081281216317', NULL, '123456'),
(4, 'AMIR', '099', NULL, '4ami');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_d`
--
ALTER TABLE `jadwal_d`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_h`
--
ALTER TABLE `jadwal_h`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`),
  ADD KEY `id_pj` (`id_pj`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_d`
--
ALTER TABLE `jadwal_d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal_h`
--
ALTER TABLE `jadwal_h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_d`
--
ALTER TABLE `jadwal_d`
  ADD CONSTRAINT `jadwal_d_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_h` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_h`
--
ALTER TABLE `jadwal_h`
  ADD CONSTRAINT `jadwal_h_ibfk_1` FOREIGN KEY (`id_pj`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
