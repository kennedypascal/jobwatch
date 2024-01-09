-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 10:50 PM
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
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_region` varchar(200) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `vacancy` int(3) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `application_deadline` varchar(200) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `education_experience` text NOT NULL,
  `other_benefits` int(11) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_id` int(3) NOT NULL,
  `company_image` varchar(200) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `img`, `type`, `cv`, `title`, `bio`, `facebook`, `twitter`, `linkedin`, `created_at`) VALUES
(1, 'username1', 'username1@goo.com', '$2y$10$/9TdcrVZuqml3wpN57cYgeSXZ.ZCcrw3SP05ToM/fqmO1sjjdp7Sy', 'web-coding.png', 'Worker', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 15:19:38'),
(3, 'kenny', 'kenny@yahoo.com', '$2y$10$nvatLl85SnxlktMEh/6aduSJxNY8g5n4odLubNSEjknbVedRz.AUu', 'web-coding.png', 'Worker', NULL, 'web design', 'An IT professional with three years of experience specializing in technical support, customer service, and system administration. Adept at communicating effectively with customers to identify ideal solutions to technical issues and ensure client satisfaction.', NULL, NULL, NULL, '2023-12-16 15:34:12'),
(4, 'username', 'username1@goo.com', '$2y$10$V/DKBJmtOtJ8DHtuwFvruuRX8x5.YgeTov/dRJM5QfN1kUepjRXNS', 'web-coding.png', 'company', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 15:13:54'),
(5, 'kenny', 'kenny@yahoo.com', '$2y$10$kD3kq06ISbj8jL4hui9LNuOZuYAnqwt7Y7U3.LXFRG2Gh203hUOZq', 'web-coding.png', 'company', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-18 15:33:38'),
(6, 'kenzy', 'kenzy@gmail.com', '$2y$10$lmmh/kvzWZhw8oCdDPoUG.u4c6/steKNaV.kZ3BKmhfnpFESASZQS', 'web-coding.png', 'Worker', NULL, 'IT  Technician', 'has over 10 years working experience', NULL, NULL, 'https://www.linkedin.com/in/kpor-kwam-737373aa74', '2023-12-18 16:26:34'),
(7, 'andrew', 'andrew1@gmail.com', '$2y$10$IDSb.cFrgjiG/reXR7NXRuc98YQnKdRCQnY5.whIoS2JQo0ScHn4S', 'web-coding.png', 'Worker', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-09 19:49:56'),
(8, 'andrew1', 'andrew11@gmail.com', '$2y$10$JsNZl3lsURcyXdq...Y.9OAH12i6q8EXv9z.7opQ5SxeT.3SE5np6', 'web-coding.png', 'Company', NULL, NULL, 'alx', NULL, NULL, NULL, '2024-01-09 16:11:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
