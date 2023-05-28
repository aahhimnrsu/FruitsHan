-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 07:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokobuah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buah`
--

CREATE TABLE `tb_buah` (
  `kode` varchar(10) NOT NULL,
  `nama_buah` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buah`
--

INSERT INTO `tb_buah` (`kode`, `nama_buah`, `harga`, `foto`) VALUES
('FR001', 'Strawberry', 24000, 'uploads/product-img-1.jpg'),
('FR002', 'Grapes', 21000, 'uploads/product-img-2.jpg'),
('FR003', 'Orange', 17000, 'uploads/product-img-3.jpg'),
('FR004', 'Kiwi', 18000, 'uploads/product-img-4.jpg'),
('FR005', 'Green Apple', 21000, 'uploads/product-img-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `kode_buah` varchar(10) NOT NULL,
  `foto_buah` varchar(50) NOT NULL,
  `nama_buah` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `kode_pembelian` varchar(10) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `status` enum('Delivered','Not Delivered Yet') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`kode_pembelian`, `nama_pembeli`, `alamat`, `hp`, `total`, `bukti_bayar`, `status`) VALUES
('TB001', 'asd', '12', '123', 237000, 'buktibayar/6__IMG_4534_Selain_sebagai_penghias_tam', 'Delivered'),
('TB002', 'Raihan', 'qwq', '09', 12264, 'buktibayar/s_5156_waifu2x_art_noise2_scale.png', 'Delivered'),
('TB003', 'Raihan', 'Anwar Arsyad Street, 1546.', '085156061125', 75000, 'buktibayar/3ee96894b5e5312c538b1dec3e0b5434.jpg', 'Delivered'),
('TB004', 'Raihan', 'Anwar Arsyad Street', '085156061125', 75000, 'buktibayar/3ee96894b5e5312c538b1dec3e0b5434.jpg', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`id`, `nama`, `email`, `phone`, `subject`, `message`) VALUES
(6, 'Muhammad Raihan', 'mraihan.33.91.5112@gmail.com', '085156061125', 'Question About Your Product', 'Do you have blueberry, because i need blueberry for my food?'),
(7, 'Muhammad Raihan', 'mraihan.33.91.5112@gmail.com', '085156061125', 'Product Question', 'Do you have blueberry?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buah`
--
ALTER TABLE `tb_buah`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
