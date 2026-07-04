-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2026 pada 01.55
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
-- Database: `laundry_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `estimasi_waktu` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `harga`, `satuan`, `estimasi_waktu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cuci Celana', 6000, 'Kg', '2 Hari', '2026-07-04 14:48:24', '2026-07-04 22:25:48', NULL),
(2, 'Cuci Karpet', 15000, 'Meter', '3 Hari', '2026-07-04 14:48:24', NULL, NULL),
(3, 'Cuci celana dalam', 100000, 'Kg', '1 hari', '2026-07-04 20:54:16', '2026-07-04 23:01:27', '2026-07-04 23:01:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-07-04-143619', 'App\\Database\\Migrations\\Layanan', 'default', 'App', 1783176495, 1),
(2, '2026-07-04-143630', 'App\\Database\\Migrations\\Pelanggan', 'default', 'App', 1783176495, 1),
(3, '2026-07-04-143638', 'App\\Database\\Migrations\\Users', 'default', 'App', 1783176495, 1),
(4, '2026-07-04-193306', 'App\\Database\\Migrations\\Transaksi', 'default', 'App', 1783193960, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dylan Rifqi Alfaizi', 'Jl. Nakula 1, Semarang', '081234567890', '2026-07-04 14:48:24', NULL, NULL),
(2, 'Syahrul', 'Gondangmanis Kudus', '0218192922712', '2026-07-04 20:47:23', '2026-07-04 20:47:23', NULL),
(3, 'Milea', 'Kudus', '08123129339312', '2026-07-04 21:22:28', '2026-07-04 21:22:28', NULL),
(4, 'ayra', 'kudus', '085123812837', '2026-07-04 22:35:44', '2026-07-04 22:35:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) UNSIGNED NOT NULL,
  `pelanggan_id` int(11) UNSIGNED NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `total_bayar` decimal(12,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `pelanggan_id`, `tanggal_transaksi`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-07-04 20:00:58', 18000.00, '2026-07-04 20:00:58', '2026-07-04 20:00:58'),
(2, 1, '2026-07-04 20:11:36', 39000.00, '2026-07-04 20:11:36', '2026-07-04 20:11:36'),
(3, 2, '2026-07-04 20:48:01', 6000.00, '2026-07-04 20:48:01', '2026-07-04 20:48:01'),
(4, 2, '2026-07-04 20:49:08', 12000.00, '2026-07-04 20:49:08', '2026-07-04 20:49:08'),
(5, 2, '2026-07-04 20:49:52', 12000.00, '2026-07-04 20:49:52', '2026-07-04 20:49:52'),
(6, 2, '2026-07-04 20:52:29', 21000.00, '2026-07-04 20:52:29', '2026-07-04 20:52:29'),
(7, 2, '2026-07-04 20:53:42', 42000.00, '2026-07-04 20:53:42', '2026-07-04 20:53:42'),
(8, 2, '2026-07-04 21:03:30', 10000.00, '2026-07-04 21:03:30', '2026-07-04 21:03:30'),
(9, 3, '2026-07-04 21:22:57', 16000.00, '2026-07-04 21:22:57', '2026-07-04 21:22:57'),
(10, 4, '2026-07-04 22:36:39', 21000.00, '2026-07-04 22:36:39', '2026-07-04 22:36:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$b13SyAJnLz76NNnwWIKqbOHEIySkEIcOm6Lz7egqqyOjCipqHGQDq', '2026-07-04 14:48:25', NULL),
(2, 'ayra', '$2y$10$eQhHL8naVxttI/9gUEO8GeX61tcYI6z7dHRX3TEKzy5WwRPPygdzS', '2026-07-04 15:52:57', '2026-07-04 15:52:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
