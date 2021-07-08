-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 07:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_db_ainun`
--

-- --------------------------------------------------------

--
-- Table structure for table `dim_faktor_penyebab_perceraian`
--

CREATE TABLE `dim_faktor_penyebab_perceraian` (
  `id_faktor_penyebab_perceraian` int(11) NOT NULL,
  `faktor_penyebab_perceraian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dim_faktor_penyebab_perceraian`
--

INSERT INTO `dim_faktor_penyebab_perceraian` (`id_faktor_penyebab_perceraian`, `faktor_penyebab_perceraian`) VALUES
(1, 'Poligami'),
(2, 'Selingkuh'),
(3, 'Ekonomi'),
(4, 'Menikah Dini'),
(5, 'KDRT');

-- --------------------------------------------------------

--
-- Table structure for table `dim_jenis_perkara`
--

CREATE TABLE `dim_jenis_perkara` (
  `id_jenis_perkara` int(11) NOT NULL,
  `jenis_perkara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dim_jenis_perkara`
--

INSERT INTO `dim_jenis_perkara` (`id_jenis_perkara`, `jenis_perkara`) VALUES
(1, 'Cerai Gugat'),
(2, 'Cerai Talak');

-- --------------------------------------------------------

--
-- Table structure for table `dim_lokasi`
--

CREATE TABLE `dim_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `la` varchar(255) NOT NULL,
  `lo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dim_lokasi`
--

INSERT INTO `dim_lokasi` (`id_lokasi`, `kecamatan`, `la`, `lo`) VALUES
(1, 'Bukit Raya', '0.50000', '101.56000'),
(2, 'Rumbai Pesisir ', '0.567522', '101.460873'),
(3, 'Marpoyan Damai', '0.491515', '101.446279'),
(4, 'Sukajadi', '0.48696', '101.43638'),
(5, 'Tampan', '0.44933', '101.385421'),
(6, 'Rumbai ', '0.580371', '101.37715'),
(7, 'Payung Sekaki', '0.499653', '101.410871'),
(8, 'Pekanbaru kota', '0.507068', '101.447779');

-- --------------------------------------------------------

--
-- Table structure for table `dim_pasangan`
--

CREATE TABLE `dim_pasangan` (
  `id_pasangan` int(11) NOT NULL,
  `usia_suami` int(11) NOT NULL,
  `usia_istri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dim_pasangan`
--

INSERT INTO `dim_pasangan` (`id_pasangan`, `usia_suami`, `usia_istri`) VALUES
(1, 26, 37),
(2, 53, 33),
(3, 52, 45),
(4, 22, 66),
(5, 53, 24),
(6, 32, 51),
(7, 35, 18),
(8, 64, 20),
(9, 67, 62),
(10, 46, 56),
(11, 43, 59),
(12, 25, 19),
(13, 66, 34),
(14, 59, 34),
(15, 49, 70),
(16, 62, 61),
(17, 58, 59),
(18, 47, 31),
(19, 37, 34),
(20, 49, 66),
(21, 42, 63),
(22, 26, 64),
(23, 51, 31),
(24, 59, 29),
(25, 53, 49),
(26, 65, 42),
(27, 26, 19),
(28, 29, 66),
(29, 43, 35),
(30, 51, 57),
(31, 66, 34),
(32, 52, 25),
(33, 27, 60),
(34, 31, 60),
(35, 21, 63),
(36, 29, 66),
(37, 39, 31),
(38, 21, 44),
(39, 64, 50),
(40, 69, 34),
(41, 25, 54),
(42, 46, 23),
(43, 17, 46),
(44, 18, 50),
(45, 60, 68),
(46, 28, 64),
(47, 55, 24),
(48, 45, 24),
(49, 23, 44),
(50, 17, 25),
(51, 61, 68),
(52, 40, 46),
(53, 58, 66),
(54, 21, 61),
(55, 39, 54),
(56, 53, 67),
(57, 40, 42),
(58, 61, 39),
(59, 21, 64),
(60, 40, 43),
(61, 32, 56),
(62, 19, 38),
(63, 35, 66),
(64, 33, 55),
(65, 53, 38),
(66, 36, 54),
(67, 53, 66),
(68, 31, 37),
(69, 67, 27),
(70, 67, 41),
(71, 18, 28),
(72, 47, 54),
(73, 69, 68),
(74, 26, 33),
(75, 33, 35),
(76, 68, 44),
(77, 55, 38),
(78, 19, 69),
(79, 45, 33),
(80, 20, 39),
(81, 68, 37),
(82, 22, 49);

-- --------------------------------------------------------

--
-- Table structure for table `dim_waktu`
--

CREATE TABLE `dim_waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu_full` date NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `bulan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dim_waktu`
--

INSERT INTO `dim_waktu` (`id_waktu`, `waktu_full`, `tahun`, `bulan`) VALUES
(1, '2020-10-12', '2020', '10'),
(2, '2020-10-12', '2020', '10'),
(3, '2020-10-12', '2020', '10'),
(4, '2020-10-12', '2020', '10'),
(5, '2020-10-12', '2020', '10'),
(6, '2020-10-12', '2020', '10'),
(7, '2020-10-12', '2020', '10'),
(8, '2020-10-13', '2020', '10'),
(9, '2020-10-14', '2020', '10'),
(10, '2020-10-15', '2020', '10'),
(11, '2020-10-16', '2020', '10'),
(12, '2020-10-17', '2020', '10'),
(13, '2020-10-18', '2020', '10'),
(14, '2020-10-19', '2020', '10'),
(15, '2020-10-20', '2020', '10'),
(16, '2020-10-21', '2020', '10'),
(17, '2020-10-22', '2020', '10'),
(18, '2020-10-23', '2020', '10'),
(19, '2020-10-24', '2020', '10'),
(20, '2020-10-25', '2020', '10'),
(21, '2020-10-26', '2020', '10'),
(22, '2020-10-27', '2020', '10'),
(23, '2020-10-28', '2020', '10'),
(24, '2020-10-29', '2020', '10'),
(25, '2020-10-30', '2020', '10'),
(26, '2020-10-31', '2020', '10'),
(27, '2020-11-01', '2020', '11'),
(28, '2020-11-02', '2020', '11'),
(29, '2020-11-03', '2020', '11'),
(30, '2020-11-04', '2020', '11'),
(31, '2020-11-05', '2020', '11'),
(32, '2020-11-06', '2020', '11'),
(33, '2020-11-07', '2020', '11'),
(34, '2020-11-08', '2020', '11'),
(35, '2020-11-09', '2020', '11'),
(36, '2020-11-10', '2020', '11'),
(37, '2020-10-12', '2020', '10'),
(38, '2020-10-13', '2020', '10'),
(39, '2020-10-14', '2020', '10'),
(40, '2020-10-15', '2020', '10'),
(41, '2020-10-16', '2020', '10'),
(42, '2020-10-17', '2020', '10'),
(43, '2020-10-18', '2020', '10'),
(44, '2020-10-19', '2020', '10'),
(45, '2020-10-20', '2020', '10'),
(46, '2020-10-21', '2020', '10'),
(47, '2020-10-22', '2020', '10'),
(48, '2020-10-23', '2020', '10'),
(49, '2020-10-24', '2020', '10'),
(50, '2020-10-25', '2020', '10'),
(51, '2020-10-26', '2020', '10'),
(52, '2020-10-27', '2020', '10'),
(53, '2020-10-28', '2020', '10'),
(54, '2020-10-29', '2020', '10'),
(55, '2020-10-30', '2020', '10'),
(56, '2020-10-31', '2020', '10'),
(57, '2020-11-01', '2020', '11'),
(58, '2020-11-02', '2020', '11'),
(59, '2020-11-03', '2020', '11'),
(60, '2020-11-04', '2020', '11'),
(61, '2020-11-05', '2020', '11'),
(62, '2020-11-06', '2020', '11'),
(63, '2020-11-07', '2020', '11'),
(64, '2020-11-08', '2020', '11'),
(65, '2020-11-09', '2020', '11'),
(66, '2020-11-10', '2020', '11'),
(67, '2020-11-11', '2020', '11'),
(68, '2020-11-12', '2020', '11'),
(69, '2020-11-13', '2020', '11'),
(70, '2020-11-14', '2020', '11'),
(71, '2020-11-15', '2020', '11'),
(72, '2020-11-16', '2020', '11'),
(73, '2020-11-17', '2020', '11'),
(74, '2020-11-18', '2020', '11'),
(75, '2020-11-19', '2020', '11'),
(76, '2019-11-11', '2019', '11'),
(77, '2019-11-11', '2019', '11'),
(78, '2019-11-11', '2019', '11'),
(79, '2019-11-11', '2019', '11'),
(80, '2019-11-11', '2019', '11'),
(81, '2019-11-11', '2019', '11'),
(82, '2019-11-11', '2019', '11'),
(83, '2019-11-11', '2019', '11'),
(84, '2019-11-11', '2019', '11'),
(85, '2018-11-11', '2018', '11'),
(86, '2018-11-11', '2018', '11'),
(87, '2018-11-11', '2018', '11'),
(88, '2018-11-11', '2018', '11');

-- --------------------------------------------------------

--
-- Table structure for table `fact_tingkat_perceraian`
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
-- Dumping data for table `fact_tingkat_perceraian`
--

INSERT INTO `fact_tingkat_perceraian` (`id_tingkat_perceraian`, `id_waktu`, `id_pasangan`, `id_jenis_perkara`, `id_lokasi`, `id_faktor_penyebab_perceraian`) VALUES
(1, 7, 1, 1, 1, 1),
(2, 8, 2, 2, 2, 2),
(3, 9, 3, 1, 3, 3),
(4, 10, 4, 2, 4, 3),
(5, 11, 5, 1, 5, 2),
(6, 12, 6, 1, 3, 4),
(7, 13, 7, 1, 3, 1),
(8, 14, 8, 2, 4, 3),
(9, 15, 9, 2, 3, 3),
(10, 16, 10, 1, 6, 5),
(11, 17, 11, 2, 4, 2),
(12, 18, 12, 1, 1, 1),
(13, 19, 13, 2, 2, 2),
(14, 20, 14, 1, 3, 3),
(15, 21, 15, 2, 4, 5),
(16, 22, 16, 1, 5, 2),
(17, 23, 17, 1, 3, 4),
(18, 24, 18, 1, 3, 1),
(19, 25, 19, 2, 4, 3),
(20, 26, 20, 2, 3, 3),
(21, 27, 21, 1, 6, 5),
(22, 28, 22, 2, 4, 2),
(23, 29, 23, 1, 1, 2),
(24, 30, 24, 2, 2, 2),
(25, 31, 25, 1, 3, 3),
(26, 32, 26, 2, 4, 5),
(27, 33, 27, 1, 5, 2),
(28, 34, 28, 1, 3, 4),
(29, 35, 29, 1, 3, 1),
(30, 36, 30, 2, 4, 3),
(31, 37, 31, 1, 1, 1),
(32, 38, 32, 2, 2, 2),
(33, 39, 33, 1, 3, 3),
(34, 40, 34, 2, 4, 3),
(35, 41, 35, 1, 5, 2),
(36, 42, 36, 1, 3, 4),
(37, 43, 37, 1, 3, 1),
(38, 44, 38, 2, 4, 3),
(39, 45, 39, 2, 3, 3),
(40, 46, 40, 1, 6, 5),
(41, 47, 41, 2, 4, 2),
(42, 48, 42, 1, 1, 1),
(43, 49, 43, 2, 2, 2),
(44, 50, 44, 1, 3, 3),
(45, 51, 45, 2, 4, 5),
(46, 52, 46, 1, 5, 2),
(47, 53, 47, 1, 3, 4),
(48, 54, 48, 1, 3, 1),
(49, 55, 49, 2, 4, 3),
(50, 56, 50, 2, 3, 3),
(51, 57, 51, 1, 6, 5),
(52, 58, 52, 2, 4, 2),
(53, 59, 53, 1, 1, 2),
(54, 60, 54, 2, 2, 2),
(55, 61, 55, 1, 3, 3),
(56, 62, 56, 2, 4, 5),
(57, 63, 57, 1, 5, 2),
(58, 64, 58, 1, 3, 4),
(59, 65, 59, 1, 3, 1),
(60, 66, 60, 2, 4, 3),
(61, 67, 61, 2, 1, 5),
(62, 68, 62, 1, 7, 2),
(63, 69, 63, 2, 8, 3),
(64, 70, 64, 1, 3, 4),
(65, 71, 65, 2, 8, 1),
(66, 72, 66, 1, 8, 5),
(67, 73, 67, 2, 3, 1),
(68, 74, 68, 1, 3, 4),
(69, 75, 69, 2, 7, 3),
(70, 76, 70, 2, 1, 5),
(71, 77, 71, 1, 7, 2),
(72, 78, 72, 2, 8, 3),
(73, 79, 73, 1, 8, 4),
(74, 80, 74, 2, 8, 1),
(75, 81, 75, 2, 8, 4),
(76, 82, 76, 2, 3, 1),
(77, 83, 77, 1, 3, 4),
(78, 84, 78, 2, 8, 2),
(79, 85, 79, 2, 1, 4),
(80, 86, 80, 1, 7, 2),
(81, 87, 81, 2, 8, 3),
(82, 88, 82, 1, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `role` enum('staff','pimpinan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `nama_user`, `role`) VALUES
(1, 'ainunjariyah', 'ainunjariyah', 'Ainun Jariyah', 'staff'),
(2, 'Ainun', '7b8261e3af47460c3fe3d10548872f95', 'Ainun Jariyah', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dim_faktor_penyebab_perceraian`
--
ALTER TABLE `dim_faktor_penyebab_perceraian`
  ADD PRIMARY KEY (`id_faktor_penyebab_perceraian`);

--
-- Indexes for table `dim_jenis_perkara`
--
ALTER TABLE `dim_jenis_perkara`
  ADD PRIMARY KEY (`id_jenis_perkara`);

--
-- Indexes for table `dim_lokasi`
--
ALTER TABLE `dim_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `dim_pasangan`
--
ALTER TABLE `dim_pasangan`
  ADD PRIMARY KEY (`id_pasangan`);

--
-- Indexes for table `dim_waktu`
--
ALTER TABLE `dim_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indexes for table `fact_tingkat_perceraian`
--
ALTER TABLE `fact_tingkat_perceraian`
  ADD PRIMARY KEY (`id_tingkat_perceraian`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dim_faktor_penyebab_perceraian`
--
ALTER TABLE `dim_faktor_penyebab_perceraian`
  MODIFY `id_faktor_penyebab_perceraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dim_jenis_perkara`
--
ALTER TABLE `dim_jenis_perkara`
  MODIFY `id_jenis_perkara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dim_lokasi`
--
ALTER TABLE `dim_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dim_pasangan`
--
ALTER TABLE `dim_pasangan`
  MODIFY `id_pasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `dim_waktu`
--
ALTER TABLE `dim_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `fact_tingkat_perceraian`
--
ALTER TABLE `fact_tingkat_perceraian`
  MODIFY `id_tingkat_perceraian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
