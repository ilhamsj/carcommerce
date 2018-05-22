-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 09:15 AM
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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id_car` int(11) NOT NULL,
  `car_nopolice` varchar(10) NOT NULL,
  `car_merk` varchar(20) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `car_color` varchar(10) NOT NULL,
  `car_years` int(4) NOT NULL,
  `car_purchase` int(10) NOT NULL,
  `car_price` int(6) NOT NULL,
  `date_purchase` timestamp NULL DEFAULT NULL,
  `date_sold` timestamp NULL DEFAULT NULL,
  `car_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id_car`, `car_nopolice`, `car_merk`, `car_model`, `car_color`, `car_years`, `car_purchase`, `car_price`, `date_purchase`, `date_sold`, `car_image`) VALUES
(31, 'AB6316CS', 'BMW', 'Audi', 'Hitam', 2010, 400000000, 500000000, '2018-05-08 17:00:00', '2018-05-30 17:00:00', 'CR-Inline-top-picks-Toyota-Yaris-02-17.jpg'),
(48, 'AB6316YZ', 'Honda', 'Brio', 'Blue', 2015, 200000000, 400000000, '2018-05-22 17:00:00', '0000-00-00 00:00:00', 'lamborghini-urus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `id_confirm` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `transaction_date` timestamp NULL DEFAULT NULL,
  `transaction_status` int(11) NOT NULL,
  `transaction_count` int(10) DEFAULT NULL,
  `transaction_bukti` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `id_car`, `username`, `transaction_date`, `transaction_status`, `transaction_count`, `transaction_bukti`, `description`) VALUES
(10, 4, 'ilham', '2018-05-06 17:00:00', 0, 300000000, '', 'Toyota Mustang Hijau 2010'),
(11, 4, 'arti', '2018-05-06 17:00:00', 2, 300000000, 'jodis', 'Toyota Mustang Hijau 2010'),
(12, 2, 'arti', '2018-05-06 17:00:00', 1, 200000000, '206881.png', 'Toyota T8000 Biru 2015'),
(13, 3, 'arti', '2018-05-07 02:49:42', 1, 200000000, '20106808_1967474220156906_8000425653938385383_n.pn', 'Honda Brio Hitam 2016'),
(14, 1, 'arti', '2018-05-07 02:51:28', 1, 400000000, '', 'Honda Brio Merah 2017'),
(15, 4, 'arti', '2018-05-07 03:02:34', 1, 300000000, '53efb9f1-3a2a-4238-ab25-88827aedf93e.jpg', 'Toyota Mustang Hijau 2010'),
(16, 4, 'arti', '2018-05-07 03:06:43', 2, 300000000, '20106808_1967474220156906_8000425653938385383_n.pn', 'Toyota Mustang Hijau 2010'),
(17, 4, 'ilham', '2018-05-07 03:19:31', 2, 300000000, '', 'Toyota Mustang Hijau 2010'),
(18, 4, 'arti', '2018-05-07 04:37:37', 0, 300000000, '', 'Toyota Mustang Hijau 2010'),
(19, 4, 'arti', '2018-05-07 04:49:14', 0, 300000000, '', 'Toyota Mustang Hijau 2010'),
(20, 2, 'jodis', '2018-05-07 05:00:04', 1, 200000000, 'ad2.jpg', 'Toyota T8000 Biru 2015'),
(21, 4, 'arti', '2018-05-07 05:15:55', 1, 300000000, '18872.jpg', 'Toyota Mustang Hijau 2010'),
(22, 1, 'jodis', '2018-05-07 06:51:18', 0, 400000000, '', 'Honda Brio Merah 2017'),
(23, 1, 'arti', '2018-05-07 09:29:06', 0, 400000000, '', 'Honda Brio Merah 2017'),
(24, 7, 'jodis', '2018-05-08 05:28:54', 1, 500000000, '53efb9f1-3a2a-4238-ab25-88827aedf93e.jpg', 'BMW Audi Hijau Kuni 2016'),
(25, 1, 'jodis', '2018-05-08 05:36:02', 0, 450000000, '', 'Honda Jazza Putih 2015'),
(26, 1, 'jodis', '2018-05-08 05:36:08', 0, 450000000, '', 'Honda Jazza Putih 2015'),
(27, 7, 'arti', '2018-05-08 05:37:35', 0, 500000000, '', 'BMW Audi Hijau Kuni 2016'),
(28, 1, 'arti', '2018-05-08 05:42:46', 0, 450000000, '', 'Honda Jazza Putih 2015'),
(29, 48, 'jodis', '2018-05-09 01:12:17', 2, 400000000, 'maxresdefault.jpg', 'Honda Brio Blue 2015');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `adress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `fullname`, `nik`, `adress`) VALUES
(1, 'jodis', '123', 0, 'Ilham Saputrajati', '', ''),
(2, 'admin', '123', 1, '', '', ''),
(3, 'arti', '123', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`id_confirm`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `confirm`
--
ALTER TABLE `confirm`
  MODIFY `id_confirm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
