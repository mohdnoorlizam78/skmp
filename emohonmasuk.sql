-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2024 at 04:47 AM
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
-- Database: `emohonmasuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kursus_tahfizs`
--

CREATE TABLE `kursus_tahfizs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kursus` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursus_tahfizs`
--

INSERT INTO `kursus_tahfizs` (`id`, `nama_kursus`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A12  SIJIL TEKNOLOGI REKABENTUK PRODUK INDUSTRI', 1, '2024-03-25 04:29:39', '2024-03-25 05:00:52'),
(2, 'A17 SIJIL TEKNOLOGI MINYAK DAN GAS (LUKISAN PERPAIPAN)', 0, '2024-03-25 04:30:06', '2024-03-25 05:03:40'),
(3, 'F01  SIJIL TEKNOLOGI KOMPUTER (SISTEM)', 1, '2024-03-25 04:31:41', '2024-03-25 05:03:33'),
(4, 'F02  SIJIL TEKNOLOGI KOMUTER (RANGKAIAN)', 0, '2024-03-25 04:32:44', '2024-03-25 05:01:05'),
(5, 'F04-B  SIJIL TEKNOLOGI PERISIAN (PENGATURCARAAN)', 0, '2024-03-25 04:34:59', '2024-03-25 05:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `kursus_tvets`
--

CREATE TABLE `kursus_tvets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kursus` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursus_tvets`
--

INSERT INTO `kursus_tvets` (`id`, `nama_kursus`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A12  SIJIL TEKNOLOGI REKABENTUK PRODUK INDUSTRI', 1, '2024-03-25 04:29:39', '2024-03-25 05:00:52'),
(2, 'A17 SIJIL TEKNOLOGI MINYAK DAN GAS (LUKISAN PERPAIPAN)', 1, '2024-03-25 04:30:06', '2024-03-25 05:03:40'),
(3, 'F01  SIJIL TEKNOLOGI KOMPUTER (SISTEM)', 1, '2024-03-25 04:31:41', '2024-03-25 05:03:33'),
(4, 'F02  SIJIL TEKNOLOGI KOMPUTER (RANGKAIAN)', 1, '2024-03-25 04:32:44', '2024-03-25 05:01:05'),
(5, 'F04-B  SIJIL TEKNOLOGI PERISIAN (PENGATURCARAAN)', 0, '2024-03-25 04:34:59', '2024-03-25 05:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitis`
--

CREATE TABLE `log_aktivitis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_21_032313_create_kursuses_table', 1),
(6, '2023_11_21_032342_create_pelajars_table', 1),
(7, '2023_11_21_032406_create_tujuans_table', 1),
(8, '2023_11_21_032432_create_status_kebenarans_table', 1),
(9, '2023_11_21_032527_create_status_keluars_table', 1),
(10, '2023_11_21_032536_create_status_masuks_table', 1),
(11, '2023_11_21_032606_create_rekod_keluar_masuks_table', 1),
(12, '2023_11_21_032646_create_pegawais_table', 1),
(13, '2023_11_21_032701_create_log_aktivitis_table', 1),
(14, '2023_11_24_132449_create_peranans_table', 2),
(15, '2023_11_25_124259_create_keluar_masuks_table', 3),
(16, '2023_11_28_061602_create_sesi_masuks_table', 4),
(17, '2023_12_02_104758_create_permission_tables', 5),
(18, '2024_01_02_124703_create_larangan_models_table', 6),
(19, '2024_03_22_153131_create_tahfizs_table', 7),
(20, '2024_03_25_113358_create_kursus_tahfizs_table', 8),
(21, '2024_03_25_141729_create_tvets_table', 9),
(22, '2024_03_26_160723_create_kursus_tvets_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peranans`
--

CREATE TABLE `peranans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_peranan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peranans`
--

INSERT INTO `peranans` (`id`, `nama_peranan`, `created_at`, `updated_at`) VALUES
(1, 'pentadbir', '2023-11-24 13:25:45', '2023-11-24 13:25:45'),
(2, 'warden', '2023-11-24 13:26:03', '2023-11-24 13:26:03'),
(3, 'pengawal', '2023-11-24 13:26:20', '2023-11-24 13:26:20'),
(4, 'pelajar', '2023-11-24 13:26:34', '2023-11-24 13:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sesi_masuks`
--

CREATE TABLE `sesi_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sesi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesi_masuks`
--

INSERT INTO `sesi_masuks` (`id`, `nama_sesi`, `created_at`, `updated_at`) VALUES
(1, '1/2022', '2023-11-27 22:39:20', '2023-11-27 22:39:20'),
(2, '2/2022', '2023-11-27 22:40:14', '2023-11-27 22:40:14'),
(3, '1/2023', '2023-11-27 22:40:20', '2023-11-27 22:40:20'),
(4, '2/2023', '2023-11-28 08:19:55', '2023-11-28 08:19:55'),
(5, '1/2024', '2023-11-28 08:20:42', '2023-11-28 08:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `tahfizs`
--

CREATE TABLE `tahfizs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `no_kp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tel` varchar(255) NOT NULL,
  `no_tel_ibubapa` varchar(255) NOT NULL,
  `emel` varchar(255) NOT NULL,
  `kursus_id` varchar(255) NOT NULL,
  `akuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahfizs`
--

INSERT INTO `tahfizs` (`id`, `nama_penuh`, `no_kp`, `alamat`, `no_tel`, `no_tel_ibubapa`, `emel`, `kursus_id`, `akuan`, `created_at`, `updated_at`) VALUES
(5, 'mohd noorlizam bin md ali', '780824-01-5089', 'durian tunggal', '0172699960', '0122171486', 'mohdnoorlizam@gmail.com', '5', 'setuju', '2024-03-25 02:49:26', '2024-03-25 02:49:26'),
(6, '@34', '240305-04-0002', 'ilp selandar melaka', '0172699960', '0122171486', 'mohdnoorlizam34@gmail.com', '1', 'setuju', '2024-03-26 02:27:37', '2024-03-26 02:27:37'),
(7, '34', '7808888', 'alor gajah melaka', '0122171486', '0122171486', 'ahchai@gmail.com', '1', 'setuju', '2024-03-26 02:38:16', '2024-03-26 02:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `tvets`
--

CREATE TABLE `tvets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penuh` varchar(255) NOT NULL,
  `no_kp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tel` varchar(255) NOT NULL,
  `no_tel_ibubapa` varchar(255) NOT NULL,
  `emel` varchar(255) NOT NULL,
  `kursus_id1` varchar(255) NOT NULL,
  `kursus_id2` int(11) NOT NULL,
  `kursus_id3` int(11) NOT NULL,
  `akuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tvets`
--

INSERT INTO `tvets` (`id`, `nama_penuh`, `no_kp`, `alamat`, `no_tel`, `no_tel_ibubapa`, `emel`, `kursus_id1`, `kursus_id2`, `kursus_id3`, `akuan`, `created_at`, `updated_at`) VALUES
(1, 'mohd noorlizam bin md ali', '780824-01-5089', 'durian tunggal, melaka', '0172699960', '0122171486', 'mohdnoorlizam@gmail.com', '3', 4, 1, 'setuju', '2024-03-27 02:46:43', '2024-03-27 02:46:43'),
(2, 'ahmad zahin bin zulkifli', '240305-04-0001', 'pasir mas kelantan', '011 6488 1609', '0122171486', 'ahmadzahin@gmail.com', '1', 2, 3, 'setuju', '2024-03-27 03:37:26', '2024-03-27 03:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `peranan_id` bigint(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `peranan_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohd Noorlizam Bin Md Ali', 'mohdnoorlizam@jtm.gov.my', NULL, '$2y$12$HMpbRJsSUbLiotv150vWieCfbOPTqQXAzgyCAPkyu8cHvurHM6Y8.', 1, '1', NULL, '2023-11-24 20:34:29', '2023-11-27 23:43:24'),
(2, 'Zakaria Bin Hamzah', 'zakariahamzah@jtm.gov.my', NULL, '$2y$12$harH3Su9KeONOctHJAu6lu07isxZRDvkwHTQUwA1/9AaTQV2hooCa', 1, '1', NULL, '2024-03-25 07:49:01', '2024-03-25 07:49:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kursus_tahfizs`
--
ALTER TABLE `kursus_tahfizs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus_tvets`
--
ALTER TABLE `kursus_tvets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitis`
--
ALTER TABLE `log_aktivitis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peranans`
--
ALTER TABLE `peranans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sesi_masuks`
--
ALTER TABLE `sesi_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahfizs`
--
ALTER TABLE `tahfizs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvets`
--
ALTER TABLE `tvets`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kursus_tahfizs`
--
ALTER TABLE `kursus_tahfizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kursus_tvets`
--
ALTER TABLE `kursus_tvets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_aktivitis`
--
ALTER TABLE `log_aktivitis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `peranans`
--
ALTER TABLE `peranans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sesi_masuks`
--
ALTER TABLE `sesi_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahfizs`
--
ALTER TABLE `tahfizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tvets`
--
ALTER TABLE `tvets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
