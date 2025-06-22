-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2025 at 01:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_alfaen@gmail.com|127.0.0.1', 'i:1;', 1750594285),
('laravel_cache_alfaen@gmail.com|127.0.0.1:timer', 'i:1750594285;', 1750594285);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Fakultas Teknik', '2025-06-19 10:57:10', '2025-06-19 10:57:10'),
(2, 'Fakultas Ilmu Komputer', '2025-06-19 19:16:26', '2025-06-19 19:16:26'),
(3, 'Fakultas Perikanan dan Ilmu Kelautan', '2025-06-22 05:45:09', '2025-06-22 05:45:09'),
(4, 'Fakultas Ekonomi dan Bisnis', '2025-06-22 05:46:19', '2025-06-22 05:46:19'),
(5, 'Fakultas Hukum', '2025-06-22 05:47:40', '2025-06-22 05:47:40'),
(6, 'Fakultas Kesehatan Masyarakat', '2025-06-22 05:49:00', '2025-06-22 05:49:00'),
(7, 'Fakultas Peternakan', '2025-06-22 05:49:59', '2025-06-22 05:49:59'),
(8, 'Fakultas Kedokteran', '2025-06-22 06:23:49', '2025-06-22 06:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `matakuliah_id` bigint UNSIGNED NOT NULL,
  `semester` int NOT NULL,
  `tahun_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `created_at`, `updated_at`, `mahasiswa_id`, `matakuliah_id`, `semester`, `tahun_akademik`) VALUES
(1, '2025-06-19 20:12:42', '2025-06-19 20:12:42', 2, 1, 4, '2023'),
(2, '2025-06-19 20:44:38', '2025-06-19 20:44:38', 3, 1, 4, '2023'),
(3, '2025-06-22 06:27:06', '2025-06-22 06:27:06', 5, 2, 4, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `prodi_id`, `created_at`, `updated_at`) VALUES
(2, '145', 'Edwe', 1, '2025-06-19 19:18:56', '2025-06-22 05:43:51'),
(3, '124', 'Kafah', 1, '2025-06-19 20:43:41', '2025-06-19 20:43:41'),
(4, '203', 'Kafah', 3, '2025-06-22 05:44:54', '2025-06-22 05:44:54'),
(5, '130', 'Alfaen', 1, '2025-06-22 06:23:03', '2025-06-22 06:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matakuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int NOT NULL,
  `semester` int NOT NULL,
  `prodi_id` bigint UNSIGNED NOT NULL,
  `fakultas_id` bigint UNSIGNED NOT NULL,
  `dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama_matakuliah`, `sks`, `semester`, `prodi_id`, `fakultas_id`, `dosen`, `status`, `created_at`, `updated_at`) VALUES
(1, '12345', 'Pemrograman Web II', 3, 4, 1, 1, 'Mohammad Irham Akbar, S.Kom., M.Cs.', 'aktif', '2025-06-19 20:11:36', '2025-06-19 20:11:36'),
(2, 'MK02', 'Pemrograman Web II', 3, 4, 3, 2, 'Mohammad Irham Akbar, S.Kom., M.Cs.', 'aktif', '2025-06-22 06:26:32', '2025-06-22 06:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_06_18_134509_create_fakultas_table', 1),
(2, '2025_06_18_134510_create_prodi_table', 1),
(3, '2025_06_18_134511_create_mahasiswa_table', 1),
(4, '2025_06_18_134514_create_matakuliah_table', 1),
(5, '2025_06_18_134515_create_krs_table', 1),
(6, '2025_06_19_163211_create_sessions_table', 2),
(7, '2025_06_19_163933_create_users_table', 3),
(8, '2025_06_20_010035_create_cache_table', 4),
(9, '2025_06_20_011823_add_missing_columns_to_matakuliah_table', 5),
(10, '2025_06_20_012422_add_columns_to_krs_table', 5),
(11, '2025_06_20_012507_add_missing_columns_to_krs_table', 5),
(12, '2025_06_20_012613_add_missing_columns_to_matakuliah_table', 6),
(13, '2025_06_20_024342_add_semester_to_matakuliah_table', 6),
(14, '2025_06_20_024613_add_semester_to_matakuliah_table', 7),
(15, '2025_06_20_025924_add_semester_to_matakuliah_table', 8),
(16, '2025_06_20_030219_add_prodi_id_to_matakuliah_table', 9),
(17, '2025_06_20_030432_add_fakultas_id_to_matakuliah_table', 10),
(18, '2025_06_20_030632_add_dosen_to_matakuliah_table', 11),
(19, '2025_06_20_031000_add_status_to_matakuliah_table', 12),
(20, '2025_06_20_031000_add_role_to_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `fakultas_id`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan Dokter Gigi', 1, '2025-06-19 10:57:50', '2025-06-22 06:24:20'),
(3, 'Sistem Informasi', 2, '2025-06-19 19:17:28', '2025-06-19 19:17:28'),
(4, 'Pendidikan Dokter', 8, '2025-06-22 06:24:09', '2025-06-22 06:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ywj6ukL7GJdOYFYHiLNzl30omNS3uI3226OmAnoB', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRHRnMFc0WlpwaEFnZFl3VmNLSGR2OGRHTGNJU083MG9FU2FBdnJ1OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZmlsZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1750598900);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Mukhammad Alfaen Fadillah', 'mukhammad.fadillah@mhs.unsoed.ac.id', NULL, '$2y$12$8rrMcFuL1ykBmRmyNusDUegvgFSM/1BlbmbIysdJansWqZtsL/pkO', 'cZa9dCcVPt8MNkZpWU94weSm4zFvEzXxLsXL2D07KVtysbhqZDYEEF89qdag', '2025-06-19 09:41:06', '2025-06-19 09:41:06', 'user'),
(2, 'Nama User', 'user@email.com', NULL, '$2y$10$hashpassword', NULL, '2025-06-21 16:40:28', '2025-06-21 16:40:28', 'user'),
(3, 'Fina Julianti', 'finajulianti24@gmail.com', NULL, '$2y$12$lQhBWMb0AsHFZGikeFXQDOChw8c4MQ904GXnpb9tXL91ioUM1nvYC', NULL, '2025-06-21 09:52:51', '2025-06-21 09:52:51', 'admin'),
(4, 'Mukhammad Alfaen Fadillah', 'alfaen@gmail.com', NULL, '$2y$12$1fYXc7wb7ytroVvVoIqYXONi6o.mEk.7p9Z3.hkLwQZnweNKEpRhO', '9vlzZEMSoKsBPKHmYJhOzYP7TXhGWSlIT8EukPEnOnGDZtgsCBSlZxx7KSh3', '2025-06-22 05:11:32', '2025-06-22 06:28:20', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `krs_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `krs_matakuliah_id_foreign` (`matakuliah_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD KEY `mahasiswa_prodi_id_foreign` (`prodi_id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_fakultas_id_foreign` (`fakultas_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `krs_matakuliah_id_foreign` FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
