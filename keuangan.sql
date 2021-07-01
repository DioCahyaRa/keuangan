-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 02:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Dumping data for table `jns_trans`
--

INSERT INTO `jns_trans` (`id`, `jns_trans`, `pos`) VALUES
(1, 'Akademik', 'Pembayaran SAP'),
(3, 'Akademik', 'Pembayaran Hosting');

-- --------------------------------------------------------

--
-- Dumping data for table `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id`, `bagian`, `nama`) VALUES
(1, 'Waket 1', 'Budi'),
(2, 'Waket 2', 'Marhakim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `jns_surat` varchar(50) NOT NULL,
  `masuk_keluar` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `pos_anggaran` varchar(128) NOT NULL,
  `cara_pembayaran` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `terbilang` text NOT NULL,
  `uraian` text NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `no_surat`, `jns_surat`, `masuk_keluar`, `kepada`, `pos_anggaran`, `cara_pembayaran`, `nominal`, `terbilang`, `uraian`, `date`) VALUES
(1, '190221/0001', 'coba', 'Masuk', 'dumys', 'Pembayaran SAP', 'Masuk', 100000, '', 'ok', '2021-02-19'),
(2, '190221/0002', 'coba', 'Masuk', 'dumys', 'Pembayaran SAP', 'Masuk', 200000, 'dua puluh ribu rupiah', 'oks', '2021-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role_id`) VALUES
(28, 'dumys', 'dumy', 'dumy@dumy.com', '$2y$10$GSHsdWz/zy81lrKpnfe1pe0ZXm1CMeD79696XVySI2FvJ7i9z9ci.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `nama_menu`) VALUES
(1, 'Page/Dashboard'),
(2, 'Master/Jenis_transaksi'),
(3, 'Master/Bagian'),
(4, 'Surat/Surat');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jns_trans`
--
ALTER TABLE `jns_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jns_trans`
--
ALTER TABLE `jns_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
