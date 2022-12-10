-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 07:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Database: `dbx_warung`
--

-- CREATE DATABASE IF NOT EXIST
CREATE DATABASE IF NOT EXISTS dbx_warung;

-- USE DATABASE 
USE dbx_warung;
-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `stokAwal` int(11) NOT NULL,
  `harga` float NOT NULL,
  `mutasiMasuk` int(11) NOT NULL DEFAULT 0,
  `mutasiKeluar` int(11) NOT NULL DEFAULT 0,
  `stokAkhir` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `stokAwal`, `harga`, `mutasiMasuk`, `mutasiKeluar`, `stokAkhir`) VALUES
(3, 'M-22011011', 'Roti Roma Kelapa', 3, 4000, 3, 4, 2),
(4, 'M-22011012', 'Biskuit Oreo Coklat', 4, 2500, 5, 3, 6),
(5, 'M-22011026', 'Sari Roti Keju Mozarela', 16, 12800, 3, 19, 0),
(6, 'U-22011021', 'Nutrikjel', 100, 1350, 0, 0, 100),
(7, 'M-22011043', 'Fresh Tea', 8, 3000, 3, 0, 11),
(8, 'A-22067761', 'Tepung Sasa', 12, 3500, 0, 0, 12),
(9, 'U-62171982', 'Bimoli', 50, 11500, 2, 20, 32);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'kasir', 'c7911af3adbd12a035b289556d96470a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
