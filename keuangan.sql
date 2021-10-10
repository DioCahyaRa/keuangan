-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 26, 2021 at 01:16 PM
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
(5, 'BIAYA AKADEMIK', 'Biaya Penelitian & Jurnal', 50000000, 45000000, '2021', 'Ok'),
(6, 'BIAYA UMUM', 'Biaya Listrik', 30000000, 15000000, '2021', 'Ok'),
(7, 'BIAYA AKADEMIK', 'Biaya Promosi', 10000000, 10000000, '2021', 'Ok'),
(8, 'BIAYA PERSONIL', 'Pengembangan SDM', 9000000, -1000000, '2021', 'Ok');

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
(2, 'BRI KC PONDOK KELAPA', 'Kalimalang, Jakarta', 346847),
(3, 'BRI KCP SENTRA NIAGA', 'Ruko Kalimalang, Bekasi', 346847),
(4, 'BSI PONDOK KELAPA', 'Kalimalang, Jakarta', 346847);

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
(4, 'DINAS'),
(7, 'SERTIFIKASI'),
(8, 'PMB'),
(9, 'WISUDA'),
(10, 'SEMESTER PENDEK'),
(11, 'TUGAS AKHIR/SKRIPSI');

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
(5, 'BIAYA PERSONIL'),
(6, 'BIAYA UMUM'),
(7, 'BIAYA AKADEMIK'),
(8, 'SERTIFIKASI'),
(9, 'INVESTASI/YAYASAN'),
(10, 'PMB'),
(11, 'SEMESTER PENDEK'),
(12, 'TUGAS/AKHIR');

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
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `no_kas`, `no_surat`, `nama_kas`, `debit`, `kredit`, `date`) VALUES
(20, '260921/km/0001', '260921/0001', 'DINAS', 100000000, 0, '2021-09-26'),
(21, '260921/kk/0002', '260921/0002', 'Biaya Listrik', 0, 10000000, '2021-09-26');

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
-- Table structure for table `tbl_kas`
--

CREATE TABLE `tbl_kas` (
  `id_kas` int(11) NOT NULL,
  `no_kas` varchar(125) NOT NULL,
  `nama_cek` varchar(125) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `saldo_sebelumnya` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kas`
--

INSERT INTO `tbl_kas` (`id_kas`, `no_kas`, `nama_cek`, `tgl`, `saldo_sebelumnya`, `saldo`) VALUES
(13, '260921/km/0001', 'KAS', '2021-09-26', 0, 100000000),
(14, '260921/kk/0002', 'KAS', '2021-09-26', 0, 90000000);

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
(1, 'Wakil Ketua I', 'Budi, S.Kom., M.Kom.'),
(2, 'Wakil Ketua II', 'Marhakim, S.Pd., M.M.'),
(3, 'Ketua', 'Taufik Maulana, Drs., MBA.'),
(4, 'Pihak Ke-3', 'PT Telekomunikasi '),
(5, 'Pihak Ke-3', 'PLN'),
(6, 'Pihak Ke-3', 'PT Excellent Indotama ');

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
(8, 'BIAYA UMUM', 'Biaya Listrik'),
(9, 'BIAYA UMUM', 'Biaya Telepon/Internet'),
(10, 'BIAYA AKADEMIK', 'Biaya Penelitian & Jurnal'),
(11, 'BIAYA AKADEMIK', 'Biaya Promosi'),
(12, 'BIAYA PERSONIL', 'Pengembangan SDM'),
(13, 'BIAYA UMUM', 'ATK/Perlengkapan Kantor'),
(14, 'BIAYA AKADEMIK', 'Pengabdian Masyarakat'),
(15, 'BIAYA AKADEMIK', 'Pembinaan Kemahasiswaan'),
(16, 'BIAYA AKADEMIK', 'Beasiswa S3,S2,S1'),
(17, 'BIAYA AKADEMIK', 'HONOR DOSEN'),
(18, 'BIAYA AKADEMIK', 'Biaya Akademik Lain');

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
  `date` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `catatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `no_surat`, `jns_biaya`, `masuk_keluar`, `kepada`, `asal_dana`, `pos_anggaran`, `cara_pembayaran`, `nominal`, `terbilang`, `uraian`, `date`, `status`, `catatan`) VALUES
(56, '260921/0001', 'DINAS', 'Masuk', '', 'BRI KC PONDOK KELAPA', '', 'Tunai', 100000000, 'Seratus Juta Rupiah', 'Kas', '2021-09-26', 'APPROVED', ''),
(57, '260921/0002', 'SERTIFIKASI', 'Keluar', 'Marhakim, S.Pd., M.M.', '', 'Biaya Listrik', 'Tunai', 10000000, ' Sepuluh Juta Rupiah', 'Listrik', '2021-09-26', 'APPROVED', '');

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
-- Indexes for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
  ADD PRIMARY KEY (`id_kas`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `asal_dana`
--
ALTER TABLE `asal_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jns_biaya`
--
ALTER TABLE `jns_biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jns_trans`
--
ALTER TABLE `jns_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kepada`
--
ALTER TABLE `tbl_kepada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
