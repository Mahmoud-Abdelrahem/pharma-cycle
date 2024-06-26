-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 05:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacycle`
--

-- --------------------------------------------------------

--
-- Table structure for table `galary`
--

CREATE TABLE `galary` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galary`
--

INSERT INTO `galary` (`id`, `image`) VALUES
(12, 'assets/img/gallery/gallery-12.png'),
(13, 'assets/img/gallery/gallery-13.png'),
(14, 'assets/img/gallery/gallery-14.png'),
(15, 'assets/img/gallery/gallery-1.png'),
(16, 'assets/img/gallery/gallery-2.png'),
(17, 'assets/img/gallery/gallery-3.png'),
(18, 'assets/img/gallery/gallery-4.png'),
(19, 'assets/img/gallery/gallery-5.png'),
(20, 'assets/img/gallery/gallery-6.png'),
(21, 'assets/img/gallery/gallery-7.png'),
(22, 'assets/img/gallery/gallery-8.png'),
(23, 'assets/img/gallery/gallery-9.png'),
(24, 'assets/img/gallery/gallery-10.png'),
(25, 'assets/img/gallery/gallery-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `rols`
--

CREATE TABLE `rols` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rols`
--

INSERT INTO `rols` (`id`, `role`) VALUES
(1, 'access all app'),
(2, 'user access');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `image`, `price`, `description`) VALUES
(1, 'FUCI – TOP 2% 15 GM CREAM', 'assets/img/stock/gallery-1.png', '19.50 EGP', 'Classification: Antibiotics'),
(2, 'BIVATRACIN 150 ML POWDER SPRAY', 'assets/img/stock/gallery-2.png', '58.00 EGP', 'Classification: Antibiotics'),
(3, 'ACHTENON ( AKINETON ) 2 MG 30 TAB', 'assets/img/stock/gallery-3.png', '34.50 EGP', 'Category: Drugs to treat Parking’s'),
(4, 'PARKICAPONE 200 MG 20 TAB', 'assets/img/stock/gallery-4.png', '50.00 EGP', 'Category: Drugs to treat Parking’s'),
(5, 'ACTI-COLLA C 30 SACHETS', 'assets/img/stock/gallery-5.png', '555.00 EGP', 'Category: Treatment of osteoarthritis'),
(6, 'NEOPAUSIL  30 CAP', 'assets/img/stock/gallery-6.png', '325.00 EGP', 'Category: Period disorders'),
(7, 'ACTIVE MENO  30 TAB', 'assets/img/stock/gallery-7.png', '450.00 EGP', 'Category: Period disorders'),
(8, 'ADOL EXTRA 24 CAPLETS', 'assets/img/stock/gallery-8.png', '22.00 EGP', 'Classification: Non-narcotic painkillers'),
(9, 'BRUFEN 400mg 30 TAB', 'assets/img/stock/gallery-9.png', '69.00 EGP', 'Classification: Non-narcotic painkillers'),
(10, 'ADOLOR 15 MG / 1 ML 3 AMP', 'assets/img/stock/gallery-10.png', '19.50 EGP', 'Classification: Non-narcotic painkillers'),
(11, 'BABY RELIEF 25 MG 5 SUPP', 'assets/img/stock/gallery-11.png', '9.00 EGP', 'Classification: Non-narcotic painkillers'),
(12, 'LACTEVENOR 0.03 MG 35 TAB', 'assets/img/stock/gallery-12.png', '16.50 EGP', 'Category: contraceptives'),
(13, 'ADWIFLAM 75 MG / 3 ML 6 AMP', 'assets/img/stock/gallery-13.png', '36.00 EGP', 'Classification: analgesic and anti-rheumatism'),
(14, 'Femogesal TAP', 'assets/img/stock/gallery-14.png', '16.50 EGP', 'Category: contraceptives');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirm_password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `profile_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `confirm_password`, `role`, `profile_img`) VALUES
(1, 'mahmoud abdelraheem', 'mahmoud@gmail.com', '01029401120', '12345678', '12345678', 1, 'assets/img/profile/profile_1.png'),
(2, 'abdo', 'abdo@gmail.com', '01014455662', '12345678', '12345678', 2, 'assets/img/profile/profile_2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galary`
--
ALTER TABLE `galary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galary`
--
ALTER TABLE `galary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `rols` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
