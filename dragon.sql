-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 04:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dragon`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pengirim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `isi`, `tanggal`, `pengirim`) VALUES
(1, 'Haloo saya', '2023-11-29 23:50:14', 'dolor'),
(2, 'Haloo saya', '2023-11-29 23:50:19', 'dolor'),
(3, 'Hai namaku aneh', '2023-11-29 23:50:25', 'dolor'),
(4, 'Hai namaku aneh', '2023-11-29 23:50:41', 'dolor'),
(5, 'Halo dunia!!', '2023-12-01 03:50:42', 'amar'),
(6, 'Halo dunia!!', '2023-12-01 03:51:28', 'amar'),
(7, 'Saya adalah raja mesir', '2023-12-01 03:51:55', 'amar'),
(12, 'Hai ini adalah dewa di dalam web ini', '2023-12-01 05:12:33', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nyawa` int(11) NOT NULL,
  `serang` int(11) NOT NULL,
  `foto_profil` varchar(10000) NOT NULL,
  `bio` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `nyawa`, `serang`, `foto_profil`, `bio`) VALUES
(9, 'admin', 'admin', 'admin', 10, 9993, 'logo unsoed.jpg', ''),
(13, 'amar', 'amar', '123', 7, 0, 'gambar.png', ''),
(14, 'ageng', 'ageng', '123', 8, 2, 'gambar.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
