-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Des 2022 pada 03.06
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_users`
--

CREATE TABLE `level_users` (
  `id_level` int(11) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level_users`
--

INSERT INTO `level_users` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'users');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_add`
--

CREATE TABLE `order_add` (
  `id_order_add` bigint(11) NOT NULL,
  `id_order_temp` int(11) NOT NULL,
  `id_order_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` bigint(11) NOT NULL,
  `id` int(11) NOT NULL,
  `total_price` int(25) NOT NULL,
  `pick_up` date NOT NULL,
  `delivery` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id`, `total_price`, `pick_up`, `delivery`, `no_telp`, `address`, `status`) VALUES
(1, 2, 30000, '2022-12-30', '2023-01-01', '0987654', 'qwertyuiop', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temp`
--

CREATE TABLE `order_temp` (
  `id_order_temp` bigint(11) NOT NULL,
  `id_service_upload` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `order_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_type`
--

CREATE TABLE `service_type` (
  `id_service_type` int(11) NOT NULL,
  `service_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service_type`
--

INSERT INTO `service_type` (`id_service_type`, `service_type`) VALUES
(1, 'man'),
(19, 'women');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_upload`
--

CREATE TABLE `service_upload` (
  `id_service_upload` bigint(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `id_service_type` int(11) NOT NULL,
  `dry_price` int(11) NOT NULL,
  `laundry_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service_upload`
--

INSERT INTO `service_upload` (`id_service_upload`, `service_name`, `id_service_type`, `dry_price`, `laundry_price`) VALUES
(2, 'jacket', 19, 2000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `no_telp`, `id_level`) VALUES
(2, 'admin', 'administrator', 'apapunlah', '1234567', 1),
(3, 'Sikander', 'sikander', 'qwertyuiop', '0987654321', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indeks untuk tabel `order_add`
--
ALTER TABLE `order_add`
  ADD PRIMARY KEY (`id_order_add`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indeks untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`id_order_temp`);

--
-- Indeks untuk tabel `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id_service_type`);

--
-- Indeks untuk tabel `service_upload`
--
ALTER TABLE `service_upload`
  ADD PRIMARY KEY (`id_service_upload`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `order_add`
--
ALTER TABLE `order_add`
  MODIFY `id_order_add` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `id_order_temp` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id_service_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `service_upload`
--
ALTER TABLE `service_upload`
  MODIFY `id_service_upload` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
