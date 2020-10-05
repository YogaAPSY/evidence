-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 01:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evidence`
--

-- --------------------------------------------------------

--
-- Table structure for table `xx_dokumen`
--

CREATE TABLE `xx_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_kontrak` int(11) NOT NULL,
  `file1` varchar(125) NOT NULL,
  `file2` varchar(125) NOT NULL,
  `file3` varchar(125) NOT NULL,
  `file4` varchar(125) NOT NULL,
  `file5` varchar(125) NOT NULL,
  `file6` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `xx_kontrak`
--

CREATE TABLE `xx_kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `nomor_kontrak` varchar(125) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `judul_kontrak` varchar(125) NOT NULL,
  `mulai_kontrak` date NOT NULL,
  `selesai_kontrak` date NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `xx_rekap`
--

CREATE TABLE `xx_rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_kontrak` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `realisasi` int(11) NOT NULL DEFAULT 0,
  `uraian` varchar(125) NOT NULL,
  `vol` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `xx_satuan`
--

CREATE TABLE `xx_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `xx_users`
--

CREATE TABLE `xx_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1 COMMENT '1. active, 2. tidak aktif',
  `status` int(11) NOT NULL COMMENT '1. pegawai, 2. apoteker, 3.gudang',
  `created_by` varchar(50) NOT NULL DEFAULT 'master',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xx_users`
--

INSERT INTO `xx_users` (`id_user`, `username`, `password`, `nama`, `is_active`, `status`, `created_by`, `created_at`) VALUES
(1, 'admin', '$2y$10$xmF5I4r4Ukk5nl/TwkKMc.cUOuKQsjpnEf96hK/WumbNhcNWciZ5e', 'admin', 1, 2, 'Apoteker', '2020-09-30 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xx_dokumen`
--
ALTER TABLE `xx_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `xx_kontrak`
--
ALTER TABLE `xx_kontrak`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indexes for table `xx_rekap`
--
ALTER TABLE `xx_rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `xx_satuan`
--
ALTER TABLE `xx_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `xx_users`
--
ALTER TABLE `xx_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xx_dokumen`
--
ALTER TABLE `xx_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_kontrak`
--
ALTER TABLE `xx_kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_rekap`
--
ALTER TABLE `xx_rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_satuan`
--
ALTER TABLE `xx_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xx_users`
--
ALTER TABLE `xx_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
