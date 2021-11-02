-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2021 at 03:15 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_country`
--

CREATE TABLE `data_country` (
  `id_country` smallint NOT NULL,
  `code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_inquiry`
--

CREATE TABLE `data_inquiry` (
  `id_inquiry` int NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `id_country` int NOT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `min_order` int NOT NULL,
  `lead_time` int NOT NULL,
  `type` enum('ring','bracelets','necklaces') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material` set('silver','gold','both') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ip_address` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('read','unread') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_inquiry_reference`
--

CREATE TABLE `data_inquiry_reference` (
  `id_inquiry` int NOT NULL,
  `type` enum('img','link') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'img',
  `link_imgname` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_country`
--
ALTER TABLE `data_country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `data_inquiry`
--
ALTER TABLE `data_inquiry`
  ADD PRIMARY KEY (`id_inquiry`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_country`
--
ALTER TABLE `data_country`
  MODIFY `id_country` smallint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_inquiry`
--
ALTER TABLE `data_inquiry`
  MODIFY `id_inquiry` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
