-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Agu 2021 pada 05.12
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpengkat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_07_085135_add_roles_field_to_users_table', 1),
(5, '2021_01_08_060634_create_pengaduans_table', 1),
(6, '2021_01_11_011623_create_tanggapans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum di Proses',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `user_nik`, `name`, `user_id`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1234', 'admin', 1, 'vcbcvbvcbcvb vbcb', 'assets/laporan/3NthK2asLCRZQMZ3hjDauvJA535wGzO982xKkCRX.ico', 'Sedang di Proses', NULL, '2021-08-01 16:26:43', '2021-08-01 16:26:43'),
(2, '3573011610970010', 'Rizal Fatkhurrohman fanani', 4, 'dsfdsfsdfsdf', 'assets/laporan/o5c6klr5eWZvaLBsMxdGvCaowE9fUba1FdNAlo3T.pdf', 'Belum di Proses', NULL, '2021-08-05 12:07:03', '2021-08-05 12:07:03'),
(3, '332434432432', 'Rizal', 5, 'fhsdfhjsd dfhjdshjkfhjksdf', 'assets/laporan/x42ySRBJB6W8ejT227QaFGFd7wYWXHOwYEXNJ5Nc.pdf', 'Belum di Proses', NULL, '2021-08-05 12:21:20', '2021-08-05 12:21:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapans`
--

CREATE TABLE `tanggapans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapans`
--

INSERT INTO `tanggapans` (`id`, `pengaduan_id`, `tanggapan`, `petugas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'mantap', 1, '2021-08-01 16:28:10', '2021-08-01 16:28:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES
(1, '1234', 'admin', 'admin@app.com', '082139121467', NULL, '$2y$10$NhrMO6YHxIZt3/jThnjDheYSBn8.oJfzBXVm9VURcKYoPcyDRsNBq', NULL, NULL, NULL, 'ADMIN'),
(3, '1235', 'admin', 'user@app.com', '082139121467', NULL, '$2y$10$NhrMO6YHxIZt3/jThnjDheYSBn8.oJfzBXVm9VURcKYoPcyDRsNBq', NULL, NULL, NULL, 'USER'),
(4, '3573011610970010', 'Rizal Fatkhurrohman fanani', 'demo@demo.com', '6456456', NULL, '$2y$10$GIz.JbqdyQyOCY6Cnso/s.l/HLFDnKjauMb/xFZM.mwwGEWebaZzu', NULL, '2021-08-05 12:06:38', '2021-08-05 12:06:38', 'USER'),
(5, '332434432432', 'Rizal', 'rizalffanani@gmail.com', '6456456', NULL, '$2y$10$i/CGj.MZMtOkgiFetvO68.CVRik09FC8Yw6N/AdEAM1NPz0Bykfcq', NULL, '2021-08-05 12:20:07', '2021-08-05 12:20:07', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
