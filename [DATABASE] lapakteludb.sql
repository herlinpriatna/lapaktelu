-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2023 at 09:23 PM
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
-- Database: `lapakteludb`
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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Sepatu', '2023-12-13 09:41:00', '2023-12-13 09:41:00', 'Sepatu\r\n'),
(2, 'Pakaian Wanita', '2023-12-19 09:31:46', '2023-12-19 09:31:46', 'pakaian-wanita'),
(3, 'Elektronik', '2023-12-19 10:23:41', '2023-12-19 10:23:41', 'elektronik'),
(4, 'Tas', '2023-12-19 10:25:25', '2023-12-19 10:25:25', 'tas'),
(5, 'Pakaian Pria', '2023-12-19 10:25:25', '2023-12-19 10:25:25', 'pakaian-pria'),
(6, 'Smartphone', '2023-12-26 12:55:02', '2023-12-26 12:55:02', 'smartphone'),
(7, 'Buku', '2023-12-26 12:55:41', '2023-12-26 12:55:41', 'buku'),
(8, 'Aksesoris', '2023-12-26 12:56:59', '2023-12-26 12:56:59', 'aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `kondisis`
--

CREATE TABLE `kondisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kondisis`
--

INSERT INTO `kondisis` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barang Baru', '2023-12-13 09:41:52', '2023-12-13 09:41:52'),
(2, 'Seperti Baru', '2023-12-26 12:59:14', '2023-12-26 12:59:14'),
(3, 'Jarang digunakan', '2023-12-26 12:59:14', '2023-12-26 12:59:14'),
(4, 'Sering digunakan', '2023-12-26 13:10:01', '2023-12-26 13:10:01'),
(5, 'Layak digunakan', '2023-12-26 13:10:34', '2023-12-26 13:10:34'),
(6, 'Terdapat cacat', '2023-12-26 13:16:05', '2023-12-26 13:16:05');

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
(5, '2023_12_13_074921_create_kategoris_table', 1),
(6, '2023_12_13_075142_create_kondisis_table', 1),
(7, '2023_12_13_080010_create_produks_table', 1),
(8, '2023_12_16_034416_add_slug_to_kategoris', 2),
(9, '2023_12_19_162359_create_simpans_table', 3);

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
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kondisi_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('pending','accepted','rejected','reported') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama`, `deskripsi`, `harga`, `kategori_id`, `kondisi_id`, `user_id`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sepatu Nike', 'sepatu nike bagus ukuran 45', 250000, 1, 1, 1, '1703048086.jpg', 'accepted', '2023-12-13 02:51:21', '2023-12-26 12:16:54'),
(2, 'Sepatu Nike', 'seaptu naik ukuran 35', 50000, 1, 1, 3, '1702478051.jpg', 'accepted', '2023-12-13 07:34:11', '2023-12-20 01:06:01'),
(3, 'Hoodie Pink', 'hoodie pink ukuran XL', 180000, 2, 1, 1, '1702978372.jpg', 'accepted', '2023-12-19 02:32:53', '2023-12-19 02:33:26'),
(4, 'Tas Lucu', 'tas untuk anak SD cocok banget', 345000, 4, 1, 3, '1702994673.jpg', 'accepted', '2023-12-19 07:04:33', '2023-12-26 13:22:50'),
(5, 'Gelang Cantik', 'gelang untuk cwe bagus bgt iniii', 45000, 2, 1, 3, '1703039254.png', 'accepted', '2023-12-19 19:27:34', '2023-12-19 19:28:05'),
(6, 'Televisi Bekas Smart TV', 'smart tv bagus baru 2 tahun pakai', 1200000, 3, 1, 1, '1703039446.png', 'accepted', '2023-12-19 19:30:46', '2023-12-19 19:31:08'),
(7, 'Tas Hitam', 'tas hitam cowok', 48000, 4, 1, 1, '1703041923.png', 'accepted', '2023-12-19 20:12:03', '2023-12-19 20:13:15'),
(8, 'PSU', 'ini psu cuyy', 1230000, 1, 1, 4, '1703053250.jpg', 'rejected', '2023-12-19 23:20:50', '2023-12-20 09:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `simpans`
--

CREATE TABLE `simpans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simpans`
--

INSERT INTO `simpans` (`id`, `user_id`, `produk_id`, `created_at`, `updated_at`) VALUES
(29, 4, 4, '2023-12-22 04:12:23', '2023-12-22 04:12:23'),
(36, 4, 1, '2023-12-26 12:42:04', '2023-12-26 12:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namalengkap` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nomorHP` bigint(25) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `fotoProfil` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `namalengkap`, `username`, `email`, `email_verified_at`, `password`, `nomorHP`, `alamat`, `fotoProfil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'herlinpriatna', 'herlinpriatna31@gmail.com', NULL, '$2y$12$eHdmxfu5ynGCm1LT5kPEbODZ7Mu7rKLhbAPR.mynsEl5pKsazq5QW', NULL, NULL, NULL, NULL, '2023-12-13 02:38:32', '2023-12-13 02:38:32'),
(2, NULL, 'admin123', 'admin@gmail.com', NULL, '$2y$12$PfqWIkuGQhWPncVm/yqNGuYCNm79qTObZvAHt6f/s15xVgMSYwWHy', NULL, NULL, NULL, NULL, '2023-12-13 02:55:35', '2023-12-13 02:55:35'),
(3, NULL, 'nurulpratiwi', 'nurulpratiwi123@gmail.com', NULL, '$2y$12$Wufft3tzY.hMdncDsf426utU9UMWHvRRrhepsjHJvZ54PwW1RRfsO', NULL, NULL, NULL, NULL, '2023-12-13 07:32:52', '2023-12-13 07:32:52'),
(4, 'Muhammad Zulfadly', 'muhammadzulfadly', 'muhammadzulfadly6@gmail.com', NULL, '$2y$12$r.HA48rNabP4YXwHYL3TCel1TcmU6poqAN2gx4G7u63mKsbh7VKIG', 6282293393283, 'Bandung', '1703620246.jpg', NULL, '2023-12-19 20:49:38', '2023-12-26 12:50:46');

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
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_name_unique` (`name`),
  ADD UNIQUE KEY `kategoris_slug_unique` (`slug`);

--
-- Indexes for table `kondisis`
--
ALTER TABLE `kondisis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kondisis_name_unique` (`name`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpans`
--
ALTER TABLE `simpans`
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
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kondisis`
--
ALTER TABLE `kondisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `simpans`
--
ALTER TABLE `simpans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
