-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2025 pada 17.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect_friend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `avatars`
--

INSERT INTO `avatars` (`id`, `name`, `price`, `path`, `created_at`, `updated_at`) VALUES
(1, 'Hiro', 57238, '/assets/images/avatar/1.jpg', '2025-01-10 05:45:22', '2025-01-10 05:45:22'),
(2, 'Aiko', 21582, '/assets/images/avatar/2.jpg', '2025-01-10 05:45:22', '2025-01-10 05:45:22'),
(3, 'Sutsujin', 86741, '/assets/images/avatar/3.jpg', '2025-01-10 05:45:22', '2025-01-10 05:45:22'),
(4, 'Fumiko', 51911, '/assets/images/avatar/4.jpg', '2025-01-10 05:45:22', '2025-01-10 05:45:22'),
(5, 'Rai', 57457, '/assets/images/avatar/5.jpg', '2025-01-10 05:45:22', '2025-01-10 05:45:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Hi thereee!!', 1, '2025-01-10 08:34:29', '2025-01-10 08:40:13'),
(2, 4, 1, 'How are you?', 1, '2025-01-10 08:34:37', '2025-01-10 08:40:13'),
(3, 1, 4, 'Hello there! I\'m great Jessica!', 1, '2025-01-10 08:40:12', '2025-01-10 08:40:13'),
(4, 4, 1, 'Will you be available this afternoon?', 0, '2025-01-10 08:48:57', '2025-01-10 08:48:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','Accepted','Declined') NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `friends`
--

INSERT INTO `friends` (`id`, `sender_id`, `receiver_id`, `status`, `seen`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Pending', 0, '2025-01-10 06:30:08', '2025-01-10 06:30:08'),
(2, 1, 4, 'Accepted', 1, '2025-01-10 06:30:25', '2025-01-10 08:16:48'),
(3, 1, 3, 'Pending', 0, '2025-01-10 06:30:36', '2025-01-10 06:30:36'),
(4, 9, 1, 'Pending', 0, '2025-01-10 08:49:41', '2025-01-10 08:49:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_03_055224_create_friends_table', 1),
(5, '2025_01_04_055651_create_avatars_table', 1),
(6, '2025_01_04_055759_create_transactions_table', 1),
(7, '2025_01_08_056253_create_chats_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('X8z23bRxgccQyLZCOQiocd5ZIpFuEZ6dP3xAs6hv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicDlkY2V4QjVIWjVwRGdsZWRwTVk0ODU3bk9xUzVRRGx5TGJSSTdSMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS1wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1736527360);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `buyer_id`, `avatar_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-01-10 06:29:08', '2025-01-10 06:29:08'),
(2, 4, 4, '2025-01-10 08:08:48', '2025-01-10 08:08:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `hobbies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`hobbies`)),
  `instagram_username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `coin` int(11) NOT NULL DEFAULT 100,
  `profile_picture` varchar(255) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `hobbies`, `instagram_username`, `phone_number`, `coin`, `profile_picture`, `visibility`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vincent Oei', 'oei.vincent20@gmail.com', '$2y$12$fBf/MT0fdJH6A6maXzVDkus8F3jiuh9IfrczIuQrqnKlq9YKCh1Mu', 'Male', '[\"Crypto\",\" Chess\",\" Movies\"]', 'https://www.instagram.com/vin_oei', '082125282179', 35162, '/assets/images/avatar/1.jpg', 1, NULL, '2025-01-10 06:12:38', '2025-01-10 09:33:11'),
(2, 'Raditya Dika', 'radityadika@gmail.com', '$2y$12$nU/V1KjxrliltdiyD6ZgS.d46KNdHITDJDPcYa1f0izx/q3hkL12i', 'Male', '[\"Acting\",\" Comedy\",\" Film\"]', 'https://www.instagram.com/radityadika', '082345678901', 100, NULL, 1, NULL, '2025-01-10 06:20:40', '2025-01-10 06:20:40'),
(3, 'Agung Hapsah', 'agunghapsah@gmail.com', '$2y$12$a6KTCe0zYEztWbMax4c3MOkzXl5Do2FqMSlPjG/IKRYzjaGeYlzj2', 'Male', '[\"Skateboarding\",\" Editing\",\" Rap\"]', 'https://www.instagram.com/agunghapsah', '081234567890', 100, NULL, 1, NULL, '2025-01-10 06:21:54', '2025-01-10 06:21:54'),
(4, 'Jessica Jane', 'jessicajane@gmail.com', '$2y$12$98AuWgnQEeLrdY4oMthqh.llYbYj3iWpTlvus7O/g.ZHI29yKDuam', 'Female', '[\"Tiktok\",\" Youtube\",\" Sing\"]', 'https://www.instagram.com/jessicajane99', '082145327896', 18189, '/assets/images/avatar/4.jpg', 1, NULL, '2025-01-10 06:23:20', '2025-01-10 08:08:57'),
(5, 'Haruka Aya', 'harukaaya@gmail.com', '$2y$12$mxpCSu84n5zDrTr75GorBuw7rWyqZRsOHcFobqIRJsTWZbguK/INW', 'Female', '[\"Swimming\",\" Dancing\",\" Cooking\"]', 'https://www.instagram.com/harukaaa', '082123122456', 100, NULL, 1, NULL, '2025-01-10 06:55:17', '2025-01-10 06:55:17'),
(6, 'Kim Chaewon', 'kimchaewon@gmail.com', '$2y$12$6CPocqruA2guNJ/tF97ij.OWa87tR7M24zdcgXAG1qCAqUUavG9x.', 'Female', '[\"Singing\",\" Piano\",\" Violin\"]', 'https://www.instagram.com/_chaechae_1', '082123899876', 100, NULL, 1, NULL, '2025-01-10 06:59:48', '2025-01-10 06:59:48'),
(7, 'Bayu Skak', 'bayuskak@gmail.com', '$2y$12$KPuaOTzVWRqJXhKFb1719uQsboB408DMYOoB8w9G28wjIK.t.8Kny', 'Male', '[\"Youtube\",\" Acting\",\" Comedy\"]', 'https://www.instagram.com/moektito', '083478964532', 100, NULL, 1, NULL, '2025-01-10 07:01:08', '2025-01-10 07:01:08'),
(8, 'Matthew Ong', 'matthewong@gmail.com', '$2y$12$84xkpY0DiHq9qgsAHKQvme8nP/n3klMLNnTrYso6mItiH5HNMsw8O', 'Male', '[\"Hiking\",\" Bike\",\" Jogging\"]', 'https://www.instagram.com/memetong', '089723467865', 96499, NULL, 1, NULL, '2025-01-10 08:01:09', '2025-01-10 08:01:09'),
(9, 'Heungmin Son', 'heungminson@gmail.com', '$2y$12$Bsf970Wu4SP1jPTPFJEXTO2bALWEVeJDoRX5gQjilh/Ks//KAfNcm', 'Male', '[\"Football\",\" Movies\",\" Hangout\"]', 'https://www.instagram.com/hmson7', '089765434568', 100, NULL, 1, NULL, '2025-01-10 08:05:50', '2025-01-10 08:05:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_sender_id_foreign` (`sender_id`),
  ADD KEY `chats_receiver_id_foreign` (`receiver_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friends_sender_id_foreign` (`sender_id`),
  ADD KEY `friends_receiver_id_foreign` (`receiver_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_buyer_id_foreign` (`buyer_id`),
  ADD KEY `transactions_avatar_id_foreign` (`avatar_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friends_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
