-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 12:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resume` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_id`, `status`, `applied_at`, `resume`, `cover_letter`) VALUES
(1, 1, 1, 'Pending', '2026-04-22 08:00:38', NULL, NULL),
(2, 2, 2, 'Approved', '2026-04-22 08:42:59', NULL, NULL),
(3, 2, 2, 'Approved', '2026-04-22 08:43:26', NULL, NULL),
(4, 2, 2, 'Approved', '2026-04-22 08:45:17', NULL, NULL),
(5, 2, 2, 'Approved', '2026-04-22 08:45:18', NULL, NULL),
(6, 3, 2, 'Rejected', '2026-04-22 09:01:33', NULL, NULL),
(7, 1, 2, 'Pending', '2026-04-22 09:06:49', NULL, NULL),
(12, 9, 1, 'Approved', '2026-04-22 10:08:36', 'Resume.pdf', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employer_id`, `title`, `description`, `location`, `salary`, `created_at`) VALUES
(1, 1, 'Web Developer', 'PHP Developer Job', 'Mumbai', '20000', '2026-04-22 07:57:48'),
(2, 2, 'Designer', 'UI UX', 'Ratnagiri', '25000', '2026-04-22 08:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','employer','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(6, 'kashmira chaugule', 'chaugulekashmira04@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2026-04-22 09:41:01'),
(7, 'employer', 'kashmirachaugule400111@gmail.com', 'edc6771263c556025a73b1bc33861a5a', 'employer', '2026-04-22 09:41:56'),
(8, 'kashmira user', 'abc@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2026-04-22 09:42:43'),
(9, 'xyz', 'xyz@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2026-04-22 10:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
