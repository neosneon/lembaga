-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 08:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(128) NOT NULL,
  `kursus` varchar(128) NOT NULL,
  `periode` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `kursus`, `periode`, `keterangan`) VALUES
(1, 'SAP', '21 Mar - 25 Jun 2022', 'Untuk S2'),
(2, 'Cisco', '21 Mar - 23 Des 2022', 'Untuk S2 juga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `jurusan` varchar(18) NOT NULL,
  `kursus` varchar(128) NOT NULL,
  `periode` varchar(128) NOT NULL,
  `status` varchar(1) NOT NULL,
  `krs` varchar(128) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `npm`, `kelas`, `jurusan`, `kursus`, `periode`, `status`, `krs`, `role`) VALUES
(1, 'pancha', '55418533', '4IA14', 'Informatika', 'SAP', '21 Mar - 25 Jun 2022', '1', '62ebff8a73932.jpg', 1),
(3, 'sapas', '6526466', 'Informat', '2IA12', 'Cisco', '21 Mar - 23 Des 2022', '1', '62ec1065aaedc.jpg', 0),
(4, 'citra', '4884848', '2KA48', 'Informasi', '', '', '0', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
