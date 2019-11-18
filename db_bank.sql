-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jul 2019 pada 11.31
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bank`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `no_rek` varchar(20) NOT NULL,
  `pin` char(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `tipe_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`no_rek`, `pin`, `nama`, `alamat`, `saldo`, `tipe_pengguna`) VALUES
('19900411', '900411', 'karim', 'wisma asri', 8000000, 2),
('19901031', '900131', 'noer', 'pd bambu', 6500000, 2),
('19901217', '991217', 'wahyu', 'tj priok', 15000000, 2),
('19991031', '991031', 'rere anderesti', 'rawa lumbu', 13000000, 2),
('19991212', '991212', 'aminah', 'bekasi selatan', 16005000, 2),
('admin', 'admin', 'admin', 'bank', 10000000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`no_rek`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
