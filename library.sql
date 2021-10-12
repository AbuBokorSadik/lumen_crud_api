-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2021 at 12:56 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `writer`, `publication`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ure jaye boko pokkhi', 'Humayun Ahmed', 'Anondo', '2021-10-12 10:39:53', '2021-10-12 11:33:21', '2021-10-12 11:33:21'),
(3, 'Da Vinci Code', 'Dan Brown', 'Doubleday', '2021-10-12 11:28:18', '2021-10-12 11:35:18', '2021-10-12 11:35:18'),
(6, 'Da Vinci Code 1', 'Dan Brown', 'Doubleday', '2021-10-12 11:35:07', '2021-10-12 11:35:07', NULL),
(8, 'Da Vinci Code 2', 'Dan Brown', 'Doubleday', '2021-10-12 11:38:17', '2021-10-12 11:38:17', NULL),
(11, 'ure jaye boko pokkh', 'Humayun Ahmed', 'Anondo', '2021-10-12 12:11:02', '2021-10-12 12:54:59', '2021-10-12 12:54:59'),
(12, 'Da Vinci Code 5', 'Dan Brown', 'Doubleday', '2021-10-12 12:12:09', '2021-10-12 12:12:09', NULL),
(16, 'Da Vinci Code 7', 'Dan Brown', 'Doubleday', '2021-10-12 12:13:42', '2021-10-12 12:13:42', NULL),
(25, 'Da Vinci Cod', 'Dan Brown', 'Doubleday', '2021-10-12 12:52:42', '2021-10-12 12:52:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_10_12_055246_create_books_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
