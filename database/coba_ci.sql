-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 10:41 PM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientid`
--

CREATE TABLE `clientid` (
  `id` int(32) NOT NULL,
  `clientId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientid`
--

INSERT INTO `clientid` (`id`, `clientId`) VALUES
(1, '61fc89692eefa0b1a73f74a837b81a59');

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id` int(32) NOT NULL,
  `namalengkap` varchar(64) NOT NULL,
  `ruangpasien` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `umur` int(16) NOT NULL,
  `golongandarah` varchar(32) NOT NULL,
  `jeniskelamin` int(16) NOT NULL,
  `keluhan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`id`, `namalengkap`, `ruangpasien`, `alamat`, `umur`, `golongandarah`, `jeniskelamin`, `keluhan`) VALUES
(5, 'Tukiyem', 'Kamboja', 'Margorejo, Kab. Pati', 68, 'AB', 2, 'Demam Tinggi'),
(6, 'Ucok', 'Ruang Bougenville', 'Manyaran, Semarang, Jateng', 26, 'B', 1, 'Terkena Corona Virus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientid`
--
ALTER TABLE `clientid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientid`
--
ALTER TABLE `clientid`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
