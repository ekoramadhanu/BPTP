-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2019 pada 13.50
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
  `department` varchar(25) DEFAULT '',
  `institute` varchar(60) DEFAULT '',
  `gender` enum('P','L') DEFAULT 'P',
  `status` varchar(15) DEFAULT 'menunggu',
  `place` varchar(30) DEFAULT '',
  `guide` varchar(50) DEFAULT '',
  `id_kelompok` varchar(25) DEFAULT NULL,
  `is_sekolah` int(1) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `internship`
--

INSERT INTO `internship` (`id`, `fullname`, `department`, `institute`, `gender`, `status`, `place`, `guide`, `id_kelompok`, `is_sekolah`, `date_start`, `date_end`, `create_at`) VALUES
('1642520206', 'Evy Mayasari', 'Pertanian', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '1642520207', 1, '2019-01-02', '2019-06-28', '2019-06-24 04:34:11'),
('164252020671', 'Santi Wulandari', 'Administrasi', 'Poltek Negeri Malang', 'P', 'terdaftar', 'Keuangan', 'Ir. Dwi Wahyu Astuti, MSc', '164252020671', 0, '2018-01-07', '2018-02-16', '2019-06-24 06:01:20'),
('1642520207', 'Atik Rokhania', 'Pertanian', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '1642520207', 1, '2019-01-02', '2019-06-28', '2019-06-24 04:46:35'),
('1642520209', 'Ma\'rufatunisa\'', 'Pertanian', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '1642520207', 1, '2019-01-02', '2019-06-28', '2019-06-24 04:34:27'),
('164252026145', 'Sumini Ayu Setiyowati', 'Pertanian', 'Universitas Jember', 'L', 'terdaftar', 'lab. Pascapanen', 'aniswatul Khamidah,SPT', '164252026145', 0, '2019-02-01', '2019-03-01', '2019-06-25 06:53:44'),
('1642520286', 'Herlin Amanda Sari', 'Pertanian', 'SMK Negeri 1 Purwosari Pasuruan', 'P', 'terdaftar', 'lab. Pascapanen', 'Aniswatul Khamidah STP', '1642520207', 1, '2019-01-02', '2019-06-28', '2019-06-24 04:34:17'),
('2147483647', 'Ahmad Triono', 'Pertanian', 'Uniska Kediri', 'P', 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2147483647', 0, '2019-01-15', '2019-02-15', '2019-06-24 04:46:55'),
('23874287', 'Rike Febrin Prisilia', '-', 'Universitas Islam Blitar', 'P', 'terdaftar', 'Hama Penyakit Tanaman Padi Bud', 'Sri Zunaini Sa\'adah', '23874287', 0, '2018-03-20', '2018-05-20', '2019-06-25 06:56:31'),
('23987927', 'Fulbertus Eprin Darto', '', 'Universitas Tribuwana Tungga Dewi malang', 'L', 'terdaftar', 'Budidaya Bayam', 'Abu, SP', '23987927', 0, '2018-05-14', '2018-07-20', '2019-06-25 06:55:36'),
('31232153', 'Roni Agus Setiawan', 'Pertanian', 'Uniska Kediri', 'P', 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '31232153', 0, '2019-03-15', '2019-05-15', '2019-06-24 07:52:38'),
('313134436143', 'Ayu Septia Yuniar', 'Pertanian', 'Uniska Kediri', 'P', 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2147483647', 0, '2019-01-15', '2019-02-15', '2019-06-24 04:38:38'),
('313512131', 'Intan Septi Diana', 'Pertanian', 'Universitas Jember', 'L', 'terdaftar', 'lab. Pascapanen', 'aniswatul Khamidah,SPT', '164252026145', 0, '2019-02-01', '2019-03-01', '2019-06-25 06:55:56'),
('3154365134', 'Gisela Lugita Nurcahyani', 'Pertanian', 'Uniska Kediri', 'P', 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2147483647', 0, '2019-01-15', '2019-02-15', '2019-06-24 04:38:42'),
('3238498', 'Yohanes Eva', '-', 'Universitas Tribuwana Tungga Dewi malang', 'P', 'menunggu', 'Budidaya Jamur Tiram', 'Sri Zunaini Sa\'adah', '3238498', 0, '2018-02-19', '2018-03-19', '2019-06-24 04:48:57'),
('362654', 'Egi Purnomo', '-', 'Universitas Islam Malang', 'L', 'terdaftar', 'Kelji Soek', 'Ir. Kasmiyati, Msi', '362654', 0, '2019-01-22', '2019-02-22', '2019-06-25 06:54:28'),
('37174617', 'Hironimus Dongu Wowu', '-', 'Universitas Tribhuwana Tungga Dewi Malang', 'L', 'terdaftar', 'Rumah Jamur', 'Sri Zunaini Sa\'adah, SP', '37174617', 0, '2018-02-01', '2018-03-01', '2019-06-25 06:55:52'),
('3848899', 'Lili Qorian Nisa', '', 'Universitas Islam Malang', 'P', 'terdaftar', 'Kelji Sosek', 'Ir. Kasmiyati, Msi', '3848899', 0, '2018-02-28', '2018-03-28', '2019-06-25 06:56:00'),
('384899', 'Eko', '-', 'Universitas Tribuwana Tungga Dewi malang', 'L', 'terdaftar', 'Manajemen SDM dalam Meningkatk', 'Abu, SP', '384899', 0, '2018-03-01', '2018-06-28', '2019-06-25 06:54:33'),
('4154675162371', 'Siti Khalimah', 'Pertanian', 'Uniska Kediri', 'P', 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '2147483647', 0, '2019-01-15', '2019-02-15', '2019-06-24 04:38:29'),
('421463', 'Abdul Kodir', '-', 'SMK Negeri 1 Purwosari Pasuruan', 'L', 'terdaftar', 'KP Karangploso Malang', 'Abu, SP', '421463', 1, '2018-03-02', '2019-06-28', '2019-06-25 06:53:57'),
('4237222', 'Dewi Bela Risma', '-', 'SMK Islam Al A\'laa Karangploso', 'P', 'terdaftar', 'Ruang Sekretariat', 'Elok Wahyu Rinasari', '4237222', 1, '2018-03-03', '2018-08-03', '2019-06-25 06:54:19'),
('435424', 'Moh. Yusuf Ansori', '', 'Universitas Islam Kadiri Kediri ', 'L', 'terdaftar', 'Budidaya Jamur Tiram', 'Sri Zunaini Sa\'adah, SP', '435424', 0, '2018-02-05', '2018-07-07', '2019-06-25 06:56:13'),
('47652717', 'Qurrotul Aini Eka Bastomi', '-', 'Universitas Gadjah Mada Yogyakarta', 'P', 'terdaftar', 'Kp Mojosari/Kegiatan Manajemen', 'Irma Susanti, SP', '47652717', 0, '2018-01-02', '2018-02-08', '2019-06-25 06:56:28'),
('534614', 'Sari Melta Sustika', '-', 'Poltek Pertanian Negeri Pangkajane Sulsel', 'P', 'menunggu', 'lab. Pascapanen', 'Aniswatul Khamidah, STP', '534614', 0, '2018-03-02', '2019-06-12', '2019-06-24 04:48:11'),
('5376235715', 'Nur Astrifa M', '-', 'Universitas Jember', 'P', 'terdaftar', 'Klink Agribisnis', 'Ir. Dwi Wahyu Astuti, MP', '5376235715', 0, '2018-01-03', '2018-02-16', '2019-06-25 06:56:19'),
('6563562', 'Agung Kencana Putra', 'Peternakan', 'Universitas Brawijaya Malang', 'L', 'terdaftar', 'Ayam KUB', 'Setiasih, S.Pt, MP', '6563562', 0, '2018-01-07', '2018-01-31', '2019-06-25 06:54:00'),
('72357427', 'Moch. nasrullah Fahmi R', '-', 'Universitas Islam Malang', 'P', 'terdaftar', 'Lab. Agronomi', 'Nurul istiqomah, SP', '72357427', 0, '2018-01-25', '2018-02-25', '2019-06-25 06:56:03'),
('7327348', 'Sumini Ayu Setiyowati', '-', 'Universitas Jember', 'P', 'menunggu', 'Lab. Pascapanen', 'aniswatul Khamidah,SPT', '7327348', 0, '2018-02-11', '2018-03-11', '2019-06-24 06:00:54'),
('7342958', 'Aurelius Arin', '-', 'Universitas Tribuwana Tungga Dewi malang', 'P', 'terdaftar', 'Budidaya Kacang Panjang', 'Abu, SP', '7342958', 0, '2018-04-01', '2018-06-28', '2019-06-25 06:54:05'),
('823482', 'Bambang Kurniawan', '-', 'Universitas Tribuwana Tungga Dewi malang', 'L', 'terdaftar', 'Manajemen Sumber Daya Manusia', 'Ir. Kasmiyati, Msi', '823482', 0, '2018-03-19', '2018-06-19', '2019-06-25 06:54:11'),
('83681481', 'Geradus Jova', '-', 'Universitas Tribuwana Tungga Dewi malang', 'L', 'terdaftar', 'Budidaya Jagung', 'Abu, SP', '83681481', 0, '2018-03-01', '2018-04-01', '2019-06-25 06:55:42'),
('9139392', 'Geradus Jova', '-', 'Universitas Tribuwana Tungga Dewi malang', 'L', 'terdaftar', 'Budidaya Jagung', 'Abu, SP', '9139392', 0, '2019-03-01', '2019-07-01', '2019-06-25 06:55:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` varchar(25) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `jumlah` smallint(6) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'superAdmin', '$2y$10$xXM7DKZ8CeLbkqmVJm5/tu5f51UyNrshMajq5L4Br0OaCWpOOCEs6', 'DBA', 'default.jpg', 1, '2019-06-19 07:13:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
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
-- Ketidakleluasaan untuk tabel `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `internship` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
