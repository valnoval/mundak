-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jan 2018 pada 19.00
-- Versi server: 10.1.29-MariaDB
-- Versi PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mundakin`
--
CREATE DATABASE IF NOT EXISTS `mundakin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mundakin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$wJmQmuWmVrbMnJFi9cYjYevECQ7FIA72b9q5KKxi8bTZga9rXYK92', 'admin'),
(2, 'juru kunci', '$2y$10$8Znk1SO9liFveXOnYkHmxOUDDEkREUPYv9GzNo.5uHNYYs8SHH3pe', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_nasional`
--

CREATE TABLE `harga_nasional` (
  `id_harga_nasional` int(5) NOT NULL,
  `id_komoditas` int(5) NOT NULL,
  `angka` int(10) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_nasional`
--

INSERT INTO `harga_nasional` (`id_harga_nasional`, `id_komoditas`, `angka`, `waktu`) VALUES
(1, 1, 9000, '2018-01-18'),
(2, 2, 4500, '2018-01-13'),
(3, 3, 6000, '2018-01-16'),
(4, 4, 6000, '2018-01-17'),
(5, 5, 5000, '2018-01-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_tani`
--

CREATE TABLE `harga_tani` (
  `id_harga_tani` int(5) NOT NULL,
  `id_komoditas` int(5) NOT NULL,
  `angka` int(10) NOT NULL,
  `waktu` date NOT NULL,
  `id_lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_tani`
--

INSERT INTO `harga_tani` (`id_harga_tani`, `id_komoditas`, `angka`, `waktu`, `id_lokasi`) VALUES
(1, 1, 8000, '2018-01-17', 'D51XP'),
(2, 3, 5000, '2018-01-16', '9OOK4'),
(3, 2, 4000, '2018-01-19', 'SU119'),
(4, 4, 6000, '2018-01-18', 'CM4EJ'),
(5, 5, 3500, '2018-01-23', 'OY2BE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(5) NOT NULL,
  `id_komoditas` int(5) NOT NULL,
  `id_lokasi` varchar(20) NOT NULL,
  `id_harga_tani` int(5) NOT NULL,
  `id_harga_nasional` int(5) NOT NULL,
  `angka` int(10) NOT NULL,
  `waktu` date NOT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`id_jual`, `id_komoditas`, `id_lokasi`, `id_harga_tani`, `id_harga_nasional`, `angka`, `waktu`, `id_user`) VALUES
(5, 1, 'D51XP', 1, 1, 10000, '2018-01-17', 1),
(6, 2, 'SU119', 3, 2, 5000, '2018-01-17', 2),
(7, 3, '9OOK4', 2, 3, 6500, '2018-01-17', 3),
(8, 4, 'CM4EJ', 4, 3, 7000, '2018-01-17', 4),
(9, 5, 'OY2BE', 5, 5, 6000, '2018-01-17', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE `komoditas` (
  `id_komoditas` int(5) NOT NULL,
  `nama_komoditas` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`id_komoditas`, `nama_komoditas`, `jenis`, `keterangan`, `foto`) VALUES
(1, 'bunga kol', 'lokal', 'segar', 'sayur6.jpg'),
(2, 'terong', 'lokal', 'murah', 'sayur3.jpg'),
(3, 'tomat', 'lokal', 'lazati', 'sayur5.jpg'),
(4, 'wortel', 'lokal', 'segar', 'sayur1.jpg'),
(5, 'labu', 'impor', 'murah', 'sayur2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` varchar(20) NOT NULL,
  `kecamatan` varchar(70) NOT NULL,
  `kelurahan` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `kecamatan`, `kelurahan`) VALUES
('9OOK4', 'Wonosobo', 'Jaraksari'),
('CM4EJ', 'Mojotengah', 'Kalibeber'),
('D51XP', 'Garung', 'Kalijeruk'),
('OY2BE', 'Wonosobo', 'Longkrang'),
('SU119', 'Selomerto', 'Balikambang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasar`
--

CREATE TABLE `pasar` (
  `id_pasar` int(5) NOT NULL,
  `nama_pasar` varchar(100) NOT NULL,
  `id_lokasi` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasar`
--

INSERT INTO `pasar` (`id_pasar`, `nama_pasar`, `id_lokasi`, `gambar`) VALUES
(1, 'Pasar Kota', 'OY2BE', 'mantap-direvitalisasi-omzet-pasar-ini-naik-hingga-810-S9AHmeLab7.jpg'),
(2, 'Pasar Kalibeber', 'CM4EJ', 'pexels-photo-263078.jpeg'),
(3, 'Pasar Hewan Sindoro', 'D51XP', 'Bms_rice_planting_141229-47913_rwg.JPG'),
(4, 'Pasar Ikan', 'SU119', 'Startup-Indonesia-yang-menyediakan-berbagai-solusi-di-bidang-pertanian-peternakan-dan-perikanan.jpg'),
(5, 'Pasar Induk', '9OOK4', 'Harga-Komuditas-Sayuran-Pasca-Lebaran-050814-ADB-2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `foto`, `level`, `tgl_daftar`) VALUES
(1, 'Atika Wahyu Ningrum', 'atik', '$2y$10$CqXbFzSGcIE.Nf7aaMm/fexGVsQoIrg7yMe7IsEiNUv92F1e3XEFm', 'lidyanoviantifitri@gmail.com-416.jpg', 'konsumen', '2018-01-17'),
(2, 'Agus Kurniawan', 'agus', '$2y$10$vIQ85sI6ljvUZvK0z7sqmevDeFS1P6gYU./kcXduJN..ffmn7CvPK', '43521.jpg', 'pedagang', '2018-01-17'),
(3, 'Rizal Anugrah', 'rijal', '$2y$10$ZCq9GKrXJlRQ/JSLdaeDu.oSSqSw6EIaz9J3GgnIgQ9V7mPf7.4cK', '81b885a3789d79e4f8775dfd22958099', 'konsumen', '2018-01-17'),
(4, 'Prihatin', 'atin', 'atun', '644.jpg', 'konsumen', '2018-01-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `harga_nasional`
--
ALTER TABLE `harga_nasional`
  ADD PRIMARY KEY (`id_harga_nasional`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indeks untuk tabel `harga_tani`
--
ALTER TABLE `harga_tani`
  ADD PRIMARY KEY (`id_harga_tani`),
  ADD KEY `id_komoditas` (`id_komoditas`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `jual_ibfk_1` (`id_komoditas`),
  ADD KEY `jual_ibfk_2` (`id_lokasi`),
  ADD KEY `jual_ibfk_3` (`id_harga_tani`),
  ADD KEY `jual_ibfk_4` (`id_harga_nasional`),
  ADD KEY `jual_ibfk_5` (`id_user`);

--
-- Indeks untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id_komoditas`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id_pasar`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `harga_nasional`
--
ALTER TABLE `harga_nasional`
  MODIFY `id_harga_nasional` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `harga_tani`
--
ALTER TABLE `harga_tani`
  MODIFY `id_harga_tani` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id_komoditas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id_pasar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `harga_nasional`
--
ALTER TABLE `harga_nasional`
  ADD CONSTRAINT `harga_nasional_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`);

--
-- Ketidakleluasaan untuk tabel `harga_tani`
--
ALTER TABLE `harga_tani`
  ADD CONSTRAINT `harga_tani_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`),
  ADD CONSTRAINT `harga_tani_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Ketidakleluasaan untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`),
  ADD CONSTRAINT `jual_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `jual_ibfk_3` FOREIGN KEY (`id_harga_tani`) REFERENCES `harga_tani` (`id_harga_tani`),
  ADD CONSTRAINT `jual_ibfk_4` FOREIGN KEY (`id_harga_nasional`) REFERENCES `harga_nasional` (`id_harga_nasional`),
  ADD CONSTRAINT `jual_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pasar`
--
ALTER TABLE `pasar`
  ADD CONSTRAINT `pasar_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
