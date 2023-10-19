-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 05:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genshin_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `karakter_genshin`
--

CREATE TABLE `karakter_genshin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `elemen` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tgllahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karakter_genshin`
--

INSERT INTO `karakter_genshin` (`id`, `nama`, `elemen`, `deskripsi`, `gambar`, `tgllahir`) VALUES
(9, 'Aldi Solihin', 'Hydro', '123', 'NoImage.png', '2023-10-13'),
(12, '1232', 'Hydro', '123', 'NoImage.png', '2023-10-09'),
(14, 'qwrqwqqr', 'Hydro', 'qrqw', 'NoImage.png', '2023-10-19'),
(15, 'Aldi Solihin ', 'Hydro', 'qlkwhr lqhlrqlrqrjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'NoImage.png', '2023-10-13'),
(16, '123212', 'Hydro', 'qrqw', 'NoImage.png', '2023-10-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karakter_genshin`
--
ALTER TABLE `karakter_genshin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karakter_genshin`
--
ALTER TABLE `karakter_genshin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
