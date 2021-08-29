-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 28, 2021 at 03:07 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(11) NOT NULL,
  `jns_trans` varchar(128) NOT NULL,
  `pos` varchar(128) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `sisa_anggaran` int(11) NOT NULL,
  `tahun` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `jns_trans`, `pos`, `anggaran`, `sisa_anggaran`, `tahun`, `status`) VALUES
(3, 'Akademik', 'Pembayaran SPP', 20000000, 17800000, '2020', 'Ok'),
(4, 'Luar Akademik', 'Listrik', 20000000, 10000000, '2021', 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `asal_dana`
--

CREATE TABLE `asal_dana` (
  `id` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_telp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asal_dana`
--

INSERT INTO `asal_dana` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'BSI Pondok Kelapa', 'Jakarta', 2160212);

-- --------------------------------------------------------

--
-- Table structure for table `jns_biaya`
--

CREATE TABLE `jns_biaya` (
  `id` int(11) NOT NULL,
  `jns_biaya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jns_biaya`
--

INSERT INTO `jns_biaya` (`id`, `jns_biaya`) VALUES
(1, 'Dinas'),
(2, 'Tugas Akhir'),
(3, 'Sertifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `jns_trans`
--

CREATE TABLE `jns_trans` (
  `id` int(11) NOT NULL,
  `jns_trans` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jns_trans`
--

INSERT INTO `jns_trans` (`id`, `jns_trans`) VALUES
(1, 'Akademik'),
(4, 'Luar Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `no_kas` varchar(125) NOT NULL,
  `no_surat` varchar(125) NOT NULL,
  `nama_kas` varchar(125) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `no_kas`, `no_surat`, `nama_kas`, `debit`, `kredit`, `date`) VALUES
(1, '020821/km/0001', '', 'Pembayaran SPP', 1000000, 0, 1627910474),
(4, '020821/kk/0002', '', 'Pembayaran SPP', 0, 2000000, 1627910670),
(5, '020821/km/0003', '', 'Pembayaran SAP', 1100000, 0, 1627912441),
(6, '190821/kk/0001', '', 'Pembayaran SPP', 0, 200000, 1629358944),
(7, '210821/kk/0001', '', 'Listrik', 0, 10000000, 1629516318),
(8, '260821/kk/0001', '260821/0001', 'Pembayaran SAP', 0, 1000000, 1629986127),
(9, '260821/kk/0002', '260821/0002', 'Pembayaran SAP', 0, 1000000, 1629986240),
(10, '260821/kk/0003', '260821/0003', 'Pembayaran SPP', 0, 2000000, 1629986422);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'Account'),
(2, 'Kabag'),
(3, 'Ketua'),
(4, 'WAKET I'),
(5, 'WAKET II');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepada`
--

CREATE TABLE `tbl_kepada` (
  `id` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kepada`
--

INSERT INTO `tbl_kepada` (`id`, `bagian`, `nama`) VALUES
(1, 'WAKET 1', 'Marhakim'),
(2, 'WAKET 2', 'Budi'),
(3, 'Ketua', 'Taufik Maulana');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pos`
--

CREATE TABLE `tbl_pos` (
  `id` int(11) NOT NULL,
  `jns_trans` varchar(125) NOT NULL,
  `nama_pos` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pos`
--

INSERT INTO `tbl_pos` (`id`, `jns_trans`, `nama_pos`) VALUES
(1, 'Akademik', 'Pembayaran SAP'),
(3, 'Akademik', 'Pembayaran SPP'),
(4, 'Luar Akademik', 'Listrik'),
(5, 'Akademik', 'Gaji Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `jns_biaya` varchar(50) NOT NULL,
  `masuk_keluar` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `asal_dana` varchar(125) NOT NULL,
  `pos_anggaran` varchar(128) NOT NULL,
  `cara_pembayaran` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `terbilang` text NOT NULL,
  `uraian` text NOT NULL,
  `date` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `catatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `no_surat`, `jns_biaya`, `masuk_keluar`, `kepada`, `asal_dana`, `pos_anggaran`, `cara_pembayaran`, `nominal`, `terbilang`, `uraian`, `date`, `status`, `catatan`) VALUES
(22, '110721/0001', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SPP', 'Tunai', 90000000, ' Sembilan Puluh Juta Rupiah', 'lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 1626005562, 'APPROVED', ''),
(23, '110721/0002', 'Sertifikasi', 'Keluar', 'Budi', '', 'Pembayaran SAP', 'Tunai', 10000000, ' Sepuluh Juta Rupiah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 1626007202, 'APPROVED', ''),
(24, '200721/0001', 'Dinas', 'Keluar', 'Marhakim', '', 'Pembayaran SAP', 'Tunai', 200000, 'Dua Ratus Ribu Rupiah', 'tesfsfsdfsdfsdf', 1626783967, 'APPROVED', ''),
(25, '200721/0002', 'Tugas Akhir', 'Keluar', 'Marhakim', '', 'Pembayaran SPP', 'Tunai', 10000000, ' Sepuluh Juta Rupiah', 'Tes Pembayaran', 1626785031, 'APPROVED', ''),
(26, '200721/0003', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SAP', 'Tunai', 100000, 'Seratus Ribu Rupiah', 'tes Penerimaan', 1626787175, 'CANCELED', ''),
(27, '200721/0004', 'Dinas', 'Keluar', 'Marhakim', '', 'Listrik', 'Tunai', 5000000, ' Lima Juta Rupiah', 'tes pembayaran', 1626788660, 'APPROVED', ''),
(28, '290721/0001', 'Dinas', 'Keluar', 'Budi', '', 'Pembayaran SAP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'tes pembayaran', 1627545509, 'APPROVED', ''),
(29, '290721/0002', 'Tugas Akhir', 'Keluar', 'Marhakim', '', 'Pembayaran SPP', 'Tunai', 300000, 'Tiga Ratus Ribu Rupiah', 'tess', 1627642930, 'APPROVED', 'perbaiki nominalnya Ok'),
(30, '020821/0001', 'Dinas', 'Keluar', 'Budi', '', 'Listrik', 'Tunai', 2000000, ' Dua Juta Rupiah', 'keterangan', 1627888242, 'CANCELED', ''),
(31, '020821/0002', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SPP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'tess', 1627909970, 'APPROVED', ''),
(32, '020821/0003', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SPP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'tes', 1627910091, 'APPROVED', ''),
(33, '020821/0004', 'Tugas Akhir', 'Keluar', 'Marhakim', '', 'Pembayaran SPP', 'Non Tunai', 2000000, ' Dua Juta Rupiah', 'tes', 1627910621, 'APPROVED', ''),
(34, '020821/0005', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SAP', 'Tunai', 10000000, ' Sepuluh Juta Rupiah', 'tes', 1627910913, 'CANCELED', ''),
(35, '020821/0006', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SAP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'tas2', 1627911460, 'CANCELED', ''),
(36, '020821/0007', 'Tugas Akhir', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SAP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'tsss', 1627911551, 'CANCELED', ''),
(37, '020821/0008', 'Dinas', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SAP', 'Tunai', 10000000, ' Sepuluh Juta Rupiah', '2', 1627911571, 'CANCELED', ''),
(38, '020821/0009', 'Tugas Akhir', 'Masuk', '', 'BSI Pondok Kelapa', 'Pembayaran SAP', 'Tunai', 1100000, ' Satu Juta Seratus Ribu Rupiah', 'sdsa', 1627912392, 'APPROVED', 'kurang something Ok'),
(39, '190821/0001', 'Dinas', 'Keluar', 'Marhakim', '', 'Pembayaran SPP', 'Tunai', 200000, 'Dua Ratus Ribu Rupiah', 'tes', 1629358683, 'APPROVED', ''),
(40, '210821/0001', 'Dinas', 'Keluar', 'Marhakim', '', 'Listrik', 'Tunai', 10000000, 'sepuluh juta rupiah', 'tes', 1629516174, 'APPROVED', 'Nominal Salah Ok'),
(41, '260821/0001', 'Dinas', 'Keluar', 'Marhakim', '', 'Pembayaran SAP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'des', 1629985748, 'APPROVED', ''),
(42, '260821/0002', 'Dinas', 'Keluar', 'Budi', '', 'Pembayaran SAP', 'Tunai', 1000000, ' Satu Juta Rupiah', 'keterangan', 1629986195, 'APPROVED', ''),
(43, '260821/0003', 'Dinas', 'Keluar', 'Taufik Maulana', '', 'Pembayaran SPP', 'Tunai', 2000000, ' Dua Juta Rupiah', 'sds', 1629986377, 'APPROVED', '');

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
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role`) VALUES
(2, ' Admin Account', 'Account', 'adminAccount@gmail.com', '$2y$10$2ZrRySIl6Q9komjpVemeJuBJAelH6UNkQHFYyPi2p6mXuYYS9HTS.', 'Account'),
(10, 'Kabag Name', 'Kabag', 'kabag@kabag.com', '$2y$10$baY2oDVHAhr9D6B.ShT54eIeOxPO4x1Qd5Gy0mgbDAzj5GTAr2mva', 'Kabag'),
(11, 'Ketua', 'Ketua', 'ketua@gmail.com', '$2y$10$m4sap7lrhJOkC7C1nLiCqOltpx2ip5hR9JuZvFypTqOsXcP0KZyZ6', 'Ketua'),
(12, 'Waket II', 'Waket2', 'waket2@gmail.com', '$2y$10$trxYiQQHCxMGHPdozg.67OOAK0eMPBmrIBGrVriQbSRpuTOBOa8XO', 'WAKET II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asal_dana`
--
ALTER TABLE `asal_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jns_biaya`
--
ALTER TABLE `jns_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jns_trans`
--
ALTER TABLE `jns_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kepada`
--
ALTER TABLE `tbl_kepada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asal_dana`
--
ALTER TABLE `asal_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jns_biaya`
--
ALTER TABLE `jns_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jns_trans`
--
ALTER TABLE `jns_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kepada`
--
ALTER TABLE `tbl_kepada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
