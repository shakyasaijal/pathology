-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2023 at 02:20 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 8.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathology`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(1, 'saijal', 'shakya', 'saijal@gmail.com', 'saijalshakya', '2023-09-11 14:27:27'),
(2, 'roisha', 'ghodi', 'roisha@ghgodi.com', 'asdasd', '2023-09-11 14:42:30'),
(3, 'Dominique', 'Case', 'xurezeb@mailinator.com', '$2y$10$XLYBDg6QUegAJG7rWk8cE.MHbjezpKQqCyCNSw1UMxV7QASi6Ga96', '2023-09-11 15:17:14'),
(12, 'Connor', 'Watkins', 'hejufiqi@mailinator.com', '$2y$10$/20swCsjgKjtnXx8gQ3GvepA.9Kx6/fms/NVf.Q0Wt62fhrx1REIq', '2023-09-11 15:26:35'),
(13, 'Saijal', 'Shakya', 'saijalshakya@gmail.com', '$2y$10$7LgItqszuBbDaoa9iXdUjexxp1gR37qUI9bj1LrJHNCqAWcmui/Xu', '2023-09-11 15:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
