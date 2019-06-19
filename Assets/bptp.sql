-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2019 pada 06.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bptp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `internship`
--

CREATE TABLE `internship` (
  `id` int(11) NOT NULL,
  `fullname` varchar(60) DEFAULT '',
  `department` varchar(25) DEFAULT '',
  `institute` varchar(35) DEFAULT '',
  `gender` enum('P','L') DEFAULT 'P',
  `image` varchar(15) DEFAULT 'default.jpg',
  `Address` varchar(100) DEFAULT '',
  `city` varchar(20) DEFAULT '',
  `province` varchar(30) DEFAULT '',
  `poscode` smallint(6) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'menunggu',
  `place` varchar(30) DEFAULT '',
  `guide` varchar(50) DEFAULT '',
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `internship`
--

INSERT INTO `internship` (`id`, `fullname`, `department`, `institute`, `gender`, `image`, `Address`, `city`, `province`, `poscode`, `status`, `place`, `guide`, `date_start`, `date_end`, `create_at`) VALUES
(1, 'Atik Rokhania', '', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '2019-01-02', '2019-06-28', '2019-06-19 03:21:29'),
(2, 'Ma\'rufatunisa\'', '', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '2019-01-02', '2019-06-28', '2019-06-19 03:21:29'),
(3, 'Herlin Amanda Sari', '', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '2019-01-02', '2019-06-28', '2019-06-19 03:21:29'),
(4, 'Evy Mayasari', '', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '2019-01-02', '2019-06-28', '2019-06-19 03:21:29'),
(5, 'Ahmad Triono', '', 'Uniska Kediri', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2019-01-15', '2019-02-15', '2019-06-19 03:21:47'),
(6, 'Siti Khalimah', '', 'Uniska Kediri', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2019-01-15', '2019-02-15', '2019-06-19 03:21:47'),
(7, 'Ayu Septia Yuniar', '', 'Uniska Kediri', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2019-01-15', '2019-02-15', '2019-06-19 03:21:47'),
(8, 'Roni Agus Setiawan', '', 'Uniska Kediri', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2019-01-15', '2019-02-15', '2019-06-19 03:21:47'),
(9, 'Gisela Lugita Nurcahyani', '', 'Uniska Kediri', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2019-01-15', '2019-02-15', '2019-06-19 03:21:47'),
(10, 'Santi Wulandari', '', 'Poltek Negeri Malang', 'P', 'default.jpg', '', '', '', NULL, 'terdaftar', 'Keuangan', 'Ir. Dwi Wahyu Astuti, MSc', '2018-01-07', '2018-02-16', '2019-06-19 03:22:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` tinyint(4) NOT NULL,
  `roleName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `roleId` tinyint(4) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `image`, `roleId`, `create_at`) VALUES
(1, 'admin', '$2y$10$8zS0m.o/8CGhyCDXuc435.cMxU1z9xjXGzexDSQitI73RSosGFQBq', 'default.jpg', 2, '2019-06-18 01:58:08'),
(2, 'superAdmin', '$2y$10$xXM7DKZ8CeLbkqmVJm5/tu5f51UyNrshMajq5L4Br0OaCWpOOCEs6', 'default.jpg', 1, '2019-06-18 01:57:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `internship`
--
ALTER TABLE `internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
