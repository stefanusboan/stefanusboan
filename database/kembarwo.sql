-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 04:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kembarwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `fotogaleri_id` int(11) NOT NULL,
  `judul_foto` text NOT NULL,
  `keterangan` text NOT NULL,
  `foto_galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`fotogaleri_id`, `judul_foto`, `keterangan`, `foto_galeri`) VALUES
(3, 'bbb', '<p>ccc<br></p>', '7b9cc55a646a2f89998436757a9cef2d.jpg'),
(4, 'ddd', '<p>ddd<br></p>', '0d4940bb60b3dc4bac630a87ebcd6e21.png'),
(5, '-', '<p>-</p>', 'a6c86c0467a92f32abea17c985c1777d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Pernikahan'),
(2, 'Serah Serahan'),
(6, 'Foto Prewedding');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `kategori_id` varchar(45) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `kategori_id`, `nama_produk`, `harga`, `deskripsi`, `gambar`, `created_on`) VALUES
(1, '1', 'Jasa WO Middle Class', '70000000', 'Jasa Wedding Organizer Middle Class Terjangkau', '0957c0ab0bebf247a5188cbf447a21b8.jpg', '2021-06-15 11:54:32'),
(3, '1', 'Jasa WO High Class Hotel Novotel', '10000000', 'Wedding Organizer Di Hotel Novotel', '201721b10fae5481ebf802aab2137265.jpg', '2021-06-15 12:06:04'),
(9, '2', 'Serah Serahan', '30000000', 'Serah Serahan', '78e230b95b2cb42d5a95428defdf004c.jpg', '2021-06-15 13:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `produk_id` varchar(45) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `waktu` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL,
  `status` enum('1','0','2') DEFAULT '0' COMMENT '2 kembali',
  `bukti` text DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `waktubooking` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `user_id`, `produk_id`, `tanggal`, `waktu`, `harga`, `status`, `bukti`, `created_on`, `waktubooking`) VALUES
(40, '13', '1', '2021-09-09', '1', '70000000', '1', '3f6f1e59c206c8c6387e54fdfff3537a.jpg', '2021-07-09 14:58:06', 1625817486),
(42, '13', '3', '2000-03-03', '1', '10000000', '0', NULL, '2021-07-11 20:14:29', 1626009269),
(43, '13', '1', '2021-03-03', '1', '70000000', '0', NULL, '2021-07-11 20:18:49', 1626009529),
(44, '14', '1', '2022-12-18', '1', '70000000', '0', NULL, '2022-12-13 15:12:25', 1670919145),
(45, '15', '1', '2022-12-18', '1', '70000000', '1', '6cc229201b782613aba8a4aa7c1a7f82.jpeg', '2022-12-14 10:04:58', 1670987098);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nama_lengkap` varchar(60) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` text NOT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `level` enum('0','1') DEFAULT '1',
  `alamat` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `nama_lengkap`, `username`, `email`, `notelp`, `level`, `alamat`) VALUES
(8, 'admin', 'admin', 'admin', 'admin@gmail.com', '08988387271', '0', 'Jakarta'),
(13, 'taufik', 'taufik', 'taufik', 'taufik@gmail.com', '08988387271', '1', 'palembang'),
(14, 'sugeng', 'Sugeng', 'sugeng', 'sugeng@gmail.com', '084912849214', '1', 'Jl. Palembang'),
(15, 'yanto', 'Yanto Udin', 'yanto', 'yanto@gmail.com', '08491294912', '1', 'Jl. Palembang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`fotogaleri_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `fotogaleri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
