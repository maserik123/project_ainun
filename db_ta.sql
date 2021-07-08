-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2021 pada 23.24
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_faktor_penyebab_perceraian`
--

CREATE TABLE `dim_faktor_penyebab_perceraian` (
  `id_faktor_penyebab_perceraian` int(11) NOT NULL,
  `faktor_penyebab_perceraian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dim_faktor_penyebab_perceraian`
--

INSERT INTO `dim_faktor_penyebab_perceraian` (`id_faktor_penyebab_perceraian`, `faktor_penyebab_perceraian`) VALUES
(1, 'Poligami'),
(2, 'Poligami'),
(3, 'Poligami'),
(4, 'Poligami'),
(5, 'Poligami'),
(6, 'Poligami'),
(7, 'Selingkuh'),
(8, 'Ekonomi'),
(9, 'Kdrt'),
(10, 'Selingkuh'),
(11, 'Menikah Dini'),
(12, 'Poligami'),
(13, 'Ekonomi'),
(14, 'Ekonomi'),
(15, 'KDRT'),
(16, 'Selingkuh'),
(17, 'Poligami'),
(18, 'Selingkuh'),
(19, 'Ekonomi'),
(20, 'Kdrt'),
(21, 'Selingkuh'),
(22, 'Menikah Dini'),
(23, 'Poligami'),
(24, 'Ekonomi'),
(25, 'Ekonomi'),
(26, 'KDRT'),
(27, 'Selingkuh'),
(28, 'Poligami'),
(29, 'Selingkuh'),
(30, 'Ekonomi'),
(31, 'Kdrt'),
(32, 'Selingkuh'),
(33, 'Menikah Dini'),
(34, 'Poligami'),
(35, 'Ekonomi'),
(36, 'Poligami'),
(37, 'Poligami'),
(38, 'Poligami'),
(39, 'Poligami'),
(40, 'Poligami'),
(41, 'Poligami'),
(42, 'Poligami'),
(43, 'Poligami'),
(44, 'Poligami'),
(45, 'Poligami'),
(46, 'Poligami'),
(47, 'Poligami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_jenis_perkara`
--

CREATE TABLE `dim_jenis_perkara` (
  `id_jenis_perkara` int(11) NOT NULL,
  `jenis_perkara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dim_jenis_perkara`
--

INSERT INTO `dim_jenis_perkara` (`id_jenis_perkara`, `jenis_perkara`) VALUES
(1, 'Cerai Gugat'),
(2, 'Cerai Talak'),
(3, 'Cerai Talak'),
(4, 'Cerai Gugat'),
(5, 'Cerai Gugat'),
(6, 'Cerai Gugat'),
(7, 'Cerai Talak'),
(8, 'Cerai Gugat'),
(9, 'Cerai Talak'),
(10, 'Cerai Gugat'),
(11, 'Cerai Gugat'),
(12, 'Cerai Gugat'),
(13, 'Cerai Talak'),
(14, 'Cerai Talak'),
(15, 'Cerai Gugat'),
(16, 'Cerai Talak'),
(17, 'Cerai Gugat'),
(18, 'Cerai Talak'),
(19, 'Cerai Gugat'),
(20, 'Cerai Talak'),
(21, 'Cerai Gugat'),
(22, 'Cerai Gugat'),
(23, 'Cerai Gugat'),
(24, 'Cerai Talak'),
(25, 'Cerai Talak'),
(26, 'Cerai Gugat'),
(27, 'Cerai Talak'),
(28, 'Cerai Gugat'),
(29, 'Cerai Talak'),
(30, 'Cerai Gugat'),
(31, 'Cerai Talak'),
(32, 'Cerai Gugat'),
(33, 'Cerai Gugat'),
(34, 'Cerai Gugat'),
(35, 'Cerai Talak'),
(36, 'Cerai Talak'),
(37, 'Cerai Talak'),
(38, 'Cerai Talak'),
(39, 'Cerai Talak'),
(40, 'Cerai Talak'),
(41, 'Cerai Talak'),
(42, 'Cerai Talak'),
(43, 'Cerai Talak'),
(44, 'Cerai Talak'),
(45, 'Cerai Talak'),
(46, 'Cerai Talak'),
(47, 'Cerai Talak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_lokasi`
--

CREATE TABLE `dim_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dim_lokasi`
--

INSERT INTO `dim_lokasi` (`id_lokasi`, `kecamatan`) VALUES
(1, 'Bukit Raya'),
(2, 'Rumbai'),
(3, 'Bukit Raya'),
(4, 'Bukit Raya'),
(5, 'Bukit Raya'),
(6, 'Bukit Raya'),
(7, 'Rumbai Pesisir '),
(8, 'Marpoyan Damai'),
(9, 'Sukajadi'),
(10, 'Tampan'),
(11, 'Marpoyan Damai'),
(12, 'Marpoyan Damai'),
(13, 'Sukajadi'),
(14, 'Marpoyan Damai'),
(15, 'Rumbai '),
(16, 'Sukajadi'),
(17, 'Bukit Raya'),
(18, 'Rumbai Pesisir '),
(19, 'Marpoyan Damai'),
(20, 'Sukajadi'),
(21, 'Tampan'),
(22, 'Marpoyan Damai'),
(23, 'Marpoyan Damai'),
(24, 'Sukajadi'),
(25, 'Marpoyan Damai'),
(26, 'Rumbai '),
(27, 'Sukajadi'),
(28, 'Bukit Raya'),
(29, 'Rumbai Pesisir '),
(30, 'Marpoyan Damai'),
(31, 'Sukajadi'),
(32, 'Tampan'),
(33, 'Marpoyan Damai'),
(34, 'Marpoyan Damai'),
(35, 'Sukajadi'),
(36, 'Bukit Raya'),
(37, 'Bukit Raya'),
(38, 'Bukit Raya'),
(39, 'Bukit Raya'),
(40, 'Bukit Raya'),
(41, 'Bukit Raya'),
(42, 'Bukit Raya'),
(43, 'Bukit Raya'),
(44, 'Bukit Raya'),
(45, 'Bukit Raya'),
(46, 'Bukit Raya'),
(47, 'Bukit Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_pasangan`
--

CREATE TABLE `dim_pasangan` (
  `id_pasangan` int(11) NOT NULL,
  `usia_suami` int(11) NOT NULL,
  `usia_istri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dim_pasangan`
--

INSERT INTO `dim_pasangan` (`id_pasangan`, `usia_suami`, `usia_istri`) VALUES
(1, 34, 30),
(2, 34, 30),
(3, 43, 30),
(4, 63, 17),
(5, 66, 28),
(6, 54, 47),
(7, 17, 23),
(8, 47, 44),
(9, 54, 46),
(10, 40, 34),
(11, 28, 55),
(12, 69, 62),
(13, 26, 17),
(14, 54, 22),
(15, 58, 17),
(16, 46, 53),
(17, 26, 63),
(18, 61, 22),
(19, 21, 68),
(20, 41, 36),
(21, 29, 54),
(22, 41, 58),
(23, 42, 39),
(24, 66, 36),
(25, 40, 18),
(26, 21, 17),
(27, 19, 43),
(28, 50, 58),
(29, 17, 25),
(30, 53, 34),
(31, 28, 32),
(32, 65, 67),
(33, 56, 38),
(34, 34, 30),
(35, 34, 30),
(36, 43, 30),
(37, 34, 30),
(38, 34, 30),
(39, 43, 30),
(40, 34, 30),
(41, 34, 30),
(42, 43, 30),
(43, 34, 30),
(44, 34, 30),
(45, 43, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu_full` date NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `bulan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dim_waktu`
--

INSERT INTO `dim_waktu` (`id_waktu`, `waktu_full`, `tahun`, `bulan`) VALUES
(1, '2020-10-12', '2020', '10'),
(2, '2020-10-13', '2019', '10'),
(3, '2019-10-13', '2018', '10'),
(4, '2020-10-12', '2019', '10'),
(5, '2020-10-12', '2020', '10'),
(6, '2020-10-12', '2020', '10'),
(7, '2020-10-13', '2020', '10'),
(8, '2020-10-14', '2020', '10'),
(9, '2020-10-15', '2020', '10'),
(10, '2020-10-16', '2020', '10'),
(11, '2020-10-17', '2020', '10'),
(12, '2020-10-18', '2020', '10'),
(13, '2020-10-19', '2018', '10'),
(14, '2020-10-20', '2020', '10'),
(15, '2020-10-21', '2019', '10'),
(16, '2020-10-22', '2017', '10'),
(17, '2020-10-23', '2019', '10'),
(18, '2020-10-24', '2020', '10'),
(19, '2020-10-25', '2020', '10'),
(20, '2020-10-26', '2020', '10'),
(21, '2020-10-27', '2018', '10'),
(22, '2020-10-28', '2017', '10'),
(23, '2020-10-29', '2019', '10'),
(24, '2020-10-30', '2020', '10'),
(25, '2020-10-31', '2020', '10'),
(26, '2020-11-01', '2020', '11'),
(27, '2020-11-02', '2020', '11'),
(28, '2020-11-03', '2020', '11'),
(29, '2020-11-04', '2020', '11'),
(30, '2020-11-05', '2020', '11'),
(31, '2020-11-06', '2020', '11'),
(32, '2020-11-07', '2020', '11'),
(33, '2020-11-08', '2020', '11'),
(34, '2020-11-09', '2020', '11'),
(35, '2020-11-10', '2020', '11'),
(36, '2020-10-12', '2020', '10'),
(37, '2020-10-13', '2020', '10'),
(38, '2020-10-13', '2020', '10'),
(39, '2020-10-12', '2020', '10'),
(40, '2020-10-13', '2020', '10'),
(41, '2020-10-13', '2020', '10'),
(42, '2018-10-12', '2018', '10'),
(43, '2018-10-13', '2018', '10'),
(44, '2018-10-14', '2018', '10'),
(45, '2019-10-12', '2019', '10'),
(46, '2019-10-13', '2019', '10'),
(47, '2019-10-14', '2019', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fact_tingkat_perceraian`
--

CREATE TABLE `fact_tingkat_perceraian` (
  `id_tingkat_perceraian` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `id_pasangan` int(11) NOT NULL,
  `id_jenis_perkara` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_faktor_penyebab_perceraian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fact_tingkat_perceraian`
--

INSERT INTO `fact_tingkat_perceraian` (`id_tingkat_perceraian`, `id_waktu`, `id_pasangan`, `id_jenis_perkara`, `id_lokasi`, `id_faktor_penyebab_perceraian`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3),
(4, 6, 4, 6, 6, 6),
(5, 7, 5, 7, 7, 7),
(6, 8, 6, 8, 8, 8),
(7, 9, 7, 9, 9, 9),
(8, 10, 8, 10, 10, 10),
(9, 11, 9, 11, 11, 11),
(10, 12, 10, 12, 12, 12),
(11, 13, 11, 13, 13, 13),
(12, 14, 12, 14, 14, 14),
(13, 15, 13, 15, 15, 15),
(14, 16, 14, 16, 16, 16),
(15, 17, 15, 17, 17, 17),
(16, 18, 16, 18, 18, 18),
(17, 19, 17, 19, 19, 19),
(18, 20, 18, 20, 20, 20),
(19, 21, 19, 21, 21, 21),
(20, 22, 20, 22, 22, 22),
(21, 23, 21, 23, 23, 23),
(22, 24, 22, 24, 24, 24),
(23, 25, 23, 25, 25, 25),
(24, 26, 24, 26, 26, 26),
(25, 27, 25, 27, 27, 27),
(26, 28, 26, 28, 28, 28),
(27, 29, 27, 29, 29, 29),
(28, 30, 28, 30, 30, 30),
(29, 31, 29, 31, 31, 31),
(30, 32, 30, 32, 32, 32),
(31, 33, 31, 33, 33, 33),
(32, 34, 32, 34, 34, 34),
(33, 35, 33, 35, 35, 35),
(34, 36, 34, 36, 36, 36),
(35, 37, 35, 37, 37, 37),
(36, 38, 36, 38, 38, 38),
(37, 39, 37, 39, 39, 39),
(38, 40, 38, 40, 40, 40),
(39, 41, 39, 41, 41, 41),
(40, 42, 40, 42, 42, 42),
(41, 43, 41, 43, 43, 43),
(42, 44, 42, 44, 44, 44),
(43, 45, 43, 45, 45, 45),
(44, 46, 44, 46, 46, 46),
(45, 47, 45, 47, 47, 47);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `role` enum('staff','pimpinan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `nama_user`, `role`) VALUES
(1, 'ainun', '0a0e29d2aecddd6cadf5b4a18557b6ef', 'ainun jariyah', 'staff'),
(2, 'Vebi', 'ab18afda3ad7da3aecd0b4155a697a47', 'Vebi Joananisca', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dim_faktor_penyebab_perceraian`
--
ALTER TABLE `dim_faktor_penyebab_perceraian`
  ADD PRIMARY KEY (`id_faktor_penyebab_perceraian`);

--
-- Indeks untuk tabel `dim_jenis_perkara`
--
ALTER TABLE `dim_jenis_perkara`
  ADD PRIMARY KEY (`id_jenis_perkara`);

--
-- Indeks untuk tabel `dim_lokasi`
--
ALTER TABLE `dim_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `dim_pasangan`
--
ALTER TABLE `dim_pasangan`
  ADD PRIMARY KEY (`id_pasangan`);

--
-- Indeks untuk tabel `dim_waktu`
--
ALTER TABLE `dim_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indeks untuk tabel `fact_tingkat_perceraian`
--
ALTER TABLE `fact_tingkat_perceraian`
  ADD PRIMARY KEY (`id_tingkat_perceraian`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dim_faktor_penyebab_perceraian`
--
ALTER TABLE `dim_faktor_penyebab_perceraian`
  MODIFY `id_faktor_penyebab_perceraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `dim_jenis_perkara`
--
ALTER TABLE `dim_jenis_perkara`
  MODIFY `id_jenis_perkara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `dim_lokasi`
--
ALTER TABLE `dim_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `dim_pasangan`
--
ALTER TABLE `dim_pasangan`
  MODIFY `id_pasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `dim_waktu`
--
ALTER TABLE `dim_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `fact_tingkat_perceraian`
--
ALTER TABLE `fact_tingkat_perceraian`
  MODIFY `id_tingkat_perceraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
