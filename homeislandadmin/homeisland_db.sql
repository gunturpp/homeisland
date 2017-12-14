-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Des 2017 pada 18.46
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cakupan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `cakupan`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kota1', 'kota1@gmail.com', 'daerah', '$2y$10$NLzySWwhOLN22civFI9mTuEzcbs1o1lNbklFjHEjLdFcpRYlU75kS', NULL, '2017-12-08 02:05:25', '2017-12-08 02:05:25'),
(2, 'kota2', 'kota2@gmail.com', 'daerah', '$2y$10$2N5p6HrnaWoWuaej/4jyFuMKGEQlm5g36wNYVTTj0ILr.kFrnNFPK', NULL, '2017-12-08 02:06:06', '2017-12-08 02:06:06'),
(3, 'kota33', 'kota33@gmail.com', 'daerah', '$2y$10$ETL2hBXsJp1Wph9Z/iWPJuklJK2jG3NRQDSVRLI4PlqAtk6.KxdIi', NULL, '2017-12-11 09:06:07', '2017-12-11 09:06:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `jenis_bank` varchar(11) NOT NULL,
  `id_homestay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banks`
--

INSERT INTO `banks` (`id`, `no_rekening`, `jenis_bank`, `id_homestay`) VALUES
(1, '123456789', 'BNI', 'bintan homestay');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_homestay` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_checkin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum_menginap` int(11) NOT NULL,
  `sum_room` int(11) NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_homestay` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `kode_booking`, `total_price`, `nama_pemesan`, `nama_homestay`, `date_checkin`, `sum_menginap`, `sum_room`, `id_user`, `id_homestay`, `status`, `created_at`, `updated_at`) VALUES
(1, '0', '100000', '', '', '', 0, 0, 'mobile@gmail.com', '1', 1, NULL, NULL),
(2, '7de22c57d3', '100000', '', '', '', 0, 0, 'mobile@gmail.com', 'bintan homestay', 1, '2017-12-13 07:19:02', '2017-12-13 07:19:02'),
(3, 'athenabfe7', '200000', '', '', '', 0, 0, 'mobile@gmail.com', 'bintan homestay', 0, '2017-12-13 07:22:41', '2017-12-13 07:22:41'),
(4, 'athenaea2b', '200000', 'mobile', 'bintan homestay', '11 Januari 2017', 4, 3, 'mobile@gmail.com', 'bintan homestay', 0, '2017-12-13 10:23:25', '2017-12-13 10:23:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cruds`
--

CREATE TABLE `cruds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphone_number` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cruds`
--

INSERT INTO `cruds` (`id`, `name`, `email`, `admin`, `password`, `handphone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'gppratama17@gmail.com', '', '11111111', 11111111, NULL, '2017-12-09 09:28:46', '2017-12-09 09:28:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_line` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ig` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `foto_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `admin`, `judul`, `date_start`, `date_end`, `deskripsi`, `id_line`, `id_ig`, `web`, `lat`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(2, 'rin@gmail.com', 'Inari Matsuri IPB', '08/12/2017', '09/12/2017', 'Inari Matsuri adalah sebuah event Jepang pertama yang diadakan oleh komunitas Inari yang merupakan sebuah komunitas jepang terbesar di IPB', '@vito', NULL, NULL, '-6.5577420', '106.7299630', '../images/event/KOrkaXKYWG48v7eY1rY1zpYuguLiK2FLVvG6wROF.jpeg', '../images/event/lhoH646L76IbA96UMo3QW4walaAS8ZBijYfEUAtB.jpeg', '../images/event/fZOcZ91SjLtlMoWQsCRrwWL7Lvus1UfGyWjcnVkH.jpeg', '2017-12-13 05:21:21', '2017-12-13 05:31:11'),
(3, 'rin@gmail.com', 'Pekan Olahraga SMA Kornita', '15/12/2017', '16/12/2017', 'Pekan Olahraga ajang adu sportivitas SMA Kornita IPB', '@KornitaIPB', '@Kornitaipb', 'www.Kornita.ipb.ac.id', '-6.5552160', '106.7280960', '../images/event/GHZKHyI5KUxjtDXCoft51vgHO3ZYqi9l69VRP9ui.jpeg', '../images/event/RIdFPMnqXV5tBhtopU4m2op7tUy4q82wnvyz5xRO.jpeg', '../images/event/vVUG5afFhayIH47hxUW8FVH227OVds5BtdP9nddN.jpeg', '2017-12-13 05:38:12', '2017-12-13 05:38:12'),
(4, 'rin@gmail.com', 'Islamic Book Fair', '13/12/2017', '15/12/2017', 'Sebuah acara fair yang bekerjasama dengan Lembaga mesjid alhuriyah', '@Islamic', NULL, NULL, '106.7263040', '-6.5553550', '../images/event/i7se5oEuxldosH2csEPrcfF5i7nK3vdB412EGaUr.jpeg', '../images/event/CM51MnlEhBGUy9eV74qw8LUzreUU9HUs1HTkUzY2.jpeg', '../images/event/J9dxKB4fDJWOfSMOSJPejgpC7c2AkxEHihwfAnYQ.jpeg', '2017-12-13 05:43:36', '2017-12-13 05:43:36'),
(5, 'rin@gmail.com', 'Seminar Nasional FPIK', '20/12/2017', '23/12/2017', 'Seminar tahunan membahas kemajuan teknologi dibidang perairan dan perikanan', '@FPIKNasional', NULL, NULL, '106.7242980', '-6.5568580', '../images/event/uqkrKzFv2zB3gHRzAIYER8Kbmgnfv5MP0jHxBJPg.jpeg', '../images/event/qscfWReqAF9IatIRVGwqN3qgdMlDbg0F579eQbI9.jpeg', '../images/event/MgGIvsEdD7WkBPX299rYfdAVyLYmRPLaDgnQ7gKE.jpeg', '2017-12-13 05:48:10', '2017-12-13 05:48:10'),
(6, 'rin@gmail.com', 'Seminar Nasional Kedokteran hewan', '24/12/2017', '24/12/2017', 'Seminar Nasional bertemakan perlindungan kepada hewan melata yang terancam punah', '@Seminamal', NULL, NULL, '106.7200920', '-6.5564740', '../images/event/vdDNpAw08vzYoj8h7TdiaqIWOdSSCm7DYcPhrKPq.jpeg', '../images/event/GVAI16twQS4Ng5uGGT7OOhVoKpjIqy28g0s9Z892.jpeg', '../images/event/tKv8oyuGU1OFklkjw8Jt5iqFsiPewzzPuDTPlGa9.jpeg', '2017-12-13 05:54:40', '2017-12-13 05:54:40'),
(7, 'rin@gmail.com', 'Pengangkatan rektor baru IPB', '28/12/2017', '29/12/2017', 'Pengangkatan bpk. hery sebagai ketua himalkom', '@rektorq', NULL, NULL, '106.7255530', '-6.5598210', '../images/event/vtq9M6HJmswPIa7UO2OjrQDj1LwmWf2AZbpbg5ll.jpeg', '../images/event/vlxKzcTOorAlXoWTzrM9pxKCf65wv3VI81RCyUvR.jpeg', '../images/event/J9GIMVvZQG0JVhHE2q4j1Y3ZWT8Q4RaHagEh0la2.jpeg', '2017-12-13 06:00:07', '2017-12-13 06:00:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `explores`
--

CREATE TABLE `explores` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tempat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_sale_hour` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_sale_minute` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_sale_hour` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_sale_minute` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `foto_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `explores`
--

INSERT INTO `explores` (`id`, `admin`, `kabupaten`, `category`, `nama_tempat`, `open_sale_hour`, `open_sale_minute`, `close_sale_hour`, `close_sale_minute`, `alamat`, `lat`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(1, 'rin@gmail.com', 'Bintan', 'Food', 'Kolam Percobaan FPIK', '08', '00', '15', '00', 'Babakan, Dramaga, Kota Bogor, Jawa Barat 16680', '-6.5586030', '106.7228380', '../images/explore/McFC1l1fxVo2Tn83sI6OXfuc3GOgn1LE7XJX3TIu.jpeg', '../images/explore/e5QZXGZ7RObEbSw3JkYKVtPMn6J0gbFapZXjZxUo.jpeg', '../images/explore/QSXfvA3XdDerAhO2IKO1zrcz5pV8WVKaliNYpRRO.jpeg', '2017-12-13 17:52:03', '2017-12-13 18:28:17'),
(2, 'rin@gmail.com', 'Bintan', 'Recreation', 'Kolam Percobaan FPIK', '06', '30', '12', '00', 'Babakan, Dramaga, Kota Bogor, Jawa Barat 16680', '-6.5586780', '106.7222320', '../images/explore/C6BFPEREBTKHNFm2azzstm9mZbDzNiEOPft2a9Sa.jpeg', '../images/explore/oZ54EkUTVrEApWgbmeubaTs8lAfOS5iVW8D3ytTb.jpeg', '../images/explore/bLYmuVFW9HJNP2KqcT5IKJdkwKzca4Je4yw1tdOx.jpeg', '2017-12-13 18:21:27', '2017-12-13 18:21:27'),
(3, 'rin@gmail.com', 'Tanjung Pinang', 'Food', 'Kantin Fakultas Peternakan IPB', '08', '00', '15', '00', 'Jalan Agatis Kampus IPB Darmaga, Dramaga, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5578630', '106.7229120', '../images/explore/HLeTLBNT37dTT5Ldv2wRKz3meCcv89mJfMCLjeKn.jpeg', '../images/explore/wlZ1YWasJKoM0S177Ry0lrEFCiObFYplFjBYkjAd.jpeg', '../images/explore/Dbs2alfvnKDKlYraUokf0uJ2lPgsAXT8Xi9lD7X6.jpeg', '2017-12-13 18:47:04', '2017-12-13 18:47:04'),
(4, 'rin@gmail.com', 'Tanjung Pinang', 'Recreation', 'Kantin Fakultas Peternakan IPB', '06', '00', '13', '30', 'Jalan Agatis Kampus IPB Darmaga, Dramaga, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5578630', '106.7229120', '../images/explore/8RfxCNc6lc6qBvECx7q11OOTCFQWEIc3fGsNlb09.jpeg', '../images/explore/gKeSkQHHFYR14ZuTDX80reD4C0NYTG4Lwc7X98it.jpeg', '../images/explore/NNDMPn9iiu0P2b2sWMuVB7euOhFdYV9lsZicQ6hw.jpeg', '2017-12-13 18:50:54', '2017-12-13 18:50:54'),
(5, 'rin@gmail.com', 'Natuna', 'Food', 'Rumah Sakit Hewan FKH', '08', '00', '14', '30', 'Kampus IPB Dramaga, Jl. Pajajaran Raya, Bantarjati, Bogor Utara, Babakan, Dramaga, Kota Bogor, Jawa Barat 16680', '-6.5566000', '106.7199780', '../images/explore/5VToXLpeP8CaJNG3B7fdmu2UfbpsoWj7y1mAa7Sx.jpeg', '../images/explore/wmBoZmCwyuk176PuujGhMtb4jJi899tzoILMyI50.jpeg', '../images/explore/imyp3LESquPDheaZW0GiwsOg5ZuXTQJUX5hJDZcl.jpeg', '2017-12-13 18:56:20', '2017-12-13 18:56:20'),
(6, 'rin@gmail.com', 'Natuna', 'Recreation', 'Rumah Sakit Hewan FKH', '08', '00', '14', '30', 'Kampus IPB Dramaga, Jl. Pajajaran Raya, Bantarjati, Bogor Utara, Babakan, Dramaga, Kota Bogor, Jawa Barat 16680', '-6.5566000', '106.7199780', '../images/explore/GeL1fDw96vIgUVWlwOiccfcBGaijrsiFAbVdHxso.jpeg', '../images/explore/im8acOaSGjmtUqyhi1rpMSwwEzQvn5NxYUy22vW2.jpeg', '../images/explore/X1ixhgOoVaugugRK7o4Mh6QFIOSZwGnEl2Y4tuVn.jpeg', '2017-12-13 18:57:58', '2017-12-13 18:57:58'),
(7, 'rin@gmail.com', 'Karimun', 'Food', 'Kantin FEM', '08', '00', '15', '30', 'Jl. Agatis Kampus IPB Darmaga, Bogor, Babakan, Dramaga, Bogor, West Java 16680', '-6.5593230', '106.7232880', '../images/explore/XAD3dinR8gucmlDjOFC3FtMdpDMWApYrx7lCs9k6.jpeg', '../images/explore/eAysOKoG6kFlgdfuTFtVX7R9V3ZqmfC3YVPOyYuL.jpeg', '../images/explore/jgLwq9rEBqYAOWVg5img4Lt2HdQGo0YMwKv3ctmK.jpeg', '2017-12-13 19:04:23', '2017-12-13 19:04:23'),
(8, 'rin@gmail.com', 'Karimun', 'Recreation', 'Kantin FEM', '06', '30', '14', '30', 'Jl. Agatis Kampus IPB Darmaga, Bogor, Babakan, Dramaga, Bogor, West Java 16680', '-6.5593230', '106.7232880', '../images/explore/iJwIwCbh77tCsKqApk685ih4lmyQGmiNtvHkORJ0.jpeg', '../images/explore/Aw9YWf2NdR0FwdnDkHeQA7E2CMxkgLNpZfkANRLB.jpeg', '../images/explore/AqmIG1DeMrhAkltI2LWWKDemlQkJLVlCGUdg25Bz.jpeg', '2017-12-13 19:06:03', '2017-12-13 19:06:03'),
(9, 'rin@gmail.com', 'Anambas', 'Food', 'Zea Mays', '10', '30', '20', '00', 'Gedung Andi Hakim Nasution, Jalan Institut Pertanian Bogor, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5594350', '106.7252350', '../images/explore/8Obq3UMKSi5yBhHcTAAU8s1m9RUy0A6p8ePQxfIK.jpeg', '../images/explore/dLQQgy5zlpZEEL0oxwtEMfe8CTxhpIBlSnpy7AXI.jpeg', '../images/explore/BpdZdAPdv5Dl6FzHzhPE80waWXsqzuAL52hbyMyP.jpeg', '2017-12-13 19:10:19', '2017-12-13 19:10:19'),
(10, 'rin@gmail.com', 'Anambas', 'Recreation', 'Zea Mays', '06', '30', '19', '30', 'Gedung Andi Hakim Nasution, Jalan Institut Pertanian Bogor, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5594300', '106.7252460', '../images/explore/zEeGlu8BvYw5WamRoVkFjPuxENS73QixlFfTC3DT.jpeg', '../images/explore/wZ3DNVDo9aomKv0uVrKoPZUXdcolKkLmCzgWdQQX.jpeg', '../images/explore/uX2Vs1BY8sOHFIp009Ic5hMee5TBVK0kIhFpCJph.jpeg', '2017-12-13 19:11:54', '2017-12-13 19:11:54'),
(11, 'rin@gmail.com', 'Lingga', 'Food', 'Danau LSI IPB', '08', '00', '14', '00', 'Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5592810', '106.7265120', '../images/explore/09V7oxI1HMDKYPhBuSRQIgp8q0rI8Rqqpsy6MxBF.jpeg', '../images/explore/1308UJBUFJydTjNqOFpmy32IrXPPd8TuJMfpVVZE.jpeg', '../images/explore/TMU7dNpXvr21SyxBha8w2YrRZZWuUjqYgiGSsA0B.jpeg', '2017-12-13 19:15:19', '2017-12-13 19:15:19'),
(12, 'rin@gmail.com', 'Lingga', 'Recreation', 'Danau LSI IPB', '08', '00', '15', '30', 'Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5592490', '106.7265760', '../images/explore/3H6GbdRpYXthXn9P93Rfirh5EP8gQbG4rNGj6DLg.jpeg', '../images/explore/tJn2g25Srz30pdGSFrhjLaMLZu3ao6a4bprdv2hq.jpeg', '../images/explore/xuWU8pTMdKXsxWTJeDQLnxhKE5zML1g58lrhTBQd.jpeg', '2017-12-13 19:17:03', '2017-12-13 19:17:03'),
(13, 'rin@gmail.com', 'Batam', 'Food', 'Seafast Center', '06', '30', '20', '30', 'Jl. Ulin No. 1 Gedung SEAFAST Center, Kampus IPB Darmaga, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5577190', '106.7273480', '../images/explore/XNnYVlYM7aIyL6qb5v2e0SnG2rD5QDKahPEh6x4H.jpeg', '../images/explore/xhMxOV6P3vGzFIkZEOjxQpZChnPjW3Se1JogCShR.jpeg', '../images/explore/YqHkUJCbuGIANtdVjiEqoCh11XY90Ra4eDMizEpG.jpeg', '2017-12-13 19:20:51', '2017-12-13 19:20:51'),
(14, 'rin@gmail.com', 'Batam', 'Recreation', 'Seafast Center', '06', '00', '20', '30', 'Jl. Ulin No. 1 Gedung SEAFAST Center, Kampus IPB Darmaga, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5577830', '106.7275090', '../images/explore/ZdYHgJ6vwFx1TRf0Vk4lv0T9RQKPUde24oalp3kv.jpeg', '../images/explore/0SvFDvqbZ3OkMR6GfuNotrl9SaDWkzQWztzF9iHI.jpeg', '../images/explore/udcO2nwJDtO8psAjuKWmtqUDXh6C3in2ytxqFo4k.jpeg', '2017-12-13 19:22:24', '2017-12-13 19:22:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilitiess`
--

CREATE TABLE `facilitiess` (
  `id` int(10) UNSIGNED NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `parkir` tinyint(1) NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `receptionist` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorites`
--

CREATE TABLE `favorites` (
  `id` int(2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `homestays`
--

CREATE TABLE `homestays` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_homestay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `no_rek` int(25) NOT NULL,
  `kuota` int(3) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `long` decimal(10,7) NOT NULL,
  `foto_1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `homestays`
--

INSERT INTO `homestays` (`id`, `admin`, `kabupaten`, `nama_homestay`, `price`, `no_rek`, `kuota`, `id_fasilitas`, `id_rating`, `address`, `lat`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(5, 'rin@gmail.com', 'Bintan', 'Silva Pinus IPB', '750000.00', 0, 2, 3, 3, 'Jalan Rasamala No.04 Kampus IPB Dramaga Bogor, Jawa Barat 16680, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5541970', '106.7228800', '../images/homestay/DQS5kOUjXZfcig9PLshxt42KA6QRdz70050VmhPg.jpeg', '../images/homestay/yNALIRZ8xpob7TFoOyBjCFBMlmoXXmJrjrXXpwU2.jpeg', '../images/homestay/264qRGCfdLeTv95NuU0GlggCO5TTIZyw371LuZoR.jpeg', '2017-12-13 23:54:44', '2017-12-13 23:54:44'),
(6, 'rin@gmail.com', 'Tanjung Pinang', 'Perumahan Dosen', '600000.00', 0, 3, 5, 4, 'Dramaga, Babakan, Bogor, Jawa Barat', '-6.5528540', '106.7206370', '../images/homestay/JwrTbb2keGGHzs91I5YRm7QCPMenesO3GD83BaHE.jpeg', '../images/homestay/ybesVKV0ogweu1VYqOoPRnsmH85WBTEp6zoOs22D.jpeg', '../images/homestay/mTzAQuLEzd81qXSWcz08YgD81TR6Z8kR3mkkbMxb.jpeg', '2017-12-14 00:06:14', '2017-12-14 00:06:14'),
(7, 'rin@gmail.com', 'Natuna', 'Rumah Rusa', '2500000.00', 0, 10, 4, 3, 'Jl. Lengkeng No.1A, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5502320', '106.7201540', '../images/homestay/qxHp07rNAvd9hdWSsAsp3JPzN7BTIJVwrDRkvJLM.jpeg', '../images/homestay/TAS5oeJmZNntw9qVU4TiAQHMLd5mSfklGqEWTBTZ.jpeg', '../images/homestay/f8smy3lL6HrYk1feta5wUqwHBledroGXv0Nvdxj6.jpeg', '2017-12-14 00:08:07', '2017-12-14 00:08:07'),
(8, 'rin@gmail.com', 'Karimun', 'Rumah Tahfidzh', '500000.00', 0, 4, 5, 3, 'Jl. Lengkeng No.14, Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5485480', '106.7188450', '../images/homestay/ynamnrcRtwsYGMYYf1VSg7mNiBXssXIHfWQvuk2D.jpeg', '../images/homestay/KHd18I4fGDRwr0YGFr6OEgERMjTsY5xzStgV2jUB.jpeg', '../images/homestay/BLr5zWnzNYKe3h4nlnxRCj1FKoegcjD3J81PDnDR.jpeg', '2017-12-14 00:09:50', '2017-12-14 00:09:50'),
(9, 'rin@gmail.com', 'Anambas', 'Camping Ground', '800000.00', 0, 5, 4, 4, 'Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5469380', '106.7180290', '../images/homestay/oLotH3ietQshWDURss4p8YrZKMp9oIaH9fr8HAOj.jpeg', '../images/homestay/AUeXTSIbbQL4jlcofXr5MIPATdxawsIb2qMDb7L8.jpeg', '../images/homestay/EMviXwClIu1tJaRuXH55VKZOrR00anHldn2XQT6u.jpeg', '2017-12-14 00:11:28', '2017-12-14 00:11:28'),
(10, 'rin@gmail.com', 'Lingga', 'Rumah Satwa', '575000.00', 0, 4, 3, 4, 'Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5452430', '106.7155720', '../images/homestay/cKyBEKYGZXT4us0P5rnRMgGkllx6dLfsFLzWmmvr.jpeg', '../images/homestay/taoZzS8sMQFJgN5iAfStv8Q1cyzqRgg7C1RcI4Qh.jpeg', '../images/homestay/lROhkdTOXhggyydwyXqjztL8bQlTtn6uCpGLFPAA.jpeg', '2017-12-14 00:13:37', '2017-12-14 00:13:37'),
(11, 'rin@gmail.com', 'Batam', 'Green House', '9500000.00', 0, 19, 12, 5, 'Babakan, Dramaga, Bogor, Jawa Barat 16680', '-6.5509990', '106.7147030', '../images/homestay/pfc4CVSHKO5jC0laxTSk5wRrMkZ9q4eN0qP9QWYt.jpeg', '../images/homestay/26RbLTHI4Tj3MnHpbw8Xig70k9HFc4CPwm0v4M3m.jpeg', '../images/homestay/nUfuvXt4XkqvAr4nViYy3WY0moVm5Q0Uqkgb83fZ.jpeg', '2017-12-14 00:15:29', '2017-12-14 00:15:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_10_132100_create_admins_table', 1),
(4, '2017_11_16_122726_create_cruds_table', 1),
(5, '2017_12_05_104322_create_newss_table', 1),
(6, '2017_12_05_104344_create_events_table', 1),
(7, '2017_12_07_072050_create_souvenirs_table', 1),
(8, '2017_12_07_072447_create_explores_table', 1),
(9, '2017_12_07_183016_create_homestays_table', 1),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(13, '2016_06_01_000004_create_oauth_clients_table', 2),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(15, '2017_12_11_205320_create_homestays_table', 3),
(16, '2017_12_11_213628_create_reviews_table', 4),
(17, '2017_12_11_214001_create_bookings_table', 4),
(18, '2017_12_12_194540_create_ratings_table', 5),
(19, '2017_12_12_195101_create_facilitiess_table', 6),
(20, '2017_12_12_202059_create_bookings_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newss`
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
-- Dumping data untuk tabel `newss`
--

INSERT INTO `newss` (`id`, `judul`, `foto`, `admin`, `deskripsi`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Seminar FPIK', '../images/news/DjZDTgLNkGEu1KSWaI0evo2uwI9yWDaKJ1v7fTP4.jpeg', 'rin@gmail.com', 'Seminar nasional diadakan di FPIK disambut sangat meriah dan mendapat banyak pujian dari berbagai kalangan', NULL, '2017-12-13 06:20:10', '2017-12-13 06:20:10'),
(7, 'Seminar Veteriner', '../images/news/1TxlhwkdJ01w31dgb2QSvPA3ihEn3tmYbZKnFkkb.jpeg', 'rin@gmail.com', 'Seminar Nasional yang dikhususkan untuk perlindungan hewan mendapat banyak perhatian dunia', NULL, '2017-12-13 06:21:11', '2017-12-13 06:21:11'),
(8, 'Inari Matsuri', '../images/news/DCtiF7BB659DIhsG0dKwJ7mw4ioTjTeyZtnaeMDw.jpeg', 'rin@gmail.com', 'Sebuah event perdana yang diselenggarakan oleh komunitas Inari IPB', NULL, '2017-12-13 06:22:15', '2017-12-13 06:22:15'),
(9, 'FOS Kornita', '../images/news/SdpU4LqUA6n4dQle7FYbWxiFpgW8DZLlvlaaspOH.jpeg', 'rin@gmail.com', 'FOS atau Festival Olahraga adalah sebuah acara festival kornita untuk mempererat tali persaudaraan', NULL, '2017-12-13 06:23:47', '2017-12-13 06:23:47'),
(10, 'Firework Dance', '../images/news/6AZHqxjLUXFDmXiJBDuxjulxaatZoLLDIOKEit7i.jpeg', 'rin@gmail.com', 'sebuah tarian untuk memperlihatkan kekuatan seorang lelaki', NULL, '2017-12-13 06:24:49', '2017-12-13 06:24:49'),
(11, 'Tari Gir Giri', '../images/news/fAw4Q3ozCvPsO7X2h57zfaqijWubVS3TniVWEbUk.jpeg', 'rin@gmail.com', 'Sebuah tari perayaan musim panen padi', NULL, '2017-12-13 06:25:37', '2017-12-13 06:25:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('470c406b8a05348e8c57ccc4cb802f554ee47e708f4f6271f63ac62789e13741122b97e1ee18ff29', 1, 1, 'MyApp', '[]', 0, '2017-12-11 03:07:39', '2017-12-11 03:07:39', '2018-12-11 10:07:39'),
('53d0ec860dbb275a3327dfe43a9ee3574a1cdcdaf6a6740145780f9e95b7ea9067ba2a07f1bf99c8', 1, 3, 'MyApp', '[]', 0, '2017-12-12 21:10:26', '2017-12-12 21:10:26', '2018-12-13 04:10:26'),
('611399973e804f1f87e3ea37157bc8ae2a2a3ba2e38098d515c8e63fc40452cdf342ced7d319a804', 5, 3, 'MyApp', '[]', 0, '2017-12-11 12:16:54', '2017-12-11 12:16:54', '2018-12-11 19:16:54'),
('66aabd958967987c39da8b70f39effaff26d9906c87f0e84b9f2f7ecc5c2b1982fca93c5ad79dc70', 1, 1, 'MyApp', '[]', 0, '2017-12-11 03:04:48', '2017-12-11 03:04:48', '2018-12-11 10:04:48'),
('8ee26abb72da0d511edceea9390306f7285d76a70056f58b42ab1c10ddcabff9d38a3a95d715ce8e', 5, 3, 'MyApp', '[]', 0, '2017-12-11 21:08:30', '2017-12-11 21:08:30', '2018-12-12 04:08:30'),
('8f70f10031ac74e83c66e7d04634d4636b473a2d39583265bea5b1a9dd4cb58437fa044593bc02a0', 5, 3, 'MyApp', '[]', 0, '2017-12-11 21:03:38', '2017-12-11 21:03:38', '2018-12-12 04:03:38'),
('8fe3686ee064f5f41a7cc6fb01844b8b73a8480d3322f8e2693377caf78fb249743a3c0297ce419d', 1, 1, 'MyApp', '[]', 0, '2017-12-11 03:00:07', '2017-12-11 03:00:07', '2018-12-11 10:00:07'),
('92ec9548310ebb83ccd914aff2471c85f45d0822ae68f3bd8b8769f31304ae9fe8791fa374e9cf19', 1, 1, 'MyApp', '[]', 0, '2017-12-11 03:16:01', '2017-12-11 03:16:01', '2018-12-11 10:16:01'),
('a5bcc376f8273029d1024bde2e9d17f37820e3213f7e7f858ab09cb34ae0c0e65d6e3f597b1a1595', 1, 3, 'MyApp', '[]', 0, '2017-12-12 14:52:31', '2017-12-12 14:52:31', '2018-12-12 21:52:31'),
('ac70b659aeb054b3bfe16f828a81b56b064170e32d6322b4b67dc59d5dcb65ed37bb390cb076fa37', 1, 3, 'MyApp', '[]', 0, '2017-12-12 19:40:58', '2017-12-12 19:40:58', '2018-12-13 02:40:58'),
('acde58f3f131fa9c62e5c8e24ee17473e5743c4027b543795c9ab2a209677b20aefac267fd79c242', 3, 3, 'MyApp', '[]', 0, '2017-12-11 12:11:57', '2017-12-11 12:11:57', '2018-12-11 19:11:57'),
('b0103b1614928462469bc8ab89a4945e48d9b6a85702a06bbadbc51b69121cff3fc8c1ef64f8869b', 6, 3, 'MyApp', '[]', 0, '2017-12-13 07:50:04', '2017-12-13 07:50:04', '2018-12-13 14:50:04'),
('bdf87f832adc45336542d29c69697df75f2370770010d889d0de2f2fd1361c6b2af16a0625cc8288', 1, 3, 'MyApp', '[]', 0, '2017-12-13 07:14:56', '2017-12-13 07:14:56', '2018-12-13 14:14:56'),
('d31e139986db0b619dca05a4a531728230af17cd82ba0cad0a1772f0d187422878a4a52e9e7bc479', 1, 3, 'MyApp', '[]', 0, '2017-12-11 10:59:43', '2017-12-11 10:59:43', '2018-12-11 17:59:43'),
('d885c5b0a253dc1d549cb7fbb3fb9f53ab705646fdcb80574b474e847abf7a4f9efbb7a761165b5d', 5, 3, 'MyApp', '[]', 0, '2017-12-11 12:16:25', '2017-12-11 12:16:25', '2018-12-11 19:16:25'),
('f2cab9f415037bad74401b750ec6ff2228e2fa206703c74343aa08b687d4c200ac7f18ed0979c04f', 5, 3, 'MyApp', '[]', 0, '2017-12-11 21:08:12', '2017-12-11 21:08:12', '2018-12-12 04:08:12'),
('fea86897c53f3c67d51af600f81f4d20f002ba46fca9e08a618993b15337e2de58bf31cebe496141', 1, 3, 'MyApp', '[]', 0, '2017-12-13 02:24:50', '2017-12-13 02:24:50', '2018-12-13 09:24:50'),
('ffbcd4300b81dba6d4af8bcd3fcf4a1b06d0f851bf97777340999b4fdb91b22132158879c47b839c', 1, 3, 'MyApp', '[]', 0, '2017-12-11 10:46:25', '2017-12-11 10:46:25', '2018-12-11 17:46:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'fXiy4yBAUvKmtyrylqA0l7AKf4pdFt7OhVW0wt3M', 'http://localhost', 1, 0, 0, '2017-12-11 00:31:11', '2017-12-11 00:31:11'),
(2, NULL, 'Laravel Password Grant Client', 'RGcnJtsCL3p1s796AYvTMzEWtfwZOZUDaLfyWe4u', 'http://localhost', 0, 1, 0, '2017-12-11 00:31:11', '2017-12-11 00:31:11'),
(3, NULL, 'Laravel Personal Access Client', '3uc3kWaQ5GWkrOp2njpmxWJfgE18dHwtaDbFttp9', 'http://localhost', 1, 0, 0, '2017-12-11 10:46:12', '2017-12-11 10:46:12'),
(4, NULL, 'Laravel Password Grant Client', 'xMAunHUtT70Gij4LHAe32pKpm57IM3MlIhefrG7O', 'http://localhost', 0, 1, 0, '2017-12-11 10:46:13', '2017-12-11 10:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-11 00:31:11', '2017-12-11 00:31:11'),
(2, 3, '2017-12-11 10:46:12', '2017-12-11 10:46:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_homestay` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id`, `id_user`, `id_homestay`, `rating`, `comment`, `hide`, `created_at`, `updated_at`) VALUES
(1, 'mobile@gmail.com', 4, 3, 'hahah', 0, NULL, NULL),
(2, 'mobile2@gmail.com', 4, 2, 'keren', 0, NULL, NULL),
(3, 'mobile@gmail.com', 5, 4, 'hahah', 0, NULL, NULL),
(4, 'mobile2@gmail.com', 5, 5, 'keren', 0, NULL, NULL),
(5, 'mobile@gmail.com', 4, 3, 'keren banget kamarnya', 0, '2017-12-13 10:26:07', '2017-12-13 10:26:07'),
(6, 'mobile2@gmail.com', 5, 5, 'keren', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `result_avg`
--

CREATE TABLE `result_avg` (
  `id` int(11) NOT NULL,
  `id_homestay` int(11) NOT NULL,
  `average` decimal(12,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `result_avg`
--

INSERT INTO `result_avg` (`id`, `id_homestay`, `average`) VALUES
(1, 4, '3.5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_homestay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_homestay`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'mobile@gmail.com', '4', 'Artikel adalah karangan faktual secara lengkap dengan panjang tertentu yang dibuat untuk dipublikasikan (melalui koran, majalah, buletin, dsb) dan bertujuan menyampaikan gagasan dan fakta yang dapat meyakinkan, mendidik, dan menghibur.', '2017-12-11 17:00:00', '2017-12-11 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `souvenirs`
--

CREATE TABLE `souvenirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_toko` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_sale_hour` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_sale_minute` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_sale_hour` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_sale_minute` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Dumping data untuk tabel `souvenirs`
--

INSERT INTO `souvenirs` (`id`, `admin`, `nama_toko`, `open_sale_hour`, `open_sale_minute`, `close_sale_hour`, `close_sale_minute`, `alamat`, `lat`, `long`, `foto_1`, `foto_2`, `foto_3`, `created_at`, `updated_at`) VALUES
(1, 'rin@gmail.com', 'Manekin-ya', '08', '00', '14', '00', 'Toko yang menjual Manekin', '-6.5558330', '133.0098330', '../images/souvenir/qpBLnLA2U1pqbkGMON1cReIw4D4fYLYaqBnXMUhu.jpeg', '', '', '2017-12-12 05:23:40', '2017-12-12 05:25:07'),
(2, 'rin@gmail.com', 'Waralaba', '10', '00', '16', '00', 'berlin', '42.4250000', '-98.1586110', '../images/souvenir/PiApcTSfSMMtsNE00eJt2hYXU74o3VW2qdnpyOl6.jpeg', '../images/souvenir/Ggl5H5H58MqdMMI8NgektCUbTVBZSWTphCafo82J.jpeg', '../images/souvenir/OnEE4HD5htnwZfTGis57OdvTBHgEMT6ky4cLcuue.jpeg', '2017-12-13 04:00:25', '2017-12-13 04:00:25'),
(3, 'rin@gmail.com', 'LSI', '07', '30', '13', '00', 'Jl. Raya Darmaga, Babakan, Dramaga, Bogor, Jawa Barat 16680', '106.7255530', '-6.5598210', '../images/souvenir/YAzq1ALR6b26Ssvxdu2VW5XbDy48ry8y86UZVyru.jpeg', '../images/souvenir/b5OvPk56AjUQYa0OFxcehovCcq2vvG7S2YHKD8RL.jpeg', '../images/souvenir/RZzz2hQ7RUtRUQsyJOfC2eF5YjLxKQ2jY5uBn3yh.jpeg', '2017-12-13 06:33:05', '2017-12-13 06:33:05'),
(4, 'rin@gmail.com', 'Fatera', '10', '00', '20', '00', 'Kampus IPB Darmaga, Jl. Lingkar Akademik, Babakan, Dramaga, Bogor, Jawa Barat 16680', '106.7255370', '-6.5597310', '../images/souvenir/SsGZzHPOIlL9VyXPhGkCSbdvzSwf5qBtjckR7ckZ.jpeg', '../images/souvenir/DIQFRH5IhOqJXD5Rs3KdyXSJAN5UG94eNpbBOT9X.jpeg', '../images/souvenir/haG2IyPbODTcngDC8vjRxv6WtGpNjkZBcUmyTWZp.jpeg', '2017-12-13 06:37:08', '2017-12-13 06:37:08'),
(5, 'rin@gmail.com', 'Susu Fapet IPB', '08', '30', '11', '00', 'Jalan Agatis Kampus IPB Darmaga, Dramaga, Babakan, Dramaga, Bogor, Jawa Barat 16680', '106.7228490', '-6.5579110', '../images/souvenir/5LqFEc5DwiAaJuBxZczUYPAdj37uzzbN0gFtMmPB.jpeg', '../images/souvenir/7BIuMv8dMRb0bTgDIbFzasIrFzLfBy96kzAEeTmn.jpeg', '../images/souvenir/3mRjlm4lJmCCdzVIQ3er4jGSepZWbM5Ie4AvwWsv.jpeg', '2017-12-13 06:40:10', '2017-12-13 06:40:10'),
(6, 'rin@gmail.com', 'Ikan Asli FPIK', '06', '45', '11', '00', 'Babakan, Dramaga, Kota Bogor, Jawa Barat 16680', '106.7228170', '-6.5586060', '../images/souvenir/SCTI4SOiVsZdrUpA9Yt9Os9Tz7Pj4shl4O3lJDNh.jpeg', '../images/souvenir/z35eV2vUaiSwCVbVwm5VRdEhxRbU6CdMFzm1m6O4.jpeg', '../images/souvenir/mHZw3aiv0Or2Z953V3OPAPZudKR676QpU3dmS74h.jpeg', '2017-12-13 06:43:20', '2017-12-13 06:43:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `hp`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'onMobile', 'mobile@gmail.com', '$2y$10$6AfbGPLeBySlIKUca54OlO7FpmAufWnwDRseQf5qgEKxmz0iOt.Va', '087777777777', '', NULL, '2017-12-11 01:45:58', '2017-12-11 01:45:58'),
(2, 'kota3', 'kota3@gmail.com', '$2y$10$r.de9f7ByWBQ015rKoyIj.tHEsCiidTN3Dt94IcZsqUNAQqzQvyFK', '0877777777', '', '3WPDU8xLDjEr765QpULssdDVJtx1XUI9ogZ19KFjQg6ZeV6DZfxLFKmT7z1R', '2017-12-11 08:59:46', '2017-12-11 08:59:46'),
(3, 'mobile', 'mobile2@gmail.com', '$2y$10$VNcKMj7B2iEnChM1g99wxO8QMhGhx/jXe31DR6XQiedYU8nffsttu', '087777777777', '', NULL, '2017-12-11 12:11:54', '2017-12-11 12:11:54'),
(5, 'mobile3', 'mobile3@gmail.com', '$2y$10$k5oCBJRMrB0vlLdeClya.u495t9FjVGBdZCMt8AdlXzBl4Stha5Yu', '087777777777', '', NULL, '2017-12-11 12:16:25', '2017-12-11 12:16:25'),
(6, 'kota20', 'kota20@gmail.com', '$2y$10$UVtbtaa..2qLZ8jwG5whKOXG0pNPu7.ckwGmZLyaSH.QdyTZU6HXa', '081111111111', 'male', NULL, '2017-12-13 07:50:04', '2017-12-13 07:50:04'),
(7, 'kota25', 'kota25@gmail.com', '$2y$10$E5futk6j.BISSSHkmhLuW.cDeo3TsLOjEawi.q0AvVyiv6skvzqNq', '081111111111', 'male', NULL, '2017-12-13 07:50:59', '2017-12-13 07:50:59');

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
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `facilitiess`
--
ALTER TABLE `facilitiess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_avg`
--
ALTER TABLE `result_avg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `explores`
--
ALTER TABLE `explores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facilitiess`
--
ALTER TABLE `facilitiess`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homestays`
--
ALTER TABLE `homestays`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newss`
--
ALTER TABLE `newss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result_avg`
--
ALTER TABLE `result_avg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `souvenirs`
--
ALTER TABLE `souvenirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
