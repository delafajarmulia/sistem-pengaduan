-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2024 at 02:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pengaduan`
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kerusakan Fasilitas', 'Laporan kerusakan fasilitas', NULL, NULL),
(2, 'Pelayanan Publik', 'Laporan terhadap layanan publik', NULL, NULL),
(3, 'Keamanan dan Kenyamanan', 'Laporan terhadap keamanan dan kenyamanan', NULL, NULL),
(4, 'Kebersihan dan Keindahan', 'Laporan terhadap kebersihan dan keindahan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `spot_id` bigint UNSIGNED DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `date_of_complaint` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `category_id`, `user_id`, `spot_id`, `content`, `image`, `status`, `date_of_complaint`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 2, 'Jalan menuju pantai ujungnegoro mengalami kerusakan yang sangat parah', '1730292890-jalan-rusak.jpg', 'proses', '2024-10-30 19:54:50', '2024-10-30 05:54:50', '2024-10-30 05:54:50'),
(2, 4, 6, 7, 'Air di kolam renang bandar ecopark banyak daunnya dan juga kotor', NULL, 'selesai', '2024-10-30 19:59:00', '2024-10-30 05:59:00', '2024-10-30 06:21:26'),
(3, 1, 7, 1, 'Toilet umum tidak berfungsi, banyak yang rusak dan tidak ada air.', '1730293661-toilet-rusak.jpg', 'proses', '2024-10-30 20:07:41', '2024-10-30 06:07:41', '2024-10-30 06:07:41'),
(4, 3, 7, 3, 'Tidak ada penjaga pantai di area berenang sehingga berpotensi berbahaya bagi pengunjung.', NULL, 'selesai', '2024-10-30 20:08:42', '2024-10-30 06:08:42', '2024-10-30 06:23:50'),
(5, 1, 5, 8, 'Beberapa fasilitas permainan anak rusak dan dapat membahayakan pengunjung anak-anak.', '1730293927-fasilitas-permainan-anak-rusak.jpg', 'proses', '2024-10-30 20:12:07', '2024-10-30 06:12:07', '2024-10-30 06:12:07'),
(6, 4, 9, 1, 'Toilet umum tidak terjaga kebersihannya dan tidak ada sabun atau tisu yang disediakan.', NULL, 'proses', '2024-10-30 20:17:18', '2024-10-30 06:17:18', '2024-10-30 06:17:18');

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
(4, '2024_10_10_143613_create_categories_table', 1),
(5, '2024_10_10_144251_add_column_to_users_table', 1),
(6, '2024_10_10_145122_create_complaints_table', 1),
(7, '2024_10_10_150121_create_responses_table', 1),
(8, '2024_10_19_063039_create_spots_table', 1),
(9, '2024_10_19_070926_add_column_fk_spot_to_complaints_table', 1),
(10, '2024_10_20_125233_add_image_column_to_spots_table', 1),
(11, '2024_10_24_064442_add_image_column_to_complaints_table', 1),
(12, '2024_10_26_064652_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_home_id` bigint UNSIGNED DEFAULT NULL,
  `user_away_id` bigint UNSIGNED DEFAULT NULL,
  `complaint_id` bigint UNSIGNED DEFAULT NULL,
  `category` enum('add_response','change_status','change_nik') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'add_response',
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `date_of_notification` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_home_id`, `user_away_id`, `complaint_id`, `category`, `message`, `date_of_notification`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 1, 'add_response', 'P**** **** ***** menambahkan komentar pada laporan Anda.', '2024-10-30 20:13:17', '2024-10-30 06:13:17', '2024-10-30 06:13:17'),
(2, 9, 5, 5, 'add_response', 'J**** menambahkan komentar pada laporan Anda.', '2024-10-30 20:18:39', '2024-10-30 06:18:39', '2024-10-30 06:18:39'),
(3, 4, 6, 2, 'add_response', 'Admin 1 menambahkan komentar pada laporan Anda.', '2024-10-30 20:21:20', '2024-10-30 06:21:20', '2024-10-30 06:21:20'),
(4, 4, 6, 2, 'change_status', 'Admin 1 telah mengubah status laporan Anda', '2024-10-30 20:21:26', '2024-10-30 06:21:26', '2024-10-30 06:21:26'),
(5, 4, 7, 4, 'add_response', 'Admin 1 menambahkan komentar pada laporan Anda.', '2024-10-30 20:23:46', '2024-10-30 06:23:46', '2024-10-30 06:23:46'),
(6, 4, 7, 4, 'change_status', 'Admin 1 telah mengubah status laporan Anda', '2024-10-30 20:23:50', '2024-10-30 06:23:50', '2024-10-30 06:23:50'),
(7, 4, 8, 1, 'add_response', 'Admin 1 menambahkan komentar pada laporan Anda.', '2024-10-30 20:24:59', '2024-10-30 06:24:59', '2024-10-30 06:24:59'),
(8, 9, 4, NULL, 'change_nik', 'J**** mengirimkan permintaan perubahan NIK menjadi 3325134302130001', '2024-10-30 21:23:49', '2024-10-30 07:23:49', '2024-10-30 07:23:49'),
(9, 4, 9, NULL, 'change_nik', 'Admin 1 telah mengubah NIK Anda', '2024-10-30 21:24:04', '2024-10-30 07:24:04', '2024-10-30 07:24:04');

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
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` bigint UNSIGNED NOT NULL,
  `complaint_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `date_of_response` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `complaint_id`, `user_id`, `content`, `date_of_response`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'iya nih, apalagi kalau habis hujan. penuh kubangan air', '2024-10-30 20:13:17', '2024-10-30 06:13:17', '2024-10-30 06:13:17'),
(2, 5, 9, 'bahkan beberapa permainan sudah tidak dapat digunakan', '2024-10-30 20:18:39', '2024-10-30 06:18:39', '2024-10-30 06:18:39'),
(3, 2, 4, 'Terima kasih atas laporan Anda. Saat ini kami telah menghubungi pihak pengelola kolam renang bandar untuk segera ditindak lanjuti🙏🏻', '2024-10-30 20:21:20', '2024-10-30 06:21:20', '2024-10-30 06:21:20'),
(4, 4, 4, 'Terima kasih atas laporan Anda. Kami telah menghubungi pihak pengelola Pantai Celong untuk mengerahkan personil guna menjaga keamanan pantai, khususnya untuk anak-anak👍', '2024-10-30 20:23:46', '2024-10-30 06:23:46', '2024-10-30 06:23:46'),
(5, 1, 4, 'Terima kasih atas laporan Anda. Saat ini pihak Dinas Pariwisata telah memproses laporan Anda. Jadi harap ditunggu yaa', '2024-10-30 20:24:59', '2024-10-30 06:24:59', '2024-10-30 06:24:59');

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
('0chkWL2v7MY6QByfDjCHh8Ehb6SheNVBs8nsH04h', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibVpvM1RlUDhoS3FCQzdKUlJpbHFZVWhXelNENzZ6eWV4MTVwYWZLcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=', 1730298259),
('2Klag6fr9IvlwAo3kijGiOsStnGQbHjVGPhJsfOw', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWlc2cWFxT01sNUtDNXFlVDY0MVY1S0NTelVtMkcyN2MxQU1NYXpuQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1730298244),
('5CqFwjhDXe4j8BTos7HvC09GYN3Ng8alL8JqWnQB', NULL, '127.0.0.1', 'Symfony', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVdwYWoySENsWTl3d0NXTjVRMUNxMGdIb1pNbHJ0TzVkYWh3cEVmciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9sb2NhbGhvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1730209268),
('fOylV8josZmfhV2XYG1GmCCY7FVhUXipxGYu6r4p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoieGQ4SW1WVEIwQVB2d0pRZ1RodlBwY1JKeHpGOFVQeFEyUEVyT2R4bSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730292573),
('p5VMGq0LlbWG8UxEFE4o7JxutYir73EtcJ2HfyNf', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZm95RG9wdkRRSXlqOTI1MDY4emdHOHp5QjdNRFR5aFdwejdCNXVFRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1730212205),
('VbMTkw0mE7O9UzWt74cm4zjDtR3mhnZ97FIq8mAp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSU5rSTBJeVZVcjFybGtiaFdZTHloTTRtSTVkdDdZekMwUFh5WDRUcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730212285),
('XRwC85hp8ro9UIIIFJY2B5EhohKabwrPOfP0sHfo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODVjWEsxb0RPNTlIZUdKSGs4aUtkQ2g4VzVJalc0ZlNJN0N2Wjk2bSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1730212300);

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html_address` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`id`, `name`, `image`, `description`, `address`, `html_address`, `created_at`, `updated_at`) VALUES
(1, 'Pantai Sigandu', 'kembang-langit.png', 'Sigandu tergolong pantai landai, dengan ombak yang tidak begitu besar. Lokasinya berjarak sekitar 4 km dari alun-alun kota Batang. Di Pantai Sigandu tersedia fasilitas arena playground untuk anak-anak, lapangan voli, serta dihiasi dengan taman mangrove dan panorama sunset (matahari terbenam) yang indah serta memungkinkan melihat sunrise (matahari terbit) dari garis horison.', 'Dk. Kidanglor, Ds. Klidang Lor, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.312167594868!2d109.74279334391723!3d-6.8812541898810755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e702529971fc2f5%3A0xeb3afb4a9b4fb241!2sPantai%20Sigandu%20Batang!5e0!3m2!1sid!2sid!4v1729320016845!5m2!1sid!2sid', NULL, NULL),
(2, 'Pantai Ujungnegoro', 'kembang-langit.png', 'Terletak di Kecamatan Kandeman 12,8 km dari Ibukota Kabupaten Batang. Pantai dengan tebing di bibir pantai dan karang yang menjorok ke Laut Jawa. Mengingatkan pada tokoh penyebaran agama Islam di Kabupaten Batang, yaitu Syeikh Maulana Maghribi yang kemudian dibuat petilasan di atas tebing. Di bawah tebing menghadap ke Laut Jawa terdapat goa peninggalan Syeikh Maulana Maghribi.', 'Dk. Rowokudo, Ds. Ujungnegoro, Kec. Kandeman, Kabupaten Batang, Jawa Tengah 51261', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9907096864426!2d109.79610637475668!3d-6.891713793107373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e703bd14981fc7f%3A0x6a8fecb1667c645f!2sPantai%20Ujungnegoro!5e0!3m2!1sid!2sid!4v1729320326907!5m2!1sid!2sid', NULL, NULL),
(3, 'Pantai Celong', 'kembang-langit.png', 'Terletak di kecamatan Bayuputih, 32 km timur ibukota Kabupaten Batang. Pantai dengan karakteristik bebatuan karang menghampar di sepanjang pantai, memecahkan gulungan ombak Laut Jawa yang saling beriringan.', 'Dk. Mangunsari, Ds. Celong, Kec. Banyuputih, Kabupaten Batang, Jawa Tengah 51271', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.797276033672!2d109.92979597475697!3d-6.914824893084716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7040d9e756d619%3A0x1c8330d10fd26ffa!2sPantai%20Celong%20(Celong%20Beach)!5e0!3m2!1sid!2sid!4v1729320530211!5m2!1sid!2sid', NULL, NULL),
(4, 'Desa Wisata Pandansari', 'kembang-langit.png', 'Tubing Pandansari terletak di Desa Pandansari Kecamatan Warungasem, sekitar 15 km sebelah barat ibukota Kabupaten Batang. Tubing Pandansari adalah kegiatan mengarungi arus sungai saluran irigasi persawahan di desa Pandansari. Sangat cocok untuk kegiatan refresing bersama keluarga atau teman.Selain kegiatan tubing juga menawarkan kegiatan camping dan outbound. Pengunjung juga akan diajak menikmati makanan olahan warga sekitar yaitu opak sambel.', 'Ds. Pandansari, Kec. Warungasem, Kabupaten Batang, Jawa Tengah 51252', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2217251615225!2d109.71809697475761!3d-6.983140493017742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7022f254613fb5%3A0xd0087c96f37ed405!2sDesa%20Wisata%20Pandansari!5e0!3m2!1sid!2sid!4v1729320731420!5m2!1sid!2sid', NULL, NULL),
(5, 'Wisata Agro Selopajang Timur (WAST)', 'kembang-langit.png', 'Wisata Agro Selopajang Timur terletak di Desa Selopajang Timur Kecamatan Blado, sekitar 30 km selatan ibukota Kabupaten Batang. Objek wisata ini menawarkan taman buah yang cukup luas dilengkapi dengan kolam renang, kolam terapi ikan, aula, lapangan, wahana permainan dan outbond. Terletak di kaki Gunung Kamulyan, objek wisata ini menawarkan kesejukan dan pemandangan yang indah.', 'Jl. Raya Reban - Blado No.KM 3, Slambat, Selopajang Tim., Kec. Blado, Kabupaten Batang, Jawa Tengah 51255', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.4981242414833!2d109.85209177475843!3d-7.068096792934522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7016a764985dfb%3A0x362633754126b0ec!2sAgro%20Wisata%20Selopajang%20Timur!5e0!3m2!1sid!2sid!4v1729320894478!5m2!1sid!2sid', NULL, NULL),
(6, 'Taman Hiburan Rakyat Kramat', 'kembang-langit.png', 'Taman Hiburan Rakyat Kramat adalah taman kota di daerah ibukota Kabupaten Batang. THR Kramat dilengkapi dengan kolam renang prestasi dengan wahana permainan atau play ground, dan panggung hiburan yang sering diadakan pementasan dangdut maupun kesenian lainnya untuk hiburan rakyat.', 'Dk. Kuncen, Ds. Proyonanggan Selatan, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.718000660987!2d109.73087637475707!3d-6.924274393075475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7023b6f144ed73%3A0xdce42cf72bfd0bc4!2sTHR%20Kramat%20Batang!5e0!3m2!1sid!2sid!4v1729321103658!5m2!1sid!2sid', NULL, NULL),
(7, 'Bandar EcoPark', 'kembang-langit.png', 'Bandar EcoPark terletak di Kecamatan Bandar, sekitar 20 km selatan Ibukota Kabupaten Batang. Objek wisata ini dirancang dengan tema taman ekowisata yang dilengkapi dengan taman bermain, kolam renang, dan aula. Taman bermain di tengah taman yang alami dengan berbagai macam wahana permainan.Kolam renang yang disusun menarik dengan mata air alami yang diambil dari sumber mata air di antara pepohonan besar di taman.', 'Jl. Raya Sidomulyo No.KM 1, Karetan, Wonokerto, Kec. Bandar, Kabupaten Batang, Jawa Tengah 51254', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.778724895155!2d109.79987717475815!3d-7.035273292966678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7017adb824f847%3A0x9607128fe4849e8c!2sKolam%20Renang%20Bandar%20EcoPark!5e0!3m2!1sid!2sid!4v1729321240869!5m2!1sid!2sid', NULL, NULL),
(8, 'Pantai Jodo', 'kembang-langit.png', 'Terletak di Kecamatan Gringsing 45,7 km timur Ibukota Kabupaten Batang. Hamparan pasir nan luas ditumbuhi dedaunan hijau menjadikan karakter tersendiri dari pantai ini. Di sepanjang pantai tumbuh sabuk hijau pepohonan cemara yang rindang menjadi tempat bersantai untuk menikmati keindahan pantai.', 'Sikluyu, Sidorejo, Kec. Gringsing, Kabupaten Batang, Jawa Tengah 51281', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.945503502087!2d109.98851284392357!3d-6.922085239240391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7041f5e15f92d3%3A0x60be912ede79cc43!2sPantai%20Jodo!5e0!3m2!1sid!2sid!4v1729321418813!5m2!1sid!2sid', NULL, NULL),
(9, 'Hutan Kota Rajawali (HKR) Batang', '1730295475-hkr.jpg', 'Hutan Kota Rajawali untuk memberikan ruang terbuka hijau di kawasaan perkotaaan sebagai paru-paru kota. Selain itu, Hutan Rajawali yang luasnya 2 hektar dapat difungsikan sebagai tempat untuk bersantai dan tempat olahraga serta edukasi, karena di Hutan Rajawali sudah kami lengkapi dengan saran prasarana fitness, joging track, kursi santai dan juga penerangan lampu agar malam hari bisa juga bisa menjadi tempat rekreasi murah di dalam kota Batang.', 'Beran, Kauman, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.865528554785!2d109.71782737475688!3d-6.906678993092702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70248cfd662d4b%3A0xd0f5118f9b406469!2sHutan%20Kota%20Rajawali%20Batang!5e0!3m2!1sid!2sid!4v1730294889172!5m2!1sid!2sid', '2024-10-30 06:37:55', '2024-10-30 06:37:55'),
(10, 'Agrowisata Pagilaran', '1730295922-pagilaran.jpg', 'Perkebunan teh Pagilaran terletak di kaki Gunung Kamulyan Kecamatan Blado, sekitar 35 km selatan ibukota Kabupaten Batang. Yang dikembangkan pada masa penjajahan Belanda pada tahun 1899 dan sempat diambil alih oleh Perusahaan Inggris di tahun 1928. Pada masaPerang dunia II, areal perkebunan diganti dengan tanaman pangan oleh masyarakat Jepang hingga tahun 1947. Sejak tahun 1964, Perkebunan Teh Pagilaran dikelola oleh Fakultas Pertanian Universitas Gajah Mada Yogyakarta.', 'Ds. Keteleng, Kec. Blado, Kab. Batang, Jawa Tengah', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.1301775103952!2d109.85239277475888!3d-7.110909242892597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7013d86e588357%3A0x942d078b2af6f72f!2sWisata%20Pagilaran!5e0!3m2!1sid!2sid!4v1730295685891!5m2!1sid!2sid', '2024-10-30 06:45:22', '2024-10-30 06:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin 1', '0000000000000000', 'admin@gmail.com', '089257819747', 'admin', NULL, '$2y$12$xdvag8KiLIe4JVAuBnz03.PwRXurT/b3LXg4V6Ukio7TVWmuXt2y2', NULL, NULL, NULL),
(5, 'Pipit Sofi Adila', '3325134204030001', 'pipit@gmail.com', '089257819746', 'user', NULL, '$2y$12$6Leatbg1KODvkv4Jo50wfuWmeuGzuosQ9W3wLkmhlqXXHkI3FlqEq', NULL, NULL, NULL),
(6, 'Fitri Yuliani', '3325134207010001', 'yuli@gmail.com', '089267819746', 'user', NULL, '$2y$12$QReN8p76Q2fEq5N0y5/ss..Ls5OMRVSCdekUUgJR5sCw35VJJmnpK', NULL, NULL, NULL),
(7, 'Wulan Setiyani', '3325134210990001', 'wulan@gmail.com', '089557819746', 'user', NULL, '$2y$12$aAP4vnHEU4sadRoVIZjm/.9Hw0Jryr8UVWPy9PkX4Ks5Fr7P0oZkS', NULL, NULL, NULL),
(8, 'Dela Fajar Mulia', '3325134202070001', 'dela@gmail.com', '089557819749', 'user', NULL, '$2y$12$mPjia/KqB.Nz/O0WoNgK8eyNBpHQrAnltT0AOTqHMERUCUU2wqLgO', NULL, NULL, NULL),
(9, 'Janet', '3325134302130001', 'janet@gmail.com', '088228893275', 'user', NULL, '$2y$12$D2ZthZ5PxLl9lyv5bqCkzOXsJpqcA15UxDrRG.0fJWX.gm6.DibOK', NULL, '2024-10-30 06:15:33', '2024-10-30 07:24:04');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_category_id_foreign` (`category_id`),
  ADD KEY `complaints_user_id_foreign` (`user_id`),
  ADD KEY `complaints_spot_id_foreign` (`spot_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_home_id_foreign` (`user_home_id`),
  ADD KEY `notifications_user_away_id_foreign` (`user_away_id`),
  ADD KEY `notifications_complaint_id_foreign` (`complaint_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responses_complaint_id_foreign` (`complaint_id`),
  ADD KEY `responses_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_spot_id_foreign` FOREIGN KEY (`spot_id`) REFERENCES `spots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_away_id_foreign` FOREIGN KEY (`user_away_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_home_id_foreign` FOREIGN KEY (`user_home_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `responses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
