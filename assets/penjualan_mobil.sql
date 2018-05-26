-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 05:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `id_mobil` varchar(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('0','1') NOT NULL,
  `nm_lgkp` varchar(30) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `level`, `nm_lgkp`, `telp`, `email`, `alamat`) VALUES
('USR0009', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', '1', 'Admin S', '089666445551', 'admin@mobilindo.example.co', 'Gebang, Girisuko, Panggang, Gunungkidul, Girisuko, Kec. Panggang, Kab. Gunung Kidul Prov. D.I. Yogyakarta'),
('USR0010', 'arti', '202cb962ac59075b964b07152d234b70', '0', 'Arti Khansa', '089666445551', 'artikhansa@example.co', 'Street addresses: 445 Mount Eden Road, Mount Eden, Auckland.'),
('USR0011', 'ilham', '202cb962ac59075b964b07152d234b70', '0', 'Ilham Saputrajati', '089666445551', 'ilhamsaputrajati@gmail.com', 'Girisuko, Kec. Panggang, Kab. Gunung Kidul Prov. D.I. Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` varchar(10) NOT NULL,
  `merk_mbl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `merk_mbl`) VALUES
('MRK0001', 'Toyota'),
('MRK0002', 'Suzuki'),
('MRK0003', 'Mitsubishi'),
('MRK0004', 'Datsun'),
('MRK0005', 'Isuzu');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` varchar(11) NOT NULL,
  `id_merk` varchar(10) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `model` varchar(20) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `hrg_beli` int(10) NOT NULL,
  `hrg_jual` int(6) NOT NULL,
  `tgl_beli` timestamp NULL DEFAULT NULL,
  `tgl_jual` timestamp NULL DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_merk`, `no_polisi`, `model`, `warna`, `tahun`, `hrg_beli`, `hrg_jual`, `tgl_beli`, `tgl_jual`, `gambar`, `deskripsi`) VALUES
('MBL0002', 'MRK0005', 'AB6666ZZ', 'Koeneshig', 'Merah Meri', 1995, 10000005, 1000002, '2018-04-29 17:00:00', '0000-00-00 00:00:00', 'lmb.jpg', 'lorem lorem'),
('MBL0012', 'MRK0004', 'AB6666ZZ', 'Go', 'DSDDD', 2, 12, 123, '2018-05-19 17:00:00', '0000-00-00 00:00:00', 'maxresdefault.jpg', 'lorem lorem'),
('MBL0013', 'MRK0004', 'XXXXXX', 'JDSFKD', 'bdbkjf', 2010, 200000000, 123, '2018-05-22 17:00:00', '0000-00-00 00:00:00', 'saas.jpg', 'lorem lorem'),
('MBL0014', 'MRK0002', 'AB2222CC', 'dfgd', 'dsdg', 2010, 50000000, 200000000, '2018-05-21 17:00:00', '0000-00-00 00:00:00', 'Toyota_Etios_L_1.jpg', 'lorem lorem'),
('MBL0015', 'MRK0001', 'AB2222ZZ', 'AAAA', 'WWWW', 2201, 1500000, 2000000, '2018-05-30 17:00:00', '0000-00-00 00:00:00', 'harga xenia bekas.jpg', 'lorem lorem'),
('MBL0016', 'MRK0003', 'slfnssnkf', 'ksadnkj', 'sjkdfs', 1221, 11211111, 2222222, '2018-05-23 17:00:00', '0000-00-00 00:00:00', 'mobil88-Autogard2.jpg', 'lorem lorem');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` varchar(11) NOT NULL,
  `id_pemesanan` varchar(11) NOT NULL,
  `id_member` varchar(7) NOT NULL,
  `mtd_byr` enum('mandiri','bca') NOT NULL,
  `total_byr` int(11) DEFAULT NULL,
  `tgl_byr` timestamp NULL DEFAULT NULL,
  `bukti_byr` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(11) NOT NULL,
  `id_member` varchar(11) NOT NULL,
  `id_mobil` varchar(11) NOT NULL,
  `tgl_pesan` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
