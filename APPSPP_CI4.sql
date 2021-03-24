-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2021 at 10:37 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `APPSPP_CI4`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(3, 'X RPL 1', 'Rekayasa Perangkat Lunak'),
(6, 'X RPL 2', 'Rekayasa Perangkat Lunak'),
(8, 'X UPW 1', 'Usaha Perjalanan Wisata');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` smallint(6) NOT NULL,
  `tahun_bayar` year(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_bayar`, `tahun_bayar`, `id_spp`, `jumlah_bayar`) VALUES
(2, 1, '001', '2021-03-19', 3, 2021, 3, 200000),
(4, 1, '001', '2021-03-19', 3, 2021, 3, 200000),
(6, 1, '002', '2021-03-19', 3, 2021, 3, 200000),
(7, 1, '003', '2021-03-20', 3, 2021, 3, 200000),
(8, 1, '001', '2021-03-20', 3, 2021, 3, 200000),
(15, 1, '001', '2021-03-21', 3, 2021, 3, 200000),
(16, 1, '001', '2021-03-22', 3, 2021, 3, 200000),
(17, 1, '002', '2021-03-22', 3, 2021, 3, 200000),
(18, 1, '001', '2021-03-23', 3, 2021, 3, 200000),
(20, 1, '002', '2021-03-23', 3, 2021, 3, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'adminSPP', '202cb962ac59075b964b07152d234b70', 'Oya Suryana', 'admin'),
(6, 'rika9344', '250cf8b51c773f3f8dc8b4be867a9a02', 'Rika Widianingsih', 'petugas'),
(7, 'farhan', '202cb962ac59075b964b07152d234b70', 'Muhammad Ridwan Farhan', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `password`) VALUES
('001', '001', 'Oya', 6, 'Bayuning', '085465656', 3, '202cb962ac59075b964b07152d234b70'),
('002', '002', 'RIka', 8, 'Bayuning', '0817900809', 3, '202cb962ac59075b964b07152d234b70'),
('003', '003', 'Farhan', 6, 'Bayuning', '08767999', 3, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` char(9) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(3, '2020', 200000),
(4, '2021', 250000),
(5, '2019', 125000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `ndx_id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `constrain_spp` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
