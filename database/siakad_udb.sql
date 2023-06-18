-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 10.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_udb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_pendidikan`
--

CREATE TABLE `jenjang_pendidikan` (
  `id_jenj_didik` int(2) NOT NULL,
  `nama_jenj_didik` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenjang_pendidikan`
--

INSERT INTO `jenjang_pendidikan` (`id_jenj_didik`, `nama_jenj_didik`, `createdAt`, `updatedAt`) VALUES
(22, 'D3', '2023-03-17 00:00:00', '2023-03-17 00:00:00'),
(30, 'S1', '2023-03-17 00:00:00', '2023-03-17 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) DEFAULT NULL,
  `id_jenj_didik` int(2) DEFAULT NULL,
  `id_neofeeder` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`kode_prodi`, `nama_prodi`, `id_jenj_didik`, `id_neofeeder`, `createdAt`, `updatedAt`) VALUES
('P0001', 'Sistem Informasi', 30, NULL, '2023-03-17 00:00:00', '2023-03-17 00:00:00'),
('P0002', 'Manajemen Informatika', 22, NULL, '2023-03-17 00:00:00', '2023-03-17 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenjang_pendidikan`
--
ALTER TABLE `jenjang_pendidikan`
  ADD PRIMARY KEY (`id_jenj_didik`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`kode_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
