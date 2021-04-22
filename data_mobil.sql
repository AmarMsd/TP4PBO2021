-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2021 pada 17.50
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mobil`
--

CREATE TABLE `data_mobil` (
  `code_produksi` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL,
  `dealer_mobil` varchar(455) NOT NULL,
  `uji_layak_pakai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mobil`
--

INSERT INTO `data_mobil` (`code_produksi`, `merk`, `warna`, `jenis_mobil`, `dealer_mobil`, `uji_layak_pakai`) VALUES
(2211, 'Kawasaki Jazz', 'Merah', 'Leuwiliang', 'Sport', 'Belum Layak'),
(11111, 'Honda Civic', 'Merah', 'Bogor', 'Sport', 'Sudah Lulus'),
(22111, 'Honda Bruz', 'Hitam', 'Jakarta', 'Sport', 'Sudah Lulus'),
(33221, 'Yamaha Jazz', 'Merah', 'Jasinga', 'Sport', 'Belum Layak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`code_produksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
