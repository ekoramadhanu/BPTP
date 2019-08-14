-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2019 pada 04.09
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
  `id` varchar(25) NOT NULL,
  `fullname` varchar(60) DEFAULT '',
  `studyProgram` varchar(40) DEFAULT NULL,
  `department` varchar(25) DEFAULT '',
  `faculty` varchar(30) DEFAULT NULL,
  `institute` varchar(60) DEFAULT '',
  `gender` enum('P','L') DEFAULT 'P',
  `status` varchar(15) DEFAULT 'Menunggu',
  `place` varchar(30) DEFAULT '',
  `guide` varchar(50) DEFAULT '',
  `id_kelompok` varchar(25) DEFAULT NULL,
  `is_sekolah` int(1) DEFAULT NULL,
  `dayStar` int(4) DEFAULT NULL,
  `monthStart` int(2) DEFAULT NULL,
  `yearStart` int(4) DEFAULT NULL,
  `dayEnd` int(2) DEFAULT NULL,
  `monthEnd` int(2) DEFAULT NULL,
  `yearEnd` int(4) DEFAULT NULL,
  `indexSurat` varchar(40) NOT NULL,
  `nomorSurat` int(11) DEFAULT NULL,
  `jumlahLampiran` tinyint(4) DEFAULT NULL,
  `perihal` varchar(15) DEFAULT NULL,
  `namaPenerima` varchar(50) DEFAULT NULL,
  `tempatSurat` varchar(25) DEFAULT NULL,
  `nomorSuratBalasan` varchar(30) DEFAULT NULL,
  `tanggalSuratBalasan` date DEFAULT NULL,
  `isCetak` tinyint(1) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `internship`
--

INSERT INTO `internship` (`id`, `fullname`, `studyProgram`, `department`, `faculty`, `institute`, `gender`, `status`, `place`, `guide`, `id_kelompok`, `is_sekolah`, `dayStar`, `monthStart`, `yearStart`, `dayEnd`, `monthEnd`, `yearEnd`, `indexSurat`, `nomorSurat`, `jumlahLampiran`, `perihal`, `namaPenerima`, `tempatSurat`, `nomorSuratBalasan`, `tanggalSuratBalasan`, `isCetak`, `create_at`) VALUES
('123456756', 'eko ramdhanu Aryputra', '-', 'Sistem Informasi', '-', 'SMK Percobaan', 'L', 'terdaftar', 'Ruang Website', 'Nurul Istiqimah', '123456756', 1, 17, 6, 2020, 17, 7, 2020, '087', 90, 1, 'PKL', 'ketua jurusan sistem informasi', 'Malang', '5368/PL.2.1/PM/2019', '2019-07-06', 1, '2019-08-14 01:27:26'),
('16515040111100', 'Novita', '-', 'Sistem Informasi', '-', 'Universitas Brawijaya', 'L', 'terdaftar', 'Ruang Website', 'prayit', '16515040111100', 1, 9, 11, 2011, 8, 12, 2011, '090', 0, 1, 'Magang', 'ketua jurusan sistem informasi', 'malang', '5368/PL.2.1/PM/2019', '2012-12-07', 1, '2019-08-14 01:29:09'),
('165150401111001', 'Yogie Tegar Pribadi', 'Sistem informasi', 'Sistem Informasi', 'Fakultas Ilmu Komputer', 'Universitas Brawijaya', 'L', 'terdaftar', 'Perpustakaan', 'Prayitno Surip S. Kom', '165150401111011', 0, 17, 6, 2019, 17, 8, 2019, '090', NULL, 1, 'PKL', 'Ketua', 'malang', '5368/PL.2.1/PM/2019', '2019-09-17', 1, '2019-08-13 13:11:13'),
('165150401111004', 'Muhammad Prio Agustian', 'Sistem informasi', 'Sistem Informasi', 'Fakultas Ilmu Komputer', 'Universitas Brawijaya', 'L', 'terdaftar', 'Perpustakaan', 'Muslich Purwoko, S. Kom', '165150401111004', 0, 18, 1, 2019, 18, 3, 2019, '001', 80, 1, 'PKL', 'Ketua', 'malang', '5368/PL.2.1/PM/2019', '2019-10-17', 1, '2019-08-13 14:37:03'),
('165150401111007', 'Muhammad khaufillah', 'Sistem informasi', '-', 'Fakultas Ilmu Komputer', 'Universitas Brawijaya', 'L', 'terdaftar', 'Perpustakaan', 'Muslich Purwoko, S. Kom', '165150401111007', 0, 17, 10, 2019, 17, 12, 2019, '080', NULL, 1, 'Magang', 'Ketua', 'Malang', '5368/PL.2.1/PM/2019', '2019-10-17', 1, '2019-08-13 14:07:23'),
('165150401111011', 'Eko Ramadhanu Aryputra', 'Sistem informasi', 'Sistem Informasi', 'Fakultas Ilmu Komputer', 'Universitas Brawijaya', 'L', 'terdaftar', 'Perpustakaan', 'Prayitno Surip S. Kom', '165150401111011', 0, 17, 6, 2019, 17, 8, 2019, '090', NULL, 1, 'PKL', 'Ketua', 'malang', '5368/PL.2.1/PM/2019', '2019-09-17', 1, '2019-08-13 13:11:13'),
('165150401111014', 'Lailatul Fitriyah', 'Sistem informasi', 'Sistem Informasi', 'Fakultas Ilmu Komputer', 'Universitas Brawijaya', 'P', 'terdaftar', 'Perpustakaan', 'Prayitno Surip S. Kom', '165150401111011', 0, 17, 6, 2019, 17, 8, 2019, '090', NULL, 1, 'PKL', 'Ketua', 'malang', '5368/PL.2.1/PM/2019', '2019-09-17', 1, '2019-08-13 13:11:13');

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
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `idSurat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `roleId` tinyint(4) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `image`, `roleId`, `create_at`) VALUES
(1, 'admin', '$2y$10$8zS0m.o/8CGhyCDXuc435.cMxU1z9xjXGzexDSQitI73RSosGFQBq', 'Admin', 'default.jpg', 2, '2019-06-19 07:13:57'),
(2, 'superAdmin', '$2y$10$xXM7DKZ8CeLbkqmVJm5/tu5f51UyNrshMajq5L4Br0OaCWpOOCEs6', 'DBA', 'default.jpg', 1, '2019-06-19 07:13:50'),
(3, 'eko', '$2y$10$op1mRLGB.VoVwRdPpywSde2yaQDv1zdKufwfm376LzGL4mcSet7cm', 'Eko', 'default.jpg', 2, '2019-07-26 01:33:50'),
(18, 'fillah', '$2y$10$X9NXuJ.Tw2.QE7QyuO81Y.8/9g1M2xDGIC.vvZyMAKDQPJNTv27.m', 'fillah', 'default.jpg', 1, '2019-08-12 07:48:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idSurat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `internship` (`id`),
  ADD CONSTRAINT `internship_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `internship` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
