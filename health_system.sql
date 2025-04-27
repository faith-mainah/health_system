-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 03:47 PM
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
-- Database: `health_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','other','') NOT NULL,
  `phone` varchar(100) NOT NULL,
  `registered_at` datetime NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `age`, `gender`, `phone`, `registered_at`, `address`) VALUES
(1, '', 27, 'male', '0789786567', '0000-00-00 00:00:00', '83'),
(2, '', 27, 'male', '0789678654', '0000-00-00 00:00:00', '83'),
(3, 'credinta ', 27, 'male', '0786789876', '0000-00-00 00:00:00', '83'),
(4, 'credinta ', 27, 'female', '0786789876', '2025-04-26 12:04:20', '83'),
(5, 'credinta ', 27, 'female', '0789786567', '2025-04-26 12:08:15', '83'),
(6, 'credinta ', 30, 'female', '0789678654', '2025-04-26 12:10:13', '83'),
(7, 'credinta ', 15, 'female', '0789786567', '2025-04-26 13:04:09', '83'),
(8, 'credinta ', 28, 'female', '0789678654', '2025-04-26 13:08:36', '83'),
(9, 'joy', 6, 'female', '0768976543', '2025-04-26 14:52:10', '44'),
(10, 'joy', 7, 'female', '0789678654', '2025-04-26 15:02:50', '44'),
(11, 'credinta ', 1, 'other', '0786789876', '2025-04-26 15:10:27', '44'),
(12, 'credinta ', 20, 'female', '0786789876', '2025-04-26 15:40:04', '83');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `enrolled_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `client_id`, `program_id`, `enrolled_at`) VALUES
(1, 1, 1, '2025-04-26 12:35:09'),
(2, 2, -1, '2025-04-26 13:04:29'),
(3, 1, 2, '2025-04-26 13:08:47'),
(4, -1, -1, '2025-04-26 13:29:45'),
(5, 1, 1, '2025-04-26 14:52:22'),
(6, 9, 1, '2025-04-26 15:03:56'),
(7, 1, 1, '2025-04-26 15:10:37'),
(8, 10, 1, '2025-04-26 15:15:46'),
(9, 1, 1, '2025-04-26 15:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `description`, `created_at`) VALUES
(1, 'malaria', 'stagnant water', '2025-04-26 13:02:20'),
(2, 'malaria', 'stagnant water', '2025-04-26 13:02:35'),
(3, 'hiv', 'ukjh', '2025-04-26 13:10:09'),
(4, 'malaria', 'staganated water', '2025-04-26 13:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
