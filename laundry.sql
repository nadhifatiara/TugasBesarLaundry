-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 04:27 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'courier');

-- --------------------------------------------------------

--
-- Table structure for table `perfume`
--

CREATE TABLE `perfume` (
  `perfume_id` int(11) NOT NULL,
  `perfume_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfume_costperkilo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perfume`
--

INSERT INTO `perfume` (`perfume_id`, `perfume_name`, `perfume_costperkilo`) VALUES
(1, 'vanila', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_users_customer` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_perfume` int(11) NOT NULL,
  `fk_typelaundry` int(11) NOT NULL,
  `fk_users_courier` int(11) DEFAULT NULL,
  `weight_item` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `date`, `fk_users_customer`, `address`, `fk_perfume`, `fk_typelaundry`, `fk_users_courier`, `weight_item`, `status`) VALUES
(2, '2018-07-19 19:16:20', 5, '1', 1, 1, NULL, NULL, 1),
(3, '2018-07-19 19:19:03', 5, '1', 1, 1, 4, 1, 8),
(4, '2018-07-19 19:19:10', 5, '1', 1, 1, 4, NULL, 2),
(5, '2018-07-19 20:24:35', 5, '1', 1, 1, NULL, NULL, 1),
(6, '2018-07-19 20:26:26', 5, '11', 1, 1, NULL, NULL, 1),
(7, '2018-07-19 20:26:40', 5, '1', 1, 1, NULL, NULL, 1),
(8, '2018-07-19 21:22:40', 5, 'Malang', 1, 1, 8, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `typelaundry`
--

CREATE TABLE `typelaundry` (
  `typelaundry_id` int(11) NOT NULL,
  `typelaundry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typelaundry_costperkilo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typelaundry`
--

INSERT INTO `typelaundry` (`typelaundry_id`, `typelaundry_name`, `typelaundry_costperkilo`) VALUES
(1, 'cuci kering', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `telp`, `username`, `password`, `image`, `fk_id_level`) VALUES
(4, 'a', 'a', '1', '1', '2', 'c81e728d9d4c2f636f067f89cc14862c', '1.PNG', 1),
(5, '1', '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '11.PNG', 2),
(6, 'asdasdasd', 'asdasdasd', 'asdasdasdasd', 'asdasdasdas', 'tholibsaddasd', '1b2f8c4f06f54d70403b77b0fa41df2c', '12.PNG', 2),
(7, 'asdasd', 'asdasd', 'asdasd', 'asdadasdasd', 'tholib111', '1bbd886460827015e5d605ed44252251', '13.PNG', 2),
(8, 'asd', 'asd', '3', '3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'gear.png', 3),
(9, 'a', 'a', '4', '4', '4', 'a87ff679a2f3e71d9181a67b7542122c', 'gear1.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfume`
--
ALTER TABLE `perfume`
  ADD PRIMARY KEY (`perfume_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_customer` (`fk_users_customer`),
  ADD KEY `fk_perfume` (`fk_perfume`),
  ADD KEY `fk_typelaundry` (`fk_typelaundry`),
  ADD KEY `fk_users_courier` (`fk_users_courier`);

--
-- Indexes for table `typelaundry`
--
ALTER TABLE `typelaundry`
  ADD PRIMARY KEY (`typelaundry_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_level` (`fk_id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perfume`
--
ALTER TABLE `perfume`
  MODIFY `perfume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `typelaundry`
--
ALTER TABLE `typelaundry`
  MODIFY `typelaundry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`fk_perfume`) REFERENCES `perfume` (`perfume_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`fk_users_customer`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`fk_users_courier`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`fk_typelaundry`) REFERENCES `typelaundry` (`typelaundry_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
