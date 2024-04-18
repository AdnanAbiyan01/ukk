-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2024 pada 03.00
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
-- Database: `db_pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `complaints`
--

INSERT INTO `complaints` (`id`, `tanggal`, `judul`, `isi`, `gambar`, `status`, `created`, `modified`, `user_id`) VALUES
(2, '2024-03-20 09:10:55', 'Tawuran', 'tawuran antar sekolah', 'Yellow Modern Business Book Cover.jpg.jpg', 1, '2024-03-20 02:11:39', '2024-03-20 02:11:39', 1),
(3, '2024-03-28 11:43:57', 'Kumpul Kebo', 'Ada orang kumpul kebo', 'kebo.jpg.jpg', 1, '2024-03-28 04:47:11', '2024-03-28 04:47:11', 7),
(4, '2024-03-30 11:51:24', 'Mabuk', 'Horang mabuk', 'gambar+lucu+orang+sedang+mabuk-707361.jpg.jpg', 1, '2024-03-28 04:52:48', '2024-03-28 04:52:48', 7),
(5, '2024-04-04 12:22:12', 'Tawuran antar kelompok', 'ada tawuran di gg 8', 'Struktur Organisasi Puskesmas Bareng.jpg.jpg', 1, '2024-04-04 05:22:34', '2024-04-04 05:24:02', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `tanggapan` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `responses`
--

INSERT INTO `responses` (`id`, `tanggapan`, `created`, `modified`, `complaint_id`, `user_id`) VALUES
(6, 'ok siap', '2024-04-04 05:23:01', '2024-04-04 05:23:01', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` text NOT NULL,
  `telp` char(15) NOT NULL,
  `level` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `username`, `password`, `telp`, `level`, `created`, `modified`) VALUES
(1, '67635683735', 'Adnan Abiyan Amrullah', 'Adnan', '$2y$10$aNd8.BTwlud5WU4ZBOHAMeEvk80sF1MHDszSVUrVokmONURJXka3K', '0987654321', 0, '2024-03-20 01:12:20', '2024-03-21 01:15:33'),
(7, '123456', '123', '12', '$2y$10$AD2T0fY/CfqbxWJfuhRD5OcMr4Kl6xWYQpox5rYrxQIpwRBmHld7i', '12345', 0, '2024-03-28 01:16:05', '2024-03-28 01:16:05'),
(8, '1232131', 'Adis Ariqoh', 'Adis', '$2y$10$HiUFsjBREdCvbhruFK9VxOmqcU0qbhvhk7cMhljx9V8b0zSffu7Da', '213123123', 0, '2024-04-04 05:21:27', '2024-04-04 05:21:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKcomplaints771818` (`user_id`);

--
-- Indeks untuk tabel `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKresponses940126` (`complaint_id`),
  ADD KEY `FKresponses639367` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `telp` (`telp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `FKcomplaints771818` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `FKresponses639367` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FKresponses940126` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
