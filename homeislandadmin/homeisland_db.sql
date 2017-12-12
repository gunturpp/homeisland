-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 09:35 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeisland_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cakupan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `cakupan`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Princess', 'princess@gmail.com', '', '123456', NULL, NULL, NULL),
(4, 'rin', 'rin@gmail.com', 'daerah', '$2y$10$x/JY2as/2EyXSJJ26k6R3upmS3/7fGGBYMU0PHi1Dd1OrlNhHd.1S', NULL, '2017-12-12 00:41:57', '2017-12-12 00:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphone_number` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_line` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ig` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `foto_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `admin`, `judul`, `date_start`, `date_end`, `deskripsi`, `id_line`, `id_ig`, `web`, `lat`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(1, 'rin@gmail.com', 'Hinamatsuri', '', '', 'Festival untuk menyambut musim semi', '', '', '', '-62.5558330', '192.0098330', '../images/event/ct5vmK9JIXtJWyatAv7P096FHPD2zzCHzWJcw9r7.jpeg', '', '', '2017-12-12 04:56:20', '2017-12-12 04:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `explores`
--

CREATE TABLE `explores` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wisata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explores`
--

INSERT INTO `explores` (`id`, `admin`, `nama_wisata`, `foto`, `alamat`, `lang`, `long`, `created_at`, `updated_at`) VALUES
(1, 'rin@gmail.com', 'Kinkakuji', '../images/explore/JTlFl0C29iopyRD3dEech7i72fJMIdkOnNRbfbOK.jpeg', 'Kuil Emas (Kinkakuji)', '-6.5558330', '80.3971550', '2017-12-12 04:23:05', '2017-12-12 04:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `homestays`
--

CREATE TABLE `homestays` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_homestay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `kuota` int(11) NOT NULL,
  `lang` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `foto_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homestays`
--

INSERT INTO `homestays` (`id`, `nama_homestay`, `harga`, `kuota`, `lang`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(9, 'Le Palais Royal Mansion', '75000000.00', 3, '35.4178330', '80.3971550', '../images/homestay/MskMYthBOlx5fvFg8j9VZXAy3HHWMqfYEKLuVm4c.jpeg', '../images/homestay/gB1OgaOX5EuycgCB4YLNSnlzX2QziKsAi9JO0wsw.jpeg', '../images/homestay/D4MEgLRD3TT25zKp4AFWX54GA0BQceO08pAorMQF.jpeg', '2017-12-10 19:39:32', '2017-12-12 06:34:53'),
(13, 'Tamatsukuri Ryoukan', '900000.00', 3, '-62.5558330', '-98.1586110', '../images/homestay/5PkDVG9TI1NqAOP5E6X8AS8lniR50VFAstMGaDyN.jpeg', '../images/homestay/zDWbQR7JF28F7TCMzrla3LRvIMs0zkE6FE2mOG5D.jpeg', '../images/homestay/1iTAml8YUpjuE7ysMEgjHxo1VWCGaByDtiH1BgmU.jpeg', '2017-12-12 06:32:38', '2017-12-12 06:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 2),
(20, '2017_11_10_132100_create_admins_table', 3),
(21, '2017_11_16_122726_create_cruds_table', 4),
(22, '2017_12_05_104322_create_newss_table', 4),
(23, '2017_12_05_104344_create_events_table', 4),
(24, '2017_12_07_072050_create_souvenirs_table', 4),
(25, '2017_12_07_072447_create_explores_table', 4),
(26, '2017_12_07_201316_create_homestays_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `newss`
--

CREATE TABLE `newss` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newss`
--

INSERT INTO `newss` (`id`, `judul`, `foto`, `admin`, `deskripsi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tari Meteor', 'C:\\xampp\\tmp\\php643.tmp', 'Rinrin', 'berkumpul di alun alun pukul 20.00 jangan lupa memakai baju merah dan celana atau rok putih', NULL, '2017-12-10 16:02:04', '2017-12-10 18:10:00'),
(2, 'Akui Dance', 'C:\\xampp\\tmp\\php12B5.tmp', 'alama', 'alalala', NULL, '2017-12-10 18:11:55', '2017-12-10 18:14:25'),
(3, 'a', '../images/news/ryoukan 2.jpg', 'a', 'a', NULL, '2017-12-10 18:15:26', '2017-12-10 18:15:26'),
(4, 'a', '../images/news/ryoukan 2.jpg', 'a', 'a', NULL, '2017-12-10 19:42:10', '2017-12-10 19:42:10'),
(5, 'Tari Gir Giri', '../images/news/Firework Dance 2.jpg', 'rin@gmail.com', 'Giri Giri Aih', NULL, '2017-12-12 03:13:30', '2017-12-12 03:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `souvenirs`
--

CREATE TABLE `souvenirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_toko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_sale` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `foto_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `souvenirs`
--

INSERT INTO `souvenirs` (`id`, `admin`, `nama_toko`, `open_sale`, `alamat`, `lat`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(1, 'rin@gmail.com', 'Manekin-ya', '0000-00-00 00:00:00', 'Toko yang menjual Manekin', '-6.5558330', '133.0098330', '../images/souvenir/qpBLnLA2U1pqbkGMON1cReIw4D4fYLYaqBnXMUhu.jpeg', '', '', '2017-12-12 05:23:40', '2017-12-12 05:25:07'),
(2, 'rin@gmail.com', 'Waralaba', '2017-12-12 17:00:00', 'berlin', '42.4250000', '-98.1586110', '../images/souvenir/PiApcTSfSMMtsNE00eJt2hYXU74o3VW2qdnpyOl6.jpeg', '../images/souvenir/Ggl5H5H58MqdMMI8NgektCUbTVBZSWTphCafo82J.jpeg', '../images/souvenir/OnEE4HD5htnwZfTGis57OdvTBHgEMT6ky4cLcuue.jpeg', '2017-12-13 04:00:25', '2017-12-13 04:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphone_number` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cruds_email_unique` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explores`
--
ALTER TABLE `explores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestays`
--
ALTER TABLE `homestays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newss`
--
ALTER TABLE `newss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `souvenirs`
--
ALTER TABLE `souvenirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `explores`
--
ALTER TABLE `explores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homestays`
--
ALTER TABLE `homestays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `newss`
--
ALTER TABLE `newss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `souvenirs`
--
ALTER TABLE `souvenirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
