-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 02:41 PM
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
(19, 'Ayaka', 'Hydro', 'Cantik, bermartabat, dan mulia, Ayaka telah mendapatkan gelar Shirasagi Himegimi dan dianggap sebagai teladan kesempurnaan di Inazuma .', '2023-10-25 06-55-10.Ayaka.jpg', '2003-09-28'),
(20, 'Hutao', 'Pyro', 'Hu Tao memungkiri perannya sebagai Direktur ke-77 dari Wangsheng Funeral Parlor dan bakatnya sebagai seorang penyair.', '2023-10-25 06-57-14.Hutao.jpg', '2003-07-15'),
(21, 'Yoimiya', 'Pyro', 'Yoimiya merupakan pembuat kembang api sekaligus pemilik dari sanggar  kembang api \"Naganohara\". Sebagai pembuat kembang api paling mahir di Inazuma, ia dijuluki sebagai \"Queen of the Summer Festival\".', '2023-10-25 06-59-52.Yoimiya.jpg', '2004-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `email`, `password`) VALUES
(1, 'Aldi Solihin', 'aldisolihin12@gmail.com', '$2y$10$AUbx1YHQuet1GHhzVi8tF./OFetXf3PeA.icv1x7Y3ysz2P/1L4uy'),
(2, 'Aldi', 'aldisolihin1@gmail.com', '$2y$10$wLyEjcJsMdltu9FJzb7yaO4M.Ely4MRBS0erIGCqyQ8CtO68fFyJO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karakter_genshin`
--
ALTER TABLE `karakter_genshin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karakter_genshin`
--
ALTER TABLE `karakter_genshin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
