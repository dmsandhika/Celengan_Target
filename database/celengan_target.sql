-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2023 pada 08.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celengan_target`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `pass`, `alamat`, `no`, `pekerjaan`, `ttl`, `email`, `kelamin`) VALUES
(1, 'Dimas Andhika Firmansyah', 'dmsandhika', '1234', 'Pemalang', '089630147925', 'Mahasiswa', '2023-06-07', 'dmsandhika87@students.unnes.ac.id', 'Laki Laki'),
(2, 'Farkhan Kebab', 'Elforger', '1234', 'Isekai', '0897235782', 'Wibu', '2000-02-29', 'elsword@gmail.com', 'Laki Laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukkan`
--

CREATE TABLE `pemasukkan` (
  `id` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `hari_ini` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemasukkan`
--

INSERT INTO `pemasukkan` (`id`, `id_target`, `masuk`, `hari_ini`) VALUES
(1, 1, 0, '2023-06-12'),
(2, 1, 10000, '2023-06-12'),
(3, 1, 555556, '2023-06-13'),
(4, 2, 0, '2023-06-12'),
(5, 2, 555556, '2023-06-12'),
(6, 2, 555556, '2023-06-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hari_target` date NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`id`, `nama`, `hari_target`, `harga`) VALUES
(1, 'Laptop', '2023-06-30', 10000000),
(2, 'Mobil', '2023-06-30', 10000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_target` (`id_target`);

--
-- Indeks untuk tabel `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `harga` (`harga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemasukkan`
--
ALTER TABLE `pemasukkan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD CONSTRAINT `pemasukkan_ibfk_1` FOREIGN KEY (`id_target`) REFERENCES `target` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
