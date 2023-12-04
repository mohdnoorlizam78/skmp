-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2023 at 07:27 AM
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
-- Database: `skmp`
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
-- Table structure for table `keluar_masuks`
--

CREATE TABLE `keluar_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ndp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tujuan_id` bigint(20) NOT NULL,
  `destinasi` varchar(255) DEFAULT NULL,
  `statuskebenaran_id` int(11) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `pelulus_id` int(11) DEFAULT NULL,
  `pegawaikeluar_id` varchar(255) DEFAULT NULL,
  `tarikh_keluar` varchar(255) DEFAULT NULL,
  `masa_keluar` varchar(255) DEFAULT NULL,
  `pegawaimasuk_id` varchar(255) DEFAULT NULL,
  `tarikh_masuk` varchar(255) DEFAULT NULL,
  `masa_masuk` varchar(255) DEFAULT NULL,
  `status_masuk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluar_masuks`
--

INSERT INTO `keluar_masuks` (`id`, `user_id`, `ndp_id`, `tujuan_id`, `destinasi`, `statuskebenaran_id`, `catatan`, `pelulus_id`, `pegawaikeluar_id`, `tarikh_keluar`, `masa_keluar`, `pegawaimasuk_id`, `tarikh_masuk`, `masa_masuk`, `status_masuk`, `created_at`, `updated_at`) VALUES
(11, 13, 22222003, 1, NULL, 2, NULL, NULL, '5', '2023-11-29', '09:05:17 PM', '3', '2023-11-29', '09:26:07 PM', '3', '2023-11-28 20:56:32', '2023-11-29 13:26:09'),
(19, 15, 22222045, 3, 'Kemaman Terengganu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-30 01:29:30', '2023-11-30 02:43:42'),
(20, 15, 22222045, 2, 'Gemenceh, Negeri Sembilan', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-30 01:30:15', '2023-11-30 02:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `kursuses`
--

CREATE TABLE `kursuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kursus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursuses`
--

INSERT INTO `kursuses` (`id`, `nama_kursus`, `created_at`, `updated_at`) VALUES
(1, 'A12  SIJIL TEKNOLOGI REKABENTUK PRODUK INDUSTRI', '2023-10-27 20:08:14', '2023-11-22 05:42:17'),
(2, 'A17 SIJIL TEKNOLOGI MINYAK DAN GAS (LUKISAN PERPAIPAN)', '2023-11-11 07:15:45', '2023-11-22 05:42:23'),
(3, 'FO1  SIJIL TEKNOLOGI KOMPUTER (SISTEM)', '2023-11-11 07:15:52', '2023-11-22 05:42:28'),
(4, 'F02  SIJIL TEKNOLOGI KOMUTER (RANGKAIAN)', '2023-11-11 07:15:58', '2023-11-22 05:42:35'),
(5, 'F04-B  SIJIL TEKNOLOGI PERISIAN (PENGATURCARAAN)', '2023-11-11 07:40:03', '2023-11-22 05:42:05');

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
(17, '2023_12_02_104758_create_permission_tables', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

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
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelajars`
--

CREATE TABLE `pelajars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_pelajar` varchar(255) NOT NULL,
  `jantina` int(11) NOT NULL,
  `kursus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_ndp` varchar(255) DEFAULT NULL,
  `sesimasuk_id` bigint(20) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `alamat_rumah` varchar(255) DEFAULT NULL,
  `alamat_lain` varchar(255) DEFAULT NULL,
  `no_tel` varchar(255) DEFAULT NULL,
  `no_tel_penjaga` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajars`
--

INSERT INTO `pelajars` (`id`, `user_id`, `nama_pelajar`, `jantina`, `kursus_id`, `no_ndp`, `sesimasuk_id`, `gambar`, `alamat_rumah`, `alamat_lain`, `no_tel`, `no_tel_penjaga`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'MOHAMAD ARIF BIN ISMAIL', 1, 5, '22222003', 1, NULL, 'KM 18, JALAN TOK ANDAK,KAMPUNG SERKAM TIMUR, 77300 MERLIMAU, MELAKA', 'tiada', '013 5651307', '-', '1', '2023-11-24 21:35:11', '2023-11-24 21:35:11'),
(3, 14, 'MOHAMED HARRAZ IRFAN BIN ABDULLAH ALI', 1, 5, '22222019', 1, NULL, 'NO.20, PERSIARAN PUNCAK ISKANDAR 2A/4, PERSIARAN PUNCAK ISKANDAR, 32610 SERI ISKANDAR, PERAK', 'tiada', '012345678', '012345678', '0', '2023-11-26 20:27:26', '2023-11-28 00:27:39'),
(4, 15, 'MUHAMMAD HAFIZHAN BIN HAMZAH', 1, 5, '22222045', 1, NULL, 'NO.95 JALAN SULAIMAN, KAMPUNG TANAH LOT, 23000 DUNGUN, TERENGGANU', 'tiada', '011 6488 1609', '011 9999999', '1', '2023-11-26 20:32:06', '2023-11-27 23:30:56');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2023-12-02 03:22:40', '2023-12-02 03:22:40'),
(2, 'penyelenggaraan', 'web', '2023-12-02 03:35:15', '2023-12-02 03:35:15'),
(3, 'sahkankeluarmasuk', 'web', '2023-12-02 03:48:19', '2023-12-02 03:48:19'),
(4, 'keluarmasuk', 'web', '2023-12-02 04:19:11', '2023-12-02 04:19:11');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'pentadbir', 'web', '2023-12-02 03:11:46', '2023-12-02 03:11:46'),
(2, 'warden', 'web', '2023-12-02 03:11:46', '2023-12-02 03:11:46'),
(3, 'pengawal', 'web', '2023-12-02 03:11:46', '2023-12-02 03:11:46'),
(4, 'pelajar', 'web', '2023-12-02 03:11:46', '2023-12-02 03:11:46'),
(5, 'tetamu', 'web', '2023-12-02 03:13:18', '2023-12-02 03:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(4, 3);

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
-- Table structure for table `tujuans`
--

CREATE TABLE `tujuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tujuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuans`
--

INSERT INTO `tujuans` (`id`, `nama_tujuan`, `created_at`, `updated_at`) VALUES
(1, 'Keluar', '2023-11-23 19:19:58', '2023-11-26 23:31:50'),
(2, 'Balik kampung', '2023-11-23 19:20:44', '2023-11-26 23:32:01'),
(3, 'Klinik', '2023-11-26 23:32:14', '2023-11-26 23:32:14');

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
(1, 'ts MOHD NOORLIZAM BIN MD ALI', 'mohdnoorlizam@jtm.gov.my', NULL, '$2y$12$HMpbRJsSUbLiotv150vWieCfbOPTqQXAzgyCAPkyu8cHvurHM6Y8.', 1, '1', NULL, '2023-11-24 20:34:29', '2023-11-27 23:43:24'),
(2, 'Nur Aisyah binti Abdul Aziz', 'nuraisyah@gmail.com', NULL, '$2y$12$uhJWYhxW9/kIyIDP/etoUOMi8SopBdYFhILoxAKGxBIA.kVDFl7FC', 1, '1', NULL, '2023-11-24 20:35:01', '2023-11-24 20:35:01'),
(3, 'Pegawai 1', 'pegawai1@gmail.com', NULL, '$2y$12$JcqAqdV3bpYpTAMnKyLRMefNYlv5jx2qnv6Do04tLIVOJusM3AK8m', 2, '1', NULL, '2023-11-24 20:35:37', '2023-11-24 20:35:37'),
(4, 'Pegawai 2', 'pegawai2@gmail.com', NULL, '$2y$12$xJqqd6NvUAlATXQB/p6A8eRXcpG6igOHfk/fxXbBPoH1V.Qj3MfT6', 2, '1', NULL, '2023-11-24 20:36:03', '2023-11-24 20:36:03'),
(5, 'Pegawai 3', 'pegawai3@gmail.com', NULL, '$2y$12$s099iJhFV6Z0HIQjFA5FBuNBsrGXOtkknarcyxk2Fi.KFG6X4kZP.', 3, '1', NULL, '2023-11-24 20:36:36', '2023-11-24 20:36:36'),
(6, 'Pegawai 4', 'pegawai4@gmail.com', NULL, '$2y$12$Z3iuesHZAyL.6zIugCyqcOIn4vtH8YCypUt2PXaMEHs3vquiwtzVq', 3, '1', NULL, '2023-11-24 20:37:04', '2023-11-24 20:37:04'),
(7, 'Pegawai 5', 'pegawai5@gmail.com', NULL, '$2y$12$shllcOZSpnEzOfcTdW0oHe63G.ZXW2ohPIFYCOKe3wYefmm8YDwF6', 3, '1', NULL, '2023-11-24 20:39:51', '2023-11-24 20:39:51'),
(8, 'Pegawai 6', 'pegawai6@gmail.com', NULL, '$2y$12$nnAsuCUbHXo8jjrCU/HjG.b1LKUTIxVSneHNUXUGmmz2TdAaiZwiO', 3, '1', NULL, '2023-11-24 20:40:27', '2023-11-24 20:40:27'),
(9, 'Pegawai 7', 'pegawai7@gmail.com', NULL, '$2y$12$FVU9hcrlfmYW73Q.IiPnsuXq2pzbU.S50Jo4pnvpu8bKaLLMr.due', 3, '1', NULL, '2023-11-24 20:40:57', '2023-11-24 20:40:57'),
(10, 'Pegawai 8', 'pegawai8@gmail.com', NULL, '$2y$12$9B47AWHWfYhvNly/xRBMvOpIHFgsjCoMcJDFEo1vKLBpweaR6r20.', 3, '1', NULL, '2023-11-24 20:41:32', '2023-11-24 20:41:32'),
(11, 'Pegawai 9', 'pegawai9@gmail.com', NULL, '$2y$12$GpRW2C9F8TZYqPdO88ZxPe6OP//OeHX/.BHZoKl3kU3IXdZil0gv.', 3, '1', NULL, '2023-11-24 20:42:03', '2023-11-24 20:42:03'),
(12, 'Pegawai 10', 'pegawai10@gmail.com', NULL, '$2y$12$Tqtu3a2YHvksF52ZKWfOkevcp3FYIemCKr2OhVixCQuYe8J9utTjm', 3, '1', NULL, '2023-11-24 20:42:34', '2023-11-24 20:42:34'),
(13, 'MOHAMAD ARIF BIN ISMAIL', 'student1@gmail.com', NULL, '$2y$12$j8atxLnCzlYeHTfAXqXY9.M3VWVpTFl0wH.FkASzZA6HFYBZTUQ5i', 4, '1', NULL, '2023-11-24 20:43:48', '2023-12-03 13:12:35'),
(14, 'MOHAMED HARRAZ IRFAN BIN ABDULLAH ALI', 'student2@gmail.com', NULL, '$2y$12$JI9GkxfOkA1f02V.9ccqVOunwsQkad20/Rd8iRQwAqtpCG44.6gFm', 4, '0', NULL, '2023-11-24 20:44:27', '2023-11-24 20:44:27'),
(15, 'MUHAMMAD HAFIZHAN BIN HAMZAH', 'student3@gmail.com', NULL, '$2y$12$P5r7A4gFaO/tJ.oc2Z8rP..qiOuMqrF9nKBFPLdoV50ipXzaBV6q6', 4, '1', NULL, '2023-11-24 20:44:52', '2023-11-24 20:44:52'),
(16, 'NUR EYFA ELYANA BINTI MOHD ZAIDI', 'student4@gmail.com', NULL, '$2y$12$gxllZ3w9hZJQc9gvUrma0efNUJ06aFXwK5s2N1MkcLdKRFZhoZ8ZS', 4, '1', NULL, '2023-11-24 20:45:15', '2023-11-24 20:45:15'),
(17, 'NUR FATIN NAWWARAH BINTI MOHD YAZID', 'student5@gmail.com', NULL, '$2y$12$9/r8WK6xYLQMmgXV8/I1nuAA92V7wMvFqruyGG9B6.40ojObnhn1e', 4, '1', NULL, '2023-11-24 20:45:45', '2023-11-24 20:45:45'),
(18, 'student 20', 'student20@gmail.com', NULL, '$2y$12$Wr5iy/L78.99HJLr7jrD3OSX4SoqtMkuzfpbTu0S.KnqGb62HOlOO', 4, '0', NULL, '2023-11-27 06:27:11', '2023-11-27 06:42:23'),
(19, 'student 21', 'pelajar21@gmail.com', NULL, '$2y$12$c99PwaQYWXbSe.8PT3px7.kFr3evtrp0KygG6mLSL3vSt0IG4fBa2', 4, '1', NULL, '2023-11-27 06:33:18', '2023-11-27 06:33:18');

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
-- Indexes for table `keluar_masuks`
--
ALTER TABLE `keluar_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursuses`
--
ALTER TABLE `kursuses`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajars`
--
ALTER TABLE `pelajars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ndp` (`no_ndp`);

--
-- Indexes for table `peranans`
--
ALTER TABLE `peranans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sesi_masuks`
--
ALTER TABLE `sesi_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuans`
--
ALTER TABLE `tujuans`
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
-- AUTO_INCREMENT for table `keluar_masuks`
--
ALTER TABLE `keluar_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kursuses`
--
ALTER TABLE `kursuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_aktivitis`
--
ALTER TABLE `log_aktivitis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelajars`
--
ALTER TABLE `pelajars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peranans`
--
ALTER TABLE `peranans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sesi_masuks`
--
ALTER TABLE `sesi_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tujuans`
--
ALTER TABLE `tujuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
