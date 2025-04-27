-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 11:53 AM
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
(0, 'hcg', 7, 'female', '0786789876', '2025-04-26 23:14:07', '7'),
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
(12, 'credinta ', 20, 'female', '0786789876', '2025-04-26 15:40:04', '83'),
(13, 'joy', 6, 'female', '0789786567', '2025-04-26 20:49:41', '44'),
(18, 'credinta ', 89, 'female', '0768976543', '2025-04-26 22:25:29', '83'),
(50, 'thg', 6, 'female', '0768976540', '2025-04-26 23:17:13', '44'),
(60, 'j', 7, 'male', '0789678644', '2025-04-27 02:13:09', '45'),
(89, 'tjfhg', 8, 'female', '0789678656', '2025-04-27 09:59:11', '67'),
(99, 'utf', 8, 'male', '0789678659', '2025-04-27 00:29:53', '45'),
(111, 'credinta ', 67, 'female', '0789678652', '2025-04-27 10:51:27', '83'),
(134, 'ugjhb', 8, 'male', '0789678655', '2025-04-27 10:29:34', '67');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `client_name` varchar(110) NOT NULL,
  `program_name` varchar(110) NOT NULL,
  `enrolled_at` datetime DEFAULT current_timestamp(),
  `client_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `client_name`, `program_name`, `enrolled_at`, `client_id`, `program_id`) VALUES
(1, '1', '1', '2025-04-26 12:35:09', 0, 0),
(2, '2', '-1', '2025-04-26 13:04:29', 0, 0),
(3, '1', '2', '2025-04-26 13:08:47', 0, 0),
(4, '-1', '-1', '2025-04-26 13:29:45', 0, 0),
(5, '1', '1', '2025-04-26 14:52:22', 0, 0),
(6, '9', '1', '2025-04-26 15:03:56', 0, 0),
(7, '1', '1', '2025-04-26 15:10:37', 0, 0),
(8, '10', '1', '2025-04-26 15:15:46', 0, 0),
(9, '1', '1', '2025-04-26 15:40:13', 0, 0),
(10, '4', '2', '2025-04-26 20:50:06', 0, 0),
(11, 'joy', 'malaria', '2025-04-26 21:18:33', 0, 0),
(12, 'joy', 'hiv', '2025-04-26 21:18:53', 0, 0),
(13, 'joy', 'malaria', '2025-04-26 21:37:53', 0, 0),
(14, 'joy', 'hiv', '2025-04-26 22:12:22', 0, 0),
(15, '', 'malaria', '2025-04-26 22:28:10', 0, 0),
(16, 'credinta ', 'hiv', '2025-04-26 22:34:34', 18, 3),
(17, 'credinta ', 'malaria', '2025-04-26 22:34:44', 18, 1),
(18, '', 'malaria', '2025-04-26 23:10:18', 1, 1),
(19, 'utf', 'hiv', '2025-04-27 00:30:18', 99, 3),
(20, 'j', 'tb', '2025-04-27 02:13:22', 60, 9),
(21, 'tjfhg', 'tuberculosis', '2025-04-27 09:59:43', 89, 11),
(22, 'tjfhg', 'diabetes', '2025-04-27 10:01:49', 89, 12),
(23, 'ugjhb', 'malaria', '2025-04-27 10:30:08', 134, 1),
(24, 'ugjhb', 'corona', '2025-04-27 10:30:29', 134, 13),
(25, 'credinta ', 'Elderly Care Program', '2025-04-27 10:51:47', 111, 16),
(26, 'credinta ', 'malaria', '2025-04-27 10:51:55', 111, 1),
(27, 'credinta ', 'hiv', '2025-04-27 10:52:22', 111, 3);

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
(4, 'malaria', 'staganated water', '2025-04-26 13:39:46'),
(5, 'malaria', ',m', '2025-04-26 18:11:01'),
(6, 'malaria', 'yughj', '2025-04-26 18:48:37'),
(7, 'j', 'kj', '2025-04-26 20:42:11'),
(8, 'jjjj', 'fu', '2025-04-26 22:29:29'),
(9, 'tb', 'jv', '2025-04-27 00:07:52'),
(10, 'yhj', 'hg', '2025-04-27 00:10:46'),
(11, 'tuberculosis', 'gfth', '2025-04-27 07:57:56'),
(12, 'diabetes', 'ghjj', '2025-04-27 08:01:31'),
(13, 'corona', 'ssdv', '2025-04-27 08:26:57'),
(14, 'cwda', 'caca', '2025-04-27 08:28:09'),
(15, 'Maternal Health Support Program', 'A program aimed at providing prenatal and postnatal care services to  expectant and new mothers ,ensuring health pregnancies and safe deliveries ', '2025-04-27 08:48:06'),
(16, 'Elderly Care Program', 'A program aimed at addressing the health and social needs of senior citizens through regular health monitoring and wellness activities.', '2025-04-27 08:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('faith maina', '$2y$10$hoP3XGwR30zn5y1g3/Qanuhu.Zxa6H24lO/fCTNW.bRFA9zqCihRy'),
('faith maina', '$2y$10$I5DDpjsX3OrcjqiNp.5Sje77ePm4i.F2xXiS9jM4snxIwph3WbKFa'),
('faith maina', '$2y$10$.kCFKaXDS5vt.oegsanmKeC8uw0VkcxWFLvykVQZV49MBKz3iJZLS'),
('faith maina', '$2y$10$3qeKUCbJ8I9CqjJTtySIv..PaAaYVtmTzqvAqXmzuh6KBId24QFOu'),
('faith maina', '$2y$10$KNGv/V.y69NY/Fl1gzmebelXJHPBjUbKetuoT2//z3w/Bo5qRTYJq'),
('joy', '$2y$10$jcDSb.QUu.cKIDdIi7vgnOgyPP1FmbVxLntXwMr.XksqOlx8y21hS'),
('faith maina', '$2y$10$i0Cz93TpBErzwhSPp6MriuEQ9MhfY2WxgqvXGlJBdhrkwu1F5..Oy'),
('faith maina', '$2y$10$Wb1Ka0mEUlOYaXtofvmnd.JRu8gNhqcobO3negksotvR2cSgBLNrS'),
('faith maina', '$2y$10$0cV1vf0Jen2ZxIGftQvrTOAUAPwJRGKl8Je5tMo/sig8SJxfLJQoa'),
('faith maina', '$2y$10$S4RSk30sdcd52PcPp9ynCuDCCcMiwmDbFjFFU0WeWUkJ9HJVVpmRy'),
('joyy', '$2y$10$CWlK3JWLK.950KujdfYVdeyFEL8pIsZFlFuny2B2KvGnuzVH1t8pm');

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
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
