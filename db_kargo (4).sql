-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2025 at 09:05 AM
-- Server version: 8.4.3
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kargo`
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
('laravel_cache_5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1753690909),
('laravel_cache_5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1753690909;', 1753690909);

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
-- Table structure for table `drop_points`
--

CREATE TABLE `drop_points` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_buka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE `kurirs` (
  `id_kurir` bigint UNSIGNED NOT NULL,
  `id_user` int NOT NULL,
  `nama_kurir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_20_040925_create_produks_table', 1),
(5, '2025_06_22_135847_create_kurirs_table', 1),
(6, '2025_06_22_141333_create_trackings_table', 1),
(7, '2025_07_01_144144_create_penerimas_table', 1),
(8, '2025_07_01_144206_create_pengirims_table', 1),
(9, '2025_07_01_144343_create_tarifs_table', 1),
(10, '2025_07_03_111430_add_deleted_at_to_multiple_tables', 1),
(11, '2025_07_03_112032_add_deleted_at_to_produks_table', 1),
(12, '2025_07_03_123346_add_deleted_at_to_kurirs_table', 1),
(13, '2025_07_03_123859_add_deleted_at_to_trackings_table', 1),
(14, '2025_07_03_140042_add_deleted_at_to_users_table', 1),
(15, '2025_07_03_141813_add_role_to_users_table', 1),
(16, '2025_07_03_224226_create_pengirimen_table', 1),
(17, '2025_07_06_215716_add_deleted_at_to_pengiriman_table', 1),
(18, '2025_07_06_221408_modify_estimasi_sampai_nullable', 1),
(19, '2025_07_06_221430_update_catatan_nullable_in_pengiriman', 1),
(20, '2025_07_07_000000_create_drop_points_table', 1),
(21, '2025_07_08_205220_create_transaksis_table', 1),
(22, '2025_07_08_205836_add_id_transaksi_to_pengiriman_table', 1),
(23, '2025_07_12_114134_modify_id_penerima_foreign_in_transaksis_table', 1),
(24, '2025_07_20_000001_add_id_kurir_to_trackings_table', 1),
(25, '2025_07_20_000002_remove_nama_kurir_from_trackings_table', 1),
(26, '2025_07_21_000001_add_kota_layanan_to_order_tables', 1),
(27, '2025_07_21_000002_make_id_kurir_nullable_in_pengiriman', 1),
(28, '2025_07_21_000003_add_id_pengiriman_to_trackings', 1),
(29, '2025_07_21_000004_add_foto_bukti_to_trackings', 1),
(30, '2025_07_21_000005_add_catatan_to_trackings', 1),
(31, '2025_07_21_000007_make_no_resi_nullable_in_trackings', 1),
(32, '2025_07_21_000008_add_no_resi_to_pengiriman', 1),
(33, '2025_07_28_142424_add_id_kurir_to_trackings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerimas`
--

CREATE TABLE `penerimas` (
  `id_penerima` bigint UNSIGNED NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` int NOT NULL,
  `telp_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimas`
--

INSERT INTO `penerimas` (`id_penerima`, `nama_penerima`, `alamat_penerima`, `kota_penerima`, `kode_pos`, `telp_penerima`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fatimah Fitri Hutajulu', 'Medan', NULL, 30524, '08123456789', '2025-07-22 14:13:24', '2025-07-22 14:13:24', NULL),
(2, 'Revania Zahrani Ramadheani', 'Sarijadi', NULL, 20424, '082123456789', '2025-07-22 14:13:47', '2025-07-22 14:13:47', NULL),
(3, 'Rahma Aulia Khoirunisa', 'Cigugur', NULL, 20427, '08123456788', '2025-07-22 14:14:00', '2025-07-22 14:14:00', NULL),
(4, 'Anwar', 'Bandung', NULL, 20384, '08765432987', '2025-07-24 13:25:21', '2025-07-24 13:27:35', NULL),
(5, 'Ashari', 'Cimahi', NULL, 48265, '089523762462', '2025-07-24 14:50:17', '2025-07-24 14:50:17', NULL),
(6, 'Diah', 'Sukabumi', NULL, 12534, '082353758872', '2025-07-24 15:16:26', '2025-07-24 15:16:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` bigint UNSIGNED NOT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_transaksi` bigint UNSIGNED DEFAULT NULL,
  `id_produk` bigint UNSIGNED DEFAULT NULL,
  `id_kurir` bigint UNSIGNED DEFAULT NULL,
  `id_penerima` bigint UNSIGNED DEFAULT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dikirim',
  `layanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'motor',
  `estimasi_sampai` date DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id`, `no_resi`, `id_transaksi`, `id_produk`, `id_kurir`, `id_penerima`, `tanggal_kirim`, `status`, `layanan`, `tipe_kendaraan`, `estimasi_sampai`, `catatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'YKB-20250722-KG0BOQ', 1, NULL, 2, NULL, '2025-07-22', 'Terkirim', NULL, 'motor', '2025-07-26', 'Pesanan anda sedang dalam proses', '2025-07-22 14:40:56', '2025-07-28 08:20:59', NULL),
(2, 'YKB-20250724-HQVR7T', 2, NULL, 2, NULL, '2025-07-24', 'Sedang Dikirim', NULL, 'motor', '2025-07-28', 'Pesanan anda sedang dalam proses', '2025-07-24 13:25:22', '2025-07-28 08:02:57', NULL),
(3, 'YKB-20250724-XEFBOL', 3, NULL, 2, NULL, '2025-07-24', 'Sedang Dikirim', NULL, 'motor', '2025-07-28', 'Pesanan anda sedang dalam proses', '2025-07-24 13:47:57', '2025-07-28 08:05:45', NULL),
(5, 'YKB-20250724-6TDVMU', 6, NULL, 3, NULL, '2025-07-24', 'Sedang Dikirim', NULL, 'motor', '2025-07-30', 'Pesanan anda sedang dalam proses', '2025-07-24 15:18:42', '2025-07-28 08:13:03', NULL),
(6, 'YKB-20250724-814L9I', 8, NULL, 3, NULL, '2025-07-24', 'Sedang Dikirim', NULL, 'truk', '2025-07-31', 'Pesanan anda sedang dalam proses', '2025-07-24 15:19:24', '2025-07-28 07:49:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengirims`
--

CREATE TABLE `pengirims` (
  `id_pengirim` bigint UNSIGNED NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` int NOT NULL,
  `telp_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirims`
--

INSERT INTO `pengirims` (`id_pengirim`, `nama_pengirim`, `alamat_pengirim`, `kota_pengirim`, `kode_pos`, `telp_pengirim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ismi Nabilah', 'Bandung', NULL, 20415, '081122334455', '2025-07-22 14:14:19', '2025-07-22 14:14:19', NULL),
(2, 'Dewi Puspita', 'KBB', NULL, 23214, '08938762534', '2025-07-24 13:25:21', '2025-07-24 13:28:25', NULL),
(3, 'Arumy', 'Cipendey', NULL, 10673, '089243582753', '2025-07-24 14:50:17', '2025-07-24 14:50:17', NULL),
(4, 'Aisyah', 'Cipendey', NULL, 23453, '08375832953', '2025-07-24 15:16:26', '2025-07-24 15:16:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kurir` bigint UNSIGNED DEFAULT NULL,
  `jumlah_produk` int NOT NULL,
  `berat_kiriman` int NOT NULL,
  `berat_asli` int NOT NULL,
  `volume_produk` int NOT NULL,
  `ket_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `id_kurir`, `jumlah_produk`, `berat_kiriman`, `berat_asli`, `volume_produk`, `ket_produk`, `no_resi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 4, 4, 0, 'Baju', 'YKB-20250722-KG0BOQ', '2025-07-22 14:15:10', '2025-07-22 14:15:10', NULL),
(2, NULL, 1, 1, 1, 0, 'Kain', 'YKB-20250724-HQVR7T', '2025-07-24 13:25:21', '2025-07-24 13:26:40', NULL),
(3, NULL, 1, 3, 3, 2, 'Elektronik', 'YKB-20250724-XEFBOL', '2025-07-24 13:32:31', '2025-07-24 13:32:31', NULL),
(4, NULL, 1, 1, 1, 0, 'Koper', 'YKB-20250724-6TDVMU', '2025-07-24 14:50:17', '2025-07-24 14:50:17', NULL),
(5, NULL, 1, 2, 2, 0, 'Buku', 'YKB-20250724-814L9I', '2025-07-24 15:16:26', '2025-07-24 15:16:26', NULL);

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
('60ux3h7vUc7D1gJ8JXsXCidgfYJ1SlVV0FmCQ65H', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibUdWaDFHdlp6Mk05QldzT3lzZVlIeDNFSEtJY1dKUGpicVdFNGlJZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753688817),
('LICDOuAvUXBojqGAgwa99m3I4Zm8elchryAA7ykE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTmh6NnVoMHBFRzJ5OW5WVXNDa0VCUTZ2Ym1TUm05ZmVJWnVDcmFOQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1753687257),
('PLvwJnrtPR5Lz9pd7vY41mbqJYZi6ZBrw2xEr3jf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZHJlWVJhZXZQUUEwV1g0b2ExWHlrN0JiT2dBdkFOMHZtb0ZqWTdHOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rdXJpci9sb2dpbiI7fXM6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1753690254),
('SMCmcKJI8vJPQbu5mvPCZp5Wytw6UOItW5FdePfu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUJQMU5TSkg0T1AyYXNOTlp6RndhSk45THJmUGE0d2JldUxyUXN4ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rdXJpci9sb2dpbiI7fX0=', 1753690920),
('zTBlaA5KUQ1HnNLWmZwkKWdBVsRH6RTKdcZozP9n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzVkVVZKWmxpbUZsS003RXBpMDZ5dmFZajFYN0Z5aWtoN3ExeGlxcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rdXJpci9sb2dpbiI7fX0=', 1753690925);

-- --------------------------------------------------------

--
-- Table structure for table `tarifs`
--

CREATE TABLE `tarifs` (
  `id_tarif` bigint UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarifs`
--

INSERT INTO `tarifs` (`id_tarif`, `jenis`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Regular', '7000', '2025-07-22 14:16:18', '2025-07-22 14:16:18', NULL),
(2, 'Express', '8500', '2025-07-22 14:16:26', '2025-07-22 14:16:26', NULL),
(3, 'SameDay', '10000', '2025-07-22 14:16:34', '2025-07-22 14:16:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trackings`
--

CREATE TABLE `trackings` (
  `id_tracking` bigint UNSIGNED NOT NULL,
  `id_pengiriman` bigint UNSIGNED DEFAULT NULL,
  `id_kurir` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trackings`
--

INSERT INTO `trackings` (`id_tracking`, `id_pengiriman`, `id_kurir`, `status`, `foto_bukti`, `catatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Terkirim', 'bukti-pengiriman/01K181XSTC0ZC9Y5YZ1NNH9JEB.JPG', 'Paket telah diterima oleh penerima.', '2025-07-28 08:20:59', '2025-07-28 08:20:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pengirim` bigint UNSIGNED NOT NULL,
  `id_penerima` bigint UNSIGNED NOT NULL,
  `id_produk` int NOT NULL,
  `id_tarif` bigint UNSIGNED NOT NULL,
  `layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat` double NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `harga` int NOT NULL,
  `total_harga` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `id_pengirim`, `id_penerima`, `id_produk`, `id_tarif`, `layanan`, `berat`, `tgl_transaksi`, `harga`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, 4, '2025-07-22', 7000, '28000', '2025-07-22 14:35:45', '2025-07-22 14:35:45'),
(2, 2, 4, 2, 2, NULL, 2, '2025-07-24', 8500, '17000', '2025-07-24 13:29:45', '2025-07-24 13:29:45'),
(3, 2, 3, 3, 1, NULL, 4, '2025-07-24', 7000, '28000', '2025-07-24 13:33:54', '2025-07-24 13:33:54'),
(6, 3, 5, 4, 1, NULL, 1, '2025-07-24', 7000, '7000', '2025-07-24 15:12:36', '2025-07-24 15:12:36'),
(8, 4, 6, 5, 1, NULL, 2, '2025-07-24', 7000, '14000', '2025-07-24 15:17:23', '2025-07-24 15:17:23');

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
  `no_telp` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `no_telp`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `role`) VALUES
(1, 'bilaw', 'nabil3@gmail.com', NULL, '$2y$12$MmXcao4pPT9TS/Uaqw5.4uECGYYHHd1saNWJTqh8m9Mo8YLSh1bCu', '086234598735', NULL, '2025-07-22 14:12:41', '2025-07-24 14:08:50', NULL, 'admin'),
(2, 'azmi', 'azmi@gmail.com', NULL, '$2y$12$BzKVyNQWFdjv3vRahHgylOKriv7tEf4Fk8jwdPM95hFOv2G17gReS', '081524386975', NULL, '2025-07-22 14:36:47', '2025-07-24 14:09:14', NULL, 'kurir_motor'),
(3, 'ahmad', 'ahmad1@gmail.com', NULL, '$2y$12$L0PHBfosFIPwUMPZV8xcYOzd9lbFsXlRIeV9fw/ult4brDysZfv4G', '08973528764', NULL, '2025-07-28 02:38:10', '2025-07-28 02:38:10', NULL, 'kurir_motor');

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
-- Indexes for table `drop_points`
--
ALTER TABLE `drop_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`id_kurir`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `penerimas`
--
ALTER TABLE `penerimas`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengiriman_no_resi_unique` (`no_resi`),
  ADD KEY `pengiriman_id_produk_foreign` (`id_produk`),
  ADD KEY `pengiriman_id_kurir_foreign` (`id_kurir`),
  ADD KEY `pengiriman_id_penerima_foreign` (`id_penerima`),
  ADD KEY `pengiriman_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `pengirims`
--
ALTER TABLE `pengirims`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produks_no_resi_unique` (`no_resi`),
  ADD KEY `produks_id_kurir_foreign` (`id_kurir`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `trackings`
--
ALTER TABLE `trackings`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_id_tarif_foreign` (`id_tarif`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `transaksis_id_pengirim_fg` (`id_pengirim`),
  ADD KEY `transaksis_id_penerima_fg` (`id_penerima`);

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
-- AUTO_INCREMENT for table `drop_points`
--
ALTER TABLE `drop_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id_kurir` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `penerimas`
--
ALTER TABLE `penerimas`
  MODIFY `id_penerima` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengirims`
--
ALTER TABLE `pengirims`
  MODIFY `id_pengirim` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id_tarif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trackings`
--
ALTER TABLE `trackings`
  MODIFY `id_tracking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_id_kurir_foreign` FOREIGN KEY (`id_kurir`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_penerima_foreign` FOREIGN KEY (`id_penerima`) REFERENCES `penerimas` (`id_penerima`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengiriman_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_id_kurir_foreign` FOREIGN KEY (`id_kurir`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_id_penerima_fg` FOREIGN KEY (`id_penerima`) REFERENCES `penerimas` (`id_penerima`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_id_penerima_foreign` FOREIGN KEY (`id_penerima`) REFERENCES `penerimas` (`id_penerima`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_id_pengirim_fg` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirims` (`id_pengirim`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_id_pengirim_foreign` FOREIGN KEY (`id_pengirim`) REFERENCES `pengirims` (`id_pengirim`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_id_tarif_foreign` FOREIGN KEY (`id_tarif`) REFERENCES `tarifs` (`id_tarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
