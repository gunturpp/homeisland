-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 09:18 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeisland`
--

-- --------------------------------------------------------

--
-- Table structure for table `explore`
--

CREATE TABLE IF NOT EXISTS `explore` (
  `id_wisata` int(20) NOT NULL,
  `nama_wisata` varchar(20) NOT NULL,
  `nama_kabupaten` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `explore`
--

INSERT INTO `explore` (`id_wisata`, `nama_wisata`, `nama_kabupaten`, `alamat`, `latitude`, `longitude`, `foto`) VALUES
(1, 'Pulau Bintan', 'pulau_bintan', 'Jalan Pulau Bintan, No.45, Kecamatan Suka Jaya, Batam, Kepulauan Riau', 1.21212, 0.99991, ''),
(2, 'Tanjung Pinang', 'tanjung_pinang', 'Jalan Cendrawasih, Tanjung pinang place, No. 24', 1.222, 1.222, ''),
(3, 'Natuna', 'natuna', 'natuna place', 1.222, 1.222, '66');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id_homestay` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `fasilitas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_homestay`, `id_kamar`, `fasilitas`) VALUES
(1, 1, 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `homestay`
--

CREATE TABLE IF NOT EXISTS `homestay` (
  `id_homestay` int(11) NOT NULL,
  `Nama_homestay` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `longt` float(10,6) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homestay`
--

INSERT INTO `homestay` (`id_homestay`, `Nama_homestay`, `lat`, `longt`, `foto1`, `foto2`, `foto3`) VALUES
(1, 'Homestay Pocut Baren', 6.597600, 106.799599, 'localhost/homeisland/foto/homestay/foto1.jpg', 'localhost/homeisland/foto/homestay/foto2.jpg', 'localhost/homeisland/foto/homestay/foto3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_homestay` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kuota` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_homestay`, `harga`, `kuota`, `tipe`) VALUES
(1, 1, 250000, 30, 'Premium'),
(2, 1, 200000, 50, 'Reguler');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(3, 'wira', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'tourist'),
(4, 'Ganteng', '256634c65c85aafc68225a8056f91ea3', 'tourist'),
(5, 'VitoZZZ', 'cf6ebf3453bf1877ee3f1dce7bd1ec19', 'President'),
(6, 'Shizuku', '76d80224611fc919a5d54f0ff9fba446', 'tourist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `explore`
--
ALTER TABLE `explore`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_homestay`,`id_kamar`,`fasilitas`);

--
-- Indexes for table `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`id_homestay`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explore`
--
ALTER TABLE `explore`
  MODIFY `id_wisata` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `homestay`
--
ALTER TABLE `homestay`
  MODIFY `id_homestay` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
