-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 12:45 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataregisthm`
--
CREATE DATABASE IF NOT EXISTS `dataregisthm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dataregisthm`;

-- --------------------------------------------------------

--
-- Table structure for table `dataregister`
--

DROP TABLE IF EXISTS `dataregister`;
CREATE TABLE `dataregister` (
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_line` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `alergi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataregister`
--

INSERT INTO `dataregister` (`nama`, `nrp`, `jenis_kelamin`, `no_hp`, `id_line`, `email`, `id_jurusan`, `alergi`) VALUES
('MALVIN PATRICK', '123456789', 'L', '081249361520', 'malvinpatrick', 'malvinpatrickk@gmail.com', 3, ''),
('MALVIN', '216116537', 'L', '081', '081', 'malvinpatrickk@gmail.com', 2, ''),
('MALVIN', '216116538', 'L', '081', '081', 'malvinpatrickk@gmail.com', 2, ''),
('MALVIN PATRICK', '216116539', 'L', '081249361520', 'malvinpatrick', 'malvinpatrickk@gmail.com', 3, ''),
('MALVIN', '216116550', 'L', '123', '123', 'malvinpatrickk@gmail.com', 2, ''),
('MALVIN', '216116551', 'L', '123', '123', 'malvinpatrickk@gmail.com', 2, ''),
('MALVIN', '216116552', 'L', '123', '123', 'malvinpatrickk@gmail.com', 2, ''),
('MALVIN', '216116558', 'L', '123', '123', 'malvinpatrickk@gmail.com', 2, ''),
('MALVIN PATRICK', '987654321', 'L', '081249361520', 'malvinpatrick', 'malvinpatrickk@gmail.com', 2, '');

--
-- Triggers `dataregister`
--
DROP TRIGGER IF EXISTS `NAMA`;
DELIMITER $$
CREATE TRIGGER `NAMA` BEFORE INSERT ON `dataregister` FOR EACH ROW BEGIN
SET new.nama = UPPER(new.nama);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id_jurusan` int(1) NOT NULL,
  `nama_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'D3 - INFORMATIKA'),
(2, 'S1 - INFORMATIKA'),
(3, 'S1 - INDUSTRI'),
(4, 'S1 - DKV'),
(5, 'S1 - ELEKTRO'),
(6, 'S1 - DESPRO'),
(7, 'S1 - SIB');

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan`
--

DROP TABLE IF EXISTS `pelunasan`;
CREATE TABLE `pelunasan` (
  `nrp` varchar(9) NOT NULL,
  `tanggal_lunas` date NOT NULL,
  `status_regis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataregister`
--
ALTER TABLE `dataregister`
  ADD PRIMARY KEY (`nrp`),
  ADD KEY `fk_jurusan` (`id_jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD PRIMARY KEY (`nrp`),
  ADD UNIQUE KEY `nrp` (`nrp`),
  ADD KEY `fk_pelunasan` (`nrp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataregister`
--
ALTER TABLE `dataregister`
  ADD CONSTRAINT `fk_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelunasan`
--
ALTER TABLE `pelunasan`
  ADD CONSTRAINT `fk_pelunasan` FOREIGN KEY (`nrp`) REFERENCES `dataregister` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
